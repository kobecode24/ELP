<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLessonRequest;
use App\Http\Requests\UpdateLessonRequest;
use App\Models\Chapter;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\UserProgress;
use App\Services\Education\CourseService;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class LessonController extends Controller
{
//    public function show(Lesson $lesson , CourseService $courseService)
//    {
//        $user = Auth::user();
//        $course = $lesson->chapter->course;
//        $chapters = $course->chapters()->with(['lessons', 'exercises'])->get();
//
//
//        return view('user.lessons.show', compact('lesson', 'user' , 'course' , 'chapters'));
//    }

    public function show(Lesson $lesson , CourseService $courseService)
    {
        $user = Auth::user();
        $courseId = $lesson->chapter->course_id;

        if (!$user->isEnrolledInCourse($courseId)) {
            return redirect()->back()->withErrors('You are not enrolled in this course.');
        }

        $details = $courseService->getCourseDetails($courseId);
        $course = $details['course'];

        return view('user.lessons.show', [
            'user' => $user,
            'course' => $course,
            'lesson' => $lesson,
        ]);
    }

    public function markAsCompleted(Lesson $lesson)
    {
        $userId = Auth::id();
        $courseId = $lesson->chapter->course->id;

        $existingProgress = UserProgress::where('user_id', $userId)
            ->where('lesson_id', $lesson->id)
            ->first();

        if (!$existingProgress) {
            UserProgress::create([
                'user_id' => $userId,
                'course_id' => $courseId,
                'lesson_id' => $lesson->id,
                'completed_at' => now()
            ]);

            return response()->json(['message' => 'Lesson marked as completed successfully']);
        }

        return response()->json(['message' => 'Lesson already marked as completed'], 200);
    }

}
