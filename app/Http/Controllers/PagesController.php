<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Category;
use App\User;
use App\Question;
use Response;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::get()->toJson();
        return view('pages.index') -> with('cats', $categories);
    }

    public function leaderboard()
    {
        $pos = 1;
        $users = User::select('name', 'avatar', 'score') -> orderBy('score', 'desc') -> paginate(10);
        return view('pages.leaderboard', ['users' => $users, 'pos' => $pos]);
    }
    public function category($id)
    {
        $questions = Question::where('cat_id', '=', $id)->get()->toJson();
        return view('pages.category') -> with('data', $questions);
    }
}
