<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\About;
use App\Models\Experience;
use App\Models\SocialMedia;
use App\Models\Portfolio;
use App\Models\Language;
use illuminate\Support\Carbon;
 
class VisitorController extends Controller
{
    public function index()
    {
        $socialmedias = SocialMedia::all();
        $portfolios = Portfolio::all();
        $projects = Project::all();
        $abouts = About::all();
        $experiences = Experience::all();
        $languages = Language::all();
        
        return view('welcome',compact(
            'socialmedias',
            'portfolios',
            'projects', 
            'abouts',
            'experiences',
            'languages',
        ));
    }

    public function getCreatedAtAttribute()
    {
        return Carbon::parse($this->attributes['created_at'])
        ->translatedFormat('l,d F Y');
    }
}
