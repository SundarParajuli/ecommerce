<?php

namespace App\Modules\Location\Providers;

use App\Modules\Location\Repositories\OfficeInterface;
use App\Modules\Location\Repositories\OfficeRepository;
use App\Modules\Location\Repositories\ProductInterface;
use App\Modules\Location\Repositories\ProductRepository;
use App\Modules\Location\Repositories\SellerInterface;
use App\Modules\Location\Repositories\SellerRepository;
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
        $this->loadTranslationsFrom(__DIR__ . '/../Resources/Lang', 'location');
        $this->loadViewsFrom(__DIR__ . '/../Resources/Views', 'location');
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations', 'location');
    }

    /**
     * Register the module services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);
        $this->productRegister();
        $this->officeRegister();
        $this->sellerRegister();
    }

    public function productRegister()
    {
        $this->app->bind(ProductInterface::class, ProductRepository::class);

    }
    public function sellerRegister()
    {
        $this->app->bind(SellerInterface::class, SellerRepository::class);

    }

    public function officeRegister(){
        $this->app->bind(OfficeInterface::class, OfficeRepository::class);
    } 
}
