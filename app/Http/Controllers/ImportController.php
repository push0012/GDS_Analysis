<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\FileOpen;

use App\Models\Institute;
use App\Models\Stream;
use App\Models\Degree;
use App\Models\Student;
use App\Models\DegreeRegister;
use App\Models\DiplomaRegister;
use App\Models\LastRegister;
use App\Models\District;
use App\Models\Division;

use DB;
use Carbon\Carbon;

class ImportController extends Controller
{
    public function graduate_form_view()
    {
        return view('pages.import.import');
    }

    public function graduate_import_data(Request $request)
    {
        DB::beginTransaction();

        try {
                $file = $request->file('import_graduate');
                $fileopen =  new FileOpen();

                $recordArr = $fileopen->csvToArray($file);

                $user = Auth::user();
                //$request->request->add(['user' => $user]);

                foreach ($recordArr as $row) {

                    $district = District::where("ds_name", "like", $row['ds_name'])->first();
                    $division = Division::where("dv_name", "=", $row['dv_name'])->first();

                    $students = Student::create([
                        'stu_title' => $row['stu_title'],
                        'stu_name' => $row['stu_name'],
                        'sex' => $row['sex'],
                        'dob' => $row['dob'],
                        'nic' => $row['nic'],
                        'address' => $row['address'],
                        'telephone' => $row['telephone'],
                        'email' => $row['email'],
                        'deleted' => 0,
                        'user' => $user['name'],
                        'ds_id' => $district->ds_id,
                        'dv_id' => $division->dv_id
                    ]);

                    $institute = Institute::where("ins_name", "like", $row['ins_name'])->first();
                    $stream = Stream::where("str_name", "like", $row['str_name'])->first();

                    $RegDate = $row['deg_reg_date'];
                    $year = Carbon::createFromFormat('Y-m-d', $RegDate)->format('Y');

                    $degree_register = DegreeRegister::create([
                        'deg_title' => $row['deg_title'],
                        'deg_medium' => $row['deg_medium'],
                        'deg_type' => $row['deg_type'],
                        'deg_class' => $row['deg_class'],
                        'deg_effective_date' => $row['deg_effective_date'],
                        'deg_job_preference' => $row['deg_job_preference'],
                        'submit_via' => $row['submit_via'],
                        'deg_reg_no' => $row['deg_reg_no'],
                        'deg_reg_date' => $row['deg_reg_date'],
                        'year' => $year,
                        'deleted' => 0,
                        'user' => $user['name'],
                        'stu_id' => $students->stu_id,
                        'str_id' => $stream->str_id,
                        'ins_id' => $institute->ins_id,
                    ]);

                    LastRegister::where('id', 1)->update(['last_record' => $row['deg_reg_no']]);
                }

            DB::commit();
            return back()->withStatusDegree(__('Graduate Register Details Successfully Inserted.'));
            }catch (\Throwable $e) {
            DB::rollback();
            throw $e;
            return back()->withStatusDegree(__('Graduate Register Details Insertion Unsuccessfull.'));
        }
    }

    public function diploma_import_data(Request $request)
    {
        DB::beginTransaction();

        try {
                $file = $request->file('import_diploma');
                $fileopen =  new FileOpen();

                $recordArr = $fileopen->csvToArray($file);

                $user = Auth::user();
                
                foreach ($recordArr as $row) {
                    $district = '';
                    $division = '';
                    $institute = '';
                    $district = District::where("ds_name", "like", $row['ds_name'])->first();
                    $division = Division::where("dv_name", "=", $row['dv_name'])->first();

                    $students = Student::create([
                        'stu_title' => $row['stu_title'],
                        'stu_name' => $row['stu_name'],
                        'sex' => $row['sex'],
                        'dob' => $row['dob'],
                        'nic' => $row['nic'],
                        'address' => $row['address'],
                        'telephone' => $row['telephone'],
                        'email' => $row['email'],
                        'deleted' => 0,
                        'user' => $user['name'],
                        'ds_id' => $district->ds_id,
                        'dv_id' => $division->dv_id
                    ]);

                    $institute = Institute::where("ins_name", "like", $row['ins_name'])->first();
                   
                    $RegDate = $row['dip_reg_date'];
                    $year = Carbon::createFromFormat('Y-m-d', $RegDate)->format('Y');

                    $degree_register = DiplomaRegister::create([
                        'dip_title' => $row['dip_title'],
                        'dip_medium' => $row['dip_medium'],
                        'dip_duration' => $row['dip_duration'],
                        'dip_effective_date' => $row['dip_effective_date'],
                        'dip_job_preference' => $row['dip_job_preference'],
                        'submit_via' => $row['submit_via'],
                        'dip_reg_no' => $row['dip_reg_no'],
                        'dip_reg_date' => $row['dip_reg_date'],
                        'year' => $year,
                        'deleted' => 0,
                        'user' => $user['name'],
                        'stu_id' => $students->stu_id,
                        'ins_id' => $institute->ins_id,
                    ]);

                    LastRegister::where('id', 2)->update(['last_record' => $row['dip_reg_no']]);
                }

            DB::commit();
            return back()->withStatusDiploma(__('Diploma Holder Register Details Successfully Inserted.'));
            }catch (\Throwable $e) {
            DB::rollback();
            throw $e;
            return back()->withStatusDiploma(__('Diploma Holder Register Details Insertion Unsuccessfull.'));
        }
    }
}
