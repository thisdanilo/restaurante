<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserService
{
    /** Cadastra ou atualiza o registro */
    public function updateOrCreate(array $request, int $id = null): void
    {
        DB::beginTransaction();

        try {
            $data = [
                'name' => $request['name'],
                'email' => $request['email'],
                'active' => $request['active'],
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

    /**Exclui o registro*/
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

    /** Atualiza o registro */
    public function changeProfile(array $request, int $id): void
    {
        DB::beginTransaction();

        try {
            $data = ['name' => $request['name']];

            if (isset($request['password'])) {
                $data += ['password' => bcrypt($request['password'])];
            }

            $user = User::find($id);

            $user->update($data);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();

            dd($e);

            abort(500);
        }
    }
}
