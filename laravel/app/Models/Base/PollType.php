<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class PollType
 *
 * @property int $id
 * @property string $type
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @package App\Models\Base
 * @method static \Illuminate\Database\Eloquent\Builder|PollType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PollType newQuery()
 * @method static \Illuminate\Database\Query\Builder|PollType onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|PollType query()
 * @method static \Illuminate\Database\Eloquent\Builder|PollType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PollType whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PollType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PollType whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PollType whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|PollType withTrashed()
 * @method static \Illuminate\Database\Query\Builder|PollType withoutTrashed()
 * @mixin \Eloquent
 */
class PollType extends Model
{
    use SoftDeletes;
    protected $table = 'poll_types';
}
