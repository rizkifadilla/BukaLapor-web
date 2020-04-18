<?php

namespace App\Model\Master\Zone;

use Illuminate\Database\Eloquent\Model;

class Subdistrict extends Model
{
    protected $table = 'm_zones_subdistrict';
    protected $fillable = ['m_zone_provinces_id','m_zone_districts_id','index', 'name'];

    public $timestamps = false;

    public function province()
    {
        return $this->hasMany(District::class);
    }
    public function districts()
    {
        return $this->hasMany(Subdistrict::class);
    }
}
