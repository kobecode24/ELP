<?php

namespace App\Services\Education;

use App\Models\Course;
use App\Models\UserProgress;
use Illuminate\Support\Facades\Log;

class CourseService
{
    public function getCourseDetails($courseId)
    {
        $userId = auth()->id();
        $course = Course::with([
            'instructor',
            'spokenLanguage',
            'chapters.lessons',
            'chapters.exercises',
            'chapters' => function ($query) {
                $query->withCount(['lessons', 'exercises']);
            },
            'creator' => function ($query) {
                $query->withCount('createdCourses');
            },
        ])->findOrFail($courseId);

        $this->calculateCourseStats($course);
        $this->sortChapterItems($course);

        $completedItems = UserProgress::where('user_id', $userId)
            ->where(function ($query) use ($course) {
                $query->whereIn('lesson_id', $course->chapters->pluck('lessons.*.id')->collapse()->unique())
                    ->orWhereIn('exercise_id', $course->chapters->pluck('exercises.*.id')->collapse()->unique());
            })
            ->get();

        $completedLessons = $completedItems->whereNotNull('lesson_id')->pluck('lesson_id')->all();
        $completedExercises = $completedItems->whereNotNull('exercise_id')->pluck('exercise_id')->all();

        foreach ($course->chapters as $chapter) {
            foreach ($chapter->lessons as $lesson) {
                $lesson->is_completed = in_array($lesson->id, $completedLessons);
            }
            foreach ($chapter->exercises as $exercise) {
                $exercise->is_completed = in_array($exercise->id, $completedExercises);
            }
        }

        $moreCoursesByInstructor = $this->getMoreCoursesByInstructor($course->creator_id, $courseId);

        return [
            'course' => $course,
            'moreCoursesByInstructor' => $moreCoursesByInstructor,
        ];
    }

    protected function calculateCourseStats(&$course)
    {
        $userId = auth()->id();

        $completedLessonsIds = UserProgress::where('user_id', $userId)
            ->whereNotNull('lesson_id')
            ->pluck('lesson_id');

        $completedExercisesIds = UserProgress::where('user_id', $userId)
            ->whereNotNull('exercise_id')
            ->pluck('exercise_id');

        foreach ($course->chapters as $chapter) {
            $chapter->completedLessonsCount = $chapter->lessons->filter(function($lesson) use ($completedLessonsIds) {
                return $completedLessonsIds->contains($lesson->id);
            })->count();

            $chapter->completedExercisesCount = $chapter->exercises->filter(function($exercise) use ($completedExercisesIds) {
                return $completedExercisesIds->contains($exercise->id);
            })->count();

        }

        $course->lessons_count = $course->chapters->pluck('lessons')->flatten()->count();
        $course->exercises_count = $course->chapters->pluck('exercises')->flatten()->count();
        $course->totalLecturesCount = $course->lessons_count + $course->exercises_count;
        $course->coursesCreatedByCreator = $course->creator->created_courses_count;
    }

    protected function sortChapterItems(&$course)
    {
        $course->chapters->each(function ($chapter) {
            $mergedItems = $chapter->lessons->merge($chapter->exercises);
            $sortedItems = $mergedItems->sortBy('created_at');
            $chapter->sortedItems = $sortedItems;
            Log::info("Sorted items for chapter {$chapter->id}: " . json_encode($sortedItems));
        });
    }

    protected function getMoreCoursesByInstructor($creatorId, $excludeCourseId)
    {
        return Course::where('creator_id', $creatorId)
            ->where('id', '!=', $excludeCourseId)
            ->take(3)
            ->get()
            ->each(function ($course) {
                $course->lessons_count = $course->chapters->pluck('lessons')->flatten()->count();
                $course->exercises_count = $course->chapters->pluck('exercises')->flatten()->count();
                $course->lectures_count = $course->lessons_count + $course->exercises_count;
            });
    }

    public function getTotalCourseDuration($courseId)
    {
        $course = Course::with(['chapters.lessons'])->findOrFail($courseId);

        $totalSeconds = 0;
        foreach ($course->chapters as $chapter) {
            foreach ($chapter->lessons as $lesson) {
                $totalSeconds += $lesson->video_duration;
            }

        }

        $hours = floor($totalSeconds / 3600);
        $minutes = floor(($totalSeconds / 60) % 60);

        return $hours > 0 ? sprintf("%d hours %02d minutes", $hours, $minutes) : sprintf("%d minutes", $minutes);
    }

    public function getTotalEnrollmentsByInstructor($instructorId)
    {
        $courses = Course::where('creator_id', $instructorId)->get();

        $uniqueUserIds = collect();

        foreach ($courses as $course) {
            $courseUserIds = $course->users()->pluck('user_id')->unique();
            $uniqueUserIds = $uniqueUserIds->merge($courseUserIds);
        }

        return $uniqueUserIds->unique()->count();
    }


    protected function mergeAndSortItems($course)
    {
        $items = collect();
        foreach ($course->chapters as $chapter) {
            $chapterItems = collect();

            foreach ($chapter->lessons as $lesson) {
                $chapterItems->push(['type' => 'lesson', 'item' => $lesson]);
            }
            foreach ($chapter->exercises as $exercise) {
                $chapterItems->push(['type' => 'exercise', 'item' => $exercise]);
            }

            $sortedChapterItems = $chapterItems->sortBy('item.created_at')->values();

            $items = $items->concat($sortedChapterItems);
        }

        return $items;
    }

    public function next($courseId, $type, $currentItemId)
    {
        $course = Course::findOrFail($courseId);
        $items = $this->mergeAndSortItems($course);
        $currentIndex = $items->search(function ($item) use ($type, $currentItemId) {
            return $item['item']->id == $currentItemId && $item['type'] == $type;
        });

        $routePrefix = str_replace('/', '.', ltrim(request()->route()->getPrefix(), '/'));

        if ($currentIndex !== false && $currentIndex + 1 < $items->count()) {
            $nextItem = $items[$currentIndex + 1];
            return redirect()->route("{$routePrefix}.{$nextItem['type']}s.show", $nextItem['item']);
        }

        return redirect()->route("user.{$type}s.show", $currentItemId);

    }

    public function prev($courseId, $type, $currentItemId)
    {
        $course = Course::findOrFail($courseId);
        $items = $this->mergeAndSortItems($course);
        $currentIndex = $items->search(function ($item) use ($type, $currentItemId) {
            return $item['item']->id == $currentItemId && $item['type'] == $type;
        });

        $routePrefix = str_replace('/', '.', ltrim(request()->route()->getPrefix(), '/'));

        if ($currentIndex !== false && $currentIndex > 0) {
            $prevItem = $items[$currentIndex - 1];
            return redirect()->route("{$routePrefix}.{$prevItem['type']}s.show", $prevItem['item']);
        }

        return redirect()->back()->with('error', 'No previous item available.');
    }



}
