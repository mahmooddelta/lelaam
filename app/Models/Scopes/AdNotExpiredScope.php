<?php

namespace App\Models\Scopes;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Route;
use function request;

class AdNotExpiredScope implements Scope
{
    public function apply(Builder $builder, Model $model)
    {
        if (! (Route::is('chat') || Route::is('chat.*') || Route::is('conversation.*')
            || \request()->is('api/*/chat') || \request()->is('api/*/conversation')
            || \request()->is('api/*/post/*/update') || \request()->is('api/*/post/*/edit')
            || request()->is('api/*/conversations') || request()->is('post/*/edit'))) {
            $builder->where('expires_at', '>', Carbon::parse($model->published_at ?? $model->created_at));
        }
    }
}
