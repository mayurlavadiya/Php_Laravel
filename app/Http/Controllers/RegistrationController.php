<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    // 1. create a function to hit index page
    public function index(){
        return view('form');
    }

    // 2. create a function to show data only
    public function register(Request $request) // data variable ma store krva 
    { 
        // validator mukyu k form ma click krya pachi validation check kre ane jo hoi to j 2nd page ma jay..
        // array create kryo.... associative array
        $request->validate( 
            [
                'name' => 'required', // required attribute/validation chhe, empty field hoi to agal jase ny
                'email' => 'required|email',
                'password' => 'required|confirmed',
                'password_confirmation' => 'required'
                // 'check_password' => 'required|same:password' ---- user potani rite field bnave to am use thay
                
            ]
        );      
        echo "<pre>";  
        print_r($request->all()); // array form ma data bdha fetch mate 
    }
}
