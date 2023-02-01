<?php

namespace App\Providers;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

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
        Blade::directive('currency', function ($expression) {
            return "Rp. <?php echo number_format ($expression,0,',','.'); ?>";
        });
        Blade::directive('persen', function ($expression1) {
            return "<?php echo number_format ($expression1,2, ',', '.'); ?>";
        });
        config(['app.locale' => 'id']);
        \Carbon\Carbon::setLocale('id');
    }
}
