<?php

namespace App\Models;

use App\Models\Role;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Permission extends Model
{
    use HasFactory;

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
