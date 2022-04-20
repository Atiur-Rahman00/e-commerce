<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    //To view index/home page
    public function index(){
        return view('frontend.index');
    }
}
