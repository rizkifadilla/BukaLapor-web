<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use App\Model\Master\Zone\District;
use App\Model\Master\Zone\Subdistrict;

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
