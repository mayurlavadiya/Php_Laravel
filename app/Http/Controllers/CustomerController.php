<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customers;

class CustomerController extends Controller
{
    public function index()
    {
        $url = url('/customer');
        $title = "Customer Registration";
        $data = compact('url','title');
        return view('customer')->with($data);

    }

    public function store(Request $request)
    {
        // Insert Query
        $customers = new Customers;
        $customers->name = $request->name;
        $customers->email = $request['email'];
        $customers->gender = $request->gender;
        $customers->address = $request['address'];
        $customers->state = $request['state'];
        $customers->country = $request['country'];
        $customers->dob = $request['dob'];
        $customers->status = $request['status'];
        $customers->password = md5($request['password']);
        $customers->save();
        
        //Redirect after insert data to view page to show the data
        return redirect('/customer/view');
    }

    public function view(){
        //return view page ma krva mate
        $customers = Customers::all();
        $data = compact('customers'); // compact function variable no array bnavine push kri desee
        return view('customer-view')->with($data);
        echo $data;
    }

    public function delete($id){
        //Method1
       $customers = Customers::find($id)->delete(); // find primary key ne match krse
       return redirect()->back();
       
       //Method2
    //    $customers = Customers::find($id); // find primary key ne match krse
    //    if(!is_null($customers)){
    //         $customers->delete();
    //    }
    //    return redirect('customer/view');  

    }

    public function edit($id){
        $customers = Customers::find($id);
        if (is_null($customers)){
            //not found id
            return redirect('customer/view');  
        }else{
            //if found id 
            //url make for update
            // $title = "Update Customer";
            $url = url('/customer/update')."/". $id;
            $title = "Update Customer";
            $data = compact('customers','url','title');  // ek varibale ma data store
            return view('customer')->with($data); // data pass krava - array pass karyo
        }
    }

    public function update($id, Request $request){
        $customers = Customers::find($id);
        $customers->name = $request->name;
        $customers->email = $request->email;
        $customers->gender = $request->gender;
        $customers->address = $request->address;
        $customers->state = $request->state;
        $customers->country = $request->country;
        $customers->dob = $request->dob;
        $customers->status = $request->status;
        $customers->save();
        return redirect('customer/view');  
    }
}
