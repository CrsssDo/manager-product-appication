<?php

namespace App\Http\Controllers;

use App\Http\Services\Product\ProductServices;
use Illuminate\Http\Request;

class MainController extends Controller
{

    protected $productService;

    public function __construct(ProductServices $productService)
    {
        $this->productService = $productService;
    }

    public function index()
    {
        $products = $this->productService->get();

        return view('home', [
            'products' => $products,
        ]);
    }
}
