<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserService
{
    /**
     * Cadastra ou atualiza o registro
     */
    public function updateOrCreate(array $request, int $id = null): void
    {
        DB::beginTransaction();

        try {
            $data = [
                'name' => $request['name'],
                'email' => $request['email'],
                'active' => $request['active'],
                'tenant_id' => $request['tenant_id'] ?? auth()->user()->tenant->id,
                'role_id' => $request['role_id'] ?? auth()->user()->role->id,
            ];

            if (isset($request['password'])) {
                $data += ['password' => bcrypt($request['password'])];
            }

            User::updateOrCreate(['id' => $id], $data);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();

            abort(500);
        }
    }

    /**
     * Exclui o registro
     */
    public function delete(User $user): void
    {
        DB::beginTransaction();

        try {
            $user->delete();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();

            abort(500);
        }
    }
}
