<?php

namespace App\Modules\User\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Modules\User\Http\Requests\CustomerFormRequest;
use App\Modules\User\Models\User;
use App\Modules\User\Repositories\CustomerInterface;
use App\Modules\User\Repositories\RoleInterface;
use App\Modules\User\Repositories\UserInterface;
use Auth;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash as Flash;
use Socialite;

class CustomerController extends Controller
{

    protected $user;
    protected $role;
    protected $customer;

    public function __construct(
        UserInterface $user,
        RoleInterface $role,
        CustomerInterface $customer
    )
    {
        $this->user = $user;
        $this->role = $role;
        $this->customer = $customer;
    }

    public function index(Request $request)
    {

        $filter = $request->all();
        $data['roles'] = $this->role->findAll();

        $filter['q'] = $request->get('q');
        $sort['by'] = $request->get('key', 'id');
        $sort['sort'] = $request->get('sort', 'DESC');

        $customers = $this->customer->findAll($limit = 10, $filter, $sort);

        $customers->appends([
            'q' => $request->get('q'),
            'is_email_verified' => $request->get('is_email_verified'),
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'email' => $request->get('email'),
            'mobile' => $request->get('mobile'),
            'start_date' => $request->get('start_date'),
            'end_date' => $request->get('end_date')
        ]);

        $sort = ($sort['sort'] == 'DESC') ? 'ASC' : 'DESC';

        return view('user::customer.index', compact('customers', 'sort'));
    }

    public function create()
    {

        $data['roles'] = $this->role->findList();

        return view('user::customer.create', $data);
    }

    public function store(CustomerFormRequest $request)
    {
        $input = $request->all();
        $input['user_type'] = User::userType()['customer'];
        $input['status'] = 0;

        try {

            $customer = $this->user->create($input);
            $customer->userProfile()->create($input);

        } catch (\Throwable $t) {
            Flash::error($t->getMessage());
        }

        Flash::success("User Created  successfully");

        return redirect(route('customer.index'));

    }

    public function edit($id)
    {
        $data['customer'] = $user = $this->customer->find($id);
        $data['userRoles'] = $this->role->findList();

        return view('user::customer.edit', $data);
    }

    public function update(CustomerFormRequest $request, $id)
    {
        $input = $request->all();

        $customer = $this->customer->find($id);
        $customer->update($input);

        $customerProfile = $customer->customerProfile;
        $customerProfile->first_name = $input['first_name'];
        $customerProfile->last_name = $input['last_name'];
        $customerProfile->profile_image = $input['profile_image'];
        $customerProfile->phone = $input['phone'];
        $customerProfile->mobile = $input['mobile'];
        $customerProfile->address_line1 = $input['address_line1'];

        $customerProfile->save();

        Flash::success("User Updated  successfully");

        return redirect(route('customer.edit', ['id' => $id]));
    }

    public function show($id)
    {
        $customer = $this->customer->find($id);

        return view('user::customer.show', compact('customer'));
    }

    public function status(Request $request)
    {

        try {

            if ($request->ajax()) {

                $stat = null;
                $id = $request->input('id');

                $status = $this->customer->changeStatus($id);
                if ($status == 0) {
                    $stat = '<i class="fa fa-toggle-off fa-2x text-danger-800"></i>';
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

    public function verifyCustomer(Request $request)
    {

        try {

            if ($request->ajax()) {

                $stat = null;
                $id = $request->input('id');

                $status = $this->customer->verifyStatus($id);
                if ($status == 0) {
                    $stat = '<i class="fa fa-toggle-off fa-2x text-danger-800"></i>';
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

    public function destroy(Request $request)
    {
        $ids = $request->all();

        try {

            if ($request->has('toDelete')) {

                $this->customer->delete($ids['toDelete']);
                Flash::success("Data deleted Successfully");

            } else {
                Flash::error("Please check at least one to delete");
            }

        } catch (\Throwable $e) {
            Flash::error($e->getMessage());
        }

        return redirect(route('customer.index'));
    }

    public function socialLogin(Request $request, $provider)
    {
        //Url Params to Redirect back
        $previousUrl = app('url')->previous();

        if ($previousUrl) {
            $request->session()->put('backUrl', $previousUrl);
        }

        return Socialite::driver($provider)->redirect();
    }

    public function socialCallback(Request $request, $provider)
    {
        $socialLite = Socialite::driver($provider)->user();

        $data['provider_id'] = $socialLite->getId();
        $data['full_name'] = $socialLite->getName();
        $data['email'] = $socialLite->getEmail();
        $data['profile_image'] = $socialLite->getAvatar();
        $data['provider'] = $provider;


        $data['user_type'] = 'customer';
        $data['status'] = 1;


        $user = $this->customer->saveSocialUser($data, $data['provider_id']);

        alertify()->success(' successfully Login.')->delay(5000);

        auth()->guard('customer')->login($user);

        if ($request->session()->has('backUrl')) {
            $previousUrl = session()->get('backUrl');
            return redirect()->to($previousUrl);
        }

        return redirect(route('home'));
    }

}
