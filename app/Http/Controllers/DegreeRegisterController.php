<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Institute;
use App\Models\Stream;
use App\Models\Degree;

class DegreeRegisterController extends Controller
{
    public function index()
    {
        $institutes = Institute::where('ins_type', 1)->get();
        $streams = Stream::get();
        $degrees = Degree::get();

        return view('pages.degree.add', ['institutes' => $institutes, 'streams' => $streams, 'degrees' => $degrees ]);
    }
}
