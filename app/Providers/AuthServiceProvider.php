<?php

namespace App\Providers;

use App\Models\Role;
use App\Models\User;
use App\Models\Membre;
use App\Policies\RolePolicy;
use App\Policies\UserPolicy;
use App\Policies\MembrePolicy;
use Laravel\Passport\Passport;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        //  'App\Models\Model' => 'App\Policies\ModelPolicy',
        User::class=>UserPolicy::class,
        Role::class=>RolePolicy::class,
        Membre::class=>MembrePolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
        Passport::routes();

    }
}