<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Userdetail;
use DB;
use Response;
use App\User;

class UserdetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getdata($username)
    {
        $userdetail = DB::table('userdetails') 
                        -> join('categories', 'userdetails.cat_id', '=', 'categories.id') 
                        -> select(DB::raw('count(*) as score, categories.id, categories.cat_name'))
                        -> where('is_correct', '=', 1)
                        -> limit(20)->get();
        return Response::json($userdetail);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    private function updateScore($id, $score) {
        $user = User::find($id);
        $user->update([
            'score' => $user->score + $score
            ]);
    }

    public function create(Request $request)
    {
        //
        $data = $request->json()->all();
        $scoreschange = 0;
        
        for ($i=0; $i<count($data); $i++) { 
            $userdetail = Userdetail::where('user_id', $data[$i]['user_id'])-> 
                                      where('cat_id', $data[$i]['cat_id'])->
                                      where('question_id', $data[$i]['question_id'])->limit(1);

            if (count($userdetail->get())==0) {                
                $scoreschange += $data[$i]['is_correct'];
                Userdetail::create([
                    'user_id' => $data[$i]['user_id'],
                    'cat_id' => $data[$i]['cat_id'],
                    'question_id' => $data[$i]['question_id'],
                    'is_correct' => $data[$i]['is_correct']
                    ]);
                }
            else {
                foreach ($userdetail->get() as $u) {
                    $scoreschange += $data[$i]['is_correct'] - $u->is_correct;
                }

                $userdetail->update([
                    'is_correct' => $data[$i]['is_correct']
                ]);
            }
        }

        $user_id = $data[0]['user_id'];
        $this->updateScore($user_id, $scoreschange);

        return Response::json('ok');//redirect()->route('pages.index');
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
    public function showstatusgetdata($username, $cat_id)
    {
        $user = User::where('user_name', $username)->limit(1)->get();
        if (count($user)==0) return redirect()->route('pages.index');

        $userdetail = DB::table('userdetails') 
                        -> join('questions', 'userdetails.question_id', '=', 'questions.id') 
                        -> select(DB::raw('questions.content, userdetails.is_correct'))
                        -> get();

        $score = 0;
        foreach ($userdetail as $u) {
            if ($u->is_correct==1) $score++;
        }

        return Response::json(['score'=>$score, 'userdetail' => $userdetail]);
    }

     public function showstatus($username, $cat_id)
    {
        return view('auth.scorestatus');
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
}
