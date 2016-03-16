<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth:api');
    }

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
    public function update($id)
    {
        $user = User::find($id);
        if (!$user) {
            return Response::json([
                'message' => 'Student not found',
            ], 404);
        }

        if (Input::get('name')) {
            $user->name = Input::get('name');
        }
        if (Input::get('email')) {
            $user->email = Input::get('email');
        }
        if (Input::get('photoUrl')) {
            $user->photoUrl = Input::get('photoUrl');
        }

        $user->save();

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
