<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SocialMedia;
use Storage;


class SocialMediaController extends Controller
{
    public function index()
    {
        $socialmedias = SocialMedia::all();
        return view('socialmedia.index', compact('socialmedias'));
    }

    public function create()
    {
        return view('socialmedia.create');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'image'     => 'required|image|mimes:png,jpg,jpeg',
            'title'     => 'required',
            'url'     => 'required',
            'description'   => 'required'
        ]);

        //upload image
        $image = $request->file('image');
        $image->storeAs('public/socialmedias', $image->hashName());

        $socialmedia = SocialMedia::create([
            'id'     => $request->id,
            'image'     => $image->hashName(),
            'title'     => $request->title,
            'url'     => $request->url,
            'description'   => $request->description
        ]);

        if($socialmedia){
            //redirect dengan pesan sukses
            return redirect()->route('socialmedias.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('socialmedias.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    
    
    public function edit(SocialMedia $socialmedia)
    {
        return view('socialmedia.edit', compact('socialmedia'));
    }

    public function update(Request $request, SocialMedia $socialmedia)
    {
        $this->validate($request, [
            'image'     => 'required|image|mimes:png,jpg,jpeg',
            'title'     => 'required',
            'url'     => 'required',
            'description'   => 'required'
        ]);

        //get data Gallery by ID
        $socialmedia = SocialMedia::findOrFail($socialmedia->id);

        if($request->file('image') == "") {

            $socialmedia->update([
                'title'     => $request->title,
                'url'     => $request->url,
                'description'   => $request->description
            ]);

        } else {

            //hapus old image
            Storage::disk('local')->delete('public/socialmedias/'.$socialmedia->image);

            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/socialmedias', $image->hashName());

            $socialmedia->update([
                'image'     => $image->hashName(),
                'title'     => $request->title,
                'url'     => $request->url,
                'description'   => $request->description
            ]);

        }

        if($socialmedia){
            //redirect dengan pesan sukses
            return redirect()->route('socialmedias.index')->with(['success' => 'Data Berhasil Diupdate!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('socialmedias.index')->with(['error' => 'Data Gagal Diupdate!']);
        }
    }

    public function destroy($id)
    {
        $socialmedia = SocialMedia::findOrFail($id);
        Storage::disk('local')->delete('public/socialmedias/'.$socialmedia->image);
        $socialmedia->delete();

        if($socialmedia){
            //redirect dengan pesan sukses
            return redirect()->route('socialmedias.index')->with(['success' => 'Data Berhasil Dihapus!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('socialmedias.index')->with(['error' => 'Data Gagal Dihapus!']);
        }
    }

}
