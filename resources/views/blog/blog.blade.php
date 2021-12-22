@extends('layout')
@section('content')
    <h1>Blog</h1>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        @foreach($articles as $article)
            <div class="col">
                @include('blog.article', ['article' => $article])
            </div>
        @endforeach
    </div>
@endsection
