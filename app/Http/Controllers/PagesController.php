<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Category;
use App\User;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::get();
        return view('pages.index') -> with('categories', $categories);
    }

    public function leaderboard()
    {
        $users = User::select('name', 'avatar', 'score') -> orderBy('score', 'desc') -> paginate(3);
        return view('pages.leaderboard') -> with('users', $users);
    }
}
