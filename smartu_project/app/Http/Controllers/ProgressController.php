<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Image;
use App\Project;
use App\Progress;
use App\Http\Requests\CreateProgressRequest;

class ProgressController extends Controller
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
    public function store(CreateProgressRequest $request, Project $project)
    {
        $project_id = $project->id;
        $progress = new Progress;

        $progress->fill(
            $request->only('name', 'description')
        );

        $progress->user_id = $request->user()->id;
        $progress->project_id = $project_id;

        // If the user actually uploaded an image to the form
        if ($request->hasFile('image')) {
            // Upload Progress Image to server
            $image = $request->image;
            $fileName = 'progress_' . $project_id . '_' . time() . '.' . $image->getClientOriginalExtension();
            $path = public_path('images/progresses/' . $fileName);

            // Store the image using Intervention Image
            Image::make($image)->fit(300, 300)->save($path);
            $progress->image = $fileName;
        }

        $progress->save();

        session()->flash('message_success', '¡El avance se ha publicado correctamente!');

        return redirect()->route('projects.show', ['project' => $project_id]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
