<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ReportSupport extends Model
{
    protected $table = 'report_supports';
    protected $fillable = ['id_user','id_report'];
}
