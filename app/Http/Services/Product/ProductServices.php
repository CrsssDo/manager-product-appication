<?php


namespace App\Http\Services\Product;


use App\Models\Product;

class ProductServices
{

    //set limit default page = 12
    const LIMIT = 12;

    public function get($page = null)
    {
        return Product::query()->select('id', 'name', 'price', 'product_status', 'description','image_url', 'amount')
            ->with('location')
            ->orderByDesc('id')
            ->paginate(self::LIMIT);
    }

    public function show($id)
    {
        return Product::query()->where('id', $id)
            ->firstOrFail();
    }

    public function more($id)
    {
        return Product::query()->select('id', 'name', 'price', 'product_status', 'description')
            ->where('id', '!=', $id)
            ->orderByDesc('id')
            ->limit(8)
            ->get();
    }
}
