<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;

class StudentComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
          View::composer('student_pannel.sidebar','App\Http\ViewComposer\StudentProfileComposer');
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
