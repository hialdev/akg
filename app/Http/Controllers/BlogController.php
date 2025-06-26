<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $limit = 4; // Jumlah item yang ditampilkan per halaman
        $offset = $request->get('offset', 0); // Ambil offset dari query string, default 0
        $limit += $offset;
        $news = Article::latest()->limit(4)->get();
        $news_cards = Article::where('featured', 1)->latest()->take($limit)->get();

        // Hitung total berita untuk menentukan apakah tombol "Load More" harus ditampilkan
        $totalNews = Article::count();

        return view('blog.index', compact('news', 'news_cards', 'offset', 'limit', 'totalNews'));
    }

    public function show($slug){
        $news = Article::where('slug', $slug)->first();
        $article_suggests = Article::where('slug','!=',$slug)->latest()->limit(3)->get();
        return view('blog.show', compact('news','article_suggests'));
    }
}
