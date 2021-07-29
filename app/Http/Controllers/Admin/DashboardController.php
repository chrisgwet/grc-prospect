<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:dashboard');
    }

    public function index(){
        return view('admin.dashboard');
    }
}
