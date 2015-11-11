<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Auth;
use Response;
use Validator;


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

    public function checkuser($username, $email) {    
        $user = User::where('email', $email)->first();
        return  (count($user)==0) || ($user->user_name == $username);
    }

    public function edit($user_name, Request $request)
    {
        if ($request->isMethod('POST') && $this->checkuser($user_name, $request->input('email'))) {
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

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'oldpassword' => 'required|min:6',
            'newpassword' => 'required|confirmed|min:6',
        ]);
    }

    public function updatepassword(Request $request)
    {
        if (!$request->isMethod('post')) return redirect()-> route('pages.index'); 
        $data = $request->json()->all();

        $email = $data['email'];
        $password = $data['oldpassword'];
        $newpassword = $data['newpassword'];
        $confirmpassword = $data['newpassword_confirmation'];

        $err = [];
        if ($confirmpassword != $newpassword){
            $err[] = 'The confirmation password do not match!';
        }
        elseif ($password == $newpassword){
                $err[] = 'Your old password and new password must be different!';
            }
        else {
            if (strlen($newpassword) < 6) $err[] = 'New password must be at least 6 character';
            if (Auth::attempt(['email'=>$email, 'password'=>$password])) {
                $user = User::where('email', $email);
                $user->update([
                    'password' => bcrypt($newpassword)
                    ]);
            }
            else $err[] = 'Your old password incorrect!';
        }

        if (count($err)==0) $err[] = 'Your password has been updated successfull!';

        return Response::json($err);
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

            $user = User::find($id); //where('email', '=', $email);
            $user->update([
                'score' => $user->score + $score
                ]);          

        }
       // return Response::json($user->score);
        return redirect()-> route('pages.index'); 
    }

    public function checkbyemail(Request $request, $user_name) {
        if ($request->isMethod('POST')) {
            $check = $this->checkuser($user_name, $request->input('email'));
            return Response::json($check);
        }
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
