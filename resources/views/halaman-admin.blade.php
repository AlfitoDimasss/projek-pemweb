@extends('layouts.main')
@section('container')
<div class="container mt-3" style="min-height: 550px;">
    @if (\Session::has('success'))
    <div class="alert alert-success">
        {!! \Session::get('success') !!}
    </div>
    @endif
    <a href="/admin/addKomik" class="btn btn-primary mb-2">Add Komik</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Title</th>
                <th scope="col">Author</th>
                <th scope="col">Synopsis</th>
                <th scope="col">Genre</th>
                <th scope="col">Cover</th>
                <th scope="col">Price</th>
                <th scope="col">Rating</th>
                <th scope="col">Option</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($komiks as $komik)
            <tr>
                <th scope="row" style="vertical-align: middle">{{ $komik->id }}</th>
                <td style="vertical-align: middle">{{ $komik->title }}</td>
                <td style="vertical-align: middle">{{ $komik->author }}</td>
                <td style="vertical-align: middle">{{ Str::limit($komik->synopsis, 30) }}</td>
                <td style="vertical-align: middle">{{ $komik->genre->genre }}</td>
                <td style="vertical-align: middle"><img src="img/{{ $komik->cover }}" alt="" height="100"></td>
                <td style="vertical-align: middle">$ {{ $komik->price }}</td>
                <td style="vertical-align: middle">{{ $komik->rate }}</td>
                <td style="vertical-align: middle">
                    <form action="" class="d-inline">
                        <button class="btn btn-warning">Edit</button>
                    </form>
                    <form action="/delete/{{ $komik->id }}" method="POST" class="d-inline"
                        onclick="return confirm('Yakin?')">
                        @csrf
                        <button class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection