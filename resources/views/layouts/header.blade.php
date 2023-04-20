<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    @stack('title')

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>

    <div class="container mt-2">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <b><a class="navbar-brand">Laravel</a></b>
          
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                  <a class="nav-link" href="{{route("home")}}">Home <span class="sr-only"></span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{route("customer.add")}}">Add</a>
                </li>

                <li class="nav-item">
                  <a class="nav-link" href="{{route("customer.view")}}">View</a>
                </li>
                
                <li class="nav-item">
                  <a class="nav-link" href="{{url("customer/trash")}}">Go To Trash</a>
                </li>
              </ul>          
            </div>
          </nav>
    </div>