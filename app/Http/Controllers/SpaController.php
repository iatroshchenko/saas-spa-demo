<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SpaController extends Controller
{
    public function any()
    {
        return view('spa.index');
    }

    public function external()
    {
        return view('spa.external');
    }
}
