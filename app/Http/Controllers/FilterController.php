<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Institute;
use App\Models\Stream;

use DB;

class FilterController extends Controller
{
    public function show(){
        $institutes = Institute::where('ins_type', 1)->get();
        $streams = Stream::get();

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

        return view('pages.contact.degree', 
            [
                'filter' => $string, 
                'streams'=>$streams, 
                'institutes'=>$institutes
            ]);
   
    }

    public function get_contacts(Request $request)
    {
        $data = $request->all();
        
        $query = DB::table('degree_view_one');
        

        
        //$query = User::query();
        //return $query;
        if ($data['deg_medium'] != '0') {
            //return $query;
            $query = $query->where('deg_medium', '=', $data['deg_medium']);
        }
        if ($data['sex'] != '0') {
            //return $query;
            $query = $query->where('sex', '=', $data['sex']);
        }

        if ($data['contact_type'] == '1') {
            //return $data->contact_type;
            $results = $query->pluck('email');
            //$query = DB::table('degree_view_one')->pluck('email');
        }
        else if ($data['contact_type'] == '2')
        {
            //return $data->contact_type;
            //$query = DB::table('degree_view_one')->pluck('telephone');
            $results = $query->pluck('telephone');
        }

        return $results;
       /* if ($data->sex != 0) {
            $query = $query->where('sex', $data->sex);
        }
/* 
        if ($this == $yet_another_thing) {
        $query = $query->orderBy('this');
        }*/

        

        $trimmed_array = preg_replace('/["]*/', '', $results);

        //$trimmed_array1 = str_replace('[]', " ", $trimmed_array);

        $string = str_replace(array('[[',']]'),'',$trimmed_array);

        //$results = $query->get();

        //$degree_this_year = DB::table('get_emails')->pluck('email');
       // $degree_this_year = DB::table('get_emails')->get();
       //$myArray = json_decode($degree_this_year);
        //$trimmed_array = str_replace(['"',"'"], " ", $myArray);

        //$trimmed_array = preg_replace('/["]*/', '', $degree_this_year);
        //$trimmed_array = array_map('trim', $myArray);

        return $string;
        
        //return $myArray;
    }
}
