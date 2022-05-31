@extends('layouts.main')
@section('css')
<style>
    .header {
        background-image: linear-gradient(to right, #36b093, #08c58e);
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
    }

    .caption {
        font-size: 12px;
    }

    #alamat {
        font-size: 8px;
    }

    #order {
        margin-right: 20px;
    }
</style>
@endsection
@section('container')
<div class="container mt-5">
    <div class="row text-white">
        <div class="col-lg-6 mx-auto header">
            <div class="row">
                <div class="col-4">
                    <div class="container">
                        <h1 class="ms-2 mt-4">Receipt</h1>
                        <p class="ms-2 caption">{{ $res->created_at }}</p>
                    </div>
                </div>
                <div class="col-4 d-flex align-items-end">
                    <p class="ms-n5 caption">reservation ID: {{ $res->id }}</p>
                </div>
                <div class="col-4">
                    <div class="container">
                        <h1 class="mt-4">Bookuy</h1>
                        <p id="alamat" class="caption">Jl. Flamboyan 8, Serang, Kota Serang</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 mx-auto border">
            <div class="container">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Your Order</th>
                            <th scope="col">Qnty</th>
                            <th scope="col">Unit</th>
                            <th scope="col">Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="d-flex flex-row">
                                    <img src="../img/{{ $res->komik->cover }}" height="100" alt="">
                                    <div class="container">
                                        <h5>{{ $res->komik->title }}</h5>
                                        <p>{{ $res->komik->author }}</p>
                                    </div>
                                </div>
                            </td>
                            <td>{{ $res->quantity }}</td>
                            <td>${{ $res->komik->price }}</td>
                            <td>${{ ($res->komik->price) * ($res->quantity) }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 mx-auto border">
            <div class="row">
                <div class="col-lg-6 border">
                    <div class="container">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td scope="col">CUSTOMER DETAIL</td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>{{ $res->user->name }}</p>
                                        <p>{{ $res->user->email }}</p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-lg-6 border">
                    <div class="container">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td scope="col">SUBTOTAL</td>
                                    <th scope="col">${{ ($res->komik->price) * ($res->quantity) }}</th>
                                </tr>
                                <tr>
                                    <td scope="col">TAXES</td>
                                    <th scope="col">${{ ((($res->komik->price) * ($res->quantity)) * 10) / 100 }}</th>
                                </tr>
                                <tr>
                                    <th scope="col">TOTAL</th>
                                    <th scope="col">${{ (($res->komik->price) * ($res->quantity)) +
                                        (((($res->komik->price)
                                        * ($res->quantity)) * 10) / 100) }}</th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 mx-auto">
            <div class="row">
                <div class="col-lg-6 border">
                    <div class="container">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Borrow Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $res->borrow_date }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-lg-6 border">
                    <div class="container">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Must Return Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $res->return_date }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection