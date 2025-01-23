<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        'UserPermission' => \App\Policies\UserPermissionPolicy::class,
        'GroupPermission' => \App\Policies\GroupPermissionPolicy::class,
    ];

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->registerPolicies();
    }
}
