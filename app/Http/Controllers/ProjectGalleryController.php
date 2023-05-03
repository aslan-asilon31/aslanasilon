<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;
use App\Models\ProjectGallery;
use App\Models\Technology;
use App\Models\Project;
use App\Models\Url;

class ProjectGalleryController extends Controller
{
    public function index()
    {
        $projectgalleries = ProjectGallery::all();
        return view('projectgallery.index', compact('projectgalleries'));
    }

    public function create()
    {
        $projects = Project::all();
        $galleries = Gallery::all();
        $technologies = Technology::all();
        $urls = Url::all();
        return view('projectgallery.create', compact('projects','galleries','technologies','urls'));
    }
    
    public function store(Request $request)
    {
        // dd($request);
        $this->validate($request, [
            'project_id'   => 'required',
            'gallery_id'   => 'required',
            'technology_id'   => 'required',
            'url_id'   => 'required',
        ]);

        $projectgallery = ProjectGallery::create([
            'project_id'     => $request->project_id,
            'gallery_id'   => $request->gallery_id,
            'technology_id'   => $request->technology_id,
            'url_id'   => $request->url_id,
        ]);

        if($projectgallery){
            //redirect dengan pesan sukses
            return redirect()->route('projectgalleries.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('projectgalleries.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    public function destroy($id)
    {
    $projectgallery = ProjectGallery::findOrFail($id);
    $projectgallery->delete();

    if($projectgallery){
        //redirect dengan pesan sukses
        return redirect()->route('projectgalleries.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }else{
        //redirect dengan pesan error
        return redirect()->route('projectgalleries.index')->with(['error' => 'Data Gagal Dihapus!']);
    }
    }

}
