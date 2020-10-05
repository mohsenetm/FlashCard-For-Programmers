<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Deck extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable=['title','time_period'];
    protected $dateFormat="U";

    public static function booted()
    {
        static::creating(function ($deck){
            $deck->user_id=Auth::user()->getAuthIdentifier();
        });
    }

    public function getCreatedAtAttribute($value){
        return $value;
    }

    public function getUpdatedAtAttribute($value){
        return $value;
    }

}
