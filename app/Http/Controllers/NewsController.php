<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $limit = 4; // Jumlah item yang ditampilkan per halaman
        $offset = $request->get('offset', 0); // Ambil offset dari query string, default 0
        $limit += $offset;
        $news = News::latest()->limit(4)->get();
        $news_cards = News::where('featured', 1)->latest()->take($limit)->get();

        // Hitung total berita untuk menentukan apakah tombol "Load More" harus ditampilkan
        $totalNews = News::count();

        return view('news.index', compact('news', 'news_cards', 'offset', 'limit', 'totalNews'));
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
