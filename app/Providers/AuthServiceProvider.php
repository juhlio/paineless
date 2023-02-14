<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

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
        Gate::define('salacontrole', function($user){
            return $user->role_id === 2 || $user->role_id === 1;
        });
        Gate::define('comercial', function($user){
            return $user->role_id === 3 || $user->role_id === 1;
        });
        Gate::define('estoque', function($user){
            return $user->role_id === 4 || $user->role_id === 1;
        });
        //
    }
}
