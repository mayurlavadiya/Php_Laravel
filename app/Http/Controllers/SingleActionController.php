<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// single actionmate use thay - ane ek j function nee call krva aa use thay
class SingleActionController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request) 
    {
        return view('course');
    }
}
