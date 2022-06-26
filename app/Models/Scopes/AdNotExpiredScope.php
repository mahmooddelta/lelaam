<?php

namespace App\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use function now;

class AdNotExpiredScope implements Scope
{
    public function apply(Builder $builder, Model $model)
    {
        $builder->where('expires_at', '<', now()->addMonth());
    }
}
