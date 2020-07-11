<?php

namespace App\Modules\FrontEnd\Http\Controllers;

use App\Http\Controllers\Controller;

class WelcomeController extends Controller
{
    protected $order;

    public function __construct( 
    )
    {
        

    }

    public function index()
    {
         
        return view('frontend::welcome.welcome');
    }
}
