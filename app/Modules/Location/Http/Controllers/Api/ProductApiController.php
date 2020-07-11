<?php

namespace App\Modules\Location\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Modules\Location\Models\Product;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;

class ProductApiController extends Controller

{


    public function index(Request $request)
    {


        try {
//            $p = new ProductRepository();
//
//            $filter = array("name", "type");
//
//            return $p->findAll($limit = 8, $filter = ['name']);


            return Product::pluck('name', 'id');


//            $products = Product::all();
//
////            $response["products"] = $products;
////            $response["success"] = 1;
////            return response()->json($response);
//
//
//            return response()->json(['products' => $products]);

        } catch (\Exception $e) {
            throw new HttpException(500, $e->getMessage());
        }

    }


    public function show()
    {


    }


}
