<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Models\CartModel;
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
       Model::unguard();


     View::composer('*', function ($view) {

        $cartCount = 0;

        if (Auth::check()) {
            $cartCount = CartModel::where('user_id', Auth::id())->count();
        }

        $view->with('cartCount', $cartCount);
    });



    }
}
