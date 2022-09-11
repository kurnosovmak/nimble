<?php

namespace App\Models;

use App\Http\Filters\Filterable;
use App\Traits\Uuids;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Query\Builder;

/**
 * App\Http\Requests\Auth\LoginRequest
 * @mixin Builder
 */
class Stream extends Model
{
    use HasFactory, Filterable;

    protected $guarded = ['id'];

    /**
     * @return HasOne
     */
    public function user(): HasOne
    {
        return $this->hasOne(User::class,'id','user_id');
    }

    /**
     * @return HasOne
     */
    public function image(): HasOne
    {
        return $this->hasOne(Image::class,'id','image_id');
    }


}
