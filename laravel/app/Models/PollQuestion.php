<?php

namespace App\Models;

use App\Models\Base\PollQuestion as BasePollQuestion;

/**
 * App\Models\PollQuestion
 *
 * @property int $id
 * @property int $poll_id
 * @property string $question
 * @property bool $is_int
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Poll $poll
 * @method static \Illuminate\Database\Eloquent\Builder|PollQuestion newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PollQuestion newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PollQuestion query()
 * @method static \Illuminate\Database\Eloquent\Builder|PollQuestion whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PollQuestion whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PollQuestion whereIsInt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PollQuestion wherePollId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PollQuestion whereQuestion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PollQuestion whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property mixed|null $deleted_at
 * @property-read \App\Models\PollResult|null $result
 * @method static \Illuminate\Database\Eloquent\Builder|PollQuestion whereDeletedAt($value)
 */
class PollQuestion extends BasePollQuestion
{
	protected $fillable = [
		'poll_id',
		'question',
		'is_int'
	];

    protected $casts = [
        'poll_id' => 'int',
        'is_int' => 'bool',
        'created_at' => 'datetime:m/d/Y h:i:sa',
        'updated_at' => 'datetime:m/d/Y h:i:sa',
        'deleted_at' => 'datetime:m/d/Y h:i:sa',
    ];

    public function poll()
    {
        return $this->belongsTo(Poll::class);
	}

    public function result()
    {
        return $this->hasOne(PollResult::class, 'poll_question_id', 'id');
	}
}
