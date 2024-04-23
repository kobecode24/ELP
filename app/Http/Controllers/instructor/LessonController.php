<?php

namespace App\Http\Controllers\instructor;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLessonRequest;
use App\Http\Requests\UpdateLessonRequest;
use App\Models\Chapter;
use App\Models\Lesson;
use App\Services\Education\CourseService;
use App\Services\Education\LessonService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LessonController extends Controller
{
    protected $lessonService;


    public function __construct(LessonService $lessonService)
    {
        $this->lessonService = $lessonService;
    }
    /**
     * Display a listing of the resource.
     */
    /*public function index()
    {
        $lessons = Lesson::all();
        return view('instructor.lessons.index', compact('lessons'));
    }*/

    /**
     * Show the form for creating a new resource.
     */
        public function create(Request $request)
    {
        $user = Auth::user();
        $chapterId = $request->input('chapter_id');

        $chapter = null;
        if ($chapterId) {
            $chapter = Chapter::find($chapterId);
        }

        return view('instructor.lessons.create', compact('chapter' , 'user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLessonRequest $request)
    {
        $data = $request->validated();
        $videoFile = $request->file('video');

        $lesson = $this->lessonService->createOrUpdateLesson($data, null, $videoFile);

        return redirect()->route('instructor.courses.show', $lesson->chapter->course_id)->with('success', 'Lesson created successfully.');
    }

    public function edit(Lesson $lesson)
    {
        $user = Auth::user();
        $courseId = $lesson->chapter->course_id;
        if (!$user->isCourseCreator($courseId) ){
            return redirect()->back()->withErrors('you are not allowed to see this content');
        }
        return view('instructor.lessons.edit', compact('lesson' , 'user'));
    }

    public function update(UpdateLessonRequest $request, Lesson $lesson)
    {
        $user = Auth::user();
        $courseId = $lesson->chapter->course_id;
        if (!$user->isCourseCreator($courseId) ){
            return redirect()->back()->withErrors('you are not allowed to see this content');
        }
        $data = $request->validated();
        $videoFile = $request->hasFile('video') ? $request->file('video') : null;

        $updatedLesson = $this->lessonService->createOrUpdateLesson($data, $lesson, $videoFile);

        return redirect()->route('instructor.courses.show', $updatedLesson->chapter->course_id)->with('success', 'Lesson updated successfully.');
    }

    public function show(Lesson $lesson , CourseService $courseService)
    {
        $user = Auth::user();
        $courseId = $lesson->chapter->course_id;

        if (!$user->isCourseCreator($courseId) ){
            return redirect()->back()->withErrors('you are not allowed to see this content');
        }

        $details = $courseService->getCourseDetails($courseId);
        $course = $details['course'];


        return view('instructor.lessons.show', [
            'user' => $user,
            'course' => $course,
            'lesson' => $lesson,
        ]);
    }

    public function destroy(Lesson $lesson)
    {
        $user = Auth::user();
        $courseId = $lesson->chapter->course_id;
        if (!$user->isCourseCreator($courseId) ){
            return redirect()->back()->withErrors('you are not allowed to see this content');
        }
        $lesson->delete();
        return redirect()->back()->with('success', 'Lesson deleted successfully.');
    }


}
