<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\OrderServices;
use App\Http\Services\User\AdminUserServices;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    protected $oderService;

    public function __construct(OrderServices $oderService)
    {
        $this->oderService = $oderService;
    }

    public function index()
    {
        $orders = $this->oderService->get();

        return view('admin.order.list', [
            'orders' => $orders,
        ]);
    }
}
