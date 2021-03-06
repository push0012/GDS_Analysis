<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Institute;
use App\Models\Stream;

use DB;

class AjaxController extends Controller
{
    public function institutes()
    {
        $institutes = Institute::where('ins_type', 1)->orWhere('ins_type', 2)->get();
        return json_encode($institutes);
        //return view('pages.degree.add', ['institutes' => $institutes, 'streams' => $streams, 'degrees' => $degrees ]);
    }

    
}
