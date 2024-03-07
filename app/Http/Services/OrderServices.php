<?php


namespace App\Http\Services;


use App\Models\Cart;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;

class OrderServices
{
    public function create($request)
    {
        //begin transaction when something error it will rollback
        try {
            DB::beginTransaction();

            //get all product in cart from session
            $carts = Session::get('carts');

            if (is_null($carts))
                return false;

            //create customer information
            $customer = Customer::query()->create([
                'name' => $request->input('name'),
                'phone' => $request->input('phone'),
                'address' => $request->input('address'),
                'email' => $request->input('email'),
            ]);

            $note = $request->input('note');

            //get product information then insert data customer and order into database
            $this->infoOrderProduct($carts, $customer->id, $note);

            DB::commit();

            //clear cart from session
            Session::forget('carts');
        } catch (\Exception $err) {
            DB::rollBack();
            return false;
        }

        return true;
    }


    protected function infoOrderProduct($carts, $customer_id, $note = "")
    {
        $productId = array_keys($carts);
        $products = Product::select('id', 'name', 'price')
            ->whereIn('id', $productId)
            ->get();

        $data = [];
        //merge array data and insert into Order table
        foreach ($products as $product) {
            $data[] = [
                'customer_id' => $customer_id,
                'product_id' => $product->id,
                'quantity'   => $carts[$product->id],
                'price' => $product->price,
                'note' => $note,
            ];
        }

        return Order::query()->insert($data);
    }
}
