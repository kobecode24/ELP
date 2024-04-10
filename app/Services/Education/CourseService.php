<?php

namespace App\Services\Education;

use App\Models\Course;

class CourseService
{
    public function getCourseDetails($courseId)
    {
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

        $moreCoursesByInstructor = $this->getMoreCoursesByInstructor($course->creator_id, $courseId);

        return [
            'course' => $course,
            'moreCoursesByInstructor' => $moreCoursesByInstructor,
        ];
    }

    protected function calculateCourseStats(&$course)
    {
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



}
