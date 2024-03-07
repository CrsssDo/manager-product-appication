<?php


namespace App\Http\Services;


use App\Models\Product;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Session;

class CartServices
{
    public function create($request)
    {
        $quantity = (int)$request->input('number_product');
        $product_id = (int)$request->input('product_id');

        if ($quantity <= 0 || $product_id <= 0) {
            //add alert here
            return false;
        }

        //check if session already has cart variable
        $carts = Session::get('carts');
        if (is_null($carts)) {
            Session::put('carts', [
                $product_id => $quantity
            ]);
            return true;
        }

        //if cart is exist, update quantity
        $exists = Arr::exists($carts, $product_id);
        if ($exists) {
            $carts[$product_id] = $carts[$product_id] + $quantity;
            Session::put('carts', $carts);
            return true;
        }

        $carts[$product_id] = $quantity;
        Session::put('carts', $carts);

        return true;

    }

    //get all product has been added into cart
    public function getProduct()
    {
        $carts = Session::get('carts');
        if (is_null($carts)) return [];

        $productId = array_keys($carts);

        return Product::query()->select('id', 'name', 'price', 'product_status', 'image_url')
            ->whereIn('id', $productId)
            ->get();
    }

    public function update($request)
    {
        Session::put('carts', $request->input('num_product'));

        return true;
    }

    public function remove($id)
    {
        $carts = Session::get('carts');
        unset($carts[$id]);

        Session::put('carts', $carts);
        return true;
    }

}
