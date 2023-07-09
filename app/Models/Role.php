<?php

namespace App\Models;

use App\Models\User;
use App\Models\Permission;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;

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
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
}
