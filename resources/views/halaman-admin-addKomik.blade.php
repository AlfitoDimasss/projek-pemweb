@extends('layouts.main')
@section('container')
<div class="container">
  <div class="col-lg-8 mx-auto mt-3">
    <h1 class="text-center">Add Comic</h1>
    <form action="/admin/store" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="my-3">
        <label for="form-title" class="form-label">Comic Title</label>
        <input type="text" class="form-control" id="title" placeholder="" name="title">
      </div>

      <div class="my-3">
        <label for="author" class="form-label">Author</label>
        <input type="text" class="form-control" id="author" placeholder="" name="author">
      </div>

      <div class="mb-3">
        <label for="synopsis" class="form-label">Synopsis</label>
        <textarea class="form-control" id="synopsis" rows="3" name="synopsis"></textarea>
      </div>

      {{-- genres form --}}
      <div class="my-3">
        <label for="form-genre-id">Genre</label>
        <select name="genre_id" id="form-genre-id" class="form-select">
          @foreach ($genres as $genre)
          <option value="{{ $genre->id }}">{{ $genre->genre }}</option>
          @endforeach
        </select>
      </div>

      {{-- form cover image --}}
      <div class="my-3">
        <label for="form-cover" class="form-label">Comic image</label>
        <input class="form-control" type="file" id="form-cover" name="cover">
      </div>

      {{-- price form --}}
      <div class="my-3">
        <label for="form-price" class="form-label">Price</label>
        <input type="number" class="form-control" id="form-price" name="price">
      </div>

      {{-- rating form --}}
      <div class="my-3">
        <label for="form-rating" class="form-label">Rating</label>
        <input type="number" class="form-control" id="form-rating" placeholder="" name="rate">
      </div>

      <div class="my-3 text-center">
        <button type="submit" class="btn btn-primary" value="submit">Submit Comic</button>
      </div>

    </form>

  </div>

</div>
@endsection