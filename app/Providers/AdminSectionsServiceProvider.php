<?php

namespace App\Providers;


use SleepingOwl\Admin\Providers\AdminSectionsServiceProvider as ServiceProvider;
use SleepingOwl\Admin\Contracts\Widgets\WidgetsRegistryInterface; // Dodajemy import

class AdminSectionsServiceProvider extends ServiceProvider
{

    /**
     * @var array
     */
    protected $sections = [
        \App\Models\User::class => 'App\Admin\Sections\Users',
    ];
    
    protected $widgets = [
        \App\Admin\Widgets\NavigationUserBlock::class,
    ];

    public function registerViews( WidgetsRegistryInterface $widgetsRegistry ) {
        foreach ( $this->widgets as $widget ) {
            $widgetsRegistry->registerWidget( $widget );
        }
    }

    /**
     * Register sections.
     *
     * @param \SleepingOwl\Admin\Admin $admin
     * @return void
     */
    public function boot(\SleepingOwl\Admin\Admin $admin)
    {
    	//
        $this->app->call( [ $this, 'registerViews' ] );
        $this->registerPolicies( 'App\\Admin\\Policies\\' );
        parent::boot($admin);
    }
}
