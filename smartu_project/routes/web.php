<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Language Controller Route
Route::get('lang/{language}', 'LanguageController@switchLang')->name('lang.switch');

// Pages Controller Routes
Route::get('/', 'PageController@index')->name('index');
Route::get(__('routes.about'), 'PageController@about')->name('about');
Route::get(__('routes.dashboard'), 'PageController@dashboard')->name('dashboard');

// Profile Controller Routes
Route::get(__('routes.profile'), 'ProfileController@index')->name('profile');
Route::post(__('routes.profile').'/avatar', 'ProfileController@store')->name('profile.avatar');

// Authentication Routes
Route::get(__('routes.login'), 'Auth\LoginController@showLoginForm')->name('login');
Route::post(__('routes.login'), 'Auth\LoginController@login');
Route::post(__('routes.logout'), 'Auth\LoginController@logout')->name('logout');

// Registration Routes
Route::get(__('routes.register'), 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post(__('routes.register'), 'Auth\RegisterController@register');

// Password Reset Routes
Route::get(__('routes.password.reset'), 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post(__('routes.password.email'), 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get(__('routes.password.reset').'/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post(__('routes.password.reset'), 'Auth\ResetPasswordController@reset');

// Project Controller Routes
Route::resource('projects', 'ProjectController');

// Comment Controller Routes
Route::post('projects/{project}/comment', 'CommentController@store')->name('comments.store');
Route::delete('comment/{comment}', 'CommentController@destroy')->name('comments.destroy');

// Progress Controller Routes
Route::post('projects/{project}/progress', 'ProgressController@store')->name('progress.store');
Route::delete('progress/{progress}', 'ProgressController@destroy')->name('progress.destroy');

// Area Controller Routes
Route::put('projects/{project}/areas', 'AreaController@update')->name('areas.update');
Route::get('areas/{area?}', 'AreaController@index')->name('areas.index');

// Like Controller Routes
Route::get('projects/like/{id}', 'LikeController@likeProject')->name('project.like');
