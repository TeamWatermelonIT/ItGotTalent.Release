<?php

namespace App\Http\Controllers;

use App\Project;
use App\Photo;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;

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
        if($name != null){
            $query->where('name', 'LIKE', "%$name%");
        }
        $projects = $query->paginate(10);

        return Response::json($projects->all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $project = Project::create(array(
            'name' => $request->input('name'),
            'githubUrl' => $request->input('githubUrl'),
            'description' => $request->input('description')
        ))->get()->first();

        $photos = $request->input('photos');
        foreach($photos as $photoUrl){
            self::addPhotoToProject($project->id, $photoUrl);
        }

        $users = $request->input('users');
        foreach($users as $userEmail){
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
     * @param  int  $id
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
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $project = Project::find($id);
        if (!$project) {
            return Response::json([
                'message' => 'Project not found',
            ], 404);
        }
        if($request->input('name')){
            $project->name = $request->input('name');
        }
        if($request->input('githubUrl')){
            $project->githubUrl = $request->input('githubUrl');
        }
        if($request->input('description')){
            $project->description = $request->input('githubUrl');
        }

        $photos = $request->input('photos');
        foreach($photos as $photoUrl){
            self::addPhotoToProject($project->id, $photoUrl);
        }

        $users = $request->input('users');
        foreach($users as $userEmail){
            self::addUserToProject($userEmail, $project->id);
        }

        return Response::json([
            'message' => 'Project updated',
            'projectId' => $project->id,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project = Project::find($id);
        if (!$project) {
            return Response::json([
                'message' => 'Project not found',
            ], 404);
        }
        $project->photos()->detach();
        $project->users()->detach();
        Project::destroy($id);

        return Response::json([
            'message' => 'Project deleted',
            'projectId' => $project->id,
        ], 200);
    }

    private static function addPhotoToProject($projectId, $photoUrl) {
        Photo::create(array(
            'project_id' => $projectId,
            'photoUrl' => $photoUrl
        ));
    }

    private static function addUserToProject($userEmail, $projectId) {
        $userId = \DB::table('users')->where('email', '=', $userEmail)->get()->first()->id;
        \DB::table('user_project')->insert([
            'project_id' => $projectId,
            'user_id' => $userId
        ]);
    }
}
