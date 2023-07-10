<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class CategoryPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            ['name' => 'category_show', 'translated_name' => 'Ver Categoria'],
            ['name' => 'category_create', 'translated_name' => 'Cadastro Categoria'],
            ['name' => 'category_edit', 'translated_name' => 'Editar Categoria'],
            ['name' => 'category_delete', 'translated_name' => 'Excluir Categoria'],
        ];

        foreach ($permissions as $permission) {
            $permission = Permission::create($permission);

            $permission->roles()->attach(
                Role::find(1)->pluck('id')->toArray(),
            );
        }
    }
}
