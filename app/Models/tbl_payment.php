<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\tbl_purchaserequest;

class tbl_payment extends Model
{
    protected $table = 'tbl_payments';
    protected $primaryKey = 'payment_id';
    protected $fillable = [
        'request_id',
        'total_amount',
        'payment_date',
        'payment_status',
    ];

     public function purchaseRequest()
    {
        return $this->belongsTo(
            tbl_purchaserequest::class,
            'request_id',
            'request_id'
        );
    }
}