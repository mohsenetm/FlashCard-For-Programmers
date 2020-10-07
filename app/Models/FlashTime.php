<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\FlashTime
 *
 * @property int $id
 * @property int $flash_id
 * @property int $period
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|FlashTime newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FlashTime newQuery()
 * @method static \Illuminate\Database\Query\Builder|FlashTime onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|FlashTime query()
 * @method static \Illuminate\Database\Eloquent\Builder|FlashTime whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FlashTime whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FlashTime whereFlashId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FlashTime whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FlashTime wherePeriod($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FlashTime whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|FlashTime withTrashed()
 * @method static \Illuminate\Database\Query\Builder|FlashTime withoutTrashed()
 * @method static FlashTime create($value)
 * @mixin \Eloquent
 */
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
