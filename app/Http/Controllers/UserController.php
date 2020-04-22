<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Master\Zone\Province;
use App\Model\InstanceType;
use App\Model\InstanceService;
use App\Model\Instance;
use App\Model\Report;
use App\Model\ReportFile;
use Auth,Storage,File;

class UserController extends Controller
{
    public function report_form()
    {
        $categorys = InstanceService::all();
        return view('user/homeUser', compact('categorys'));
    }
    public function addedReportData(Request $request)
    {
        $id_instance = Instance::where('id_intance_service',$request->post('seen'))->first()->id;
        $report = new Report;
        $report->id_user = Auth::user()->id;
        $report->id_instance = $id_instance;
        $report->title = $request->post('title');
        $report->subtitle = $request->post('subtitle');
        $report->status = 'Waiting';
        $report->save();

        if($request->file('lampiran') != null){
            $file                           = $request->file('lampiran');
            $fileeks                        = $file->getClientOriginalExtension();
            $filename                       = Auth::user()->id."-".$report->id."_".rand(11111,99999).".".$fileeks;
            Storage::disk('public_fileLampiran')->put($filename, File::get($file));
            $file = new ReportFile;
            $file->id_user = Auth::user()->id;
            $file->id_report = $report->id;
            $file->file = $filename;
            $file->save();
            return redirect('user/report-form');
        }
        return redirect('user/report-form');
    }
    public function my_report()
    {
        $allReports = Report::all();
        $myReports = Report::where('id_user', Auth::user()->id)->get();

        return view('user.myReport', compact('allReports','myReports'));
    }
}
