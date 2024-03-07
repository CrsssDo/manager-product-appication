<?php

namespace App\Http\Controllers;

use App\Http\Services\CartServices;
use App\Http\Services\OrderServices;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    protected $orderService;

    public function __construct(OrderServices $orderService)
    {
        $this->orderService = $orderService;
    }

    public function create(Request $request)
    {
        $result = $this->orderService->create($request);

        if ($result === false) {
            return redirect()->back();
        }

        return redirect('/app/home');
    }
}
