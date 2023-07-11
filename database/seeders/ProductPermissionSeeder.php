<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class ProductPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            ['name' => 'product_show', 'translated_name' => 'Ver Produto'],
            ['name' => 'product_create', 'translated_name' => 'Cadastro Produto'],
            ['name' => 'product_edit', 'translated_name' => 'Editar Produto'],
            ['name' => 'product_delete', 'translated_name' => 'Excluir Produto'],
        ];

        foreach ($permissions as $permission) {
            $permission = Permission::create($permission);

            $permission->roles()->attach(
                Role::find(1)->pluck('id')->toArray(),
            );
        }
    }
}
