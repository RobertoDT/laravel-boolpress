@extends("layouts.app")

@section("content")
<div class="container">
  <form action="{{route('admin.articles.store')}}" method="POST" enctype="multipart/form-data">

    @csrf
    @method("POST")

    <div class="form-group">
      <label for="title">Titolo</label>
      <input type="text" class="form-control" id="title" name="title" placeholder="Inserisci il titolo">
    </div>

    <div class="form-group">
      <label for="content">Contenuto</label>
      <textarea class="form-control" id="content" name="content" placeholder="Inserisci il contenuto" rows="4" cols="50"></textarea>
    </div>

    <div class="form-group">
      <label for="slug">Slug</label>
      <input type="text" class="form-control" id="slug" name="slug" placeholder="Inserisci lo slug">
    </div>

    <!-- <div class="form-group">
      <label for="image">Immagine</label>
      <input type="file" class="form-control" id="image" name="image" placeholder="Inserisci l'immagine" accept="image/*">
    </div> -->

    <button type="submit" class="btn btn-primary">CREA POST</button>
  </form>

  @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif
</div>
@endsection
