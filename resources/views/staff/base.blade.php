<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HMS Staff @yield('title')</title>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a href="" class="navbar-brand">HMS | Staff</a>
            <ul class="navbar-nav">
                <li class="nav-item"><a href="" class="nav-link">Logout</a></li>
            </ul>
        </div>
    </nav>

    <div class="container-fluid mt-2">
        <div class="row">
            <div class="col-2">
                <div class="list-group">
                    <a href="{{route('Staff')}}" class="list-group-item list-group-item-action">Dashboard</a>
                    <a href="{{route('add_patient')}}" class="list-group-item list-group-item-action">Add Patient</a>
                    <a href="{{route('manage_patient')}}" class="list-group-item list-group-item-action">Manage Patient</a>
                    @if (Auth::check())
                    <form action="{{route('logout')}}" method="post">
                        @csrf
                        <input type="submit" class="btn btn-sm btn-danger w-100" value="Logout">
                    </form>
                     @endif
                </div>
            </div>
            <div class="col-10">
                @section('content')
                    @show
            </div>
        </div>
    </div>


    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
</html>

