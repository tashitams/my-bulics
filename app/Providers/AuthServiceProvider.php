<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Models\Grade;


class AuthServiceProvider extends ServiceProvider
{

    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('edit_student', fn (User $user, Grade $grade) => $user->id === $grade->user_id);
        Gate::define('edit_leave', fn (User $user) => $user->user_role === 'Principal');
    }
}