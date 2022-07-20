<?php

namespace App\Models\Scopes;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class AdNotExpiredScope implements Scope
{
    public function apply(Builder $builder, Model $model)
    {
        $builder->where('expires_at', '>', Carbon::parse($model->published_at ?? $model->created_at));
    }
}
