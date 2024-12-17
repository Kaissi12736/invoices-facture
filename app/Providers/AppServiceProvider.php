<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\PermissionMiddleware;

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
        // إضافة middleware إلى مجموعة routes
        Route::middleware([PermissionMiddleware::class])->group(function () {
            Route::resource('roles', RoleController::class);
            Route::resource('users', UserController::class);
        });
    }
}
