<?php

namespace App\Models;

use App\Models\Base\PollType as BasePollType;

/**
 * App\Models\PollType
 *
 * @property int $id
 * @property string $type
 * @property mixed|null $created_at
 * @property mixed|null $updated_at
 * @property-read \App\Models\Poll|null $poll
 * @method static \Illuminate\Database\Eloquent\Builder|PollType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PollType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PollType query()
 * @method static \Illuminate\Database\Eloquent\Builder|PollType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PollType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PollType whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PollType whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property mixed|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|PollType whereDeletedAt($value)
 */
class PollType extends BasePollType
{
	protected $fillable = [
		'type'
	];

    protected $casts = [
        'created_at' => 'datetime:m/d/Y h:i:sa',
        'updated_at' => 'datetime:m/d/Y h:i:sa',
        'deleted_at' => 'datetime:m/d/Y h:i:sa',
    ];

    public function poll()
    {
        return $this->hasOne(Poll::class);
	}
}
