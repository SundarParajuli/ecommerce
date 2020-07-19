<?php

namespace App\Modules\Location\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Modules\Location\Http\Requests\OfficeFormRequest;
use App\Modules\Location\Repositories\OfficeInterface;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;

class OfficeController extends Controller
{
    protected $office;

    public function __construct(OfficeInterface $office)
    {
        $this->middleware('auth');
        $this->office = $office;
    }

    public function index(Request $request)
    {
        $filter['name'] = $request->get('q');
        $sort['by'] = $request->get('key', 'id');
        $sort['sort'] = $request->get('sort', 'DESC');

        $offices = $this->office->findAll($limit = 8, $filter, $sort);
        $offices->appends(['q' => $filter['name']]);

        $sort = ($sort['sort'] == 'DESC') ? 'ASC' : 'DESC';

        return view('location::office.index', compact('offices', 'sort'));
    }

    public function create()
    {
        return view('location::office.create');
    }

    public function store(OfficeFormRequest $request)
    {
        $input = $request->all();

        try {


            $this->office->save($input);

            Flash::success("Data Created Successfully");

        } catch (\Throwable $e) {

            Flash::error($e->getMessage());
        }

        return redirect(route('office.index'));
    }

    public function edit($id)
    {
        $office = $this->office->find($id);

        return view('location::office.edit', compact('office'));
    }

    public function update(OfficeFormRequest $request, $id)
    {
        try {

            $input = $request->all();
            $this->office->update($id, $input);

            Flash::success("Data Updated Successfully");

            return redirect(route('office.index', ['id' => $id]));

        } catch (\Throwable $t) {

            Flash::error($t->getMessage());

        }
    }

    public function destroy(Request $request)
    {
        $ids = $request->all();

        try {
            if ($request->has('toDelete')) {
                $this->office->delete($ids['toDelete']);
                Flash::success("Data deleted Successfully");
            } else {
                Flash::error("Please check at least one to delete");
            }
        } catch (\Throwable $e) {
            Flash::error($e->getMessage());
        }

        return redirect(route('office.index'));
    }

    public function delete($id)
    {

        try {
            if ($id) {
                $this->office->delete($id);
                Flash::success("Data deleted Successfully");
            } else {
                Flash::error("Please check at least one to delete");
            }
        } catch (\Throwable $e) {
            Flash::error($e->getMessage());
        }

        return redirect(route('office.index'));
    }

    public function status(Request $request)
    {
        try {
            if ($request->ajax()) {
                $stat = null;
                $id = $request->input('id');
                $status = $this->office->changeStatus($id);
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
