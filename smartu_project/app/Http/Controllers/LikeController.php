<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Like;

class LikeController extends Controller
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

    public function likeProject($id)
    {
        $this->handleLike('App\Project', $id);
        return redirect()->back();
    }

    public function handleLike($type, $id)
    {
        $existing_like = Like::withTrashed()->whereLikeableType($type)->whereLikeableId($id)->whereUserId(Auth::id())->first();

        if (is_null($existing_like)) {
            Like::create([
                'user_id'       => Auth::id(),
                'likeable_id'   => $id,
                'likeable_type' => $type,
            ]);
            session()->flash('message_info', '¡El proyecto te parece una buena idea!');
        } else {
            if (is_null($existing_like->deleted_at)) {
                $existing_like->delete();
                session()->flash('message_info', 'El proyecto ya no te parece una buena idea.');
            } else {
                $existing_like->restore();
                session()->flash('message_info', '¡El proyecto te parece una buena idea!');
            }
        }
    }
}
