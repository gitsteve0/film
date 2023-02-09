<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Policies\UserPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
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

        Gate::define('actors', [UserPolicy::class, 'actors']);
        Gate::define('attributes', [UserPolicy::class, 'attributes']);
        Gate::define('categories', [UserPolicy::class, 'categories']);
        Gate::define('customers', [UserPolicy::class, 'customers']);
        Gate::define('directors', [UserPolicy::class, 'directors']);
        Gate::define('seasons', [UserPolicy::class, 'seasons']);
        Gate::define('seasonEpisodes', [UserPolicy::class, 'seasonEpisodes']);
        Gate::define('users', [UserPolicy::class, 'users']);
        Gate::define('verifications', [UserPolicy::class, 'verifications']);
    }
}
