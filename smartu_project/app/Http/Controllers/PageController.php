<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Comment;
use App\Area;

class PageController extends Controller
{
    /**
    * Create a new controller instance.
    *
    * @return void
    */
    public function __construct()
    {
        $this->middleware('guest')->only('index');
    }

    /**
    * Show the application dashboard.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $title = 'Bienvenid@';
        return view('pages.welcome')->with('title', $title);
    }

    /**
    * Show the about section.
    *
    * @return \Illuminate\Http\Response
    */
    public function about()
    {
        $title = 'Acerca de';
        return view('pages.about')->with('title', $title);
    }

    /**
    * Show the dashboard section.
    *
    * @return \Illuminate\Http\Response
    */
    public function dashboard()
    {
        $title = 'Página principal';
        $recent_projects = Project::with('user')->orderBy('created_at', 'desc')->take(3)->get();
        $featured_projects = Project::withCount('likes')->orderBy('likes_count', 'desc')->take(2)->get();
        $featured_comments = Comment::with('user')->orderBy('created_at', 'desc')->take(3)->get();
        $areas = Area::all();
        
        return view('pages.dashboard')->with(['title' => $title, 'recent_projects' => $recent_projects, 'featured_projects' => $featured_projects, 'areas' => $areas, 'featured_comments' => $featured_comments]);
    }
}
