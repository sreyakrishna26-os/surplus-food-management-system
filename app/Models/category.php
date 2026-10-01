<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    protected $primaryKey='cid';
    protected $fillable=['cname'];
}
