<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreService;
use App\Http\Resources\mainCollection;
use App\Service;
use Illuminate\Support\Facades\Input;
use JWTAuth;

class ServicesController extends Controller
{
    protected $user;

    public function __construct()
    {
        $this->user = JWTAuth::parseToken()->authenticate();
    }

    public function index()
    {
        $perPage = Input::get('perPage');

        if (!($perPage)){

            return new mainCollection(Service::paginate(5));
        }
        else
            return new mainCollection(Service::paginate($perPage));


    }

    public function show($id)
    {
        $services = Service::findOrFail($id);

        if (!$services) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, service with id ' . $id . ' cannot be found'
            ], 400);
        }

        return response($services, 200);
    }

    public function store(StoreService $request)
    {
        $services = new Service;
        $services->title = $request->title;
        $services->description = $request->description;
        $services->icon = $request->icon;
        $services->class = $request->class;

        if ($services->save())
            return response()->json([
                'success' => true,
                'services' => $services
            ]);

        else
            return response()->json([
                'success' => false,
                'message' => 'Sorry, Service could not be added'
            ], 500);
    }

    public function update(StoreService $request, $id)
    {
        $services = Service::findOrFail($id);

        if (!$services) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, service with id ' . $id . ' cannot be found'
            ], 400);
        }

        $updated = $services->fill($request->all())
            ->save();

        if ($updated) {
            return response()->json([
                'success' => true
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, service could not be updated'
            ], 500);
        }
    }

    public function destroy($id)
    {
        $services = Service::findOrFail($id);

        if (!$services) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, service with id ' . $id . ' cannot be found'
            ], 400);
        }

        if ($services->delete()) {
            return response()->json([
                'success' => true
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'service could not be deleted'
            ], 500);
        }
    }
}
