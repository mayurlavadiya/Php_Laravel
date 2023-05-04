<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;

class IndexController extends Controller
{
    public function index(){
        return Member::with('getGroup')->get();
    }
}
