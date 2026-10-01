<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tbl_district extends Model
{
    protected $table = 'tbl_districts';
    protected $primaryKey = 'district_id';
    protected $fillable = ['district_name'];
}
