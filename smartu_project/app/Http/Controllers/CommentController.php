<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Comment;
use App\Http\Requests\CreateCommentRequest;

class CommentController extends Controller
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCommentRequest $request, Project $project)
    {
        $project_id = $project->id;
        $comment = new Comment;
        $comment->fill(
            $request->only('content')
        );
        $comment->user_id = $request->user()->id;
        $comment->project_id = $project_id;
        $comment->save();

        session()->flash('message_success', '¡El comentario se ha publicado correctamente!');

        return redirect()->route('projects.show', ['project' => $project_id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        $project_id = $comment->project_id;

        if ($comment->user_id != Auth::user()->id) {
            return redirect()->route('projects.show', ['project' => $project_id]);
        }

        $comment->delete();

        session()->flash('message_warning', '¡El comentario se ha eliminado correctamente!');

        return redirect()->route('projects.show', ['project' => $project_id]);
    }
}
