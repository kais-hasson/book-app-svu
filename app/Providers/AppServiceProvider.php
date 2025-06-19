<?php

namespace App\Providers;

//use Illuminate\Support\ServiceProvider;
use Laravel\Passport\Passport;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\File;
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
        $this->registerPolicies();

        Passport::tokensExpireIn(now()->addDays(15));
        Passport::refreshTokensExpireIn(now()->addDays(30));
        if (app()->environment('production')) {
            $privateKey = storage_path('oauth-private.key');
            $publicKey = storage_path('oauth-public.key');

            if (env('PASSPORT_PRIVATE_KEY_B64') && env('PASSPORT_PUBLIC_KEY_B64')) {
                File::put($privateKey, base64_decode(env('PASSPORT_PRIVATE_KEY_B64')));
                File::put($publicKey, base64_decode(env('PASSPORT_PUBLIC_KEY_B64')));

                // ✅ Set secure permissions
                @chmod($privateKey, 0600);
                @chmod($publicKey, 0600);
            }
        }
    }
}
