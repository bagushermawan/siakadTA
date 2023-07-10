<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        return view ('layouts.front.resi');
    }

    public function resi()
    {
        return view('layouts.front.cekresi');
    }
}
