<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\tbl_location;
use App\Models\tbl_login;

class tbl_buyer extends Model
{
    protected $table = 'tbl_buyers';
    protected $primaryKey = 'buyer_id';
    protected $fillable = [
        'buyer_name',
        'buyer_email',
        'buyer_type',
        'buyer_phone',
        'buyer_address',
        'buyer_status',
        'registration_date',
        'location_id',
        'login_id',
    ]; 
    public function location()
    {
        return $this->belongsTo(tbl_location::class, 'location_id', 'location_id');
    }   
    public function login()
    {
        return $this->belongsTo(tbl_login::class, 'login_id', 'login_id');
    }
    
}
