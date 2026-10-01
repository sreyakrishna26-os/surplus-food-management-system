<?php

namespace App\Models;
use App\Models\tbl_donor;
use App\Models\subcategory;
use App\Models\tbl_foodquantity;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class tbl_food extends Model
{
    use SoftDeletes;
    protected $table = 'tbl_foods';

    protected $primaryKey = 'food_id';

    protected $fillable = [
        'food_name',
        'food_type',
        'food_quantity',
        'food_price',
        'food_offerprice',
        'food_image',
        'food_expiry_date',
        'food_regdate',
        'donor_id',
        'sid',
        'status',
    ];

    protected $casts = [
    'food_expiry_date' => 'date',
    'food_regdate' => 'datetime',
    'deleted_at' => 'datetime',
];

    /*
    |--------------------------------------------------------------------------
    | Donor Relationship
    |--------------------------------------------------------------------------
    */

    public function donor()
    {
        return $this->belongsTo(
            tbl_donor::class,
            'donor_id',
            'donor_id'
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Category Relationship
    |--------------------------------------------------------------------------
    */

     public function subcategory()
    {
        return $this->belongsTo(
            subcategory::class,
            'sid',
            'sid'
        );
    }
    

    public function quantity()
    {
        return $this->hasOne(
            tbl_foodquantity::class,
            'food_id',
            'food_id'
        );
    }
}