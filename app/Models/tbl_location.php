<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tbl_location extends Model
{
    protected $table = 'tbl_locations';
    protected $primaryKey = 'location_id';
    protected $fillable = ['location_name', 'district_id']; 
    public function district()
    {
        return $this->belongsTo(tbl_district::class, 'district_id', 'district_id');
    }   
}
