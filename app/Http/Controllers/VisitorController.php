<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class VisitorController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        return view('welcome',compact('projects'));
    }
}
