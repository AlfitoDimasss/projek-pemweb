<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <title>Rent Comics</title>
</head>

<body>
    <nav class="navbar navbar-expand-md bg-dark navbar-dark">
        <!-- Brand -->
        <a class="navbar-brand" href="#">Rent Comics</a>

        <!-- Toggler/collapsibe Button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar links -->
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="/" class="nav-link">Index</a>
                </li>
                <li class="nav-item">
                    <a href="/reservations" class="nav-link">Reservations</a>
                </li>
                <li class="nav-item">
                    <a href="/reservations" class="nav-link">Admin</a>
                </li>
            </ul>
            <ul class="navbar-nav mx-auto">
                <form class="form-inline" action="">
                    <input class="form-control mr-sm-2" type="text" placeholder="Search">
                    <button class="btn btn-success" type="submit">Search</button>
                </form>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/logout">Logout</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container mt-3">
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
                    <td style="vertical-align: middle">{{ Str::limit($komik->synopsis, 50) }}</td>
                    <td style="vertical-align: middle">{{ $komik->genre->genre }}</td>
                    <td style="vertical-align: middle"><img src="img/{{ $komik->cover }}" alt="" height="100"></td>
                    <td style="vertical-align: middle">$ {{ $komik->price }}</td>
                    <td style="vertical-align: middle">{{ $komik->rate }}</td>
                    <td>
                        <a href="" class="btn btn-warning">Edit</a>
                        <a href="" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>