@extends('layouts.main')
@section('container')
<div class="container mt-3" style="min-height: 560px;">
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
                <th scope="col">Name</th>
                <th scope="col">email</th>
                <th scope="col">User type</th>
                <th scope="col">Option</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <th scope="row" style="vertical-align: middle">{{ $user->id }}</th>
                <td style="vertical-align: middle">{{ $user->name }}</td>
                <td style="vertical-align: middle">{{ $user->email }}</td>
                <td style="vertical-align: middle">{{ $user->user_type }}</td>
                <td style="vertical-align: middle">
                  @if ($user->user_type != 'admin')    
                    <form action="/edit/isadmin/{{ $user->id }}" method="POST" class="d-inline">
                        @csrf
                        <button class="btn btn-warning">set admin</button>
                    </form>
                    <form action="/delete/user/{{ $user->id }}" method="POST" class="d-inline"
                      onclick="return confirm('Yakin?')">
                      @csrf
                      <button class="btn btn-danger">Delete</button>
                  </form>
                  @endif
                    <a href="/admin/transaction/{{ $user->id }}" class="btn btn-primary">transactions</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection