<?php

namespace App\Observers;

use App\Models\Exercise;

class ExerciseObserver
{
    public function created(Exercise $exercise)
    {
        $exercise->chapter->course->touch();
    }

    public function updated(Exercise $exercise)
    {
        $exercise->chapter->course->touch();
    }

    public function deleted(Exercise $exercise)
    {
        $exercise->chapter->course->touch();
    }
}
