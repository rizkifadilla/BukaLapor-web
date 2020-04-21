<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Master\Zone\Province;
use App\Model\InstanceType;
use App\Model\InstanceService;
use App\Model\Instance;
use App\Model\Report;
use App\Model\ReportFile;
use Auth,Storage,File,Response;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function district($id)
    {
        $district = District::where('m_zone_provinces_id', $id)->get();
        return Response::json($district);
    }
    public function subDistrict($id_province,$id_district)
    {
        $subDistrict = SubDistrict::where('m_zone_provinces_id', $id_province)
                                    ->where('m_zone_districts_id', $id_district)
                                    ->get();
        return Response::json($subDistrict);
    }
}
