<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Poll
 *
 * @property int $id
 * @property string $title
 * @property int $poll_type_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @package App\Models\Base
 * @method static \Illuminate\Database\Eloquent\Builder|Poll newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Poll newQuery()
 * @method static \Illuminate\Database\Query\Builder|Poll onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Poll query()
 * @method static \Illuminate\Database\Eloquent\Builder|Poll whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Poll whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Poll whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Poll wherePollTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Poll whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Poll whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Poll withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Poll withoutTrashed()
 * @mixin \Eloquent
 */
class Poll extends Model
{
    use SoftDeletes;
    protected $table = 'polls';

    protected $casts = [
        'poll_type_id' => 'int'
    ];
}
