<?php

namespace App\Modules\Staff\Providers;
use App\Modules\Staff\Repositories\StaffInterface;
use App\Modules\Staff\Repositories\StaffRepository;
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
        $this->loadTranslationsFrom(__DIR__ . '/../Resources/Lang', 'staff');
        $this->loadViewsFrom(__DIR__ . '/../Resources/Views', 'staff');
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations', 'staff');
    }

    /**
     * Register the module services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);

        $this->staffRegister();
    }


    public function staffRegister(){
        $this->app->bind(StaffInterface::class, StaffRepository::class);
    } 
}
