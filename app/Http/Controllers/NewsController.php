<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(){
        $news = News::latest()->limit(4)->get();
        $news_cards = News::where('featured',1)->latest()->limit(4)->get();
        return view('news.index', compact('news','news_cards'));
    }

    public function show($slug){
        $news = News::where('slug', $slug)->first();
        if(!$news){
            $news = Article::where('slug', $slug)->firstOrFail();
        }
        $article_suggests = Article::where('slug','!=',$slug)->latest()->limit(3)->get();
        $news_suggests = News::where('slug','!=',$slug)->latest()->limit(3)->get();
        return view('news.show', compact('news','article_suggests', 'news_suggests'));
    }
}
