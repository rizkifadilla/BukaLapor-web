<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ReportAction extends Model
{
    protected $table = 'report_actions';
    protected $fillable = ['id_user','id_report', 'content'];
}
