<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        Article::select([
            'id',
            'title',
            'published_at',
        ])
            ->where('published_at', '>=', Carbon::today()->startOfYear())
            ->where('published_at', '<=', Carbon::today()->endOfYear())
            ->get();

        Article::select([
            'id',
            'title',
            'published_at',
        ])->orderBy('published_at', 'DESC')->limit(5)->get();

        Article::select([
            'id',
            'title',
            'published_at',
        ])->where('category_id', '=', 5)->get();


        $lifeAndStyleArticles = Article::select([
            'articles.id',
            'articles.title',
            'articles.published_at',
        ])
            ->join('blog_categories', 'blog_categories.id', '=', 'articles.category_id')
            ->where('blog_categories.name', '=', 'Life and Style')->get();


        return view('home.home');
    }
}
