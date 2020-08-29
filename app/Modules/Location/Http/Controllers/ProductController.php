<?php

namespace App\Modules\Location\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Location\Http\Requests\ProductFormRequest;
use App\Modules\Location\Models\Product;
use App\Modules\Location\Repositories\ProductInterface;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;

class ProductController extends Controller
{
    protected $product;

    public function __construct(ProductInterface $product)
    {
        // $this->middleware('auth');
        $this->product = $product;
        $this->product_types = Product::PRODUCT_TYPES;
    }







    public function index(Request $request)
    {
        $filter['name'] = $request->get('q');
        $filter["type"] = $request->get('type');
       // $filter['date'] = Carbon::today()->toDateString();

        $sort['by'] = $request->get('key', 'id');
        $sort['sort'] = $request->get('sort', 'DESC');

        $products = $this->product->findAll($limit = 8, $filter, $sort);
        $products->appends(['q' => $filter['name']]);

        $sort = ($sort['sort'] == 'DESC') ? 'ASC' : 'DESC';

        $product_types= $this->product_types;

//        For api call


        if (starts_with(request()->path(), 'api')) {

            $subset = $products->map(function ($products) {
//                return collect($products)->only(['id', 'name', 'min_price_retail', 'max_price_retail', 'min_price_wholesale', 'max_price_wholesale'])->all();

                return collect($products)->only(['id', 'name', 'unit','min_price_retail','max_price_retail'])->all();



            });

            return response($subset);


        } else {


            return view('location::product.index', compact('products', 'sort','product_types'));
        }
    }


    public function create()
    {
        $data["types"] = $this->product_types;
        return view('location::product.create', $data);
    }

    public function store(ProductFormRequest $request)
    {
        $input = $request->all();

        try {


            $this->product->save($input);

            Flash::success("Data Created Successfully");

        } catch (\Throwable $e) {

            Flash::error($e->getMessage());
        }

        return redirect(route('product.index'));
    }

    public function edit($id)
    {
        $types = $this->product_types;
        $product = $this->product->find($id);

        return view('location::product.edit', compact('product', 'types'));
    }

    public function update(ProductFormRequest $request, $id)
    {
        try {

            $input = $request->all();
            $this->product->update($id, $input);

            Flash::success("Data Updated Successfully");

            return redirect(route('product.index', ['id' => $id]));

        } catch (\Throwable $t) {

            Flash::error($t->getMessage());

        }
    }

    public function destroy(Request $request)
    {
        $ids = $request->all();

        try {
            if ($request->has('toDelete')) {
                $this->product->delete($ids['toDelete']);
                Flash::success("Data deleted Successfully");
            } else {
                Flash::error("Please check at least one to delete");
            }
        } catch (\Throwable $e) {
            Flash::error($e->getMessage());
        }

        return redirect(route('product.index'));
    }

    public function delete($id)
    {

        try {
            if ($id) {
                $this->product->delete($id);
                Flash::success("Data deleted Successfully");
            } else {
                Flash::error("Please check at least one to delete");
            }
        } catch (\Throwable $e) {
            Flash::error($e->getMessage());
        }

        return redirect(route('product.index'));
    }

    public function status(Request $request)
    {
        try {
            if ($request->ajax()) {
                $stat = null;
                $id = $request->input('id');
                $status = $this->product->changeStatus($id);
                if ($status == 0) {
                    $stat = '<i class="fa fa-toggle-off fa-2x fa-lg text-danger"></i>';
                } elseif ($status == 1) {
                    $stat = '<i class="fa fa-toggle-on fa-2x text-success-800"></i>';
                }
                $data['tgle'] = $stat;
            }

        } catch (\Throwable $e) {
            $data['error'] = $e->getMessage();
        }

        return response()->json($data);
    }







    public function indexretail(Request $request)
    {
        $filter['name'] = $request->get('q');
        $filter["type"] = $request->get('type');
        $filter['date'] = Carbon::today()->toDateString();

        $sort['by'] = $request->get('key', 'id');
        $sort['sort'] = $request->get('sort', 'DESC');

        $products = $this->product->findAll($limit = 8, $filter, $sort);
        $products->appends(['q' => $filter['name']]);

        $sort = ($sort['sort'] == 'DESC') ? 'ASC' : 'DESC';

        $product_types= $this->product_types;

//        For api call


        if (starts_with(request()->path(), 'api')) {

            $subset = $products->map(function ($products) {
//                return collect($products)->only(['id', 'name', 'min_price_retail', 'max_price_retail', 'min_price_wholesale', 'max_price_wholesale'])->all();

                return collect($products)->only(['id', 'name', 'unit','min_price_retail','max_price_retail'])->all();



            });

            return response($subset);


        } else {


            return view('location::product.index', compact('products', 'sort','product_types'));
        }
    }



    public function indexwholesale(Request $request)
    {
        $filter['name'] = $request->get('q');
        $filter["type"] = $request->get('type');
        $filter['date'] = Carbon::today()->toDateString();

        $sort['by'] = $request->get('key', 'id');
        $sort['sort'] = $request->get('sort', 'DESC');

        $products = $this->product->findAll($limit = 8, $filter, $sort);
        $products->appends(['q' => $filter['name']]);

        $sort = ($sort['sort'] == 'DESC') ? 'ASC' : 'DESC';

        $product_types= $this->product_types;

//        For api call


        if (starts_with(request()->path(), 'api')) {

            $subset = $products->map(function ($products) {
//                return collect($products)->only(['id', 'name', 'min_price_retail', 'max_price_retail', 'min_price_wholesale', 'max_price_wholesale'])->all();

                return collect($products)->only(['id', 'name', 'unit','min_price_wholesale','max_price_wholesale'])->all();



            });

            return response($subset);


        } else {


            return view('location::product.index', compact('products', 'sort','product_types'));
        }
    }














}
