<h3>Comments {{ $article->comments()->count() }}</h3>
<ul>
    @foreach($article->comments as $comment)
        <li>{{ $comment->message }}</li>
    @endforeach
</ul>
