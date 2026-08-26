<?php

namespace App\Providers;

use App\Services\Auctions\AuctionProvider;
use App\Services\Auctions\MockAuctionProvider;
use App\Services\Banners\BannerProvider;
use App\Services\Banners\MockBannerProvider;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(AuctionProvider::class, MockAuctionProvider::class);
        $this->app->bind(BannerProvider::class, MockBannerProvider::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
