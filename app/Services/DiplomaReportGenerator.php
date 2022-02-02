<?php

namespace App\Services;

use Auth;
use DB;

use App\Models\District;
use App\Models\Division;
use App\Models\Stream;

class DiplomaReportGenerator {

    function byDistrict($dataArr)
    {
        $ratnapura_count = DB::table('diploma_view_one')->where('ds_name','=','Rathnapura');
        if ($dataArr['reg_year'] != '0') 
        {
            $ratnapura_count = $ratnapura_count->where('year', '=', $dataArr['reg_year']);
        }
        
        $ratnapura_count_result = $ratnapura_count->count();
        //echo "comes here";
        
        $kegalle_count= DB::table('diploma_view_one')->where('ds_name','=','Kegalle');
        if ($dataArr['reg_year'] != '0') 
            {
                $kegalle_count = $kegalle_count->where('year', '=', $dataArr['reg_year']);
            }
        $kegalle_count_result = $kegalle_count->count();

        $sum = $ratnapura_count_result + $kegalle_count_result;
        $kegalle_persentage = ($kegalle_count_result/$sum)*100;
        $ratnapura_persentage = ($ratnapura_count_result/$sum)*100;

        $resultArr = [
            [
                'name'=>'Rathnapura',
                'count' => $ratnapura_count_result,
                'present' => round($ratnapura_persentage,2),
            ],
            [
                'name'=>'Kegalle',
                'count' => $kegalle_count_result,
                'present' => round($kegalle_persentage,2),
            ]
        ];
        return $resultArr;

    }

    function byGender($dataArr)
    {


        $ratnapura_male_count = DB::table('degree_view_one')
            ->where('ds_name','=','Rathnapura')
            ->where('sex','=','Male')
            ->where('year', '=', $dataArr['reg_year'])
            ->count();
        $ratnapura_female_count = DB::table('degree_view_one')
            ->where('ds_name','=','Rathnapura')
            ->where('sex','=','Female')
            ->where('year', '=', $dataArr['reg_year'])
            ->count();

        $kegalle_male_count = DB::table('degree_view_one')
            ->where('ds_name','=','Kegalle')
            ->where('sex','=','Male')
            ->where('year', '=', $dataArr['reg_year'])
            ->count();
            
        $kegalle_female_count = DB::table('degree_view_one')
            ->where('ds_name','=','Kegalle')
            ->where('sex','=','Female')
            ->where('year', '=', $dataArr['reg_year'])
            ->count();

        $ratnapura_sum = $ratnapura_male_count + $ratnapura_female_count;
        $kegalle_sum = $kegalle_male_count + $kegalle_female_count;

        $male_sum = $ratnapura_male_count + $kegalle_male_count;
        $female_sum = $ratnapura_female_count + $kegalle_female_count;

        $province_sum = $male_sum + $female_sum;

        $male_present = ($male_sum/$province_sum)*100;
        $female_present = ($female_sum/$province_sum)*100;

        $resultArr = [
            [
                'name'=>'Male',
                'r_count' => $ratnapura_male_count,
                'k_count' => $kegalle_male_count,
                'p_count' => $male_sum,
                'present' => round($male_present,2),
            ],
            [
                'name'=>'Female',
                'r_count' => $ratnapura_female_count,
                'k_count' => $kegalle_female_count,
                'p_count' => $female_sum,
                'present' => round($female_present,2),
            ],
            [
                'name'=>'Total',
                'r_count' => $ratnapura_sum,
                'k_count' => $kegalle_sum,
                'p_count' => $province_sum,
                'present' => '100',
            ]
        ];
        return $resultArr;

    }

