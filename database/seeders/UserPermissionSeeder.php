<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class UserPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            ['name' => 'user_show', 'translated_name' => 'Ver Usuário'],
            ['name' => 'user_create', 'translated_name' => 'Cadastro Usuário'],
            ['name' => 'user_edit', 'translated_name' => 'Editar Usuário'],
            ['name' => 'user_delete', 'translated_name' => 'Excluir Usuário'],
        ];

        foreach ($permissions as $permission) {
            $permission = Permission::create($permission);

            $permission->roles()->attach(
                Role::find(1)->pluck('id')->toArray(),
            );
        }
    }
}
