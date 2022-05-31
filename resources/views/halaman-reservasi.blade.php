@extends('layouts.main')
@section('container')
{{-- @dd($reservations) --}}
<div class="container" style="min-height: 535px;">
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Order ID</th>
                <th scope="col">Nama</th>
                <th scope="col">Email</th>
                <th scope="col">Komik</th>
                <th scope="col">Cover</th>
                <th scope="col">Receipt</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reservations as $res)
            <tr>
                <th scope="row" style="vertical-align: middle">{{ $res->id }}</th>
                <td style="vertical-align: middle">{{ $res->user->name }}</td>
                <td style="vertical-align: middle">{{ $res->user->email }}</td>
                <td style="vertical-align: middle">{{ $res->komik->title }}</td>
                <td style="vertical-align: middle"><img src="img/{{ $res->komik->cover }}" alt="" height="100"></td>
                <td style="vertical-align: middle"><a class="btn btn-danger"
                        href="/reservations/{{ $res->id }}">Print</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection