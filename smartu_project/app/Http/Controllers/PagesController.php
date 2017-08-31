<?php

namespace SmartU\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
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
    return view('pages.welcome');
  }

  /**
   * Show the about section.
   *
   * @return \Illuminate\Http\Response
   */
  public function about()
  {
    return view('pages.about');
  }

  /**
   * Show the dashboard section.
   *
   * @return \Illuminate\Http\Response
   */
  public function dashboard()
  {
    return view('pages.dashboard');
  }
}
