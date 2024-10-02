<?php

namespace App\Http\Controllers;

use App\Models\Career;
use Illuminate\Http\Request;

class CareerController extends Controller
{
    public function index(){
        $careers = Career::orderBy('created_at', 'desc')->paginate(10);
        return view('career.index', compact('careers'));
    }

    public function show($slug){
        $career = Career::where('slug', $slug)->first();
        $career_suggests = Career::where('slug', '!=', $slug)->latest()->limit(6)->get();
        return view('career.show', compact('career', 'career_suggests'));
    }
}
