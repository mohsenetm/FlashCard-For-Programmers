<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

/**
 * App\Models\Deck
 *
 * @property int $id
 * @property int $user_id
 * @property string $title
 * @property string $time_period
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Deck newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Deck newQuery()
 * @method static \Illuminate\Database\Query\Builder|Deck onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Deck query()
 * @method static \Illuminate\Database\Eloquent\Builder|Deck whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Deck whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Deck whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Deck whereTimePeriod($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Deck whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Deck whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Deck whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|Deck withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Deck withoutTrashed()
 * @method static Deck delete()
 * @method static Deck find($value)
 * @method static Deck create($value)
 * @mixin \Eloquent
 */
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
