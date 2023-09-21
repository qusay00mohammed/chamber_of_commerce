<?php

namespace App\Providers;

use App\Models\ConventionLaw;
use App\Models\Service;
use App\Models\Setting;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Spatie\Activitylog\Models\Activity;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Activity::saving(function (Activity $activity) {
        //     $activity->properties = $activity->properties->put('agent', [
        //         'ip' => Request::ip(),
        //         // 'browser' => get_browser(),
        //         // 'os' => \Browser::platformName(),
        //         'url' => Request::fullUrl(),
        //     ]);
        // });


        View::share([
            'settings' => Setting::all(),
            'conventionLaw' => ConventionLaw::orderBy('id', 'desc')->where('parent_id', null)->get(),
            'servicesMenu' => Service::orderBy('id', 'desc')->take(15)->get()
        ]);
    }
}
