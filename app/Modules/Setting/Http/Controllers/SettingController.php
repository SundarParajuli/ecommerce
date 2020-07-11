<?php

namespace App\Modules\Setting\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Modules\Setting\Http\Requests\SettingFormRequest;
use App\Modules\Setting\Models\Setting;
use App\Modules\Setting\Repositories\SettingInterface;
use Auth;
use Cache;

class SettingController extends Controller
{
    protected $setting;
    protected $homepages = ["main"=>"Main Homepage", "advertisement"=>"Homepage with Advertisement"];

    public function __construct(SettingInterface $setting)
    {
        $this->setting = $setting;
    }

    public function create()
    {
        $data['setting'] = Setting::where('slug', 'raramart')->first();
        $data["homepages"] = $this->homepages;
        return view('setting::setting.create', $data);
    }

    public function store(SettingFormRequest $request)
    {
        $input = $request->all();
        $input['created_by'] = auth()->guard('admins')->User()->id;

        $favIcon = $request->file('fav_icon');
        $logoIcon = $request->file('logo');
        $footerLogo = $request->file('footer_logo');
        $adultContentImage = $request->file('adult_content_image');

        try {
            if (isset($favIcon)) {
                $input['fav_icon'] = $this->setting->upload($favIcon);
            }
            if (isset($logoIcon)) {
                $input['logo'] = $this->setting->upload($logoIcon);
            }
            if (isset($footerLogo)) {
                $input['footer_logo'] = $this->setting->upload($footerLogo);
            }
            if (isset($adultContentImage)) {
                $input['adult_content_image'] = $this->setting->upload($adultContentImage);
            }

            $this->setting->createOrupdate(['id' => 1], $input);
            usleep(100*1000);
            $this->cacheClear();

            flash("Information Saved Successfully")->success();

        } catch (\Throwable $e) {
            flash($e->getMessage())->error();
        }

        return redirect()->route('setting.create');
    }

    public function cacheClear(){
        try{
            \Artisan::call('cache:clear');
            \Artisan::call('module:optimize');
            \Artisan::call('view:clear'); 
            flash("Cache cleared successfully.")->success();
        } 
        catch (\Exception $e) {
            flash($e->getMessage())->error();
        }

        return back();
    }

    public function cacheClearByName($cache_name){
        try{
            Cache::forget($cache_name);
            flash("Cache cleared successfully.")->success();
        }
        catch (\Exception $e) {
            flash($e->getMessage())->error();
        }

        return back();
    }
}
