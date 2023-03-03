<?php

namespace Crankd\RapidUI;

use Illuminate\Support\Collection;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Crankd\RapidUI\View\Components\CodeBlock;


class RapidUIProvider extends ServiceProvider
{

    private const CONFIG_FILE = __DIR__ . '/../config/rapid-ui.php';

    private const PATH_VIEWS = __DIR__ . '/../resources/views';

    private const PATH_ASSETS = __DIR__ . '/../resources/js';


    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->offerPublishing(); // Publish the config file

        $this->loadViewsFrom(self::PATH_VIEWS, 'rapid-ui'); // Load the views

        $this->registerComponents(); // Register the components

        $this->publishes([
            self::PATH_ASSETS => public_path('crankd/rapid-ui/js'), // Publish the assets
        ], 'rapid-ui-publishes');
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(self::CONFIG_FILE, 'rapid');
    }

    protected function offerPublishing()
    {
        if (!function_exists('config_path')) {
            // function not available and 'publish' not relevant in Lumen
            return;
        }

        $this->publishes([
            self::CONFIG_FILE => config_path('rapid-ui.php'),
        ], 'rapid-ui-config');
    }


    /**
     * Register the Blade form components.
     *
     * @return $this
     */
    private function registerComponents(): self
    {

        Blade::component('rapid::code-block', CodeBlock::class);

        return $this;
    }
}
