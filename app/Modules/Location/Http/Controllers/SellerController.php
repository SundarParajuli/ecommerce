<?php

namespace App\Modules\Location\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Modules\Location\Http\Requests\SellerFormRequest;
use App\Modules\Location\Repositories\SellerInterface;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;

class SellerController extends Controller
{
    protected $seller; 

    public function __construct(
        SellerInterface $seller 
    )
    {
        $this->middleware('auth');
        $this->seller = $seller; 
    }

    public function index(Request $request)
    {
        $filter['name'] = $request->get('q');
        $sort['by'] = $request->get('key', 'id');
        $sort['sort'] = $request->get('sort', 'DESC');

        $sellers = $this->seller->findAll($limit = 8, $filter, $sort);
        $sellers->appends(['q' => $filter['name']]);

        $sort = ($sort['sort'] == 'DESC') ? 'ASC' : 'DESC';

        return view('location::seller.index', compact('sellers', 'sort'));
    }

    public function create()
    { 
        return view('location::seller.create');
    }

    public function store(SellerFormRequest $request)
    {
        $input = $request->all();

        try {


            $this->seller->save($input);

            Flash::success("Data Created Successfully");

        } catch (\Throwable $e) {

            Flash::error($e->getMessage());
        }

        return redirect(route('seller.index'));
    }

    public function edit($id)
    {
        $data['seller'] = $this->seller->find($id); 

        return view('location::seller.edit',$data);
    }

    public function update(SellerFormRequest $request, $id)
    {
        try {

            $input = $request->all();
            $this->seller->update($id, $input);

            Flash::success("Data Updated Successfully");

            return redirect(route('seller.index', ['id' => $id]));

        } catch (\Throwable $t) {

            Flash::error($t->getMessage());

        }
    }

    public function destroy(Request $request)
    {
        $ids = $request->all();

        try {
            if ($request->has('toDelete')) {
                $this->seller->delete($ids['toDelete']);
                Flash::success("Data deleted Successfully");
            } else {
                Flash::error("Please check at least one to delete");
            }
        } catch (\Throwable $e) {
            Flash::error($e->getMessage());
        }

        return redirect(route('seller.index'));
    }

    public function delete($id)
    {

        try {
            if ($id) {
                $this->seller->delete($id);
                Flash::success("Data deleted Successfully");
            } else {
                Flash::error("Please check at least one to delete");
            }
        } catch (\Throwable $e) {
            Flash::error($e->getMessage());
        }

        return redirect(route('seller.index'));
    }

    public function status(Request $request)
    {
        try {
            if ($request->ajax()) {
                $stat = null;
                $id = $request->input('id');
                $status = $this->seller->changeStatus($id);
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
}
