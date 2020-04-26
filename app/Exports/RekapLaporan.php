<?php

namespace App\Exports;
use App\Model\Report;
use App\Model\Instance;
use Auth;

use Maatwebsite\Excel\Concerns\FromCollection;

class RekapLaporan implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $id_instance = Instance::where('id_user', Auth::user()->id)->first()->id;
        return Report::where('id_instance', $id_instance)->get();
    }
}
