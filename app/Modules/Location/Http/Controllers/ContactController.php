<?php

namespace App\Modules\Location\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Modules\Location\Http\Requests\ContactFormRequest;
use App\Modules\Location\Repositories\ContactInterface;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;

class ContactController extends Controller
{
    protected $contact;

    public function __construct(ContactInterface $contact)
    {
        $this->middleware('auth');
        $this->contact = $contact;
    }

    public function index(Request $request)
    {
        print "hello";
        $filter['name'] = $request->get('q');
        $sort['by'] = $request->get('key', 'id');
        $sort['sort'] = $request->get('sort', 'DESC');

        $contacts = $this->contact->findAll($limit = 8, $filter, $sort);
        $contacts->appends(['q' => $filter['name']]);

        $sort = ($sort['sort'] == 'DESC') ? 'ASC' : 'DESC';

        return view('location::contact.index', compact('contacts', 'sort'));
       // return "hi";
    }

    public function create()
    {
        return view('location::contact.create');
    }

    public function store(ContactFormRequest $request)
    {
        $input = $request->all();

        try {


            $this->contact->save($input);

            Flash::success("Data Created Successfully");

        } catch (\Throwable $e) {

            Flash::error($e->getMessage());
        }

        return redirect(route('contact.index'));
    }

    public function edit($id)
    {
        $contact = $this->contact->find($id);

        return view('location::contact.edit', compact('contact'));
    }

    public function update(ContactFormRequest $request, $id)
    {
        try {

            $input = $request->all();
            $this->contact->update($id, $input);

            Flash::success("Data Updated Successfully");

            return redirect(route('contact.index', ['id' => $id]));

        } catch (\Throwable $t) {

            Flash::error($t->getMessage());

        }
    }

    public function destroy(Request $request)
    {
        $ids = $request->all();

        try {
            if ($request->has('toDelete')) {
                $this->contact->delete($ids['toDelete']);
                Flash::success("Data deleted Successfully");
            } else {
                Flash::error("Please check at least one to delete");
            }
        } catch (\Throwable $e) {
            Flash::error($e->getMessage());
        }

        return redirect(route('contact.index'));
    }

    public function delete($id)
    {

        try {
            if ($id) {
                $this->contact->delete($id);
                Flash::success("Data deleted Successfully");
            } else {
                Flash::error("Please check at least one to delete");
            }
        } catch (\Throwable $e) {
            Flash::error($e->getMessage());
        }

        return redirect(route('contact.index'));
    }

    public function status(Request $request)
    {
        try {
            if ($request->ajax()) {
                $stat = null;
                $id = $request->input('id');
                $status = $this->contact->changeStatus($id);
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
