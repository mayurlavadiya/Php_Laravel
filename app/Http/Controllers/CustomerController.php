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
        // $customers = Customers::find;
        // $customers = compact('url','title');
        return view('customer',compact('url','title'));
    }

    public function store(Request $request)
    {
        // Insert Query
        $customers = new Customers;
        $customers->name = $request->name;
        $customers->email = $request['email'];
        $customers->gender = $request->gender;
        $customers->address = $request['address'];
        $customers->city = $request['city'];
        $customers->state = $request['state'];
        $customers->country = $request['country'];
        $customers->dob = $request['dob'];
        $customers->status = $request['status'];
        $customers->password = md5($request['password']);
        $customers->save();

        //Redirect after insert data to view page to show the data
        return redirect('/customer/view');
    }

    public function view(Request $request)
    {
        $search = $request['search'] ?? ""; // value hoi to search baki khali
        if($search != ""){
            //where clause
            $customers = Customers::where('name','LIKE',"%$search%")
            ->orwhere('email','LIKE',"%$search%")
            ->orwhere('address','LIKE',"%$search%")
            ->orwhere('city','LIKE',"%$search%")
            ->orwhere('state','LIKE',"%$search%")
            ->orwhere('country','LIKE',"%$search%")
            ->get();
        }else{
            //return view page ma krva mate
                // $customers = Customers::get();
            $customers = Customers::paginate(10);
        }
        $data = compact('customers','search'); // compact function variable no array bnavine push kri desee
        return view('customer-view')->with($data);
        // echo $data;
    }

    public function trash(){

        $customers = Customers::onlyTrashed()->get();
        $data = compact('customers'); // compact function variable no array bnavine push kri desee
        return view('customer-trash')->with($data);
    }

    public function restore($id){
        $customers = Customers::withTrashed()->find($id); // find primary key ne match krse
       if(!is_null($customers)){
            $customers->restore();
       }
       return redirect('customer/view');

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

    public function forcedelete($id){

       //Method2
       $customers = Customers::withTrashed()->find($id); // find primary key ne match krse
       if(!is_null($customers)){
            $customers->forcedelete();
       }
       return redirect('customer/view');

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
            return view('customer-edit')->with($data); // data pass krava - array pass karyo
        //  return redirect('customer/');

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
        $customers->city = $request->city;
        $customers->dob = $request->dob;
        $customers->status = $request->status;
        $customers->save();
        return redirect('customer/view');
    }
}
