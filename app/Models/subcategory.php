<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class subcategory extends Model
{
  protected $primaryKey = 'sid';
  protected $fillable = ['sname', 'cid']; 
  public function category()
  {
      return $this->belongsTo(Category::class, 'cid', 'cid');
  } 
}
