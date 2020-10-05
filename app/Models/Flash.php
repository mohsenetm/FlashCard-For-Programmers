<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Flash extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $dateFormat="U";
    protected $guarded=[];

    public static function booted()
    {
        static::creating(function ($flash){
            $flash->user_id=Auth::id();
        });
    }

    public function getCreatedAtAttribute($value){
        return $value;
    }

    public function getUpdatedAtAttribute($value){
        return $value;
    }
}
