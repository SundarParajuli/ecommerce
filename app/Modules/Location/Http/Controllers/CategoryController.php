<?php

namespace App\Modules\Location\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Modules\Location\Http\Requests\CategoryFormRequest;
use App\Modules\Location\Repositories\CategoryInterface;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;

class CategoryController extends Controller
{
    protected $Category;

    public function __construct(CategoryInterface $Category)
    {
        $this->middleware('auth');
        $this->Category = $Category;
    }

    public function index(Request $request)
    {
        $filter['name'] = $request->get('q');
        $sort['by'] = $request->get('key', 'id');
        $sort['sort'] = $request->get('sort', 'DESC');

        $Categorys = $this->Category->findAll($limit = 8, $filter, $sort);
        $Categorys->appends(['q' => $filter['name']]);

        $sort = ($sort['sort'] == 'DESC') ? 'ASC' : 'DESC';

        return view('location::Category.index', compact('Categorys', 'sort'));
    }

    public function create()
    {
        return view('location::Category.create');
    }

    public function store(CategoryFormRequest $request)
    {
        $input = $request->all();

        try {


            $this->Category->save($input);

            Flash::success("Data Created Successfully");

        } catch (\Throwable $e) {

            Flash::error($e->getMessage());
        }

        return redirect(route('Category.index'));
    }

    public function edit($id)
    {
        $Category = $this->Category->find($id);

        return view('location::Category.edit', compact('Category'));
    }

    public function update(CategoryFormRequest $request, $id)
    {
        try {

            $input = $request->all();
            $this->Category->update($id, $input);

            Flash::success("Data Updated Successfully");

            return redirect(route('Category.index', ['id' => $id]));

        } catch (\Throwable $t) {

            Flash::error($t->getMessage());

        }
    }

    public function destroy(Request $request)
    {
        $ids = $request->all();

        try {
            if ($request->has('toDelete')) {
                $this->Category->delete($ids['toDelete']);
                Flash::success("Data deleted Successfully");
            } else {
                Flash::error("Please check at least one to delete");
            }
        } catch (\Throwable $e) {
            Flash::error($e->getMessage());
        }

        return redirect(route('Category.index'));
    }

    public function delete($id)
    {

        try {
            if ($id) {
                $this->Category->delete($id);
                Flash::success("Data deleted Successfully");
            } else {
                Flash::error("Please check at least one to delete");
            }
        } catch (\Throwable $e) {
            Flash::error($e->getMessage());
        }

        return redirect(route('Category.index'));
    }

    public function status(Request $request)
    {
        try {
            if ($request->ajax()) {
                $stat = null;
                $id = $request->input('id');
                $status = $this->Category->changeStatus($id);
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
