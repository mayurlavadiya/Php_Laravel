<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customers;

class CustomerController extends Controller
{
    public function index()
    {
        return view('customer');
    }

    public function store(Request $request)
    {
        // Insert Query
        $customer = new Customers;
        $customer->name = $request->name;
        $customer->email = $request['email'];
        $customer->gender = $request->gender;
        $customer->address = $request['address'];
        $customer->state = $request['state'];
        $customer->country = $request['country'];
        $customer->dob = $request['dob'];
        $customer->status = $request['status'];
        $customer->password = md5($request['password']);
        $customer->save();
        
        //Redirect after insert data to view page to show the data
        return redirect('/customer/view');
    }

    public function view(){
        //return view page ma krva mate
        $customers = Customers::all();
        $data = compact('customers'); // compact function variable no array bnavine push kri desee
        return view('customer-view')->with($data);

    }
}
