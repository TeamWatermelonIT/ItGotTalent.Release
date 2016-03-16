<?php

namespace App\Http\Controllers;

use App\Project;
use App\Photo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $name = Input::get('name');

        $query = Project::with('photos', 'users');
        if ($name != null) {
            $query->where('name', 'LIKE', "%$name%");
        }
        $projects = $query->paginate(10);

        return Response::json($projects->all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        if (!Auth::check()) {
            return Response::json([
                'message' => 'Unauthorized access'
            ], 401);
        }
        \Eloquent::unguard();

        $users = json_decode(Input::get('users'));
        foreach ($users as $userEmail) {
            $user = \DB::table('users')->where('email', '=', $userEmail)->first();
            if (!$user) {
                return Response::json([
                    'message' => 'Invalid user',
                    'email' => $userEmail
                ], 400);
            }
        }

        if (Input::get('name') && Input::get('githubUrl') && Input::get('description')
            && Input::get('photos')
        ) {
            try {
                $project = Project::create(array(
                    'name' => Input::get('name'),
                    'githubUrl' => Input::get('githubUrl'),
                    'description' => Input::get('description')
                ));
            } catch (\Exception $e) {
                return Response::json([
                    'message' => 'Project with that name or githubUrl already exist.'
                ], 200);
            }

        } else {
            return Response::json([
                'message' => 'Not enought parameters. Name, githubUrl, description, photos and users.',
            ], 400);
        }

        $photos = json_decode(Input::get('photos'));
        foreach ($photos as $photoUrl) {
            self::addPhotoToProject($project->id, $photoUrl);
        }

        foreach ($users as $userEmail) {
            self::addUserToProject($userEmail, $project->id);
        }

        return Response::json([
            'message' => 'Project created',
            'projectId' => $project->id,
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project = Project::with('photos', 'users')->where('id', $id)->get()->first();
        if (!$project) {
            return Response::json([
                'message' => 'Project not found',
            ], 404);
        }

        return Response::json($project);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        if (!Auth::check()) {
            return Response::json([
                'message' => 'Unauthorized access'
            ], 401);
        }

        $project = Project::find($id);
        if (!$project) {
            return Response::json([
                'message' => 'Project not found',
            ], 404);
        }
        if (Input::get('name')) {
            $project->name = Input::get('name');
        }
        if (Input::get('githubUrl')) {
            $project->githubUrl = Input::get('githubUrl');
        }
        if (Input::get('description')) {
            $project->description = Input::get('description');
        }

        if (Input::get('photos')) {
            $photos = json_decode(Input::get('photos'));
            foreach ($photos as $photoUrl) {
                self::addPhotoToProject($project->id, $photoUrl);
            }
        }

        if (Input::get('users')) {
            $users = json_decode(Input::get('users'));
            foreach ($users as $userEmail) {
                self::addUserToProject($userEmail, $project->id);
            }
        }

        $project->save();

        return Response::json([
            'message' => 'Project updated',
            'projectId' => $project->id,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Auth::check()) {
            return Response::json([
                'message' => 'Unauthorized access'
            ], 401);
        }
        $project = Project::with('users', 'photos')->find($id);
        if (!$project) {
            return Response::json([
                'message' => 'Project not found',
            ], 404);
        }
        $photos = $project->photos;
        foreach ($photos as $photo) {
            Photo::destroy($photo->id);
        }
        $project->users()->detach();
        Project::destroy($id);

        return Response::json([
            'message' => 'Project deleted',
            'projectId' => $project->id,
        ], 200);
    }

    private static function addPhotoToProject($projectId, $photoUrl)
    {
        \Eloquent::unguard();
        Photo::create(array(
            'project_id' => $projectId,
            'photoUrl' => $photoUrl
        ));
    }

    private static function addUserToProject($userEmail, $projectId)
    {
        \Eloquent::unguard();
        $user = \DB::table('users')->where('email', '=', $userEmail)->first();
        \DB::table('user_project')->insert([
            'project_id' => $projectId,
            'user_id' => $user->id
        ]);
    }
}
