<?php

namespace App\Models;

use App\Models\Base\Poll as BasePoll;

/**
 * App\Models\Poll
 *
 * @property int $id
 * @property string $title
 * @property int $poll_type_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\PollType $pollType
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\PollQuestion[] $questions
 * @property-read int|null $questions_count
 * @method static \Illuminate\Database\Eloquent\Builder|Poll newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Poll newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Poll query()
 * @method static \Illuminate\Database\Eloquent\Builder|Poll whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Poll whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Poll wherePollTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Poll whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Poll whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property mixed|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\PollResult[] $results
 * @property-read int|null $results_count
 * @method static \Illuminate\Database\Eloquent\Builder|Poll whereDeletedAt($value)
 */
class Poll extends BasePoll
{
	protected $fillable = [
		'text',
		'poll_type_id'
	];

    protected $casts = [
        'poll_type_id' => 'int',
        'created_at' => 'datetime:m/d/Y h:i:sa',
        'updated_at' => 'datetime:m/d/Y h:i:sa',
        'deleted_at' => 'datetime:m/d/Y h:i:sa',
    ];

    public function questions()
    {
        return $this->hasMany(PollQuestion::class);
    }

    public function pollType()
    {
        return $this->belongsTo(PollType::class);
    }

    public function results()
    {
        return $this->hasMany(PollResult::class);
    }
}
