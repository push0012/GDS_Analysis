<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Services\DegreeRegisterService;


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
        if(DB::table('degree_view_one')->where('deg_reg_no','=',$request->deg_reg_no)->exists())
        {
            return back()->withDanger(__('This Register Number Already Exist'));
        }
       
        DB::beginTransaction();

        try {
            $user = Auth::user();
            $request->request->add(['user' => $user]);
            
            
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
                'deg_job_preference' => implode(",", $request->deg_job_preference),
                'submit_via' => $request->submit_via,
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

        //$student_list = DB::table('degree_view_one')->get();

        return view('pages.degree.list');
    }

    public function listing()
    {
        $degreeRegister = new DegreeRegisterService();



        $query = $degreeRegister->makeDataTable();

        $data = array();

        foreach($query as $row){
            $data_table = array();
            $data_table[] = $row->deg_reg_no;
            $data_table[] = $row->deg_reg_date;
            $data_table[] = $row->stu_title." ".$row->stu_name;
            $data_table[] = $row->nic;
            $data_table[] = $row->dv_name;
            $data_table[] = $row->address;
            /*$data_table[] = $row->ds_name;
            $data_table[] = $row->address;*/

            $btn_view = '<a href="'.url('/register/graduate/view/'. $row->stu_id).'"
                                <span class="material-icons">visibility</span></a>';

            $btn_inform = '<a href="'.url('/register/graduate/inform/'. $row->stu_id).'"
                                <span class="material-icons text-success">send</span></a>';

            $data_table[] = $btn_view;
            $data_table[] = $btn_inform;
            $data[] = $data_table;

            
        }
        $output = array(
            "draw" => intval($_POST["draw"]),
            "recordsTotal" => $degreeRegister->getAllData(),
            "recordsFiltered" => $degreeRegister->getFilteredData(),
            "data" => $data
        );

        return json_encode($output);

       // return view('pages.degree.list', ['students' => $student_list]);
    }


    public function view($id)
    {
       /* $institutes = Institute::where('ins_type', 1)->get();
        $streams = Stream::get();
        $degrees = Degree::get();*/

        $student_one = DB::table('degree_view_one')->where('stu_id','=',$id)->first();

        return view('pages.degree.view', ['student' => $student_one]);
    }

    public function inform($id)
    {
        $student_one = DB::table('degree_view_one')->where('stu_id','=',$id)->first();
        $this_year = date("Y");
        return view('pages.degree.inform', ['student' => $student_one, 'this_year' => $this_year]);
    }

    public function edit($id)
    {
        $institutes = Institute::where('ins_type', 1)->orWhere('ins_type', 2)->get();
        $streams = Stream::get();
        $degrees = Degree::get();
        $divisions = Division::get();
        $student_one = DB::table('degree_view_one')->where('stu_id','=',$id)->first();

        $job_pref_temp = explode(",", $student_one->deg_job_preference);
        //return $job_pref_temp;
        return view('pages.degree.edit', [
            'institutes' => $institutes,
            'streams' => $streams,
            'degrees' => $degrees,
            'divisions'=>$divisions,
            'student' => $student_one,
            'deg_job_preference' => $job_pref_temp
        ]);
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
                'deg_job_preference' => implode(",", $request->deg_job_preference),
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
