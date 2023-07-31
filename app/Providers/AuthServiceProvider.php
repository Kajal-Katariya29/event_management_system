<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Policies\UserPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('event.view', [UserPolicy::class, 'view']);
        Gate::define('event.create', [UserPolicy::class, 'create']);
        Gate::define('event.update', [UserPolicy::class, 'update']);
        Gate::define('event.delete', [UserPolicy::class, 'delete']);
    }
}
