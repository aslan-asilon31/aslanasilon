<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Gallery;
use App\Models\Technology;
use App\Models\ProjectGallery;
use Storage;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        $technologies = Technology::all();
        // $ProjectGalleries = ProjectGallery::all();
        return view('project.index', compact('projects','technologies'));
    }

    public function create()
    {
        $galleries = Gallery::all();
        $technologies = Technology::all();
        return view('project.create', compact('technologies','galleries'));
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'image'     => 'required|image|mimes:png,jpg,jpeg',
            'title'     => 'required',
            'description'   => 'required'
        ]);

        //upload image
        $image = $request->file('image');
        $image->storeAs('public/projects', $image->hashName());

        $project = Project::create([
            'image'     => $image->hashName(),
            'title'     => $request->title,
            'description'   => $request->description
        ]);

        if($project){
            //redirect dengan pesan sukses
            return redirect()->route('projects.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('projects.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    public function edit(Project $project)
    {
        return view('project.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $this->validate($request, [
            'title'     => 'required',
            'description'   => 'required'
        ]);

        //get data Project by ID
        $project = Project::findOrFail($project->id);

        if($request->file('image') == "") {

            $project->update([
                'title'     => $request->title,
                'description'   => $request->description
            ]);

        } else {

            //hapus old image
            Storage::disk('local')->delete('public/projects/'.$project->image);

            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/projects', $image->hashName());

            $project->update([
                'image'     => $image->hashName(),
                'title'     => $request->title,
                'description'   => $request->description
            ]);

        }

        if($project){
            //redirect dengan pesan sukses
            return redirect()->route('projects.index')->with(['success' => 'Data Berhasil Diupdate!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('projects.index')->with(['error' => 'Data Gagal Diupdate!']);
        }
    }

    public function destroy($id)
    {
    $project = Project::findOrFail($id);
    Storage::disk('local')->delete('public/projects/'.$project->image);
    $project->delete();

    if($project){
        //redirect dengan pesan sukses
        return redirect()->route('projects.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }else{
        //redirect dengan pesan error
        return redirect()->route('projects.index')->with(['error' => 'Data Gagal Dihapus!']);
    }
    }

}
