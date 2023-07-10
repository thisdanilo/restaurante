<?php

namespace App\Traits;

use App\Scopes\UserScope;

trait Userable
{
    /** Obtém o escopo */
    protected static function bootUserable(): void
    {
        static::addGlobalScope(new UserScope());
    }
}
