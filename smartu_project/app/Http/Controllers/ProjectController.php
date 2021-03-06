<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Project;
use App\Area;
use Image;
use Storage;
use App\Http\Requests\CreateProjectRequest;
use App\Http\Requests\UpdateProjectRequest;

class ProjectController extends Controller
{
    /**
    * Create a new controller instance.
    *
    * @return void
    */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Proyectos';
        // Avoid the excesive amount of queries when fetching the user data from a project.
        // Using with() when getting the data fixes the performance issue.
        $projects = Project::with('user')->orderBy('id', 'desc')->paginate(10);

        return view('projects.index')->with(['projects' => $projects, 'title' => $title]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Crear un nuevo proyecto';
        $project = new Project();

        return view('projects.form')->with(['title' => $title, 'project' => $project]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProjectRequest $request)
    {
        $project = new Project;
        $project->fill(
            $request->only('name', 'description', 'url', 'finished_at')
        );
        $project->user_id = $request->user()->id;

        // If the user actually uploaded an image to the form
        if ($request->hasFile('image')) {
            // Upload Progress Image to server
            $image = $request->image;
            $fileName = 'project_' . $project->id . '_' . time() . '.' . $image->getClientOriginalExtension();
            $path = public_path('images/projects/' . $fileName);

            // Store the image using Intervention Image
            Image::make($image)->fit(300, 300)->save($path);
            $project->image = $fileName;
        }

        $project->save();

        session()->flash('message_success', '¡El proyecto se ha creado correctamente!');
        return redirect()->route('projects.show', ['project' => $project->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        $all_areas = Area::all();
        $title = $project->name;

        return view('projects.show')->with(['project' => $project, 'title' => $title, 'all_areas' => $all_areas]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        if ($project->user_id != Auth::user()->id) {
            return redirect()->route('projects.show', ['project' => $project->id]);
        }

        $title = 'Editar proyecto';
        return view('projects.form')->with(['project' => $project, 'title' => $title]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $oldFileName = $project->image;

        $project->update(
            $request->only('name', 'description', 'url', 'finished_at')
        );

        // If the user actually uploaded an image to the form
        if ($request->hasFile('image')) {
            // Upload Progress Image to server
            $image = $request->image;
            $fileName = 'project_' . $project->id . '_' . time() . '.' . $image->getClientOriginalExtension();
            $path = public_path('images/projects/' . $fileName);

            // Store the image using Intervention Image
            Image::make($image)->fit(300, 300)->save($path);

            // Delete old photo if it's not the default one
            if ($project->image != 'default.jpg') {
                Storage::delete('images/projects/' . $oldFileName);
            }

            // Update project information
            $project->image = $fileName;
            $project->save();
        }

        session()->flash('message_success', '¡El proyecto se ha editado correctamente!');
        return redirect()->route('projects.show', ['project' => $project->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        if ($project->user_id != Auth::user()->id) {
            return redirect()->route('projects.show', ['project' => $project->id]);
        }

        $project->delete();

        session()->flash('message_warning', '¡El proyecto se ha eliminado correctamente!');
        return redirect()->route('projects.index');
    }
}
