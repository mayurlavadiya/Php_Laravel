@include('layouts.header')
<!doctype html>
<html lang="en">
  <head>
    <title>View Data</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    <h1 class="text-center">View Customers</h1>

    <div class="container">
        <div class="row m-2">
            <form action="">
                <div class="form-group">
                  <input type="text" name="" id="" class="form-control" placeholder="Search" aria-describedby="helpId">
                </div>
            </form>
            <div class="col">
                <a href="{{url('customer/trash')}}">
                <button class="btn btn-danger d-inline-block ml-2 float-right">Go To Trash</button>
                </a>
                <a href="{{Route('customer.add')}}">
                    <button class="btn btn-primary d-inline-block ml-2 float-right">Add</button>
                </a>
            </div>
        </div>
    </div>

      <div class="container mt-3">
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th class="text-truncate">Birth Date</th>
                    <th>Address</th>
                    <th>City</th>
                    <th>State</th>
                    <th>Country</th>
                    <th>Status</th>
                    <th class="text-center" >Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($customers as $value)
                <tr>
                    <td>{{$value->name}}</td>
                    <td>{{$value->email}}</td>
                    <td>{{$value->gender}}</td>
                    <td class="text-truncate">{{get_formatted_date($value->dob,"d-M-Y")}}</td>
                    <td>{{$value->address}}</td>
                    <td>{{$value->city}}</td>
                    <td>{{$value->state}}</td>
                    <td>{{$value->country}}</td>
                    <td>
                        @if($value->status=="1")

                        <span class="badge badge-success">Active</span>
                        @else
                            <span class="badge badge-danger">InActive</span>
                        @endif
                    </td>
                    <td class="col text-center">
                        <a href="{{url('/customer/edit/')}}/{{$value->customer_id}}">
                            <button class="btn btn-primary"> Edit </button>
                        </a>
                        <a href="{{url('/customer/delete/')}}/{{$value->customer_id}}">
                            <button class="btn btn-danger"> Move To Trash</button>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
      </div>
  </body>
</html>
