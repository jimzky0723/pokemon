<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeCtrl extends Controller
{
    public function __construct()
    {

    }

    public function index()
    {
        return view('page.home');
    }
}
