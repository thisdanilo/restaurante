<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Presenters\TenantPresenter;
use TheHiveTeam\Presentable\HasPresentable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    //-----------------------------------------------------------------
    // Accessors and Mutators
    //-----------------------------------------------------------------

    /** Formata o atributo */
    public function getFormattedActiveAttribute(): string
    {
        return $this->attributes['active'] ? 'Sim' : 'Não';
    }
}
