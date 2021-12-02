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

        if ($data['ds_id'] != '0') 
        {
            $query = $query->where('ds_id', '=', $data['ds_id']);
        }
        if ($data['dv_id'] != '0') 
        {
            $query = $query->where('dv_id', '=', $data['dv_id']);
        }
        if ($data['sex'] != '0') 
        {
            $query = $query->where('sex', '=', $data['sex']);
        }
        if ($data['str_id'] != '0') 
        {
            $query = $query->where('str_id', '=', $data['str_id']);
        }
        if ($data['deg_medium'] != '0') 
        {
            $query = $query->where('deg_medium', '=', $data['deg_medium']);
        }
        if ($data['ins_id'] != '0') 
        {
            $query = $query->where('ins_id', '=', $data['ins_id']);
        }
        if ($data['deg_type'] != '0') 
        {
            $query = $query->where('deg_type', '=', $data['deg_type']);
        }
        if ($data['deg_class'] != '0') 
        {
            $query = $query->where('deg_class', '=', $data['deg_class']);
        }
        if ($data['deg_effective_date_from'] != '') 
        {
            $query = $query->where('deg_effective_date', '>', $data['deg_effective_date_from']);
        }
        if ($data['deg_effective_date_to'] != '')
        {
            $query = $query->where('deg_effective_date', '<', $data['deg_effective_date_to']);
        }
        

        if ($data['contact_type'] == '1') 
        {
            $results = $query->pluck('email');
        }
        else if ($data['contact_type'] == '2')
        {
            $results = $query->pluck('telephone');
        }

        if($results->isEmpty())
        {
            $string = 'Results not Found...!';
            return json_encode($string);
        }

        $trimmed_array = preg_replace('/["]*/', '', $results);

        $string = str_replace(array('[[',']]'),'',$trimmed_array);

        return json_encode($string);
        
    }
}
