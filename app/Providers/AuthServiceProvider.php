<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        /* define a hr user role */
        Gate::define('isHR', function($user) {
            return $user->role ==='1';
         });

         /* define a appraiser user role */
         Gate::define('isAppraiser', function($user) {
             return $user->is_appraiser === '1';
         });

         /* define a hod role */
         Gate::define('isHod', function($user) {
             return $user->role == 'hod';
         });

         /* define a appraiser user role */
         Gate::define('isDean', function($user) {
            return $user->role == 'dean';
        });

        /* define a us user role */
        Gate::define('isUs', function($user) {
            return $user->role == 'us';
        });

        /* define a dean user role */
        Gate::define('isDean', function($user) {
            return $user->role == 'dean';
        });

        /* define a Vc user role */
        Gate::define('isVc', function($user) {
            return $user->role == 'vc';
        });
    }
}
