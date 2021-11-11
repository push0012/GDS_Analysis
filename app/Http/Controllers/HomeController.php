<?php

namespace App\Http\Controllers;
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
        $degree_all = DB::table('degree_all_count')->first();
        $degree_this_year = DB::table('degree_this_year_count')->first();

        $diploma_all = DB::table('diploma_all_count')->first();
        $diploma_this_year = DB::table('diploma_this_year_count')->first();

        
        return view('dashboard', [
            'degree_all'=>$degree_all, 
            'degree_this_year'=> $degree_this_year,

            'diploma_all'=>$diploma_all, 
            'diploma_this_year'=> $diploma_this_year
        ]);
    }
}
