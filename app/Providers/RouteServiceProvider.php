<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/admin';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     *
     * @return void
     */
    public function boot()
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));
                
            Route::middleware('web')
            ->namespace($this->namespace)
                ->group(base_path('routes/web.php'));

            /*  aqui se define admin solo ingresa autentificado y su prefifo es admin
             hace referencia a la carpeta de returas admin**/

            Route::middleware('web','auth')  
                 ->prefix('admin')
                 ->namespace($this->namespace)
                ->group(base_path('routes/admin.php'));
            
            Route::middleware('web','auth')  
                ->prefix('cliente')
                ->namespace($this->namespace)
               ->group(base_path('routes/cliente.php'));    
        });
    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });
    }
}
