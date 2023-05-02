<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Technology;
use App\Models\Project;
use Storage;

class TechnologyController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        $technologies = Technology::all();
        return view('technology.index', compact('technologies','projects'));
    }
    
    public function create()
    {
        $projects = Project::all();
        return view('technology.create', compact('projects'));
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
        $image->storeAs('public/technologies', $image->hashName());

        $technology = Technology::create([
            'image'     => $image->hashName(),
            'title'     => $request->title,
            'description'   => $request->description
        ]);

        if($technology){
            //redirect dengan pesan sukses
            return redirect()->route('technologies.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('technologies.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    public function edit(Technology $technology)
    {
        return view('technology.edit', compact('technology'));
    }

    public function update(Request $request, Technology $technology)
    {
        $this->validate($request, [
            'image'     => 'required|image|mimes:png,jpg,jpeg',
            'title'     => 'required',
            'description'   => 'required'
        ]);

        //get data Blog by ID
        $technology = Technology::findOrFail($technology->id);

        if($request->file('image') == "") {

            $technology->update([
                'title'     => $request->title,
                'description'   => $request->description
            ]);

        } else {

            //hapus old image
            Storage::disk('local')->delete('public/technologies/'.$technology->image);

            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/technologies', $image->hashName());

            $technology->update([
                'image'     => $image->hashName(),
                'title'     => $request->title,
                'description'   => $request->description
            ]);

        }

        if($technology){
            //redirect dengan pesan sukses
            return redirect()->route('technologies.index')->with(['success' => 'Data Berhasil Diupdate!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('technologies.index')->with(['error' => 'Data Gagal Diupdate!']);
        }
    }

    public function destroy($id)
    {
    $technology = Technology::findOrFail($id);
    Storage::disk('local')->delete('public/technologies/'.$technology->image);
    $technology->delete();

    if($technology){
        //redirect dengan pesan sukses
        return redirect()->route('technologies.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }else{
        //redirect dengan pesan error
        return redirect()->route('technologies.index')->with(['error' => 'Data Gagal Dihapus!']);
    }
    }

}