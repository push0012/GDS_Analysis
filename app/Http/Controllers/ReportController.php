<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\GraduateReportGenerator;

use DB;
class ReportController extends Controller
{
    public function index()
    {
        $years = DB::table('degree_view_one')->select('year')->groupBy('year')->get();

        return view('pages.report.report_form', 
            [
                'years' => $years
            ]
        );
    }

    public function report(Request $request)
    {
        $dataArr = $request->all();
        $reportGenerator = new GraduateReportGenerator();

        if($request['survay_id'] == 1)
        {
            if($request['report_id'] == 1)
            {
                $recordArr = $reportGenerator->byDistrict($dataArr);
                return view('pages.report.report_bydistrict', ['results'=>$recordArr ]);
            }
            if($request['report_id'] == 2)
            {
                $recordArr = $reportGenerator->byGender($dataArr);
                return view('pages.report.report_bygender', ['results'=>$recordArr ]);
            }
        }
    }
}