    function byDivisionKegalle($dataArr)
    {
        $divisions = Division::where("ds_id",'=','1')->get();
        $res_arr_class=[];
        $deg_class_count=[];
        $all =  DB::table('degree_view_one')->where('year', '=', $dataArr['reg_year'])->count(); 
        foreach ($divisions as $division) {
            $res_arr_class =  DB::table('degree_view_one')
                ->where('dv_id', '=', $division->dv_id)
                ->where('year', '=', $dataArr['reg_year'])
                ->count(); 
                $res_pres = ($res_arr_class/$all)*100;

            $resultArr_class = 
                    [
                        'dv_id'=>$division->dv_id,
                        'dv_name' => $division->dv_name,
                        'count' => $res_arr_class,
                        'present' => round($res_pres,2),
                    ];

            array_push($deg_class_count, $resultArr_class);

        }
        $resultArr_class_csa = 
                    [
                        'dv_id'=>100,
                        'dv_name' => 'Total',
                        'count' => $all,
                        'present' => 100,
                    ];

        array_push($deg_class_count, $resultArr_class_csa);
        return $deg_class_count;
    }
    function byDivisionRatnapura($dataArr)
    {
        $divisions = Division::where("ds_id",'=','2')->get();
        $res_arr_class=[];
        $deg_class_count=[];
        $all =  DB::table('degree_view_one')->where('year', '=', $dataArr['reg_year'])->count(); 
        foreach ($divisions as $division) {
            $res_arr_class =  DB::table('degree_view_one')
                ->where('dv_id', '=', $division->dv_id)
                ->where('year', '=', $dataArr['reg_year'])
                ->count(); 
                $res_pres = ($res_arr_class/$all)*100;

            $resultArr_class = 
                    [
                        'dv_id'=>$division->dv_id,
                        'dv_name' => $division->dv_name,
                        'count' => $res_arr_class,
                        'present' => round($res_pres,2),
                    ];

            array_push($deg_class_count, $resultArr_class);

        }
        $resultArr_class_csa = 
                    [
                        'dv_id'=>100,
                        'dv_name' => 'Total',
                        'count' => $all,
                        'present' => 100,
                    ];

        array_push($deg_class_count, $resultArr_class_csa);
        return $deg_class_count;
    }
    function byStream($dataArr)
    {
        $streams = Stream::get();
        $res_arr_class_rat=[];
        $res_arr_class_keg=[];
        $deg_class_count=[];
        $all =  DB::table('degree_view_one')->where('year', '=', $dataArr['reg_year'])->count(); 
        $r_all =  DB::table('degree_view_one')->where('ds_id', '=', '2')->where('year', '=', $dataArr['reg_year'])->count(); 
        $k_all =  DB::table('degree_view_one')->where('ds_id', '=', '1')->where('year', '=', $dataArr['reg_year'])->count(); 
        foreach ($streams as $stream) {
            $res_arr_class_rat =  DB::table('degree_view_one')
                ->where('str_id', '=', $stream->str_id)
                ->where('year', '=', $dataArr['reg_year'])
                ->where('ds_id', '=', '2')
                ->count(); 

            $res_arr_class_keg =  DB::table('degree_view_one')
                ->where('str_id', '=', $stream->str_id)
                ->where('year', '=', $dataArr['reg_year'])
                ->where('ds_id', '=', '1')
                ->count(); 
            $p_count = $res_arr_class_rat + $res_arr_class_keg;
            $resultArr_class = 
                    [
                        'str_id'=>$stream->str_id,
                        'str_name' => $stream->str_name,
                        'r_count' => $res_arr_class_rat,
                        'k_count' => $res_arr_class_keg,
                        'p_count' => $p_count,
                    ];

            array_push($deg_class_count, $resultArr_class);

        }
        $resultArr_class_csa = 
                    [
                        'str_id'=>100,
                        'str_name' => 'Total',
                        'r_count' => $r_all,
                        'k_count' => $k_all,
                        'p_count' => $all,
                    ];

        array_push($deg_class_count, $resultArr_class_csa);
        return $deg_class_count;
    }

    function byMedium($dataArr)
    {
        $mediums = ['Sinhala','Tamil','English'];
        $res_arr_class_rat=[];
        $res_arr_class_keg=[];
        $deg_class_count=[];
        $all =  DB::table('degree_view_one')->where('year', '=', $dataArr['reg_year'])->count(); 
        $r_all =  DB::table('degree_view_one')->where('ds_id', '=', '2')->where('year', '=', $dataArr['reg_year'])->count(); 
        $k_all =  DB::table('degree_view_one')->where('ds_id', '=', '1')->where('year', '=', $dataArr['reg_year'])->count(); 
        
        foreach ($mediums as $medium) {
            $res_arr_class_rat =  DB::table('degree_view_one')
                ->where('deg_medium', '=', $medium)
                ->where('year', '=', $dataArr['reg_year'])
                ->where('ds_id', '=', '2')
                ->count(); 

            $res_arr_class_keg =  DB::table('degree_view_one')
                ->where('deg_medium', '=', $medium)
                ->where('year', '=', $dataArr['reg_year'])
                ->where('ds_id', '=', '1')
                ->count(); 

            $p_count = $res_arr_class_rat + $res_arr_class_keg;

            $resultArr_class = 
                    [
                        
                        'medium' => $medium,
                        'r_count' => $res_arr_class_rat,
                        'k_count' => $res_arr_class_keg,
                        'p_count' => $p_count,
                    ];

            array_push($deg_class_count, $resultArr_class);

        }
        $resultArr_class_csa = 
                    [
                        
                        'medium' => 'Total',
                        'r_count' => $r_all,
                        'k_count' => $k_all,
                        'p_count' => $all,
                    ];

        $result_send = [
            'res_001'=> $deg_class_count,
            'res_002' => $resultArr_class_csa
        ];

        return $result_send;
    }

