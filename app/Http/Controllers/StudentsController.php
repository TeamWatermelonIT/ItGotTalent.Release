<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
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

        $query = DB::table('users');
        if($name != null){
            $query->where('name', 'LIKE', "%$name%");
        }
        if($course != null){
            $query->where('course', '=', $course);
        }
        if($season != null){
            $query->where('season', '=', $season);
        }

        $users = $query->paginate();

        $response = [];

        foreach($users as $user){
            $response[] = $this->getUserResponse($user);
        }

        return Response::json($response);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::where('id', $id)->get()->first();
        $response = $this->getUserResponse($user);

        return Response::json($response);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    private function getUserResponse($user)
    {
        $response = [
            'name' => $user->name,
            'course' => $user->course,
            'season' => $user->season,
            'email' => $user->email,
            'gender' => $user->gender,
            'dateOfBirth' => $user->dateOfBirth,
            'photo' => $user->photoUrl
        ];

        return $response;
    }
}
