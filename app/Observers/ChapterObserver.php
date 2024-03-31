<?php

namespace App\Observers;

use App\Models\Chapter;

class ChapterObserver
{
    public function created(Chapter $chapter)
    {
        $chapter->course->touch();
    }

    public function updated(Chapter $chapter)
    {
        $chapter->course->touch();
    }

    public function deleted(Chapter $chapter)
    {
        $chapter->course->touch();
    }
}
