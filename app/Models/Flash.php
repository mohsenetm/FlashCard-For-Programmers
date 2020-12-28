<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

/**
 * App\Models\Flash
 *
 * @property int $id
 * @property int $user_id
 * @property int $deck_id
 * @property string $title
 * @property string|null $html
 * @property string|null $php
 * @property string|null $javascript
 * @property string|null $mysql
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Flash newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Flash newQuery()
 * @method static \Illuminate\Database\Query\Builder|Flash onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Flash query()
 * @method static \Illuminate\Database\Eloquent\Builder|Flash where($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Flash whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Flash whereDeckId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Flash whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Flash whereHtml($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Flash whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Flash whereJavascript($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Flash whereMysql($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Flash wherePhp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Flash whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Flash whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Flash whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|Flash withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Flash withoutTrashed()
 * @method static Flash create($value)
 * @method paginate(int $int)
 * @mixin \Eloquent
 */
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
