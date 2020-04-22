<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Master\Zone\Province;
use App\Model\InstanceType;
use App\Model\InstanceService;
use App\Model\Instance;
use App\Model\ReportAction;
use App\User;
use App\Model\Report;
use App\Model\ReportFile;
use Auth,Storage,File,DB;

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

        return view('instance.reportDetails', compact('report','files'));
    }
    public function response(Request $request)
    {
        $id_report = $request->post('id_report');

        $message = new ReportAction;
        $message->id_user = Auth::user()->id;
        $message->id_report = $id_report;
        $message->content = $request->post('message');
        $message->save();
        DB::table('reports')
              ->where('id', $id_report)
              ->update(['status' => "Process"]);

        return redirect('instance/report-data');
    }
}
