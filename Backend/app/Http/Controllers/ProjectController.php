<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProject;
use App\Http\Resources\mainCollection;
use App\Project;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Input;
use JWTAuth;

class ProjectController extends Controller
{
    protected $user;

    public function __construct()
    {
        $this->user = JWTAuth::parseToken()->authenticate();
    }



    public function feedbacks()
    {

        $projects = Project::all();
        foreach ($projects as $project) {
            $feedback = [

                'customer' => $project->customer->full_name,
                'project' => $project->title,
                'feedback' => $project->feedbacks,
            ];
            $feedbacks[] = $feedback;
        }
        $collection = $this->paginate($feedbacks, $perPage = 5, $page = null, $options = []);
        return new mainCollection($collection);
    }


    public function index()
    {
        $perPage = Input::get('perPage');

        if (!($perPage)){

            return new mainCollection(Project::paginate(5));
        }
        else
            return new mainCollection(Project::paginate($perPage));


    }

    public function show($id)
    {
        $project = Project::findOrFail($id);

        if (!$project) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, project with id ' . $id . ' cannot be found'
            ], 400);
        }

        return response($project, 200);
    }

    public function store(StoreProject $request)
    {
        $project = new Project;
        $project->title = $request->title;
        $project->url = $request->url;
        $project->requirements = $request->requirements;
        $project->coverImage = $request->coverImage;
        $project->customer_id = $request->customer_id;
        $project->domain = $request->domain;
        $project->feedbacks = $request->feedbacks;
        $project->technologies = $request->technologies;
        $project->services_id = $request->services_id;



        if ($project->save())
            return response()->json([
                'success' => true,
                'services' => $project
            ]);
        else
            return response()->json([
                'success' => false,
                'message' => 'Sorry, project could not be added'
            ], 500);
    }

    public function update(StoreProject $request, $id)
    {
        $project = Project::findOrFail($id);

        if (!$project) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, project with id ' . $id . ' cannot be found'
            ], 400);
        }

        $updated = $project->fill($request->all())
            ->save();

        if ($updated) {
            return response()->json([
                'success' => true
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, project could not be updated'
            ], 500);
        }
    }

    public function destroy($id)
    {
        $project = Project::findOrFail($id);

        if (!$project) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, project with id ' . $id . ' cannot be found'
            ], 400);
        }

        if ($project->delete()) {
            return response()->json([
                'success' => true
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'project could not be deleted'
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
