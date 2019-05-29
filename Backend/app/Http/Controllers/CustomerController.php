<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Http\Requests\StoreCustomer;
use App\Http\Resources\mainCollection;
use App\User;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Input;
use JWTAuth;

class CustomerController extends Controller
{
    protected $user;

    public function __construct()
    {
        $this->user = JWTAuth::parseToken()->authenticate();
    }

    public function list()
    {
        $customers = Customer::all();
        foreach ($customers as $customer) {
            $list = [

                'value' => $customer->id,
                'label' => $customer->full_name,
            ];
            $lists[] = $list;
        }
        $collection = $this->paginate($lists, $perPage = 5, $page = null, $options = []);
        return new mainCollection($collection);
    }

    public function index()
    {
        $this->authorize('view', Customer::class);
        $perPage = Input::get('perPage');

        if (!($perPage)) {

            return new mainCollection(Customer::paginate(5));
        } else
            return new mainCollection(Customer::paginate($perPage));
    }

    public function show($id)
    {
        $customer = Customer::findOrFail($id);
        $this->authorize('view', Customer::class);

        if (!$customer) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, customer with id ' . $id . ' cannot be found'
            ], 400);
        }

        return response($customer, 200);
    }

    public function store(StoreCustomer $request)
    {

        $this->authorize('create', Customer::class);
        $customer = new Customer;
        $customer->full_name = $request->full_name;
        $customer->company = $request->company;
        $customer->domain = $request->domain;
        $customer->email = $request->email;
        $customer->phone = $request->phone;

        if ($customer->save())
            return response()->json([
                'success' => true,
                'customer' => $customer
            ]);
        else
            return response()->json([
                'success' => false,
                'message' => 'Sorry, customer could not be added'
            ], 500);
    }

    public function update(StoreCustomer $request, $id)
    {
        $this->authorize('update', Customer::class);
        $customer = Customer::findOrFail($id);

        if (!$customer) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, customer with id ' . $id . ' cannot be found'
            ], 400);
        }

        $updated = $customer->fill($request->all())
            ->save();

        if ($updated) {
            return response()->json([
                'success' => true
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, customer could not be updated'
            ], 500);
        }
    }

    public function destroy($id)
    {
        $this->authorize('delete', Customer::class);
        $customer = Customer::findOrFail($id);

        if (!$customer) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, customer with id ' . $id . ' cannot be found'
            ], 400);
        }

        if ($customer->delete()) {
            return response()->json([
                'success' => true
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'customer could not be deleted'
            ], 500);
        }
    }

    public function paginate($items, $perPage = 15, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }
}
