<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Blade;
use Carbon\Carbon;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Blade::directive('convert', function ($money) {
        return "<?php echo number_format($money, 2); ?>";
        });

        config(['app.locale' => 'id']);
        Carbon::setLocale('id');
        date_default_timezone_set('Asia/Jakarta');
    }
}
