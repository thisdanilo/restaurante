<?php

namespace App\Services;

use App\Models\Tenant;
use Illuminate\Support\Facades\DB;

class TenantService
{
    /**
     * Cadastra ou atualiza o registro
     */
    public function updateOrCreate(array $request, int $id = null): void
    {
        DB::beginTransaction();

        try {
            $data = [
                'legal_name' => $request['legal_name'],
                'trade_name' => $request['trade_name'],
                'cnpj' => $request['cnpj'],
                'im' => $request['im'],
                'ie' => $request['ie'],
                'email' => $request['email'],
                'phone' => $request['phone'],
                'active' => $request['active'],
                'user_id' => $request['user_id'] ?? auth()->user()->id,
            ];

            Tenant::updateOrCreate(['id' => $id], $data);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();

            abort(500);
        }
    }

    /**
     * Exclui o registro
     */
    public function delete(Tenant $tenant): void
    {
        DB::beginTransaction();

        try {
            $tenant->delete();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();

            abort(500);
        }
    }
}
