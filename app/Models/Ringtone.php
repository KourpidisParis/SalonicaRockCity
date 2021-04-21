<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ringtone extends Model
{
    protected $guarded = [];

    public function category(){
        return $this->hasOne(Category::class,'id','category_id');
    }
}
