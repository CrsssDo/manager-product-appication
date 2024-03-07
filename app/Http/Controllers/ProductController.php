<?php

namespace App\Http\Controllers;

use App\Http\Services\Product\ProductServices;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductServices $productService)
    {
        $this->productService = $productService;
    }

    public function show($id = '')
    {
        $product = $this->productService->show($id);
        return view('app.product.content', [
            'title' => $product->name,
            'product' => $product,
        ]);
    }

}
