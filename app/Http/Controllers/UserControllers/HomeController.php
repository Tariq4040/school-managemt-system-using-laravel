<?php

namespace App\Http\Controllers\UserControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('codeMaster.frontEnd.home');
    }
    public function blogs(){
        return view('codeMaster.frontEnd.blog');
    }
    public function services(){
        return view('codeMaster.frontEnd.services');
    }
    public function contact(){
        return view('codeMaster.frontEnd.contact');
    }
}
