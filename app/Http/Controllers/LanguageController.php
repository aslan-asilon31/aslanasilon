<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Language;


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
}
