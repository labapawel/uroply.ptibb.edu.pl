<?php

namespace App\Providers;

use App\Admin\Form\Element\WeeklyCalendarElement;
use Illuminate\Support\ServiceProvider;
use SleepingOwl\Admin\Admin;
use SleepingOwl\Admin\Providers\AdminServiceProvider;

class WeeklyCalendarServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // Rejestracja widoków
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'weekly-calendar');
        
        // Publikowanie widoków i zasobów
        $this->publishes([
            __DIR__ . '/../resources/views' => resource_path('views/vendor/weekly-calendar'),
        ], 'weekly-calendar-views');
        
        $this->publishes([
            __DIR__ . '/../public' => public_path('vendor/weekly-calendar'),
        ], 'weekly-calendar-assets');
        
        // Rejestracja elementu formularza
        app(Admin::class)->registerFormElement('weeklyCalendar', WeeklyCalendarElement::class);
    }
}