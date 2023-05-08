<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Skill;
use Storage;

class SkillController extends Controller
{
    public function index()
    {
        $skills =  Skill::all();
        return view('skill.index',compact('skills'));
    }
        
    public function create()
    {
        $projects = Project::all();
        return view('skill.create', compact('projects'));
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
        $image->storeAs('public/skills', $image->hashName());

        $skill = Skill::create([
            'id'     => $request->id,
            'image'     => $image->hashName(),
            'title'     => $request->title,
            'description'   => $request->description
        ]);

        if($skill){
            //redirect dengan pesan sukses
            return redirect()->route('skills.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('skills.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    public function edit(Skill $skill)
    {
        return view('skill.edit', compact('skill'));
    }

    public function update(Request $request, Skill $skill)
    {
        $this->validate($request, [
            'image'     => 'required|image|mimes:png,jpg,jpeg',
            'title'     => 'required',
            'description'   => 'required'
        ]);

        //get data Skill by ID
        $skill = Skill::findOrFail($skill->id);

        if($request->file('image') == "") {

            $skill->update([
                'title'     => $request->title,
                'description'   => $request->description
            ]);

        } else {

            //hapus old image
            Storage::disk('local')->delete('public/skills/'.$skill->image);

            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/skills', $image->hashName());

            $skill->update([
                'image'     => $image->hashName(),
                'title'     => $request->title,
                'description'   => $request->description
            ]);

        }

        if($skill){
            //redirect dengan pesan sukses
            return redirect()->route('skills.index')->with(['success' => 'Data Berhasil Diupdate!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('skills.index')->with(['error' => 'Data Gagal Diupdate!']);
        }
    }


    public function destroy($id)
    {
    $skill = Skill::findOrFail($id);
    Storage::disk('local')->delete('public/skills/'.$skill->image);
    $skill->delete();

    if($skill){
        //redirect dengan pesan sukses
        return redirect()->route('skills.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }else{
        //redirect dengan pesan error
        return redirect()->route('skills.index')->with(['error' => 'Data Gagal Dihapus!']);
    }
    }
}
