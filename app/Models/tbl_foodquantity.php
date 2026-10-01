<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tbl_foodquantity extends Model
{
    protected $table = 'tbl_foodquantities';
    protected $primaryKey = 'quantity_id';
    protected $fillable = [
        'quantity_id',
        'food_id',
        'balquantity',
    ];
    public function food()
    {
        return $this->belongsTo(tbl_food::class, 'food_id', 'food_id');
    }   
}
