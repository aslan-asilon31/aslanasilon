<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Portfolio;


class PortfolioController extends Controller
{
    public function index()
    {
        $portfolios= Portfolio::all();
        return view('portfolio.index',compact('portfolios'));
    }
}
