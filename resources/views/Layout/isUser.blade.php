<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>

<body style="background-color: #f7f7f7">
    <div class="container">
        <header>
            <nav class="navbar navbar-expand-lg bg-light">
                <div class="container-fluid">
                    <a class="navbar-brand" href={{ route('dashboard_index') }}>Dashboard</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
                        aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarText">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="/">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/dashboard/article">Article</a>
                            </li>
                        </ul>
                        <span class="navbar-text">
                            <a href={{ route('article_create_page') }} class="btn btn-success m-2 text-light">Tambah
                                Artikel</a>
                        </span>
                        <span class="navbar-text">
                            <form method="POST" action={{ route('dashboard_logout') }}>
                                @csrf
                                <input name="token" type="hidden" value={{ $token }}></inpu>
                                <button class="justify-content-end btn btn-danger" type="submit">Logout</button>
                            </form>
                        </span>
                    </div>
                </div>
            </nav>
        </header>
        {{-- our content --}}
        <div>
            @yield('content')
        </div>
        {{-- end of our content --}}
        <footer class="d-flex justify-content-center mt-4 mb-4">&copy; Laravel Made With </footer>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
</body>

</html>
