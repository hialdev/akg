<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Brand;
use App\Models\Career;
use App\Models\Event;
use App\Models\Jumbotron;
use App\Models\News;
use App\Models\Team;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(){
        $heros = Jumbotron::where('used',1)->latest()->get();
        $brands = Brand::orderBy('urutan', 'asc')->get();
        $news = News::limit(4)->get();
        
        return view('index', compact('brands','news', 'heros'));
    }

    public function corporate(){
        $teams = Team::all();
        $careers = Career::paginate(10);
        return view('corporate.index', compact('teams', 'careers'));
    }

    public function contact(){
        return view('corporate.contact');
    }

    public function search(Request $r){
        $q = $r->query('q');
        $news = News::where('title', 'LIKE', '%'.$q.'%')->orWhere('meta_desc', 'LIKE', '%'.$q.'%')->latest()->get();
        $articles = Article::where('title', 'LIKE', '%'.$q.'%')->orWhere('meta_desc', 'LIKE', '%'.$q.'%')->latest()->get();
        $events = Event::where('title', 'LIKE', '%'.$q.'%')->orWhere('meta_desc', 'LIKE', '%'.$q.'%')->latest()->get();
        $careers = Career::where('title', 'LIKE', '%'.$q.'%')->orWhere('meta_desc', 'LIKE', '%'.$q.'%')->latest()->get();

        return view('search', compact('news', 'articles', 'events', 'careers', 'q'));
    }
}
