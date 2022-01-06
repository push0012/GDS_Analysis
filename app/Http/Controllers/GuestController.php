<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class GuestController extends Controller
{
    public function index()
    {
        return view('pages.guest.view');
    }
    public function view(Request $request)
    {
        $export = [];
        if($request['type'] == 1){
            $student = DB::table('degree_guest')->where('nic','=', $request['nic'])->first();

            $export = [
                'reg_no' => $student->deg_reg_no,
                'reg_date' => $student->deg_reg_date,
                'stu_name' => $student->stu_name,
            ];
        }elseif($request['type'] == 2){
            $student = DB::table('diploma_guest')->where('nic','=', $request['nic'])->first();

            $export = [
                'reg_no' => $student->dip_reg_no,
                'reg_date' => $student->dip_reg_date,
                'stu_name' => $student->stu_name,
            ];
        }
        return json_encode($export);
    }
}
