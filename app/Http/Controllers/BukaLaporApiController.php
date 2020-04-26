<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Model\Master\Zone\Province;
use App\Model\InstanceType;
use App\Model\InstanceService;
use App\Model\Instance;
use App\Model\Report;
use App\Model\ReportFile;
use App\Model\ReportAction;
use App\Model\ReportComment;
use App\Model\ReportSupport;
use Auth,Storage,File,DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\RekapLaporan;

class BukaLaporApiController extends Controller
{
    public function report_api()
    {
        return Report::all();
    }
    public function create_report_api(Request $request)
    {
        $id_instance = Instance::where('id_intance_service',$request->post('seen'))->first()->id;
        $report = new Report;
        $report->id_user = 1;
        $report->id_instance = $id_instance;
        $report->title = $request->post('title');
        $report->subtitle = $request->post('subtitle');
        $report->status = 'Waiting';
        $report->save();

        return "berhasil Dimasukan";
    }
}
