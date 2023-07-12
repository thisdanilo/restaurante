<?php

namespace App\Models;

use App\Models\Presenters\TenantPresenter;
use App\Traits\Userable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use TheHiveTeam\Presentable\HasPresentable;

class Tenant extends Model
{
    use HasFactory;
    use SoftDeletes;
    use HasPresentable;
    use Userable;

    protected $presenter = TenantPresenter::class;

    protected $table = 'tenants';

    protected $fillable = [
        'image',
        'legal_name',
        'trade_name',
        'cnpj',
        'im',
        'ie',
        'email',
        'phone',
        'active',
        'user_id',
    ];

    protected $casts = ['active' => 'boolean'];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /** Formata o atributo */
    public function getFormattedActiveAttribute(): string
    {
        return $this->attributes['active'] ? 'Sim' : 'Não';
    }

    /** Obtém a relação */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class)->withTrashed();
    }
}
