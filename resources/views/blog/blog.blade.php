@extends('layout')
@section('content')
    <h1>Blog</h1>

    <div class="row">
        {{ $articles->links() }}
    </div>

    <form method="GET" action="/blog" class="mb-4 row row-cols-3">
        <div class="col">
            <select class="form-select" name="category">
                @foreach($categories as $category)
                <option value="{{ $category->id }}"
                    @if($filter['category'] === $category->id) selected @endif
                >{{$category->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="col">
            <select class="form-select" name="sort">
                <option value="DESC" {{ $filter['sort'] === 'DESC' ? 'selected' : '' }}>DESC</option>
                <option value="ASC" @if($filter['sort'] === 'ASC') selected @endif>ASC</option>
            </select>
        </div>
        <div class="col">
            <button class="btn btn-primary">Apply sort</button>
        </div>
    </form>

    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        @foreach($articles as $article)
            <div class="col">
                @include('blog.article', ['article' => $article])
            </div>
        @endforeach
    </div>

    <div class="row">
        {{ $articles->links() }}
    </div>
@endsection
