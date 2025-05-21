<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Laravel\Nova\Nova;
use Laravel\Nova\Menu\MenuSection;
use Laravel\Nova\Menu\MenuItem;
use App\Nova\SupportTickets;
use App\Nova\CreditsOrders;
use App\Nova\SubscriptionOrders;
use App\Nova\TopMemberAds;
use App\Nova\LoginAd;
use App\Nova\SpotlightAds;
use App\Nova\TopEmailAd;
use App\Nova\Logins;
use App\Nova\User;
use App\Nova\Membership;
use App\Nova\Mailing;
use App\Nova\AdminMailings;
use App\Nova\CreditClicks;
use App\Nova\SoloOrders;


use Laravel\Nova\NovaApplicationServiceProvider;

class NovaServiceProvider extends NovaApplicationServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        Nova::withBreadcrumbs();

        Nova::initialPath('/resources/users');

        Nova::mainMenu (fn ($request) => [


            MenuSection::make('Customers', [
                MenuItem::resource(User::class),
                MenuItem::resource(SupportTickets::class),
                MenuItem::resource(CreditsOrders::class),
                MenuItem::resource(SubscriptionOrders::class),
                 MenuItem::resource(SoloOrders::class),
                MenuItem::resource(Membership::class),
            ])->icon('user-group')->collapsable(),

            MenuSection::make('Backend Ads', [
                MenuItem::resource(SpotlightAds::class),
                MenuItem::resource(TopEmailAd::class),
                MenuItem::resource(LoginAd::class),
                MenuItem::resource(TopMemberAds::class),
            ])->icon('cursor-click')->collapsable(),


            MenuSection::make('Security', [
                MenuItem::resource(Logins::class),
                MenuItem::resource(Mailing::class),
                MenuItem::resource(AdminMailings::class),
                MenuItem::resource(CreditClicks::class),
            ])->icon('adjustments')->collapsable(),

        ]);
    }
    

    /**
     * Register the Nova routes.
     *
     * @return void
     */
    protected function routes()
    {
        Nova::routes()
        ->withAuthenticationRoutes()
        ->withPasswordResetRoutes()
        ->register();
    }

    /**
     * Register the Nova gate.
     *
     * This gate determines who can access Nova in non-local environments.
     *
     * @return void
     */
    protected function gate()
    {
        Gate::define('viewNova', function ($user) {
            return in_array($user->email, [
                'jonahklimackk@gmail.com'
                
            ]);
        });
    }

    /**
     * Get the dashboards that should be listed in the Nova sidebar.
     *
     * @return array
     */
    protected function dashboards()
    {
        return [
            new \App\Nova\Dashboards\Main,
        ];
    }

    /**
     * Get the tools that should be listed in the Nova sidebar.
     *
     * @return array
     */
    public function tools()
    {
        return [];
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
