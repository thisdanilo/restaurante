<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ProductService
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
                'price' => $request['price'],
                'description' => $request['description'],
                'active' => $request['active'],
                'category_id' => $request['category_id'],
                'user_id' => $request['user_id'] ?? auth()->user()->id,
            ];

            if (isset($request['image'])) {
                $data += ['image' => $request['image']->store('products')];
            }

            Product::updateOrCreate(['id' => $id], $data);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();

            abort(500);
        }
    }

    /**
     * Exclui o registro
     */
    public function delete(Product $product): void
    {
        DB::beginTransaction();

        try {
            $product->delete();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();

            abort(500);
        }
    }
}
