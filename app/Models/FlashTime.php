<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FlashTime extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded=[];
    protected $dateFormat="U";

    public function getCreatedAtAttribute($value){
        return $value;
    }

    public function getUpdatedAtAttribute($value){
        return $value;
    }
}
