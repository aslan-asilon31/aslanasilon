<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Language;
use Storage;

class LanguageController extends Controller
{
    public function index()
    {
        $languages= Language::all();

        return view('language.index',compact('languages'));
    }

    public function create()
    {
        return view('language.create');
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
        $image->storeAs('public/languages', $image->hashName());

        $language = Language::create([
            'id'     => $request->id,
            'image'     => $image->hashName(),
            'title'     => $request->title,
            'description'   => $request->description
        ]);

        if($language){
            //redirect dengan pesan sukses
            return redirect()->route('languages.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('languages.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    public function edit(Language $language)
    {
        return view('language.edit', compact('language'));
    }

    public function update(Request $request, Language $language)
    {
        $this->validate($request, [
            'image'     => 'required|image|mimes:png,jpg,jpeg',
            'title'     => 'required',
            'description'   => 'required'
        ]);

        //get data Language by ID
        $language = Language::findOrFail($language->id);

        if($request->file('image') == "") {

            $language->update([
                'title'     => $request->title,
                'description'   => $request->description
            ]);

        } else {

            //hapus old image
            Storage::disk('local')->delete('public/languages/'.$language->image);

            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/languages', $image->hashName());

            $language->update([
                'image'     => $image->hashName(),
                'title'     => $request->title,
                'description'   => $request->description
            ]);

        }

        if($language){
            //redirect dengan pesan sukses
            return redirect()->route('languages.index')->with(['success' => 'Data Berhasil Diupdate!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('languages.index')->with(['error' => 'Data Gagal Diupdate!']);
        }
    }


    public function destroy($id)
    {
    $language = Language::findOrFail($id);
    Storage::disk('local')->delete('public/languages/'.$language->image);
    $language->delete();

    if($language){
        //redirect dengan pesan sukses
        return redirect()->route('languages.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }else{
        //redirect dengan pesan error
        return redirect()->route('languages.index')->with(['error' => 'Data Gagal Dihapus!']);
    }
    }
}
