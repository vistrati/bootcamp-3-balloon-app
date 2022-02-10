<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\api\CreateArticleRequest;
use App\Models\Article;
use App\Services\ModelLogger;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\ResponseFactory;

class ArticleApiController extends Controller
{
    /** @var ResponseFactory */
    private $responseFactory;

    /**
     * @param ResponseFactory $responseFactory
     */
    public function __construct(ResponseFactory $responseFactory)
    {
        $this->responseFactory = $responseFactory;
    }

    /**
     * Returns list of most popular articles
     *
     * @param ModelLogger $logger
     *
     * @return JsonResponse
     */
    public function readMostPopularArticles(ModelLogger $logger): JsonResponse
    {
        $mostPopularArticles = Article::all()
            ->sortByDesc('view_count')
            ->take($itemCount = 10);

        $articlesArray = [];
        foreach ($mostPopularArticles as $article) {
            $articlesArray[] = [
                'id' => $article->id,
                'title' => $article->title,
                'description' => $article->desription,
                'view_count' => $article->view_count,
            ];
        }

        return $this->responseFactory->json($articlesArray);
    }

    /**
     * Read list of all articles
     *
     * @return JsonResponse
     */
    public function readAllArticles(): JsonResponse
    {
        $allArticles = Article::all()
            ->sortByDesc('id');

        $articlesArray = [];
        foreach ($allArticles as $article) {
            $articlesArray[] = [
                'id' => $article->id,
                'title' => $article->title,
                'description' => $article->desription,
                'view_count' => $article->view_count,
            ];
        }

        return $this->responseFactory->json($articlesArray);
    }


    /**
     * Reads one articles from provided article id.
     *
     * @param $id
     *
     * @return JsonResponse
     */
    public function readOneArticle($id): JsonResponse
    {
        $article = Article::find($id);

        if ($article) {
            return $this->responseFactory->json($article);
        }

        return $this->responseFactory->json(null, 404);
    }

    /**
     * Creates new article from provided data
     *
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function createArticle(Request $request): JsonResponse
    {
        // not the best validation logic
        if ($request->input('title') === 'some') {
            return $this->responseFactory->json(['message' => 'incorrect title'], 400);
        }

        $article = Article::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'author_id' => 1,
            'image' => 'e963ea7695c2d577b8f575b1059626bb.png',
            'excerpt' => $request->input('excerpt'),
            'category_id' => 2,
            'seo_title' => $request->input('seo_title'),
            'seo_description' => $request->input('seo_description'),
        ]);

        return $this->responseFactory->json(['id' => $article->id], 201);
    }


    /**
     * Deletes article resource from provided id
     *
     * @param $id
     *
     * @return JsonResponse
     */
    public function deleteArticle($id): JsonResponse
    {
        $article = Article::find($id);

        if ($article) {
            $article->delete();

            return $this->responseFactory->json(null, 204);
        }

        return $this->responseFactory->json(null, 404);
    }
}
