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
          <th scope="col">Azioni</th>
        </tr>
      </thead>
      <tbody>
        @foreach($articles as $article)
        <tr>
          <td>{{$article->title}}</td>
          <td>{{$article->content}}</td>
          <td>{{$article->slug}}</td>
          <td>
            <img src="{{asset('storage/'.$article->image)}}" alt="" width="200px" height="300px">
          </td>
          <td>
            <a href="{{route('admin.articles.show', $article)}}">VISUALIZZA ARTICOLO</a>
          </td>
          <td>
            <a href="{{route('admin.articles.edit', $article)}}">MODIFICA POST</a>
          </td>
          <td>
            <form class="" action="{{route('admin.articles.destroy', $article)}}" method="POST">
              @csrf
              @method("DELETE")

              <button type="submit" class="btn btn-danger">ELIMINA POST</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
  </table>
  <a href="{{route('admin.articles.create')}}">CREA NUOVO ARTICOLO</a>
</div>

@endsection
