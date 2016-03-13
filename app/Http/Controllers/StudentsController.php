<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;

class StudentsController extends Controller
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
}
