<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Master\Zone\Province;
use App\Model\InstanceType;
use App\Model\InstanceService;
use App\Model\Instance;
use Auth;

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
}
