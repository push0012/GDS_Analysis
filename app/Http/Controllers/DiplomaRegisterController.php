<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Institute;
use App\Models\Diploma;
use App\Models\Student;
use App\Models\DiplomaRegister;
use App\Models\LastRegister;
use App\Models\Division;

use DB;

use Carbon\Carbon;

class DiplomaRegisterController extends Controller
{
    public function index()
    {
        $institutes = Institute::where('ins_type', 1)->orWhere('ins_type', 3)->get();
        //$streams = Stream::get();
        $diplomas = Diploma::get();
        $last_record = LastRegister::where('id', 2)->first();
        return view('pages.diploma.add', ['institutes' => $institutes, 'diplomas' => $diplomas,  'last_record' => $last_record ]);
    }

    public function store(Request $request)
    {

        //return $request;
        //return json_encode($request);
        DB::beginTransaction();

        try {
            $user = Auth::user();
            $request->request->add(['user' => $user]);
            
            //dd($year);
            
            $students = Student::create([
                'stu_title' => $request->stu_title,
                'stu_name' => $request->stu_name,
                'sex' => $request->sex,
                'dob' => $request->dob,
                'nic' => $request->nic,
                'address' => $request->address,
                'telephone' => $request->telephone,
                'email' => $request->email,
                'deleted' => 0,
                'user' => $request->user->name,
                'ds_id' => $request->ds_id,
                'dv_id' => $request->dv_id
            ]);

            $RegDate = $request->dip_reg_date;
            $year = Carbon::createFromFormat('Y-m-d', $RegDate)->format('Y');

            $diploma_register = DiplomaRegister::create([
                'dip_title' => $request->dip_title,
                'dip_medium' => $request->dip_medium,
                'dip_duration' => $request->dip_duration,
                'dip_effective_date' => $request->dip_effective_date,
                'dip_job_preference' => implode(",", $request->dip_job_preference),
                'submit_via' => $request->submit_via,
                'dip_reg_no' => $request->dip_reg_no,
                'dip_reg_date' => $request->dip_reg_date,
                'year' => $year,
                'deleted' => 0,
                'user' => $request->user->name,
                'stu_id' => $students->stu_id,
                'ins_id' => $request->ins_id,
            ]);

            LastRegister::where('id',2)->update(['last_record'=>$request->dip_reg_no]);
            /*$students = new Student;
                
            $students->stu_title = $request->name;

            $flight->save();*/

            DB::commit();
            return back()->withStatus(__('Diploma Holder Details Successfully Inserted.'));
        } catch (\Throwable $e) {
            DB::rollback();
            throw $e;
            return back()->withStatus(__('Diploma Holder Details Insertion Unsuccessfull.'));
        }
    }

    public function show()
    {
       /* $institutes = Institute::where('ins_type', 1)->get();
        $streams = Stream::get();
        $degrees = Degree::get();*/

        $student_list = DB::table('diploma_view_one')->get();

        return view('pages.diploma.list', ['students' => $student_list]);
    }

    public function view($id)
    {
       /* $institutes = Institute::where('ins_type', 1)->get();
        $streams = Stream::get();
        $degrees = Degree::get();*/

        $student_one = DB::table('diploma_view_one')->where('stu_id','=',$id)->first();

        return view('pages.diploma.view', ['student' => $student_one]);
    }

    public function edit($id)
    {
        $institutes = Institute::where('ins_type', 1)->orWhere('ins_type', 3)->get();
        $diplomas = Diploma::get();
        $divisions = Division::get();

        $student_one = DB::table('diploma_view_one')->where('stu_id','=',$id)->first();

        return view('pages.diploma.edit', ['institutes' => $institutes, 'diplomas' => $diplomas, 'divisions'=>$divisions, 'student' => $student_one]);
   
    }

    public function update(Request $request, $id)
    {
        //return $request;

        DB::beginTransaction();

        try {
            $user = Auth::user();
            $request->request->add(['user' => $user]);
            
            //dd($year);
            
            $students = Student::where('stu_id', '=', $id)
                ->update(
                    [
                'stu_title' => $request->stu_title,
                'stu_name' => $request->stu_name,
                'sex' => $request->sex,
                'dob' => $request->dob,
                'nic' => $request->nic,
                'address' => $request->address,
                'telephone' => $request->telephone,
                'email' => $request->email,
                'deleted' => 0,
                'user' => $request->user->name,
                'ds_id' => $request->ds_id,
                'dv_id' => $request->dv_id
            ]);

            $RegDate = $request->dip_reg_date;
            $year = Carbon::createFromFormat('Y-m-d', $RegDate)->format('Y');

            $diploma_register = DiplomaRegister::where('stu_id','=',$id)
            ->update(
                [
                'dip_title' => $request->dip_title,
                'dip_medium' => $request->dip_medium,
                'dip_duration' => $request->dip_duration,
                'dip_effective_date' => $request->dip_effective_date,
                'dip_job_preference' => $request->dip_job_preference,
                'dip_reg_no' => $request->dip_reg_no,
                'dip_reg_date' => $request->dip_reg_date,
                'year' => $year,
                'deleted' => 0,
                'user' => $request->user->name,
                //'stu_id' => $students->stu_id,
                'ins_id' => $request->ins_id,
            ]);

            LastRegister::where('id',2)->update(['last_record'=>$request->dip_reg_no]);
            
            DB::commit();
            return back()->withStatus(__('Diploma Holder Details Successfully Updated.'));
        } catch (\Throwable $e) {
            DB::rollback();
            throw $e;
            return back()->withStatus(__('Diploma Holder Details Updating Unsuccessfull.'));
        }
    }
}
