<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function added_instance()
    {
        return view('admin/addedInstance');
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
}
