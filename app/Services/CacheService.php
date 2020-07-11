<?php

namespace App\Services;

use Cache;

class CacheService
{


    public function cacheClear(){
        $data["success"]= false;
        try{
            \Artisan::call('cache:clear');
            \Artisan::call('module:optimize');
            \Artisan::call('view:clear'); 
            $data["message"]= "Cache cleared successfully.";
            $data["success"]= true;
        } 
        catch (\Exception $e) {
            $data["message"]= $e->getMessage();
        }

        return $data
    }

    public function cacheClearByName($cache_name){
        $data["success"]= false;
        try{
            Cache::forget($cache_name);
            $data["message"]= "Cache cleared successfully.";
            $data["success"]= true;
        }
        catch (\Exception $e) {
            $data["message"]= $e->getMessage();
        }

        return $data;
    }

}