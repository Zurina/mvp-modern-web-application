<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Spatie\Health\Facades\Health;
use Spatie\CpuLoadHealthCheck\CpuLoadCheck;
use Spatie\Health\Checks\Checks\DatabaseCheck;
use Spatie\Health\Checks\Checks\UsedDiskSpaceCheck;
use VictoRD11\SslCertificationHealthCheck\SslCertificationExpiredCheck;
use VictoRD11\SslCertificationHealthCheck\SslCertificationValidCheck;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */

    public function register()
    {
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Health::checks([
            UsedDiskSpaceCheck::new(),
            DatabaseCheck::new(),
            CpuLoadCheck::new()
                ->failWhenLoadIsHigherInTheLast5Minutes(2.0)
                ->failWhenLoadIsHigherInTheLast15Minutes(1.5),
            SslCertificationExpiredCheck::new()
                ->url('mathias.harbourspace.site')
                ->warnWhenSslCertificationExpiringDay(24)
                ->failWhenSslCertificationExpiringDay(14),
        ]);
    }
}
