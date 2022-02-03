<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Institute;
use App\Models\Stream;

use DB;
use Maatwebsite\Excel\Facades\Excel;

class ListController extends Controller
{
    public function show_graduate_form()
    {
        $years = DB::table('degree_view_one')->select('year')->groupBy('year')->get();

        //return $years;
        $institutes = Institute::where('ins_type', '=',1)->orWhere('ins_type', '=', 2)->get();
        $streams = Stream::get();
        return view('pages.list.degree', 
            [
                'streams'=>$streams, 
                'institutes'=>$institutes,
                'years' => $years
            ]);
    }

    public function show_graduate_list(Request $request)
    {
        $data = $request->all();
        //return  $data;
        $query = DB::table('degree_view_one');

        if ($data['reg_year'] != '0') 
        {
            $query = $query->where('year', '=', $data['reg_year']);
        }

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
        $results = $query->get();

        //return json_encode($string);*/
        return view('pages.list.degree_list', [
            'results'=>$results,
            'year' => $data['reg_year']
        ]);
    }

    public function show_diploma_form()
    {
        $years = DB::table('diploma_view_one')->select('year')->groupBy('year')->get();

        $institutes = Institute::where('ins_type', '=',1)->orWhere('ins_type', '=', 3)->get();

        
        return view('pages.list.diploma', 
            [
                'institutes'=>$institutes,
                'years' => $years
            ]);
    }

    public function show_diploma_list(Request $request)
    {
        $data = $request->all();
        //return  $data;
        $query = DB::table('diploma_view_one');

        if ($data['reg_year'] != '0') 
        {
            $query = $query->where('year', '=', $data['reg_year']);
        }

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
        if ($data['dip_effective_date_from'] != '') 
        {
            $query = $query->where('dip_effective_date', '>', $data['dip_effective_date_from']);
        }
        if ($data['dip_effective_date_to'] != '')
        {
            $query = $query->where('dip_effective_date', '<', $data['dip_effective_date_to']);
        }
        $results = $query->get();

        //return json_encode($string);*/
        return view('pages.list.diploma_list', [
            'results'=>$results,
            'year' => $data['reg_year']
        ]);

        //return view('pages.list.diploma_list');
    }
}
