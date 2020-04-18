<?php

namespace App\Model\Master\Zone;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $table = 'm_zone_districts';
    protected $fillable = ['m_zone_provinces_id','index', 'name'];

    public $timestamps = false;

    public function districts()
    {
        return $this->belongsTo(District::class);
    }
    public function subdistricts()
    {
        return $this->hasMany(Subdistrict::class);
    }
}
