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
        $this->middleware('auth');
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
