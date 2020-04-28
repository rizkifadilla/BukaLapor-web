<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $table = 'notifications';
    protected $fillable = ['id_user','id_admin','id_report', 'id_report_action', 'status'];
}
