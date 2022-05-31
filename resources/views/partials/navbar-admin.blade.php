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
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                    Genre
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="/action">Action</a>
                    <a class="dropdown-item" href="/adventure">Adventure</a>
                    <a class="dropdown-item" href="/drama">Drama</a>
                </div>
            </li>
            <li class="nav-item">
                <a href="/admin" class="nav-link">Admin</a>
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