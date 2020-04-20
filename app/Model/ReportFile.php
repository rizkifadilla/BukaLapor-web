<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ReportFile extends Model
{
    protected $table = 'report_files';
    protected $fillable = ['id_user','id_report', 'file'];
}
