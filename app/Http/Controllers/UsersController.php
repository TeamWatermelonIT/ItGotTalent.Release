<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $name = Input::get('name');
        $course = Input::get('course');
        $season = Input::get('season');
        $order = Input::get('order', 'asc');
        $orderBy = Input::get('orderBy', 'name');

        $query = User::with('projects');
        if ($name != null) {
            $query->where('name', 'LIKE', "%$name%");
        }
        if ($course != null) {
            $query->where('course', '=', $course);
        }
        if ($season != null) {
            $query->where('season', '=', $season);
        }

        $users = $query->orderBy($orderBy, $order)->paginate(10);

        return Response::json($users->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::with('projects')->where('id', $id)->get()->first();
        if (!$user) {
            return Response::json([
                'message' => 'Student not found',
            ], 404);
        }

        return Response::json($user);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        if (!$user) {
            return Response::json([
                'message' => 'Project not found',
            ], 404);
        }
        if ($request->input('name')) {
            $user->name = $request->input('name');
        }
        if ($request->input('email')) {
            $user->email = $request->input('email');
        }
        if ($request->input('photoUrl')) {
            $user->photoUrl = $request->input('photoUrl');
        }

        return Response::json([
            'message' => 'User updated',
            'userId' => $user->id,
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
        $user = User::find($id);
        $user->projects()->detach();
        User::destroy($id);

        return Response::json([
            'message' => 'User deleted',
            'userId' => $user->id,
        ], 200);
    }
}