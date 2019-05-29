<?php

namespace App\Providers;

use App\Customer;
use App\Policies\CustomerPolicy;
use App\Policies\ProjectPolicy;
use App\Policies\ServicePolicy;
use App\Project;
use App\Service;
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
        // 'App\Model' => 'App\Policies\ModelPolicy',
        Customer::class => CustomerPolicy::class,
        Service::class => ServicePolicy::class,
        Project::class => ProjectPolicy::class
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
    }
}
