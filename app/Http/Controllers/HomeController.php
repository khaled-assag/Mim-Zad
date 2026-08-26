<?php

namespace App\Http\Controllers;

use App\Services\Auctions\AuctionProvider;
use App\Services\Banners\BannerProvider;

class HomeController extends Controller
{
    public function __construct(private AuctionProvider $auctions, private BannerProvider $banners)
    {
    }

    public function index()
    {
        return view('home', [
            'stats' => $this->auctions->getStats(),
            'activeAuctions' => $this->auctions->getActiveAuctions(),
            'categories' => $this->auctions->getCategories(),
            'banners' => $this->banners->getActiveBanners(),
        ]);
    }
}
