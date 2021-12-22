@extends('layout')
@section('content')
    <article class="blog-post">
        <img src="{{ $article->image_url }}" alt="{{ $article->title }}">
        <h2 class="blog-post-title">
            {{ $article->title }}</h2>
        <p class="blog-post-meta">
            {{ $article->published_at }} by
            <a href="#">{{ $article->author->name }}</a>
        </p>

        <p>{{ $article->description }}</p>
    </article>
    <div>
        @include('article.comments', ['comments' => $article->comments])
    </div>
@endsection
