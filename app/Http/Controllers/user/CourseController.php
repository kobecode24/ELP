<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Services\Education\CourseService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        $query = Course::with(['instructor', 'chapters.lessons', 'chapters.exercises']);

        if ($search = $request->input('search')) {
            $query->where('title', 'ILIKE', "%{$search}%");
        }

        $sortType = $request->input('sort');
        switch ($sortType) {
            case 'popular':
                $query->withCount('users')->orderBy('users_count', 'desc');
                break;
            case 'price':
                $query->orderBy('points_required', 'desc');
                break;
            case 'newest':
                $query->orderBy('created_at', 'desc');
                break;
            case 'title':
                $query->orderBy('title');
                break;
            default:
                $query->orderBy('updated_at', 'desc');
        }

        $courses = $query->where('is_approved', true)->paginate(10);

        $courses->each(function ($course) {
            $course->lessons_count = $course->chapters->pluck('lessons')->flatten()->count();
            $course->exercises_count = $course->chapters->pluck('exercises')->flatten()->count();
        });
        return view('user.courses.index', compact('courses', 'user'));
    }

    /**
     * Display the specified resource.
     */
    /*public function show($id, CourseService $courseService)
    {
        $user = Auth::user();
        $details = $courseService->getCourseDetails($id);
        $totalDuration = $courseService->getTotalCourseDuration($id);

        $course = $details['course'];
        $moreCoursesByInstructor = $details['moreCoursesByInstructor'];
        $totalLecturesCount = $course->totalLecturesCount;
        $coursesCreatedByCreator = $course->coursesCreatedByCreator;
        $totalEnrolledUsers = $course->users()->count();
        $totalEnrollments = $courseService->getTotalEnrollmentsByInstructor($course->instructor->id);

        return view('user.courses.show', compact(
            'user',
            'course',
            'totalLecturesCount',
            'coursesCreatedByCreator',
            'moreCoursesByInstructor',
            'totalDuration',
            'totalEnrolledUsers',
            'totalEnrollments'
        ));
    }*/

    public function show($courseId, CourseService  $courseService)
    {
        $user=Auth::user();
        $details = $courseService->getCourseDetails($courseId);
        $course = $details['course'];

        return view('user.courses.show', [
            'user' => $user,
            'course' => $course,
            'totalLecturesCount' => $course->totalLecturesCount,
            'coursesCreatedByCreator' => $course->coursesCreatedByCreator,
            'moreCoursesByInstructor' => $details['moreCoursesByInstructor'],
            'totalDuration' => $courseService->getTotalCourseDuration($courseId),
            'totalEnrolledUsers' => $course->users()->count(),
            'totalEnrollments' => $courseService->getTotalEnrollmentsByInstructor($course->instructor->id)
        ]);
    }


    public function enroll(Request $request, Course $course)
    {
        $user = auth()->user();

        if ($course->creator_id == $user->id) {
            return back()->with('error', 'You cannot enroll in your own course.');
        }

        if ($user->courses->contains($course->id)) {
            return back()->with('error', 'You are already enrolled in this course.');
        }

        if ($user->points < $course->points_required) {
            return back()->with('error', 'You do not have enough points to enroll in this course.');
        }

        $user->points -= $course->points_required;
        $user->courses()->attach($course->id);
        $user->save();

        return back()->with('success', 'You have been enrolled in the course successfully.');
    }
}
