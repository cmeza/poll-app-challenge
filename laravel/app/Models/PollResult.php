<?php

namespace App\Models;

use App\Models\Base\PollResult as BasePollResult;

/**
 * App\Models\PollResult
 *
 * @property int $id
 * @property int $poll_id
 * @property int $poll_question_id
 * @property string $value
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|PollResult newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PollResult newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PollResult query()
 * @method static \Illuminate\Database\Eloquent\Builder|PollResult whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PollResult whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PollResult wherePollQuestionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PollResult whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PollResult whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PollResult whereValue($value)
 * @mixin \Eloquent
 * @property mixed|null $deleted_at
 * @property-read \App\Models\Poll $poll
 * @property-read \App\Models\PollQuestion $question
 * @method static \Illuminate\Database\Eloquent\Builder|PollResult whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PollResult wherePollId($value)
 */
class PollResult extends BasePollResult
{
	protected $fillable = [
		'poll_id',
		'poll_question_id',
		'value'
	];

    protected $casts = [
        'poll_id' => 'int',
        'poll_question_id' => 'int',
        'created_at' => 'datetime:m/d/Y h:i:sa',
        'updated_at' => 'datetime:m/d/Y h:i:sa',
        'deleted_at' => 'datetime:m/d/Y h:i:sa',
    ];

    public function poll()
    {
        return $this->belongsTo(Poll::class);
    }

    public function question()
    {
        return $this->belongsTo(PollQuestion::class, 'poll_question_id', 'id');
    }
}
