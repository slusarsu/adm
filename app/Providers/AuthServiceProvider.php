<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Permission;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

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

        Gate::before(function (User $user) {

            if (!$user->hasRole('super-admin')) {
                return;
            }

            return true;
        });

        if(auth()->check()) {
            $permissions = Permission::get();

            foreach ($permissions as $permission) {

                Gate::define($permission->name, function(User $user) use ($permission){
                    return $user->hasRoles($permission->getRoleNames());
                });
            }
        }
    }
}
