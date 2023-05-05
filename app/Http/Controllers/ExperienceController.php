<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Experience;
use Storage;

class ExperienceController extends Controller
{
    public function index()
    {
        $experiences= Experience::all();
        return view('experience.index', compact('experiences'));
    }

        
    public function create()
    {
        return view('experience.create');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'image'     => 'required|image|mimes:png,jpg,jpeg',
            'company_name'     => 'required',
            'company_web'   => 'required',
            'work_start'   => 'required',
            'work_end'   => 'required',
            'work_position'   => 'required',
            'status'   => 'required',
        ]);

        //upload image
        $image = $request->file('image');
        $image->storeAs('public/experiences', $image->hashName());

        $experience = Experience::create([
            'id'     => $request->id,
            'image'     => $image->hashName(),
            'company_name'     => $request->company_name,
            'company_web'   => $request->company_web,
            'company_address'   => $request->company_address,
            'work_start'   => $request->work_start,
            'work_end'   => $request->work_end,
            'work_position'   => $request->work_position,
            'status'   => $request->status,
        ]);

        if($experience){
            //redirect dengan pesan sukses
            return redirect()->route('experiences.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('experiences.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    public function edit(Experience $experience)
    {
        return view('experience.edit', compact('experience'));
    }

    public function update(Request $request, Experience $experience)
    {
        $this->validate($request, [
            'image'     => 'required|image|mimes:png,jpg,jpeg',
            'company_name'     => 'required',
            'company_web'   => 'required',
            'work_start'   => 'required',
            'work_end'   => 'required',
            'work_position'   => 'required',
            'status'   => 'required',
        ]);

        //get data Experience by ID
        $experience = Experience::findOrFail($experience->id);

        if($request->file('image') == "") {

            $experience->update([
                'company_name'     => $request->company_name,
                'company_web'   => $request->company_web,
                'company_address'   => $request->company_address,
                'work_start'   => $request->work_start,
                'work_end'   => $request->work_end,
                'work_position'   => $request->work_position,
                'status'   => $request->status,
            ]);

        } else {

            //hapus old image
            Storage::disk('local')->delete('public/experiences/'.$experience->image);

            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/experiences', $image->hashName());

            $experience->update([
                'image'     => $image->hashName(),
                'company_name'     => $request->company_name,
                'company_web'   => $request->company_web,
                'company_address'   => $request->company_address,
                'work_start'   => $request->work_start,
                'work_end'   => $request->work_end,
                'work_position'   => $request->work_position,
                'status'   => $request->status,
            ]);

        }

        if($experience){
            //redirect dengan pesan sukses
            return redirect()->route('experiences.index')->with(['success' => 'Data Berhasil Diupdate!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('experiences.index')->with(['error' => 'Data Gagal Diupdate!']);
        }
    }


    public function destroy($id)
    {
    $experience = Experience::findOrFail($id);
    Storage::disk('local')->delete('public/experiences/'.$experience->image);
    $experience->delete();

    if($experience){
        //redirect dengan pesan sukses
        return redirect()->route('experiences.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }else{
        //redirect dengan pesan error
        return redirect()->route('experiences.index')->with(['error' => 'Data Gagal Dihapus!']);
    }
    }

}
