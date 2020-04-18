<?php

namespace App\Model\Master\Zone;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $table = 'm_zones_province';
    protected $fillable = ['index', 'name'];

    public $timestamps = false;

    public function districts()
    {
        return $this->hasMany(District::class);
    }
}
