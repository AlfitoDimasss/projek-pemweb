@extends('layouts.main')
@section('container')
<div class="container-fluid mt-5">
    <div class="row">
        <div class="col-4 d-flex justify-content-center">
            <img src="../img/{{ $komik->cover }}" alt="" style="width: 75%;">
        </div>
        <div class="col-5">
            <h1>{{ $komik->title }}</h1>
            <span class="fa fa-star" style="color: orange;"></span>
            <span>{{ $komik->rate }} | {{ $komik->genre->genre }}</span>
            <h4 style="font-weight: bold" class="mt-1">$ {{ $komik->price }}</h4>
            <hr>
            <h5>Synopsis</h5>
            <p>{{ $komik->synopsis }}</p>
        </div>
        <!-- <div class="col-1"></div> -->
        <div class="col-2">
            <div class="container border p-3" style="border-radius: 20px;">
                <h5>Booking Comic</h5>
                <form action="/prosesReservasi" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="quantity">Jumlah</label>
                        <input type="number" name="quantity" id="quantity" style="width: 100%;" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="date">Borrow Date</label>
                        <input type="date" name="borrow_date" id="date" style="width: 100%;" class="form-control">
                    </div>
                    <div class="form-group">
                        <p>Duration</p>
                        <div class="form-check form-check-inline mb-1">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1"
                                value="option1">
                            <label class="form-check-label" for="inlineRadio1">
                                <div class="btn btn-light">7
                                    Days</div>
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2"
                                value="option2">
                            <label class="form-check-label" for="inlineRadio2">
                                <div class="btn btn-light">14
                                    Days</div>
                            </label>
                        </div>
                    </div>
                    <div class="d-flex flex-row">
                        <p>Total Amount</p>
                        <p class="ml-auto">14 Days</p>
                    </div>
                    <input type="hidden" name="komik_id" value="{{ $komik->id }}">
                    <input type="hidden" name="user_id" value="{{ Session::get('user_id') }}">
                    <div class="d-flex justify-content-center">
                        <input type="submit" value="Book Now" class="btn btn-warning">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection