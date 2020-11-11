<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class PollQuestion
 *
 * @property int $id
 * @property int $poll_id
 * @property string $question
 * @property bool $is_int
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @package App\Models\Base
 * @method static \Illuminate\Database\Eloquent\Builder|PollQuestion newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PollQuestion newQuery()
 * @method static \Illuminate\Database\Query\Builder|PollQuestion onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|PollQuestion query()
 * @method static \Illuminate\Database\Eloquent\Builder|PollQuestion whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PollQuestion whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PollQuestion whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PollQuestion whereIsInt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PollQuestion wherePollId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PollQuestion whereQuestion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PollQuestion whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|PollQuestion withTrashed()
 * @method static \Illuminate\Database\Query\Builder|PollQuestion withoutTrashed()
 * @mixin \Eloquent
 */
class PollQuestion extends Model
{
    use SoftDeletes;
    protected $table = 'poll_questions';

    protected $casts = [
        'poll_id' => 'int',
        'is_int' => 'bool'
    ];
}
