<?php

namespace App\Http\Controllers\instructor;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLessonRequest;
use App\Http\Requests\UpdateLessonRequest;
use App\Models\Chapter;
use App\Models\Lesson;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lessons = Lesson::all();
        return view('instructor.lessons.index', compact('lessons'));
    }

    /**
     * Show the form for creating a new resource.
     */
        public function create(Request $request)
    {
        $chapterId = $request->input('chapter_id');

        $chapter = null;
        if ($chapterId) {
            $chapter = Chapter::find($chapterId);
        }

        return view('instructor.lessons.create', compact('chapter'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLessonRequest $request)
    {
        $chapter = Chapter::findOrFail($request->chapter_id);
        $courseId = $chapter->course_id;
        Lesson::create($request->validated());
        return redirect()->route('courses.show', $courseId)->with('success', 'Lesson created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Lesson $lesson)
    {
        return view('instructor.lessons.show', compact('lesson'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lesson $lesson)
    {
        return view('instructor.lessons.edit', compact('lesson'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLessonRequest $request, Lesson $lesson)
    {
        $chapter = Chapter::findOrFail($request->chapter_id);
        $courseId = $chapter->course_id;
        $lesson->update($request->validated());
        return redirect()->route('courses.show', $courseId)->with('success', 'Lesson updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lesson $lesson)
    {
        $lesson->delete();
        return back()->with('success', 'Lesson deleted successfully.');
    }
}
