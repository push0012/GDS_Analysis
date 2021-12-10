<?php

namespace App\Services;

use Auth;
use DB;

class GraduateReportGenerator {

    function byDistrict($dataArr)
    {
        $ratnapura_count = DB::table('degree_view_one')->where('ds_name','=','Rathnapura');
        if ($dataArr['reg_year'] != '0') 
        {
            $ratnapura_count = $ratnapura_count->where('year', '=', $dataArr['reg_year']);
        }
        
        $ratnapura_count_result = $ratnapura_count->count();
        //echo "comes here";
        
        $kegalle_count= DB::table('degree_view_one')->where('ds_name','=','Kegalle');
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

}