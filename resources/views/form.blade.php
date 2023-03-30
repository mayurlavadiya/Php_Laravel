<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FORM VALIDATION - LARAVEL</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>

    {{-- base url mate {{url}} use thay --}}
    <form action="{{url('/')}}/register" method="post"> 
        @csrf
         
        <div class="container">
            <h1 class="text-center">Registration</h1>
            {{-- 1. Old method form field (comment krel chhe)--}} 
                {{-- <div class="form-group">
                    <label for="">Name</label>
                    <input type="name" class="form-control" name="name" id="" value="{{old('name')}}"/>
                    <span class="text-danger">
                        @error('name')
                            {{$message}}
                        @enderror
                    </span>
                </div>

                <div class="form-group mt-2">
                    <label for="">Email</label>
                    <input type="email" class="form-control" name="email" id="" value="{{old('email')}}"/>
                    <span class="text-danger">
                        @error('email')
                            {{$message}}
                        @enderror
                    </span>
                </div>

                <div class="form-group mt-2">
                    <label for="">Password</label>
                    <input type="password" class="form-control" name="password" id=""/>
                    <span class="text-danger">
                        @error('password')
                            {{$message}}
                        @enderror
                    </span>
                </div>

                <div class="form-group mt-2">
                    <label for="">Confirm Password</label>
                    <input type="password" class="form-control" name="password_confirmation" id=""/>
                    <span class="text-danger">
                        @error('password_confirmation')
                            {{$message}}
                        @enderror
                    </span>
                </div> --}}

            {{-- 2. New shortcut method using components --}}
            <x-input type="text" name="name" label="Enter your name"/>
            <x-input type="email" name="email" label="Enter your email"/>
            <x-input type="password" name="password" label="Enter your password"/>
            <x-input type="password" name="password_confirmation" label="Enter your confirm password"/>
            <button class="btn btn-primary mt-2">Submit</button>
        </div>
    </form>

</body>

</html>
