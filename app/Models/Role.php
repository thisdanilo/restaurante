<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'roles';

    protected $fillable = ['name'];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    /** Obtém a relação */
    public function permissions(): BelongsToMany
    {
        return $this->belongsToMany(Permission::class)->withTrashed();
    }

    /** Obtém a relação */
    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }

    /** Não Permite regra admin */
    public function scopeNotAdmin(Builder $query): void
    {
        $query->where('id', '!=', 1);
    }
}
