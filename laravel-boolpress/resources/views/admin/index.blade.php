@extends("layouts.app")

@section("content")

<div class="container">

  <a href="{{route('admin.articles.create')}}"><button type="button" class="btn btn-primary create">CREA NUOVO ARTICOLO</button></a>

  @foreach($articles as $article)
  <div class="main-list">
    <div class="article-image">
      @if($article->image == null)
        <img src="https://via.placeholder.com/300.png/09f/fff%20C/O%20https://placeholder.com/" alt="">
      @else
        <img src="{{asset('storage/'.$article->image)}}" alt="" width="200px" height="300px">
      @endif
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

  </div>
      <a href="{{route('admin.articles.show', $article)}}"><button type="submit" class="btn btn-primary">VISUALIZZA ARTICOLO</button></a>
      <a href="{{route('admin.articles.edit', $article)}}"><button type="submit" class="btn btn-primary">MODIFICA POST</button></a>

      <form class="" action="{{route('admin.articles.destroy', $article)}}" method="POST">
        @csrf
        @method("DELETE")

        <button type="submit" class="btn btn-danger">ELIMINA POST</button>
      </form>
    <hr>
  @endforeach

</div>

@endsection
