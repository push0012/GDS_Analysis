<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

use App\Models\Institute;
use App\Models\Stream;
use App\Models\Degree;
use App\Models\Student;
use App\Models\DegreeRegister;
use App\Models\LastRegister;
use App\Models\Division;

use DB;
use Carbon\Carbon;

class DegreeRegisterController extends Controller
{
    public function index()
    {
        $institutes = Institute::where('ins_type', 1)->orWhere('ins_type', 2)->get();
        $streams = Stream::get();
        $degrees = Degree::get();
        $last_record = LastRegister::where('id', 1)->first();

        return view('pages.degree.add', ['institutes' => $institutes, 'streams' => $streams, 'degrees' => $degrees, 'last_record' => $last_record ]);
    }

    public function store(Request $request)
    {
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

            $RegDate = $request->deg_reg_date;
            $year = Carbon::createFromFormat('Y-m-d', $RegDate)->format('Y');

            $degree_register = DegreeRegister::create([
                'deg_title' => $request->deg_title,
                'deg_medium' => $request->deg_medium,
                'deg_type' => $request->deg_type,
                'deg_class' => $request->deg_class,
                'deg_effective_date' => $request->deg_effective_date,
                'deg_job_preference' => $request->deg_job_preference,
                'deg_reg_no' => $request->deg_reg_no,
                'deg_reg_date' => $request->deg_reg_date,
                'year' => $year,
                'deleted' => 0,
                'user' => $request->user->name,
                'stu_id' => $students->stu_id,
                'str_id' => $request->str_id,
                'ins_id' => $request->ins_id,
            ]);


            LastRegister::where('id',1)->update(['last_record'=>$request->deg_reg_no]);
            /*$students = new Student;

            $students->stu_title = $request->name;

            $flight->save();*/

            DB::commit();
            return back()->withStatus(__('Graduate Register Details Successfully Inserted.'));
        } catch (\Throwable $e) {
            DB::rollback();
            throw $e;
            return back()->withStatus(__('Graduate Register Details Insertion Unsuccessfull.'));
        }
        
    }

    public function show()
    {
       /* $institutes = Institute::where('ins_type', 1)->get();
        $streams = Stream::get();
        $degrees = Degree::get();*/

        $student_list = DB::table('degree_small_list')->get();

        return view('pages.degree.list', ['students' => $student_list]);
    }

    public function view($id)
    {
       /* $institutes = Institute::where('ins_type', 1)->get();
        $streams = Stream::get();
        $degrees = Degree::get();*/

        $student_one = DB::table('degree_view_one')->where('stu_id','=',$id)->first();

        return view('pages.degree.view', ['student' => $student_one]);
    }

    public function edit($id)
    {
        $institutes = Institute::where('ins_type', 1)->get();
        $streams = Stream::get();
        $degrees = Degree::get();
        $divisions = Division::get();
        $student_one = DB::table('degree_view_one')->where('stu_id','=',$id)->first();

        return view('pages.degree.edit', ['institutes' => $institutes, 'streams' => $streams, 'degrees' => $degrees, 'divisions'=>$divisions, 'student' => $student_one]);
    }

    public function update(Request $request, $id)
    {
        //return ($request);
        DB::beginTransaction();

        try {
            $user = Auth::user();
            $request->request->add(['user' => $user]);
            
            //dd($year);
            
            $students = Student::where('stu_id', $id)
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

            $RegDate = $request->deg_reg_date;
            $year = Carbon::createFromFormat('Y-m-d', $RegDate)->format('Y');

            $degree_register = DegreeRegister::where('stu_id', $id)
                ->update([
                'deg_title' => $request->deg_title,
                'deg_medium' => $request->deg_medium,
                'deg_type' => $request->deg_type,
                'deg_class' => $request->deg_class,
                'deg_effective_date' => $request->deg_effective_date,
                'deg_job_preference' => $request->deg_job_preference,
                'deg_reg_no' => $request->deg_reg_no,
                'deg_reg_date' => $request->deg_reg_date,
                'year' => $year,
                'deleted' => 0,
                'user' => $request->user->name,
                //'stu_id' => $students->stu_id,
                'str_id' => $request->str_id,
                'ins_id' => $request->ins_id,
            ]);


            LastRegister::where('id',1)->update(['last_record'=>$request->deg_reg_no]);
            /*$students = new Student;

            $students->stu_title = $request->name;

            $flight->save();*/

            DB::commit();
            return back()->withStatus(__('Graduate Register Details Successfully Updated.'));
        } catch (\Throwable $e) {
            DB::rollback();
            throw $e;
            return back()->withStatus(__('Graduate Register Details Updating Unsuccessfull.'));
        }
    }
}
