<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Permission extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'permissions';

    protected $fillable = ['name'];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    /** Obtém a relação */
    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class);
    }
}
