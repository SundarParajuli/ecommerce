<?php
//
//use Illuminate\Http\Request;
//use \App\Modules\Location\Models\Product;
//
///*
//|--------------------------------------------------------------------------
//| API Routes
//|--------------------------------------------------------------------------
//|
//| Here is where you can register API routes for your module. These
//| routes are loaded by the RouteServiceProvider within a group which
//| is assigned the "api" middleware group. Enjoy building your API!
//|
//*/
//Route::get('/location', function (Request $request) {
//    // return $request->location();
//})->middleware('auth:api');
//
//
//Route::get('/test', function () {
//
////    $products = $this->product->findAll($limit = 8);
//
////    $products = DB::table('products')->distinct()->get();
//
//
//
//    return Product::all();
//
////    return response()->json([
////      $products
////    ]);
//
//
////    return response($products);
//
//});
//
//
//Route::get('/apiproduct', ['as' => 'apiindex', 'uses' => 'ProductApiController@index']);
//
//
//
//
////Route::get('product', ['as' => 'product.index', 'uses' => 'ProductController@index']);
//
//


//start

Route::get('products-retail', 'ProductController@indexretail');


Route::get('products-wholesale', 'ProductController@indexwholesale');








Route::get('products/{id}', 'ProductController@show');











