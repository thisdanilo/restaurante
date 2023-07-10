<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            ['name' => 'role_show', 'translated_name' => 'Ver Função'],
            ['name' => 'role_create', 'translated_name' => 'Cadastro Função'],
            ['name' => 'role_edit', 'translated_name' => 'Editar Função'],
            ['name' => 'role_delete', 'translated_name' => 'Excluir Função'],
        ];

        foreach ($permissions as $permission) {
            $permission = Permission::create($permission);

            $permission->roles()->attach(
                Role::find(1)->pluck('id')->toArray(),
            );
        }
    }
}
