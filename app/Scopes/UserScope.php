<?php

namespace App\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class UserScope implements Scope
{
    /** Filtra os dados */
    public function apply(Builder $builder, Model $model): void
    {
        if (auth()->user()->role->id == 1) {
            return;
        }

        $builder->where('user_id', auth()->user()->id);
    }
}
