<?php

namespace App\Providers;

use App\Models\PemilihClient;
use App\Models\User;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
       
        Paginator::useBootstrapFive();

        Gate::define('isSuperAdmin', function(User $user){
            return $user->level == 1;
        });

        Gate::define('isAdminClient', function(User $user){
            return $user->level == 2;
        });


        Gate::define('profil', function () {
            return request()->segment(2) == request()->session()->get('user_id');
        });

        Gate::define('penyaringan', function () {

            $pemilihClient = PemilihClient::where('id',request()->segment(2))->first();
            return $pemilihClient->client_id == request()->session()->get('client_id');

        });

    }

    
}
