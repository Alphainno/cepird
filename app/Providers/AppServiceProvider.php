<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\HeaderSetting;
use App\Models\MenuItem;
use App\Models\FooterSetting;
use App\Models\FooterLink;

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
        // Share header data with all views
        View::composer('partials.header', function ($view) {
            $headerSetting = HeaderSetting::getActive();
            $menuItems = MenuItem::active()->ordered()->get();

            $view->with('headerSetting', $headerSetting);
            $view->with('menuItems', $menuItems);
        });

        // Share footer data with all views
        View::composer('partials.footer', function ($view) {
            $footerSetting = FooterSetting::getActive();
            $quickLinks = FooterLink::getQuickLinks();
            $legalLinks = FooterLink::getLegalLinks();

            $view->with('footerSetting', $footerSetting);
            $view->with('quickLinks', $quickLinks);
            $view->with('legalLinks', $legalLinks);
        });
    }
}
