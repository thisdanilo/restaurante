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
            ['name' => 'tenant_show', 'translated_name' => 'Ver'],
            ['name' => 'tenant_create', 'translated_name' => 'Cadastro'],
            ['name' => 'tenant_edit', 'translated_name' => 'Editar'],
            ['name' => 'tenant_delete', 'translated_name' => 'Excluir'],
        ];

        foreach ($permissions as $permission) {
            $permission = Permission::create($permission);

            $permission->roles()->attach(
                Role::find(1)->pluck('id')->toArray(),
            );
        }
    }
}