    function byResult($dataArr)
    {
        $results = ['First','Second Upper','Second Lower', 'General'];
        $res_arr_class_rat=[];
        $res_arr_class_keg=[];
        $deg_class_count=[];
        $all =  DB::table('degree_view_one')->where('year', '=', $dataArr['reg_year'])->count(); 
        $r_all =  DB::table('degree_view_one')->where('ds_id', '=', '2')->where('year', '=', $dataArr['reg_year'])->count(); 
        $k_all =  DB::table('degree_view_one')->where('ds_id', '=', '1')->where('year', '=', $dataArr['reg_year'])->count(); 
        
        foreach ($results as $result) {
            $res_arr_class_rat =  DB::table('degree_view_one')
                ->where('deg_class', '=', $result)
                ->where('year', '=', $dataArr['reg_year'])
                ->where('ds_id', '=', '2')
                ->count(); 

            $res_arr_class_keg =  DB::table('degree_view_one')
                ->where('deg_class', '=', $result)
                ->where('year', '=', $dataArr['reg_year'])
                ->where('ds_id', '=', '1')
                ->count(); 

            $p_count = $res_arr_class_rat + $res_arr_class_keg;

            $resultArr_class = 
                    [
                        'result' => $result,
                        'r_count' => $res_arr_class_rat,
                        'k_count' => $res_arr_class_keg,
                        'p_count' => $p_count,
                    ];

            array_push($deg_class_count, $resultArr_class);
        }
        $resultArr_class_csa = 
                    [
                        'result' => 'Total',
                        'r_count' => $r_all,
                        'k_count' => $k_all,
                        'p_count' => $all,
                    ];

                    $result_send = [
                        'res_001'=> $deg_class_count,
                        'res_002' => $resultArr_class_csa
                    ];

        return $result_send;
    }

    function bySpeciality($dataArr)
    {
        $specialities = ['Special', 'General'];
        $res_arr_class_rat=[];
        $res_arr_class_keg=[];
        $deg_class_count=[];
        $all =  DB::table('degree_view_one')->where('year', '=', $dataArr['reg_year'])->count(); 
        $r_all =  DB::table('degree_view_one')->where('ds_id', '=', '2')->where('year', '=', $dataArr['reg_year'])->count(); 
        $k_all =  DB::table('degree_view_one')->where('ds_id', '=', '1')->where('year', '=', $dataArr['reg_year'])->count(); 
        
        foreach ($specialities as $speciality) {
            $res_arr_class_rat =  DB::table('degree_view_one')
                ->where('deg_type', '=', $speciality)
                ->where('year', '=', $dataArr['reg_year'])
                ->where('ds_id', '=', '2')
                ->count(); 

            $res_arr_class_keg =  DB::table('degree_view_one')
                ->where('deg_type', '=', $speciality)
                ->where('year', '=', $dataArr['reg_year'])
                ->where('ds_id', '=', '1')
                ->count(); 

            $p_count = $res_arr_class_rat + $res_arr_class_keg;

            $resultArr_class = 
                    [
                        'speciality' => $speciality,
                        'r_count' => $res_arr_class_rat,
                        'k_count' => $res_arr_class_keg,
                        'p_count' => $p_count,
                    ];

            array_push($deg_class_count, $resultArr_class);
        }
        $resultArr_class_csa = 
                    [
                        'speciality' => 'Total',
                        'r_count' => $r_all,
                        'k_count' => $k_all,
                        'p_count' => $all,
                    ];

                    $result_send = [
                        'res_001'=> $deg_class_count,
                        'res_002' => $resultArr_class_csa
                    ];

        return $result_send;
    }

}