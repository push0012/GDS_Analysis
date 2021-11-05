<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DegreeRegisterController extends Controller
{
    public function index()
    {
        return view('pages.degree.add');
    }
}
