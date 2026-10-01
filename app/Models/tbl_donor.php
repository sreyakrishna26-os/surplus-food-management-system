<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\tbl_location;

class tbl_donor extends Model
{
    protected $table = 'tbl_donors';

    protected $primaryKey = 'donor_id';

    protected $fillable = [
        'login_id',
        'donor_name',
        'donor_email',
        'donor_phone',
        'donor_address',
        'id_proof',
        'reg_date',
        'location_id',
        'license_number',
        'status',
    ];

    public function location()
    {
        return $this->belongsTo(
            tbl_location::class,
            'location_id',
            'location_id'
        );
    }

    // Login relationship
    public function login()
    {
        return $this->belongsTo(
            tbl_login::class,
            'login_id',
            'login_id'
        );
    }
}