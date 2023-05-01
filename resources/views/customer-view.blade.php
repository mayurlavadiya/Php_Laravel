@include('layouts.header')
<?php $i=0; ?>
<!doctype html>
<html lang="en">

<head>
    <title>View Data</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <h1 class="text-center">View Customers</h1>

    <div class="container-fluid">
        <div class="row">
            <form action="" class="col-9">
                <div class="form">
                    <input type="search" name="search" id="" class="form-control" placeholder="Search"
                        value="{{ $search }}">
                </div>
                <button class="btn btn-warning mt-2">Search</button>
                <a href="{{url('/customer/view')}}">
                <button class="btn btn-dark mt-2" type="button">Reset</button>
                </a>
            </form>

            <div class="mt-2 col">
                <a href="{{ url('customer/trash') }}">
                    <button class="btn btn-danger d-inline-block ml-2 float-right">Go To Trash</button>
                </a>
                <a href="{{ Route('customer.add') }}">
                    <button class="btn btn-primary d-inline-block float-right">Add</button>
                </a>
            </div>
        </div>

        <div class="mt-3">
            <table class="table">
                <thead>
                    <tr>
                        <th>SR</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Gender</th>
                        <th class="text-truncate">Birth Date</th>
                        <th>Address</th>
                        <th>City</th>
                        <th>State</th>
                        <th>Country</th>
                        <th>Status</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($customers as $value)
                        <tr>
                            <td>{{$i=$i+1}}</td>
                            <td>{{ $value->name }}</td>
                            <td>{{ $value->email }}</td>
                            <td>{{ $value->gender }}</td>
                            <td class="text-truncate">{{ get_formatted_date($value->dob, 'd-M-Y') }}</td>
                            <td>{{ $value->address }}</td>
                            <td>{{ $value->city }}</td>
                            <td>{{ $value->state }}</td>
                            <td>{{ $value->country }}</td>
                            <td>
                                @if ($value->status == '1')
                                    <span class="badge badge-success">Active</span>
                                @else
                                    <span class="badge badge-danger">InActive</span>
                                @endif
                            </td>
                            <td class="col text-center">
                                <a href="{{ url('/customer/edit/') }}/{{ $value->customer_id }}">
                                    <button class="btn btn-primary mt-2"> Edit </button>
                                </a>
                                <a href="{{ url('/customer/delete/') }}/{{ $value->customer_id }}">
                                    <button class="btn btn-danger mt-2"> Move To Trash</button>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
    </div>
    <div class="text-center">
             {{$customers->links('pagination::bootstrap-5')}}
    </div>
</body>

</html>
