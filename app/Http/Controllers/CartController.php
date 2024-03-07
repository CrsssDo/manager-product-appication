<?php

namespace App\Http\Controllers;

use App\Http\Services\CartServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class CartController extends Controller
{

    protected $cartService;

    public function __construct(CartServices $cartService)
    {
        $this->cartService = $cartService;
    }

    public function create(Request $request)
    {
        $result = $this->cartService->create($request);

        if ($result === false) {
            return redirect()->back();
        }

        return redirect('/app/cart/');
    }

    public function show()
    {
        $products = $this->cartService->getProduct();

        return view('app.cart.list', [
            'title' => 'Giỏ Hàng',
            'products' => $products,
            'carts' => Session::get('carts')
        ]);
    }

    public function update(Request $request)
    {
        $this->cartService->update($request);

        return redirect('/app/cart');
    }

    public function remove($id = 0)
    {
        $this->cartService->remove($id);

        return redirect('/app/cart');
    }

}
