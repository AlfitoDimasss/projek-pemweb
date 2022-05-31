@extends('layouts.main')
@section('container')
<div class="container mt-3" style="min-height: 560px">
    <div class="row">
        <div class="col-5 mx-auto border">
            <h1 class="text-center">Login</h1>
            <form action="/prosesLogin" method="POST">
                @csrf
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control">
                </div>
                <div class="text-center mb-3">
                    <input type="submit" value="Login" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection