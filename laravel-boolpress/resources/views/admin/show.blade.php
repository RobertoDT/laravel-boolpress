@extends("layouts.app")

@section("content")
<div class="container">
  <table class="table">
      <thead>
        <tr>
          <th scope="col">Autore</th>
          <th scope="col">Titolo</th>
          <th scope="col">Contenuto</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>{{$article->user->name}}</td>
          <td>{{$article->title}}</td>
          <td>{{$article->content}}</td>
        </tr>
      </tbody>
  </table>
</div>
@endsection
