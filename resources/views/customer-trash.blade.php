@include('layouts.header')
<!doctype html>
<html lang="en">
  <head>
    <title>Customer Trash Data</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    <h1 class="text-center">Customers Trash Data</h1>
   
      <div class="container mt-2">
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>Birth Date</th>
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
                    <td>{{$value->name}}</td>
                    <td>{{$value->email}}</td>
                    <td>{{$value->gender}}</td>
                    <td>{{get_formatted_date($value->dob,"d-M-Y")}}</td>
                    <td>{{$value->address}}</td>
                    <td>{{$value->city}}</td>
                    <td>{{$value->state}}</td>
                    <td>{{$value->country}}</td>
                    <td>
                        @if($value->status=="1")   
                        <a href="">                     
                        <span class="badge badge-success">Active</span>  
                        </a>    
                        @else
                        <a href="">                     
                            <span class="badge badge-danger">InActive</span>  
                        </a>    
                        @endif
                    </td>
                        <td><a href="{{route('customer.restore', ['id' => $value->customer_id])}}">
                                <button class="btn btn-success"> Restore </button>                            
                            </a>
                       <a href="{{route('customer.forcedelete', ['id' => $value->customer_id])}}">
                            <button class="btn btn-danger"> Delete</button>                            
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
      </div>
  </body>
</html>