<?php

namespace App\Providers;

use App\Models\Cart;
use App\Models\Wishlist;
use Illuminate\Pagination\Paginator;
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
        Paginator::defaultView('vendor.pagination.default');

        view()->composer('*', function ($view) {
            if (auth()->check()) {  // Ensure user is authenticated
                $cart_counts = Cart::where('user_id', auth()->id())->count();
                $wishlist_counts = Wishlist::where('user_id', auth()->id())->count();
            } else {
                $cart_counts = 0;
                $wishlist_counts = 0;
            }
            
            $view->with([
                'cart_counts' => $cart_counts,
                'wishlist_counts' => $wishlist_counts
            ]);
        });
    }
}
