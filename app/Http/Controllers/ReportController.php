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
            if($request['report_id'] == 3)
            {
                $recordArrKeg = $reportGenerator->byDivisionKegalle($dataArr);
                $recordArrRat = $reportGenerator->byDivisionRatnapura($dataArr);
                //return $recordArr;
                return view('pages.report.report_bydivision', 
                    [
                        'results_keg'=>$recordArrKeg , 
                        'results_rat'=>$recordArrRat 
                    ]
                );
            }

            if($request['report_id'] == 4)
            {
                $recordArr = $reportGenerator->byStream($dataArr);
                
                //return $recordArr;
                return view('pages.report.report_bystream', 
                    [
                        'results'=>$recordArr , 
                       
                    ]
                );
            }

            if($request['report_id'] == 5)
            {
                $recordArr = $reportGenerator->byMedium($dataArr);
                
                //return $recordArr;
                return view('pages.report.report_bymedium', 
                    [
                        'results'=>$recordArr , 
                       
                    ]
                );
            }

            if($request['report_id'] == 6)
            {
                $recordArr = $reportGenerator->byResult($dataArr);
                
                //return $recordArr;
                return view('pages.report.report_byresult', 
                    [
                        'results'=>$recordArr , 
                       
                    ]
                );
            }
            
            if($request['report_id'] == 9)
            {
                $recordArr = $reportGenerator->bySpeciality($dataArr);
                
                //return $recordArr;
                return view('pages.report.report_byspeciality', 
                    [
                        'results'=>$recordArr , 
                       
                    ]
                );
            }
        }
    }
}
