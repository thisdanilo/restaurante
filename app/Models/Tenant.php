<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tenant extends Model
{
    use HasFactory;
    use SoftDeletes;

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
