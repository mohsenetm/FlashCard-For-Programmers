<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\FlashCategory
 *
 * @method static \Illuminate\Database\Eloquent\Builder|FlashCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FlashCategory newQuery()
 * @method static \Illuminate\Database\Query\Builder|FlashCategory onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|FlashCategory query()
 * @method static \Illuminate\Database\Query\Builder|FlashCategory withTrashed()
 * @method static \Illuminate\Database\Query\Builder|FlashCategory withoutTrashed()
 * @mixin \Eloquent
 */
class FlashCategory extends Model
{
    use HasFactory;
    use SoftDeletes;
}
