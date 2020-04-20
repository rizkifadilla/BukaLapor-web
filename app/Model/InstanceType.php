<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class InstanceType extends Model
{
    protected $table = 'instance_types';
    protected $fillable = ['index', 'name'];
}
