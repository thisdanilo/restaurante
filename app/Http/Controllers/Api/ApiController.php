<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\ProductResource;
use App\Http\Resources\RestaurantResource;
use App\Models\Product;
use App\Models\Tenant;

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

    /** Produtos */
    public function restaurant()
    {
        $restaurants = Tenant::where('active', 1)
            ->orderBy('legal_name', 'ASC')
            ->withoutGlobalScopes()
            ->paginate(9);

        return RestaurantResource::collection($restaurants);
    }
}
