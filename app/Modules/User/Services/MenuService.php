<?php

namespace App\Modules\User\Services;


class MenuService
{

//    protected $currentRoute;
//
//    public function __construct($currentRoute)
//    {
//        $this->currentRoute = $currentRoute;
//    }


    public function activeMenu($currentRoute, $selectedRoutes)
    {
        $active = "";
        if (in_array($currentRoute, $selectedRoutes)) {
            $active = 'class="active"';
        }
        echo $active;
    }

}
