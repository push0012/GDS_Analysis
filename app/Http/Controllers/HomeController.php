<?php

namespace App\Http\Controllers;
use App\Models\Stream;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $this_year = date("Y");


        $degree_all = DB::table('degree_all_count')->first();
        $degree_this_year = DB::table('degree_this_year_count')->first();

        $diploma_all = DB::table('diploma_all_count')->first();
        $diploma_this_year = DB::table('diploma_this_year_count')->first();

        $ratnapura_count= DB::table('degree_view_one')->where('ds_name','=','Rathnapura')->count();
        $kegalle_count = DB::table('degree_view_one')->where('ds_name','=','Kegalle')->count();

        $male_count= DB::table('degree_view_one')->where('sex','=','Male')->count();
        $female_count = DB::table('degree_view_one')->where('sex','=','Female')->count();

        $special_count= DB::table('degree_view_one')->where('deg_type','=','Special')->count();
        $general_count = DB::table('degree_view_one')->where('deg_type','=','General')->count();


        $deg_class_types = ['First Class', 'Second Upper', 'Second Lower', 'General'];
        $res_arr_class=[];
        $deg_class_count=[];
        foreach ($deg_class_types as $deg_class_type) {
            $res_arr_class =  DB::table('degree_view_one')->where('deg_class', '=', $deg_class_type)->count(); 
            array_push($deg_class_count, $res_arr_class);

        }

        $stream_names = Stream::select('str_name')->get();
        $str_temp=[];
        $str_count=[];
        foreach ($stream_names as $stream_name) {
            $str_temp =  DB::table('degree_view_one')->where('str_name', '=', $stream_name->str_name)->count();
            array_push($str_count, $str_temp);

            
        }
        //return $str_count;

     //return $deg_class_count;
        
        return view('dashboard', [
            'this_year' => $this_year,
            'degree_all'=>$degree_all, 
            'degree_this_year'=> $degree_this_year,

            'diploma_all'=>$diploma_all, 
            'diploma_this_year'=> $diploma_this_year,

            'ratnapura_count' => $ratnapura_count,
            'kegalle_count' => $kegalle_count,

            'male_count' => $male_count,
            'female_count' => $female_count,

            'special_count' => $special_count,
            'general_count' => $general_count,

            'deg_class_count' => $deg_class_count,

            'stream_names' => $stream_names,
            'str_count' => $str_count,
        ]);
    }
}
