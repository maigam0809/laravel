<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    {{-- <link rel="stylesheet" href="{{asset('')}}"> --}}
    {{-- todo asset  --}}
    {{-- <link rel="stylesheet" href="../../public/bootstrap/css/bootstrap.min.css"> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="row">
        {{-- header --}}
        <div class="col-12">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="#">Navbar</a>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
                </li>
                </ul>
                </div>
            </nav>
        </div>
        {{-- end header --}}
        <div class="col-12 row">

            <div class="col-2">
                @include('sidebar')
            </div>

            <div class="col-10">
               @yield('contents')
            </div>
        </div>

        {{-- end content --}}

        {{-- start footer --}}
        <div class="col-12">
            @include('footer')
        </div>
    </div>

</body>
</html>
