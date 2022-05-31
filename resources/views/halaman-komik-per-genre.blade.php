@extends('layouts.main')
@section('css')
<style>
    .banner {
        background-color: salmon;
    }

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
</style>
@section('container')
<div class="container-fluid mt-3" style="min-height: 535px">
    <div class="container mx-auto">
        <div class="row">
            <div class="container">
                <h5>{{ $title }}</h5>
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