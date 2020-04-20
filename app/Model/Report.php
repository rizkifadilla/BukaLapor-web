<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $table = 'reports';
    protected $fillable = ['id_user','id_intance', 'id_intance_units', 'title', 'subtitle', 'seen', 'status'];
}
