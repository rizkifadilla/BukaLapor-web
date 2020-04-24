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
use Auth,Storage,File,DB;

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
    public function report_detail_user($id)
    {
        $report = Report::where('id', $id)->first();
        $files = ReportFile::where('id_report', $id)->get();
        $actions = ReportAction::where('id_report', $id)->get();
        $comments = ReportComment::where('id_report', $id)->get();
        $supports = ReportSupport::where('id_report', $id)->get();

        return view('user/reportDetail', compact('report','files','actions','comments','supports'));
    }
    public function addedReportComment(Request $request)
    {
        $id_report = $request->post('id_report');
        $comment = new ReportComment;
        $comment->id_user = Auth::user()->id;
        $comment->id_report = $id_report;
        $comment->content = $request->post('comment');
        $comment->save();

        return redirect()->route('indexReportDetailUser', [$id_report]);
    }
    public function done_report_user($id)
    {
        DB::table('reports')
              ->where('id', $id)
              ->update(['status' => "Done"]);

        return redirect()->route('indexReportDetailUser', [$id]);
    }
    public function delete_report($id)
    {
        DB::table('reports')
              ->where('id', $id)
              ->delete();

        return redirect()->route('indexMyReport');
    }
    public function delete_comment($id,$id_report)
    {
        DB::table('report_comments')
              ->where('id', $id)
              ->delete();

        return redirect()->route('indexReportDetailUser', [$id_report]);
    }
    public function response_user(Request $request)
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
        
        return redirect()->route('indexReportDetailUser', [$id_report]);
    }
    public function delete_response_user($id, $id_report)
    {
        DB::table('report_actions')
              ->where('id', $id)
              ->delete();

        return redirect()->route('indexReportDetailUser', [$id_report]);
    }
}
