<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class InstanceService extends Model
{
    protected $table = 'instance_services';
    protected $fillable = ['index', 'name'];
}
