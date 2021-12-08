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

        //return $results;

        /*if ($data['contact_type'] == '1') 
        {
            $results = $query->pluck('email');
        }
        else if ($data['contact_type'] == '2')
        {
            $results = $query->pluck('telephone');
        }*/

        /*if($results->isEmpty())
        {
            $string = 'Results not Found...!';
            return json_encode($string);
        }

       

        //return json_encode($string);*/
        return view('pages.list.degree_list', [
            'results'=>$results,
        ]);
    }

    public function export_graduate_list_excel(Request $request)
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


        $header_array[] = array(
            'Reg No', 
            'Reg Date', 
            'Title',
            'Name',
            'Gender',
            'Date of Birth',
            'NIC',
            'Address',
            'District',
            'Division',
            'Telephone',
            'Email',
            'Institute',
            'Degree',
            'Stream',
            'Medium',
            'Type',
            'Class',
            'Effective Date',
            'Job Preference'
        );

        foreach($results as $result)
        {
        $header_array[] = array(
            'Reg No' => $result->deg_reg_no,
            'Reg Date' => $result->deg_reg_date,
            'Title'=> $result->stu_title,
            'Name'=> $result->stu_name,
            'Gender'=> $result->sex,
            'Date of Birth'=> $result->dob,
            'NIC'=> $result->nic,
            'Address'=> $result->address,
            'District'=> $result->ds_name,
            'Division'=> $result->dv_name,
            'Telephone'=> $result->telephone,
            'Email'=> $result->email,
            'Institute'=> $result->ins_name,
            'Degree'=> $result->deg_title,
            'Stream'=> $result->str_name,
            'Medium'=> $result->deg_medium,
            'Type'=> $result->deg_type,
            'Class'=> $result->deg_class,
            'Effective Date'=> $result->deg_effective_date,
            'Job Preference'=> $result->deg_job_preference
        );
        }
        /*Excel::create('Graduate Registration Participants', function($excel) use ($header_array){
        $excel->setTitle('Graduate Registration Participants ');
        $excel->sheet('Graduate Registration Participants ', function($sheet) use ($header_array){
        $sheet->fromArray($header_array, null, 'A1', false, false);
        });
        })->download('xlsx');*/

        return Excel::download($results, 'users.xlsx');
    }

    public function show_diploma_form()
    {
        $institutes = Institute::where('ins_type', '=',1)->orWhere('ins_type', '=', 2)->get();

        $streams = Stream::get();
        return view('pages.list.degree', 
            [
                'streams'=>$streams, 
                'institutes'=>$institutes
            ]);
    }

    public function show_diploma_list()
    {
        return view('pages.list.diploma_list');
    }
}
