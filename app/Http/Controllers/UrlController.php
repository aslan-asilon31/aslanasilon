<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Url;
use App\Models\Project;
use Storage;

class UrlController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        $urls = Url::all();
        return view('url.index', compact('urls','projects'));
    }
    
    public function create()
    {
        $projects = Project::all();
        return view('url.create', compact('projects'));
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
        $image->storeAs('public/urls', $image->hashName());

        $url = Url::create([
            'image'     => $image->hashName(),
            'title'     => $request->title,
            'description'   => $request->description
        ]);

        if($url){
            //redirect dengan pesan sukses
            return redirect()->route('urls.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('urls.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    public function edit(Url $url)
    {
        return view('url.edit', compact('url'));
    }

    public function show()
    {
        
    }

    public function update(Request $request, Url $url)
    {
        $this->validate($request, [
            // 'image'     => 'required|image|mimes:png,jpg,jpeg',
            'title'     => 'required',
            'description'   => 'required'
        ]);

        //get data Url by ID
        $url = Url::findOrFail($url->id);

        if($request->file('image') == "") {

            $url->update([
                'title'     => $request->title,
                'description'   => $request->description
            ]);

        } else {

            //hapus old image
            Storage::disk('local')->delete('public/urls/'.$url->image);

            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/urls', $image->hashName());

            $url->update([
                'image'     => $image->hashName(),
                'title'     => $request->title,
                'description'   => $request->description
            ]);

        }

        if($url){
            //redirect dengan pesan sukses
            return redirect()->route('urls.index')->with(['success' => 'Data Berhasil Diupdate!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('urls.index')->with(['error' => 'Data Gagal Diupdate!']);
        }
    }

    public function destroy($id)
    {
    $url = Url::findOrFail($id);
    Storage::disk('local')->delete('public/urls/'.$url->image);
    $url->delete();

    if($url){
        //redirect dengan pesan sukses
        return redirect()->route('urls.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }else{
        //redirect dengan pesan error
        return redirect()->route('urls.index')->with(['error' => 'Data Gagal Dihapus!']);
    }
    }

}