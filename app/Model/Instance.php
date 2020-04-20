<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Instance extends Model
{
    protected $table = 'instances';
    protected $fillable = ['id_intance_type','id_intance_service', 'id_province', 'id_district', 'id_subdistrict', 'name', 'address'];
}
