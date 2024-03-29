<?php

namespace App\Http\Controllers;

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
use App\Model\Notification;
use Auth,Storage,File,DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use App\Exports\RekapLaporan;

class InstanceController extends Controller
{
    public function instance_data()
    {
        $instance = Instance::where('id_user',Auth::user()->id)->first();
        if($instance == null){
            $provinces = Province::all();
            $InstanceTypes = InstanceType::all();
            $InstanceServices = InstanceService::all();
            return view('instance.instanceData', compact('provinces', 'InstanceTypes', 'InstanceServices','instance'));
        }else{
            return view('instance.instanceData', compact('instance'));
        }
        
    }
    public function addedInstanceData(Request $request)
    {
        $instance = new Instance;
        $instance->id_intance_type = $request->post('instanceType');
        $instance->id_intance_service = $request->post('instanceService');
        $instance->id_province = $request->post('province');
        $instance->id_district = $request->post('district');
        $instance->id_subdistrict = $request->post('subDistrict');
        $instance->id_user = Auth::user()->id;
        $instance->name = $request->post('name');
        $instance->address = $request->post('address');
        $instance->save();

        return redirect()->route('indexInstanceData');
    }
    public function report_data()
    {
        $reports = Report::where('status',"Verified")->orWhere('status',"Process")->get();

        return view('instance/reportData', compact('reports'));
    }
    public function report_details_instance($id)
    {
        $report = Report::where('id', $id)->first();
        $files = ReportFile::where('id_report', $report->id)->get();
        $actions = ReportAction::where('id_report', $id)->where('id_user', Auth::user()->id)->get();

        return view('instance.reportDetails', compact('report','files','actions'));
    }
    public function response(Request $request)
    {
        $id_report = $request->post('id_report');

        $message = new ReportAction;
        $message->id_user = Auth::user()->id;
        $message->id_report = $id_report;
        $message->content = $request->post('message');
        $message->save();

        $notif = new Notification;
        $notif->id_user = Report::where('id', $id_report)->first()->id_user;
        $notif->id_admin = Auth::user()->id;
        $notif->id_report = $id_report;
        $notif->id_report_action = $message->id;
        $notif->status = "New";
        $notif->save();

        DB::table('reports')
              ->where('id', $id_report)
              ->update(['status' => "Process"]);

        return redirect()->route('reportDetailsInstance',[$id_report]);
    }
    public function delete_response($id, $id_report)
    {
        DB::table('report_actions')
              ->where('id', $id)
              ->delete();
        
        return redirect()->route('reportDetailsInstance',[$id_report]);
    }
    public function report_done()
    {
        $reports = Report::where('status',"Verified")->orWhere('status',"Done")->get();

        return view('instance/reportDone', compact('reports'));
    }
    public function export()
    {
        return Excel::download(new RekapLaporan, 'Data Laporan.xlsx');
    }
}
