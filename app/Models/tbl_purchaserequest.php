<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\tbl_buyer;
use App\Models\tbl_food;
use App\Models\tbl_payment;



class tbl_purchaserequest extends Model
{
    protected $table = 'tbl_purchaserequests';

    protected $primaryKey = 'request_id';

    protected $fillable = [
        'buyer_id',
        'food_id',
        'request_quantity',
        'request_date',
        'status',
        'total_amount',
    ];

    public function buyer()
    {
        return $this->belongsTo(tbl_buyer::class, 'buyer_id', 'buyer_id');
    }

    public function food()
    {
        return $this->belongsTo(tbl_food::class, 'food_id', 'food_id');
    }

public function payment()
{
    return $this->hasOne(
        tbl_payment::class,
        'request_id',
        'request_id'
    )->where('payment_status', 'Paid');
}
}