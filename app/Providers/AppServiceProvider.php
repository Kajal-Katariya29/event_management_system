<?php

namespace App\Providers;

use App\Repositories\BannerRepository;
use App\Repositories\CityRepository;
use App\Repositories\CountryRepository;
use App\Repositories\EventCategoryRepository;
use App\Repositories\EventRepository;
use App\Repositories\Interfaces\BannerRepositoryInterface;
use App\Repositories\Interfaces\CityRepositoryInterface;
use App\Repositories\Interfaces\CountryRepositoryInterface;
use App\Repositories\Interfaces\EventCategoryRepositoryInterface;
use App\Repositories\Interfaces\EventRepositoryInterface;
use App\Repositories\Interfaces\OrganizerrepositoryInterface;
use App\Repositories\Interfaces\PermissionRepositoryInterface;
use App\Repositories\Interfaces\RolePermissionRepositoryInterface;
use Illuminate\Support\ServiceProvider;
use App\Repositories\Interfaces\RoleRepositoryInterface;
use App\Repositories\Interfaces\RoleUserRepositoryInterface;
use App\Repositories\Interfaces\SponserRepositoryInterface;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Repositories\Interfaces\VenueRepositoryInterfce;
use App\Repositories\OrganizerRepository;
use App\Repositories\PermissionRepository;
use App\Repositories\RolePermissionRepository;
use App\Repositories\RoleRepository;
use App\Repositories\RoleUserRepository;
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
        $this->app->bind(EventRepositoryInterface::class,EventRepository::class);
        $this->app->bind(PermissionRepositoryInterface::class,PermissionRepository::class);
        $this->app->bind(RolePermissionRepositoryInterface::class,RolePermissionRepository::class);
        $this->app->bind(RoleUserRepositoryInterface::class,RoleUserRepository::class);
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
