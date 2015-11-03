<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Response;


class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        return view('users.login');
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
    public function show($user_name)
    {
        return view('auth.profile');
    }

    public function getuserdata($user_name) 
    {
        $user = User::where('user_name', '=', $user_name)->get();
        return Response::json($user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($user_name, Request $request)
    {
        if ($request->isMethod('POST')) {
            $user = User::where('user_name', '=', $user_name);
            $user->update([
                'name' => $request->input('name'),
                'email'=> $request->input('email'),             
                //'password'=> $request->input('password'),
                'gender'=> $request->input('gender'),
                'avatar'=> $request->input('avatar'),
                'birthdate'=> $request->input('birthdate'),
                'aboutme'=> $request->input('aboutme'),
                'institution'=> $request->input('institution'),
                'phone'=> $request->input('phone'),
                'country'=> $request->input('country')
                ]);
        }

        return redirect()-> route('user.show', $user_name);
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

    public function updateScore(Request $request, $id, $score) {
        $method = $request->method();

        $user = User::find($id); //where('email', '=', $email);
        $user->update([
            'score' => $user->score + $score
            ]);
        
       // return Response::json($user->score);
        return redirect()-> route('pages.index'); 
    }


    public function postupdateScore(Request $request) {
        $method = $request->method();

        if ($method=='POST') {
            $id = $request->input('id');
            $score = $request->input('score');

            $user = User::find(1); //where('email', '=', $email);
            $user->update([
                'score' => $user->score + $score
                ]);          

        }
       // return Response::json($user->score);
        return redirect()-> route('pages.index'); 
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
}
