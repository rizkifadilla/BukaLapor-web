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
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function added_instance()
    {
        return view('admin.addedInstance');
    }
    public function addedInstance(Request $request)
    {
        $addedInstance = new User;
        $addedInstance->username = $request->post('username');
        $addedInstance->email = $request->post('email');
        $addedInstance->password = Hash::make($request->post('password'));
        $addedInstance->role = 'Instance';

        $addedInstance->save();

        return redirect('admin/added-instance');
    }
    public function report_verification()
    {
        $reports = Report::where('status',"Waiting")->get();

        return view('admin.reportVerification',compact('reports'));
    }
    public function report_details($id)
    {
        $report = Report::where('id', $id)->first();
        $files = ReportFile::where('id_report', $report->id)->get();

        return view('admin.reportDetails', compact('report','files'));
    }
    public function accept($id)
    {
        DB::table('reports')
              ->where('id', $id)
              ->update(['status' => "Verified"]);
        
        return redirect('admin/report-verification');
    }
    public function reject(Request $request)
    {
        $id_report = $request->post('id_report');

        $message = new ReportAction;
        $message->id_user = Auth::user()->id;
        $message->id_report = $id_report;
        $message->content = $request->post('message');
        $message->save();
        
        DB::table('reports')
              ->where('id', $id_report)
              ->update(['status' => "Not Verified"]);

        return redirect('admin/report-verification');
    }
}
