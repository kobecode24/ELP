<?php

namespace App\Observers;

use App\Models\Lesson;

class LessonObserver
{
    public function created(Lesson $lesson)
    {
        $lesson->chapter->course->touch();
    }

    public function updated(Lesson $lesson)
    {
        $lesson->chapter->course->touch();
    }

    public function deleted(Lesson $lesson)
    {
        $lesson->chapter->course->touch();
    }
}
