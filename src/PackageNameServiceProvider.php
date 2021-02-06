<?php

namespace Vedrine\PackageName;

use Illuminate\Support\ServiceProvider;
use Illuminate\View\Compilers\BladeCompiler;
use Vedrine\PackageName\View\Components\Namespace\Test;

class PackageNameServiceProvider extends ServiceProvider
{
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->loadViewsFrom(__DIR__ . '/resources/views', 'package-name');

        $this->loadViewComponentsAs('namespace', [
            'test' => Test::class,
        ]);
    }

    /** @inheritDoc */
    protected function loadViewComponentsAs($prefix, array $components)
    {
        $this->callAfterResolving(BladeCompiler::class, function ($blade) use ($prefix, $components) {
            foreach ($components as $alias => $component) {
                $blade->component($component, is_numeric($alias) ? null : $alias, $prefix);
            }
        });
    }
}
