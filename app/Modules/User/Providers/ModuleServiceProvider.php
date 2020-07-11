<?php

namespace App\Modules\User\Providers;

use App\Modules\User\Repositories\CustomerAddressInterface;
use App\Modules\User\Repositories\CustomerAddressRepository;
use App\Modules\User\Repositories\CustomerInterface;
use App\Modules\User\Repositories\CustomerRepository;
use App\Modules\User\Repositories\PaymentCardInterface;
use App\Modules\User\Repositories\PaymentCardRepository;
use App\Modules\User\Repositories\PermissionInterface;
use App\Modules\User\Repositories\PermissionRepository;
use App\Modules\User\Repositories\RoleInterface;
use App\Modules\User\Repositories\RoleRepository;
use App\Modules\User\Repositories\UserGroupInterface;
use App\Modules\User\Repositories\UserGroupRepository;
use App\Modules\User\Repositories\UserInterface;
use App\Modules\User\Repositories\UserRepository;
use Caffeinated\Modules\Support\ServiceProvider;

class ModuleServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap the module services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadTranslationsFrom(__DIR__ . '/../Resources/Lang', 'user');
        $this->loadViewsFrom(__DIR__ . '/../Resources/Views', 'user');
    }


    /**
     * Register the module services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);
        $this->userRegister();
        $this->permissionRegister();
        $this->roleRegister();
        $this->customerRegister();
        $this->customerAddressRegister();
        $this->paymentCardRegister();
    }

    public function permissionRegister()
    {
        $this->app->bind(PermissionInterface::class, PermissionRepository::class);

    }

    public function roleRegister()
    {
        $this->app->bind(RoleInterface::class, RoleRepository::class);

    }

    public function userRegister()
    {
        $this->app->bind(UserInterface::class, UserRepository::class);

    }

    public function customerRegister()
    {
        $this->app->bind(CustomerInterface::class, CustomerRepository::class);

    }
    public function customerAddressRegister()
    {
        $this->app->bind(CustomerAddressInterface::class, CustomerAddressRepository::class);

    }

    public function paymentCardRegister()
    {
        $this->app->bind(PaymentCardInterface::class, PaymentCardRepository::class);

    }
}
