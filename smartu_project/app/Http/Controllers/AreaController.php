<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Area;
use App\Project;

class AreaController extends Controller
{
    /**
    * Create a new controller instance.
    *
    * @return void
    */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id = 1)
    {
        $title = 'Proyectos';
        $all_areas = Area::all();
        $main_area = Area::find($id);
        $projects = $main_area->projects()->orderBy('id', 'desc')->paginate(10);

        return view('projects.indexareas')->with(['main_area' => $main_area, 'projects' => $projects, 'title' => $title, 'all_areas' => $all_areas]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $project_id = $project->id;

        if ($request->has('areas')) {
            // Get the areas to update
            $areas_update = $request->areas;

            // Delete old areas
            $project->areas()->detach();

            // Add new areas
            foreach ($areas_update as $area) {
                $project->areas()->attach($area);
            }
        } else {
            $project->areas()->detach();
        }

        session()->flash('message_success', '¡Las áreas se han actualizado correctamente!');

        return redirect()->route('projects.show', ['project' => $project_id]);
    }
}
