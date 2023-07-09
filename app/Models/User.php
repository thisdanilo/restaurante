<?php

namespace App\Models;

use App\Models\Presenters\UserPresenter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use TheHiveTeam\Presentable\HasPresentable;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;
    use SoftDeletes;
    use HasPresentable;

    protected $presenter = UserPresenter::class;

    protected $fillable = [
        'name',
        'email',
        'password',
        'active',
        'role_id',
    ];

    protected $casts = [
        'active' => 'boolean',
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    /** Obtém a relação */
    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class);
    }

    /** Formata o atributo */
    public function getFormattedActiveAttribute(): string
    {
        return $this->attributes['active'] ? 'Sim' : 'Não';
    }

    /** Não Permite regra admin */
    public function scopeNotAdmin(Builder $query): void
    {
        $query->where('id', '!=', 1);
    }

    /** Não permite usuário logado */
    public function scopeNotMe(Builder $query): void
    {
        $id = auth()->user()->id;

        $query->where('id', '!=', $id);
    }

    /** Obtém as permissões */
    public function permissions()
    {
        return $this->role->permissions->flatten()->pluck('name');
    }
}
