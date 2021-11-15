<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Institute;
use DB;

class AjaxController extends Controller
{
    public function institutes()
    {
        $institutes = Institute::where('ins_type', 1)->get();
        return json_encode($institutes);
        //return view('pages.degree.add', ['institutes' => $institutes, 'streams' => $streams, 'degrees' => $degrees ]);
    }

    public function show(){
        $degree_this_year = DB::table('get_emails')->pluck('email');
       // $degree_this_year = DB::table('get_emails')->get();
       //$myArray = json_decode($degree_this_year);
        //
        

        $trimmed_array = preg_replace('/["]*/', '', $degree_this_year);

        //$trimmed_array1 = str_replace('[]', " ", $trimmed_array);

        $string = str_replace(array('[[',']]'),'',$trimmed_array);
        //$trimmed_array = array_map('trim', $myArray);
        //$myArray = json_decode($trimmed_array);
        //return $trimmed_array;
        return view('pages.contact.degree', ['data' => $string]);
   
    }

    public function get_email(){
        $degree_this_year = DB::table('get_emails')->pluck('email');
       // $degree_this_year = DB::table('get_emails')->get();
       //$myArray = json_decode($degree_this_year);
        //$trimmed_array = str_replace(['"',"'"], " ", $myArray);

        $trimmed_array = preg_replace('/["]*/', '', $degree_this_year);
        //$trimmed_array = array_map('trim', $myArray);

        return $trimmed_array;
        
        //return $myArray;
    }
}
