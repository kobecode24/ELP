<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCourseRequest;
use App\Models\Course;
use App\Models\ProgrammingLanguage;
use App\Models\SpokenLanguage;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $userId = Auth::id();

        $courses = Course::with(['instructor', 'chapters.lessons', 'chapters.exercises'])->paginate(10);

        $courses->each(function ($course) {
            $course->lessons_count = $course->chapters->pluck('lessons')->flatten()->count();
            $course->exercises_count = $course->chapters->pluck('exercises')->flatten()->count();
        });
        return view('user.courses.index', compact('courses' , 'user'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $user = Auth::user();
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

        ])->findOrFail($id);

            $course->lessons_count = $course->chapters->pluck('lessons')->flatten()->count();
            $course->exercises_count = $course->chapters->pluck('exercises')->flatten()->count();

        $course->chapters->each(function ($chapter) {
            $mergedItems = $chapter->lessons->merge($chapter->exercises);
            $sortedItems = $mergedItems->sortBy('created_at');
            $chapter->sortedItems = $sortedItems;
        });

        $totalLessonsCount = $course->chapters->sum('lessons_count');
        $totalExercisesCount = $course->chapters->sum('exercises_count');

        $totalLecturesCount = $totalLessonsCount + $totalExercisesCount;
        $coursesCreatedByCreator = $course->creator->created_courses_count;

        $moreCoursesByInstructor = Course::where('creator_id', $course->creator_id)
            ->where('id', '!=', $course->id)
            ->take(3)
            ->get();

        $moreCoursesByInstructor->each(function ($course) {
            $course->lessons_count = $course->chapters->pluck('lessons')->flatten()->count();
            $course->exercises_count = $course->chapters->pluck('exercises')->flatten()->count();
            $course->lectures_count = $course->lessons_count + $course->exercises_count;
        });

        return view('user.courses.show', compact('course', 'user'  , 'totalLecturesCount' , 'coursesCreatedByCreator' , 'moreCoursesByInstructor'));
    }
}
