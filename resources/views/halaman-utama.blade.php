@extends('layouts.main')
@section('css')
<style>
    .komik p {
        font-size: 12px;
        text-align: center;
    }

    .checked {
        color: orange;
    }

    .komik span {
        width: 15%;
    }

    .banner img {
        width: 80%;
        margin-left: 25%;
    }

    .banner h2 {
        font-weight: bold;
    }
</style>
@section('container')
<div class="container-fluid" style="min-height: 535px;">
    <div class="container mx-auto my-5 d-flex justify-content-center bg-success align-items-center banner text-white"
        style="height: 200px; border-radius: 20px">
        <div class="row w-100">
            <div class="col-1"></div>
            <div class="col-6 p-5 description">
                <h2>Get all the comics you want</h2>
                <p>Rent comics is now easier with online reservation</p>
                <a href="/reservations" class="btn btn-dark">Check My Reservations</a>
            </div>
            <div class="col-4">
                <img src="img/banner-illus.png" alt="">
            </div>
            <div class="col-1"></div>
        </div>
    </div>
    <div class="container mx-auto">
        <div class="row">
            <div class="container">
                <h5>All Comics</h5>
            </div>
            @foreach ($komiks as $komik)
            <div class="col-2 d-flex flex-column komik align-items-center justify-content-center text-center">
                <a href="/detail/{{ $komik->id }}">
                    <img src="img/{{ $komik->cover }}" alt="" width="75%" class="">
                    <p>{{ $komik->title }}</p>
                </a>
                <p class="text-muted mt-n3" style="font-size: 10px;">{{ $komik->author }}</p>
                <div class="rate mt-n3">
                    @for($i = 0; $i < $komik->rate; $i++)
                        <span class="fa fa-star checked"></span>
                        @endfor
                        @if($komik->rate < 5) @for($i=0; $i < 5 - $komik->rate; $i++)
                            <span class="fa fa-star"></span>
                            @endfor
                            @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection