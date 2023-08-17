<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;
use App\Models\Project;
use App\Models\ProjectGallery;
use App\Models\About;
use Storage;
use DB;

class AboutController extends Controller
{
    public function index()
    {
        $abouts = DB::select("SELECT * FROM abouts ORDER BY created_at DESC");
        return view('about.index', compact('abouts'));
    }

    public function show(About $about)
    {
        return view('about.index',compact('about'));
    }
    
    public function create()
    {
        return view('about.create');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'image'     => 'required|image|mimes:png,jpg,jpeg',
            'bio'     => 'required',
            'phone'   => 'required',
            'address'   => 'required',
            'language'   => 'required'
        ]);

        //upload image
        $image = $request->file('image');
        $image->storeAs('public/abouts', $image->hashName());

        $about = About::create([
            'id'     => $request->id,
            'image'     => $image->hashName(),
            'bio'     => $request->bio,
            'phone'   => $request->phone,
            'address'   => $request->address,
            'language'   => $request->language
        ]);

        if($about){
            //redirect dengan pesan sukses
            return redirect()->route('abouts.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('abouts.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    public function edit(About $about)
    {
        return view('about.edit', compact('about'));
    }

    public function update(Request $request, About $about)
    {
        // $this->validate($request, [
        //     'image'     => 'required|image|mimes:png,jpg,jpeg',
        //     'bio'     => 'required',
        //     'email'     => 'required',
        //     'phone'   => 'required',
        //     'address'   => 'required',
        //     'language'   => 'required'
        // ]);

        //get data Gallery by ID
        $about = About::findOrFail($about->id);

        if($request->file('image') == "") {

            $about->update([
                'bio'     => $request->bio,
                'email'     => $request->email,
                'phone'   => $request->phone,
                'address'   => $request->address,
                'language'   => $request->language
            ]);

        } else {

            //hapus old image
            Storage::disk('local')->delete('public/abouts/'.$about->image);

            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/abouts', $image->hashName());

            $about->update([
                'image'     => $image->hashName(),
                'bio'     => $request->bio,
                'phone'   => $request->phone,
                'address'   => $request->address,
                'language'   => $request->language
            ]);

        }

        if($about){
            //redirect dengan pesan sukses
            return redirect()->route('abouts.index')->with(['success' => 'Data Berhasil Diupdate!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('abouts.index')->with(['error' => 'Data Gagal Diupdate!']);
        }
    }


    public function destroy($id)
    {
    $about = About::findOrFail($id);
    Storage::disk('local')->delete('public/abouts/'.$about->image);
    $about->delete();

    if($about){
        //redirect dengan pesan sukses
        return redirect()->route('abouts.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }else{
        //redirect dengan pesan error
        return redirect()->route('abouts.index')->with(['error' => 'Data Gagal Dihapus!']);
    }
    }

}
