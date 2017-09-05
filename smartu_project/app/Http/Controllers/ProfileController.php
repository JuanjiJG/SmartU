<?php

namespace App\Http\Controllers;

use Auth;
use Image;
use Storage;
use Illuminate\Http\Request;
use App\Http\Requests\UploadAvatarRequest;

class ProfileController extends Controller
{
    /**
    * Create a new controller instance.
    *
    * @return void
    */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
    * Show the user profile section.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $user = Auth::user();
        $title = __('profile.title', ['Firstname' => $user->first_name, 'Lastname' => $user->last_name, 'username' => $user->username]);

        return view('pages.profile')->with(['user' => $user, 'title' => $title]);
    }

    /**
     * Store a new avatar in user profile.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UploadAvatarRequest $request)
    {
        $user = Auth::user();
        $oldFileName = $user->avatar;

        // Handle avatar upload
        $avatar = $request->avatar;
        $fileName = $user->id . '_' . time() . '.' . $avatar->getClientOriginalExtension();
        $path = public_path('images/avatars/' . $fileName);

        // Store the avatar using Intervention Image
        Image::make($avatar)->fit(300, 300)->save($path);

        // Delete old photo if it's not the default one
        if ($user->avatar != 'default.jpg') {
            Storage::delete('images/avatars/' . $oldFileName);
        }

        // Update user information
        $user->avatar = $fileName;
        $user->save();

        session()->flash('message_success', '¡La imagen de perfil se ha actualizado correctamente!');
 
        return redirect()->route('profile');
    }
}
