<?php

namespace Jubilee\Click108\Entries;

use Carbon\Carbon;
use Closure;
use Illuminate\Database\Eloquent\Builder as ORMBuilder;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TwelveConstellations
 * @package Jubilee\Click108\Entries
 * @method static null|$this find($id)
 * @method static null|$this first($columns = ['*'])
 * @method static ORMBuilder where($column, $operator = null, $value = null, $boolean = 'and')
 * @method static ORMBuilder whereIn($column, $value = null, $boolean = 'and', $not = false)
 * @method static ORMBuilder whereHas($relation, Closure $callback = null, $operator = '>=', $count = 1)
 * @method static ORMBuilder with($relations)
 * @method static Model updateOrCreate(array $attributes, array $values = [])
 * @property string name
 * @property int entire_score
 * @property string entire_content
 * @property int love_score
 * @property string love_content
 * @property int career_score
 * @property string career_content
 * @property int fortune_score
 * @property string fortune_content
 * @property Carbon day
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class TwelveConstellations extends Model
{
    protected $table = 'twelve_constellations';
    protected $fillable = [
        'name',
        'entire_score',
        'entire_content',
        'love_score',
        'love_content',
        'career_score',
        'career_content',
        'fortune_score',
        'fortune_content',
        'day',
    ];
}
