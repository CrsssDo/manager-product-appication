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

    public function index(Request $request)
    {
        $filter = "";

        switch ($request->sort):
            case 'price_up':
                $filter .= 'price asc';
                break;
            case 'price_down':
                $filter .= 'price desc';
                break;
            case 'amount':
                $filter .= 'amount';
                break;
        endswitch;

        $products = $this->productService->get($filter);

        return view('home', [
            'products' => $products,
        ]);
    }
}
