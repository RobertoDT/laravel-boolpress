@extends("layouts.app")

@section("content")
<div class="container">

  <div class="main-list">
    <div class="article-image">
      <img src="{{asset('storage/'.$article->image)}}" alt="" width="200px" height="300px">
    </div>
    <h1 class="title">{{$article->title}}</h1>
    <div class="content">
      <h3>Contenuto: {{$article->content}}</h3>
    </div>

    <div class="article-tag">
      <span>Tags: </span>
      @foreach($article->tags as $tag)
      {{$tag->name}}
      @endforeach
    </div>

    <div class="article-content">
      <h5>Commenti: </h5>
      @foreach($article->comments as $comment)
      {{$comment->content}}
      @endforeach
    </div>
    <a href="{{route('admin.articles.index')}}"><button type="button" class="btn btn-primary">VISUALIZZA TUTTI I TUOI POST</button></a>

    <form class="" action="{{route('admin.articles.destroy', $article)}}" method="POST">
      @csrf
      @method("DELETE")

      <button type="submit" class="btn btn-danger">ELIMINA POST</button>
    </form>
</div>
@endsection
