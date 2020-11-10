@extends("layouts.app")

@section("content")
<div class="container">
  <table class="table">
      <thead>
        <tr>
          <th scope="col">Autore</th>
          <th scope="col">Titolo</th>
          <th scope="col">Contenuto</th>
          <th scope="col">Slug</th>
          <th scope="col">Immagine</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>{{$article->user->name}}</td>
          <td>{{$article->title}}</td>
          <td>{{$article->content}}</td>
          <td>{{$article->slug}}</td>
          <td>
            <img src="{{asset('storage/'.$article->image)}}" alt="" width="200px" height="300px">
          </td>
        </tr>
      </tbody>
  </table>

  <form class="" action="{{route('admin.articles.destroy', $article)}}" method="POST">
    @csrf
    @method("DELETE")

    <button type="submit" class="btn btn-danger">ELIMINA POST</button>
  </form>
</div>
@endsection
