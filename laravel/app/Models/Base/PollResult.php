<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class PollResult
 *
 * @property int $id
 * @property int $poll_id
 * @property int $poll_question_id
 * @property string $value
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @package App\Models\Base
 * @method static \Illuminate\Database\Eloquent\Builder|PollResult newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PollResult newQuery()
 * @method static \Illuminate\Database\Query\Builder|PollResult onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|PollResult query()
 * @method static \Illuminate\Database\Eloquent\Builder|PollResult whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PollResult whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PollResult whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PollResult wherePollId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PollResult wherePollQuestionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PollResult whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PollResult whereValue($value)
 * @method static \Illuminate\Database\Query\Builder|PollResult withTrashed()
 * @method static \Illuminate\Database\Query\Builder|PollResult withoutTrashed()
 * @mixin \Eloquent
 */
class PollResult extends Model
{
    use SoftDeletes;
    protected $table = 'poll_results';

    protected $casts = [
        'poll_id' => 'int',
        'poll_question_id' => 'int'
    ];
}
