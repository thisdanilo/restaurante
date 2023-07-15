<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\ProductResource;
use App\Http\Resources\RestaurantResource;
use App\Models\Product;
use App\Models\Tenant;
use Illuminate\Http\Request;

class ApiController
{
    /** Produtos */
    public function product()
    {
        $products = Product::where('active', 1)
            ->with([
                'user',
                'category',
            ])
            ->orderBy('name', 'ASC')
            ->withoutGlobalScopes()
            ->paginate(9);

        return ProductResource::collection($products);
    }

    /** Restaurantes */
    public function restaurant()
    {
        $restaurants = Tenant::where('active', 1)
            ->orderBy('legal_name', 'ASC')
            ->withoutGlobalScopes()
            ->paginate(9);

        return RestaurantResource::collection($restaurants);
    }

    /** Pesquisa */
    public function search(Request $request)
    {
        $product = $request->input('user');

        $products = Product::where('active', 1)
            ->where('name', 'like', '%'.$product.'%')
            ->withoutGlobalScopes()
            ->get();

        return ProductResource::collection($products);
    }
}
