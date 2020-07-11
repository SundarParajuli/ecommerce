<?php

namespace App\Modules\User\Http\Controllers {

    use App\Http\Controllers\Controller;
    use App\Http\Requests;
    use App\Modules\User\Http\Requests\ChangePasswordFormRequest;
    use App\Modules\User\Http\Requests\LoginFormRequest;
    use App\Modules\User\Repositories\CustomerInterface;
    use App\Modules\User\Repositories\RoleInterface;
    use App\Modules\User\Repositories\UserInterface as UserInterface;
    use Hash;
    use Laracasts\Flash\Flash as Flash;
    use Socialite;

    class AuthController extends Controller
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

        public function login()
        {
            //guard admins means admin
            if (auth()->guard('admins')->check()) {
                return redirect()->intended(route('dashboard'));
            }

            return view('user::auth.login');

        }

        public function authenticate(LoginFormRequest $request)
        {
            $input = $request->only('email', 'password', 'remember');
            $remember = isset($input['remember']) ? true : false;

            if (auth()->guard('admins')->attempt(['email' => $input['email'], 'password' => $input['password'], 'status' => 1], $remember)) {

                $userType = auth()->guard('admins')->user()->user_type;

                if (in_array($userType, ['super_admin', 'admin'])) {
                    return redirect()->intended(route('dashboard'));

                } elseif (auth()->guard('admins')->user()->user_type == 'vendor') {
                    return redirect()->intended(route('vendor.dashboard'));

                } else {
                    return redirect()->intended(route('home'));

                }

            } else {

                flash("The email or password is invalid")->error();
                return view('user::auth.login');
            }
        }

        public function vendorLogin()
        {
            //guard admins means admin
            if (auth()->guard('admins')->check()) {
                return redirect()->intended(route('dashboard'));
            }

            return view('user::auth.vendor-login');
        }

        public function vendorAuthenticate(LoginFormRequest $request)
        {

            $input = $request->only('email', 'password', 'remember');
            $remember = isset($input['remember']) ? true : false;

            if (auth()->guard('admins')->attempt(['email' => $input['email'], 'password' => $input['password'], 'status' => 1], $remember)) {

                $userType = auth()->guard('admins')->user()->user_type;

                if (in_array($userType, ['super_admin', 'admin'])) {
                    return redirect()->intended(route('dashboard'));

                } elseif (auth()->guard('admins')->user()->user_type == 'vendor') {
                    return redirect()->intended(route('vendor.dashboard'));

                } else {

                    return redirect()->intended(route('home'));
                }

            } else {

                flash("The email or password is invalid")->error();
                return redirect()->back()->withInput();
            }
        } 

        public function socialLogin($provider)
        {  
            return Socialite::driver($provider)->redirect();
        }

        public function socialCallback($provider)
        { 
            $socialLite = Socialite::driver($provider)->user();

            $data['provider_id'] = $socialLite->getId();
            $data['first_name'] = $socialLite->getName();
            $data['email'] = $socialLite->getEmail();
            $data['profile_image'] = $socialLite->getAvatar();
            $data['media'] = $provider; 


        //     $data['user_type'] = User::userType()['admin'];
        //     $data['status'] = 1; 
 
            $user = $this->customer->saveSocialUser($data, $data['provider_id']);

            auth()->guard('customer')->login($user);

            return redirect(route('home'));
        } 

        public function logout()
        {
            auth()->guard('admins')->logout();

            return redirect(route('home'));
        }

        public function permissionDenied()
        {
            return view('user::auth.permission-denied');
        }

        public function changePassword()
        {
            return view('user::password.change-password');
        }

        public function updatePassword(ChangePasswordFormRequest $request)
        {

            $oldPassword = $request->get('old_password');
            $newPassword = $request->get('password');

            $id = auth()->guard('admins')->user()->id;
            $users = auth()->guard('admins')->user()->find($id);

            if (!(Hash::check($oldPassword, $users->password))) {

                Flash::error("Old Password Do Not Match !");
                return redirect(route('setting.change-password'));

            } else {

                $data['password'] = Hash::make($newPassword);
                $this->user->update($id, $data);
                Flash::success("Password Successfully Updated!");
            }

            return redirect(route('setting.change-password'));
        }

    }

}
