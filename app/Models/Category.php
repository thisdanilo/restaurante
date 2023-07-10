<?php

namespace App\Models;

use App\Models\Presenters\CategoryPresenter;
use App\Traits\Userable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use TheHiveTeam\Presentable\HasPresentable;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;
    use HasPresentable;
    use Userable;

    protected $presenter = CategoryPresenter::class;

    protected $table = 'categories';

    protected $fillable = [
        'name',
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
