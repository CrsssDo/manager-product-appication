<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\User\AdminUserServices;
use Illuminate\Http\Request;

class AuthenticationController extends Controller
{

    protected $adminUserService;

    public function __construct(AdminUserServices $adminUserService)
    {
        $this->adminUserService = $adminUserService;
    }

    public function index(Request $request)
    {
        $check = $this->adminUserService->validation($request);
        if(!$check)
        {
            return view("admin.login");
        }
        return view("admin.main");
    }
}
