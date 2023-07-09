<?php

namespace App\Models;

use App\Models\Presenters\TenantPresenter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use TheHiveTeam\Presentable\HasPresentable;

class Tenant extends Model
{
    use HasFactory;
    use SoftDeletes;
    use HasPresentable;

    protected $presenter = TenantPresenter::class;

    protected $table = 'tenants';

    protected $fillable = [
        'legal_name',
        'trade_name',
        'cnpj',
        'im',
        'ie',
        'email',
        'phone',
        'active',
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
}
