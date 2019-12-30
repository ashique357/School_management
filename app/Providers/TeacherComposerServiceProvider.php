<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;

class TeacherComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('teacher_pannel.sidebar','App\Http\ViewComposer\TeacherProfileComposer');
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
