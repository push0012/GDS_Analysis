<?php

namespace App\Services;

use Auth;
use DB;

use App\Models\Institute;
use App\Models\Stream;
use App\Models\Degree;
use App\Models\Student;
use App\Models\DegreeRegister;
use App\Models\LastRegister;
use App\Models\Division;

use Carbon\Carbon;

class DegreeRegisterService {

    function makeDataTable(){
        $order_column  = array('deg_reg_no','deg_reg_date','stu_name','nic','dv_name','address');
        //echo "dkznjfsnfdkjsdfn";
        $builder = DB::table('degree_view_one');
        
        if(isset($_POST["search"]["value"]) && $_POST["search"]["value"] != ""){
           //$builder->groupStart();
            $builder->orWhere('deg_reg_no', 'like', '%' . $_POST["search"]["value"] . '%');
            //$builder->orWhere('deg_reg_date', 'like', '%' . $_POST["search"]["value"] . '%');
            $builder->orWhere('stu_name', 'like', '%' . $_POST["search"]["value"] . '%');
            $builder->orWhere('nic', 'like', '%' . $_POST["search"]["value"] . '%');
            $builder->orWhere('dv_name', 'like', '%' . $_POST["search"]["value"] . '%');
            $builder->orWhere('address', 'like', '%' . $_POST["search"]["value"] . '%');
            //$builder->groupEnd();
        }
        if(isset($_POST["order"])){
            
            $builder->orderBy($order_column[$_POST["order"]['0']["column"]],  $_POST["order"]['0']["dir"]);
        }else{
            $builder->orderBy('deg_reg_no','DESC');
        }

        if($_POST["length"] != -1){
            $builder->limit($_POST['length'])->offset($_POST['start']);
        }
        $query = $builder->get();

        return $query;
    }

    function getAllData(){
        $builder = DB::table('degree_view_one');
    
        return  $builder->count();
    }

    function getFilteredData(){
        $builder = DB::table('degree_view_one');
        
        if(isset($_POST["search"]["value"]) && $_POST["search"]["value"] != ""){
           //$builder->groupStart();
            $builder->orWhere('deg_reg_no', 'like', '%' . $_POST["search"]["value"] . '%');
            //$builder->orWhere('deg_reg_date', 'like', '%' . $_POST["search"]["value"] . '%');
            $builder->orWhere('stu_name', 'like', '%' . $_POST["search"]["value"] . '%');
            $builder->orWhere('nic', 'like', '%' . $_POST["search"]["value"] . '%');
            $builder->orWhere('dv_name', 'like', '%' . $_POST["search"]["value"] . '%');
            $builder->orWhere('address', 'like', '%' . $_POST["search"]["value"] . '%');
            //$builder->groupEnd();
        }
    
        return  $builder->count();
    }

}

