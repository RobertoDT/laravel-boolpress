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
          <td>{{$article->image}}</td>
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
</div>

@endsection
