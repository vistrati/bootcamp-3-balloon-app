<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Psr\Log\LoggerInterface;

class ArticleController extends Controller
{
    public function show($articleId, Request $request, LoggerInterface $logger)
    {
        $article = Article::findOrFail($articleId);

        $user = $request->user();
        $userRepresentation = $user ? "User with id {$user->id}" : "Unknown User";
        $logger->info(
            $userRepresentation . ' accessed ' . "article with id {$articleId}",
            ['id' => $articleId, 'title' => $article->title],
        );

        return view('article.article', ['article' => $article]);
    }
}
