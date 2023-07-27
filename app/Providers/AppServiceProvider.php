<?php

namespace App\Providers;

use App\Repositories\BannerRepository;
use App\Repositories\CityRepository;
use App\Repositories\CountryRepository;
use App\Repositories\EventCategoryRepository;
use App\Repositories\Interfaces\BannerRepositoryInterface;
use App\Repositories\Interfaces\CityRepositoryInterface;
use App\Repositories\Interfaces\CountryRepositoryInterface;
use App\Repositories\Interfaces\EventCategoryRepositoryInterface;
use App\Repositories\Interfaces\OrganizerrepositoryInterface;
use Illuminate\Support\ServiceProvider;
use App\Repositories\Interfaces\RoleRepositoryInterface;
use App\Repositories\Interfaces\SponserRepositoryInterface;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Repositories\Interfaces\VenueRepositoryInterfce;
use App\Repositories\OrganizerRepository;
use App\Repositories\RoleRepository;
use App\Repositories\SponserRepository;
use App\Repositories\UserRepository;
use App\Repositories\VenueRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(RoleRepositoryInterface::class, RoleRepository::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(BannerRepositoryInterface::class, BannerRepository::class);
        $this->app->bind(CountryRepositoryInterface::class,CountryRepository::class);
        $this->app->bind(CityRepositoryInterface::class,CityRepository::class);
        $this->app->bind(EventCategoryRepositoryInterface::class,EventCategoryRepository::class);
        $this->app->bind(OrganizerrepositoryInterface::class,OrganizerRepository::class);
        $this->app->bind(SponserRepositoryInterface::class,SponserRepository::class);
        $this->app->bind(VenueRepositoryInterfce::class,VenueRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
