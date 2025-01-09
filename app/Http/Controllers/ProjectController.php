<?php

namespace App\Http\Controllers;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    //

    public function index(){
        $projects = Project::all();
        dd($projects);
    }

    public function show($id){
        $project = Project::findOrFail($id);
        dd($project);
    }

    public function destroy($id)
    {
        
        $project = Project::findOrFail($id);
        $project->delete();
        
    }

}
