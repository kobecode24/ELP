<?php

namespace App\Providers;

use App\Models\Chapter;
use App\Models\Exercise;
use App\Models\Lesson;
use App\Observers\ChapterObserver;
use App\Observers\ExerciseObserver;
use App\Observers\LessonObserver;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

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
        Lesson::observe(LessonObserver::class);
        Exercise::observe(ExerciseObserver::class);
        Chapter::observe(ChapterObserver::class);

        Gate::define('viewPulse', function ($user) {
            return $user->isAdmin();
        });
    }
}
