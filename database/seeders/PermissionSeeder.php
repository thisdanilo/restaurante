<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            ['name' => 'tenant_show', 'translated_name' => 'Ver Restaurante'],
            ['name' => 'tenant_create', 'translated_name' => 'Cadastro Restaurante'],
            ['name' => 'tenant_edit', 'translated_name' => 'Editar Restaurante'],
            ['name' => 'tenant_delete', 'translated_name' => 'Excluir Restaurante'],

            ['name' => 'role_show', 'translated_name' => 'Ver Função'],
            ['name' => 'role_create', 'translated_name' => 'Cadastro Função'],
            ['name' => 'role_edit', 'translated_name' => 'Editar Função'],
            ['name' => 'role_delete', 'translated_name' => 'Excluir Função'],

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
