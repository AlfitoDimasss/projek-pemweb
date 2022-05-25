{{--
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        .komik p {
            font-size: 12px;
            text-align: center;
            /* text-decoration: none; */
        }

        .checked {
            color: orange;
        }

        .komik span {
            width: 15%;
        }
    </style>

    <title>Hello, world!</title>
</head>

<body> --}}
    @extends('layouts.main')
    @section('container')
    <div class="container-fluid border">
        <div class="container mx-auto border my-5 bg-primary d-flex justify-content-center align-items-center"
            style="height: 200px; border-radius: 20px">
            <h1 class="text-center">Banner</h1>
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
    {{--
</body>

</html> --}}