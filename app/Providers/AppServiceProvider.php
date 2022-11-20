<?php

namespace App\Providers;

use Illuminate\Http\Response;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerResponseMacros();

        Gate::define('admin', function(User $user) {
            return Auth::user()->isAdmin();
        });

        Blade::if('admin', function (User $user = null) {
            return ($user ?? Auth::user())->isAdmin();
        });
    }

    public function registerResponseMacros()
    {
        /**
         * Creates a standard json structure for consistent api responses in a simple way.
         * {"status": true, "title": "Some title", "message": "Successful", "data": [a, b, c]}
         */
        Response::macro('api', function ($response, $status = 200) {
            $format = ['status' => ($status < 400), 'title' => '', 'message' => '', 'data' => []];

            // For convenience, if $response is a string, we'll use it as the message...
            if (! is_array($response)) $response = ['message' => $response];

            return response(array_merge($format, $response), $status);
        });
    }
}
