<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Portfolio;
use Storage;

class PortfolioController extends Controller
{
    public function index()
    {
        $portfolios= Portfolio::all();
        return view('portfolio.index',compact('portfolios'));
    }

        
    public function create()
    {
        $portfolios = Portfolio::all();
        return view('portfolio.create', compact('portfolios'));
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'image'     => 'required|image|mimes:png,jpg,jpeg',
            'title'     => 'required',
            'icon'     => 'required',
            'description'   => 'required'
        ]);

        //upload image
        $image = $request->file('image');
        $image->storeAs('public/portfolios', $image->hashName());

        $portfolio = Portfolio::create([
            'id'     => $request->id,
            'image'     => $image->hashName(),
            'title'     => $request->title,
            'icon'     => $request->icon,
            'description'   => $request->description
        ]);

        if($portfolio){
            //redirect dengan pesan sukses
            return redirect()->route('portfolios.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('portfolios.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    public function edit(Portfolio $portfolio)
    {
        return view('portfolio.edit', compact('portfolio'));
    }

    public function update(Request $request, Portfolio $portfolio)
    {
        // $this->validate($request, [
        //     'image'     => 'required|image|mimes:png,jpg,jpeg',
        //     'title'     => 'required',
        //     'icon'     => 'required',
        //     'description'   => 'required'
        // ]);

        //get data Portfolio by ID
        $portfolio = Portfolio::findOrFail($portfolio->id);

        if($request->file('image') == "") {

            $portfolio->update([
                'title'     => $request->title,
                'icon'     => $request->icon,
                'description'   => $request->description
            ]);

        } else {

            //hapus old image
            Storage::disk('local')->delete('public/portfolios/'.$portfolio->image);

            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/portfolios', $image->hashName());

            $portfolio->update([
                'image'     => $image->hashName(),
                'title'     => $request->title,
                'icon'     => $request->icon,
                'description'   => $request->description
            ]);

        }

        if($portfolio){
            //redirect dengan pesan sukses
            return redirect()->route('portfolios.index')->with(['success' => 'Data Berhasil Diupdate!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('portfolios.index')->with(['error' => 'Data Gagal Diupdate!']);
        }
    }


    public function destroy($id)
    {
    $portfolio = Portfolio::findOrFail($id);
    Storage::disk('local')->delete('public/portfolios/'.$portfolio->image);
    $portfolio->delete();

    if($portfolio){
        //redirect dengan pesan sukses
        return redirect()->route('portfolios.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }else{
        //redirect dengan pesan error
        return redirect()->route('portfolios.index')->with(['error' => 'Data Gagal Dihapus!']);
    }
    }
}
