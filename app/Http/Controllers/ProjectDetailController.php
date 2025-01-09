<?php

namespace App\Http\Controllers;
use App\Models\ProjectDetail;
use Illuminate\Http\Request;

class ProjectDetailController extends Controller
{
    //
    public function index(){
        $projectDetails = ProjectDetail::all();
        dd($projectDetails);
    }

    public function show($id){
        $projectDetail = ProjectDetail::findOrFail($id);
        dd($projectDetails);
    }

    public function destroy($id)
    {
        
        $projectDetail = ProjectDetail::findOrFail($id);
        $projectDetail->delete();
        
    }
}
