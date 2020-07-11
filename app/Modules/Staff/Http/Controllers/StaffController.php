<?php

namespace App\Modules\Staff\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Staff\Http\Requests\StaffFormRequest;
use App\Modules\Staff\Repositories\StaffInterface;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;

class StaffController extends Controller
{
    protected $staff;

    public function __construct(StaffInterface $staff)
    {
        $this->middleware('auth');
        $this->staff = $staff;
    }

    public function index(Request $request)
    {
        $filter['name'] = $request->get('q');
        $sort['by'] = $request->get('key', 'id');
        $sort['sort'] = $request->get('sort', 'DESC');

        $staffs = $this->staff->findAll($limit = 8, $filter, $sort);
        $staffs->appends(['q' => $filter['name']]);

        $sort = ($sort['sort'] == 'DESC') ? 'ASC' : 'DESC';

        return view('staff::staff.index', compact('staffs', 'sort'));
    }

    public function create()
    {
        return view('staff::staff.create');
    }

    public function store(StaffFormRequest $request)
    {
        $input = $request->all();

        try {


            $this->staff->save($input);

            Flash::success("Data Created Successfully");

        } catch (\Throwable $e) {

            Flash::error($e->getMessage());
        }

        return redirect(route('staff.index'));
    }

    public function edit($id)
    {
        $staff = $this->staff->find($id);

        return view('staff::staff.edit', compact('staff'));
    }

    public function update(StaffFormRequest $request, $id)
    {
        try {

            $input = $request->all();
            $this->staff->update($id, $input);

            Flash::success("Data Updated Successfully");

            return redirect(route('staff.index', ['id' => $id]));

        } catch (\Throwable $t) {

            Flash::error($t->getMessage());

        }
    }

    public function destroy(Request $request)
    {
        $ids = $request->all();

        try {
            if ($request->has('toDelete')) {
                $this->staff->delete($ids['toDelete']);
                Flash::success("Data deleted Successfully");
            } else {
                Flash::error("Please check at least one to delete");
            }
        } catch (\Throwable $e) {
            Flash::error($e->getMessage());
        }

        return redirect(route('staff.index'));
    }

    public function delete($id)
    {

        try {
            if ($id) {
                $this->staff->delete($id);
                Flash::success("Data deleted Successfully");
            } else {
                Flash::error("Please check at least one to delete");
            }
        } catch (\Throwable $e) {
            Flash::error($e->getMessage());
        }

        return redirect(route('staff.index'));
    }

    public function status(Request $request)
    {
        try {
            if ($request->ajax()) {
                $stat = null;
                $id = $request->input('id');
                $status = $this->staff->changeStatus($id);
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
