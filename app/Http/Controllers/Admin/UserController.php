<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\User\AdminUserServices;
use Illuminate\Http\Request;

class UserController extends Controller
{

    protected $adminUserService;

    public function __construct(AdminUserServices $adminUserService)
    {
        $this->adminUserService = $adminUserService;
    }

    public function index()
    {
        return view('admin.login');
    }

    public function create(Request $request)
    {
        $validate = $this->adminUserService->create($request);
        if(!$validate)
        {
            return;
        }
        return view('admin.login');
    }
}
