<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('pages.dashboard')->with('title', $title);
    }
}
