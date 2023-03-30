<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DemoController extends Controller
{
    public function index(){
        return view('home'); // routes ne controller thi use krva mate
    }

    public function about(){
        return view('about'); // routes ne controller thi use krva mate
    }
}
