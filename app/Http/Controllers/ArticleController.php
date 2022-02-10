<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Services\ModelLogger;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function show($articleId, Request $request, ModelLogger $logger)
    {
        $article = Article::findOrFail($articleId);
        $article->view_count++;
        $article->save();

        $logger->logModel($request->user(), $article);

        return view('article.article', ['article' => $article]);
    }
}
