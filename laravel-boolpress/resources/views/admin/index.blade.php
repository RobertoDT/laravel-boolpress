@extends("layouts.app")

@section("content")

<div class="container">
  <table class="table">
      <thead>
        <tr>
          <th scope="col">Titolo</th>
          <th scope="col">Contenuto</th>
          <th scope="col">Slug</th>
          <th scope="col">Immagine</th>
        </tr>
      </thead>
      <tbody>
        @foreach($articles as $article)
        <tr>
          <td>{{$article->title}}</td>
          <td>{{$article->content}}</td>
          <td>{{$article->slug}}</td>
          <td>{{$article->image}}</td>
        </tr>
        @endforeach
      </tbody>
  </table>
</div>

@endsection
