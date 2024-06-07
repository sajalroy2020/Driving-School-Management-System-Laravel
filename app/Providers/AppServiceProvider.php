<?php

namespace App\Providers;

use App\Models\Language;
use App\Models\Setting;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
        try {
            $connection = DB::connection()->getPdo();
            if ($connection) {
                $allOptions = [];
                $allOptions['settings'] = Setting::all()->pluck('option_value', 'option_key')->toArray();
                config($allOptions);

            }

            config(['app.defaultLanguage' => getDefaultLanguage()]);
            config(['app.currencySymbol' => getCurrencySymbol()]);
//            config(['app.isoCode' => getIsoCode()]);
//            config(['app.currencyPlacement' => getCurrencyPlacement()]);
//            config(['app.debug' => getSetting('app_debug', true)]);
//            config(['app.timezone' => getSetting('app_timezone','UTC')]);
//            date_default_timezone_set( getSetting('app_timezone','UTC'));

//            config(['services.google.client_id' => getSetting('google_client_id')]);
//            config(['services.google.client_secret' => getSetting('google_client_secret')]);
//            config(['services.google.redirect' => url('auth/google/callback')]);
//
//            config(['services.facebook.client_id' => getSetting('facebook_client_id')]);
//            config(['services.facebook.client_secret' => getSetting('facebook_client_secret')]);
//            config(['services.facebook.redirect' => url('auth/facebook/callback')]);
//            if (!empty(getSetting('google_recaptcha_status')) && getSetting('google_recaptcha_status') == 1){
//                config(['recaptchav3.sitekey' => getSetting('google_recaptcha_site_key')]);
//                config(['recaptchav3.secret' => getSetting('google_recaptcha_secret_key')]);
//            }

            View::share('totalMessage', 1);

//            if (env('FORCE_SSL') == true) {
//                URL::forceScheme('https');
//            }

        } catch (\Exception $e) {
            Log::info('Service Provider - ' . $e->getMessage());
        }
    }
}
