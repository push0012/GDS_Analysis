<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Institute;
use App\Models\Stream;

use DB;

class FilterController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin');
    }

    public function show_graduate_filter_form(){
        $institutes = Institute::where('ins_type', '=',1)->orWhere('ins_type', '=', 2)->get();
        $streams = Stream::get();
        return view('pages.contact.degree', 
            [
                'streams'=>$streams, 
                'institutes'=>$institutes
            ]);
   
    }
    public function get_graduate_contacts(Request $request)
    {
        $data = $request->all();
        
        $query = DB::table('degree_view_one');

        if ($data['ds_id'] != '0') 
        {
            $query = $query->where('ds_name', '=', $data['ds_name']);
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

    public function show_diploma_filter_form(){
        $institutes = Institute::where('ins_type', '=',1)->orWhere('ins_type', '=', 3)->get();
       
        return view('pages.contact.diploma', 
            [
                'institutes'=>$institutes
            ]);
   
    }

    public function get_diploma_contacts(Request $request)
    {
        $data = $request->all();
        
        $query = DB::table('diploma_view_one');

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
        
        if ($data['dip_medium'] != '0') 
        {
            $query = $query->where('dip_medium', '=', $data['dip_medium']);
        }
        if ($data['ins_id'] != '0') 
        {
            $query = $query->where('ins_id', '=', $data['ins_id']);
        }
        if ($data['dip_duration'] != '0') 
        {
            $query = $query->where('dip_duration', '=', $data['dip_duration']);
        }
        if ($data['dip_effective_date_from'] != '') 
        {
            $query = $query->where('dip_effective_date', '>', $data['dip_effective_date_from']);
        }
        if ($data['dip_effective_date_to'] != '')
        {
            $query = $query->where('dip_effective_date', '<', $data['dip_effective_date_to']);
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
