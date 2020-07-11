<?php

namespace App\Modules\Admin\Http\Controllers;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    protected $order;

    public function __construct( 
    )
    {
        

    }

    public function index()
    {
         
        return view('admin::dashboard.dashboard');
    }
}
