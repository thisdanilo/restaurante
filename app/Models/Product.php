<?php

namespace App\Models;

use App\Models\Presenters\ProductPresenter;
use App\Traits\Userable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use TheHiveTeam\Presentable\HasPresentable;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;
    use HasPresentable;
    use Userable;

    protected $presenter = ProductPresenter::class;

    protected $table = 'products';

    protected $fillable = [
        'image',
        'name',
        'price',
        'description',
        'active',
        'user_id',
        'category_id',
    ];

    protected $casts = [
        'active' => 'boolean',
        'price' => 'float',
    ];

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

    /** Formata o atributo */
    public function getFormattedPriceAttribute(): string
    {
        return number_format($this->attributes['price'], 2, ',', '.');
    }

    /** Formata o atributo */
    public function setPriceAttribute($value): void
    {
        $formatted_value = str_replace(',', '.', str_replace('.', '', $value));

        $this->attributes['price'] = $formatted_value;
    }

    /** Obtém a relação */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class)->withTrashed();
    }

    /** Obtém a relação */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class)->withTrashed();
    }
}
