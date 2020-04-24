<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ReportComment extends Model
{
    protected $table = 'report_comments';
    protected $fillable = ['id_user','id_report', 'content'];
}
