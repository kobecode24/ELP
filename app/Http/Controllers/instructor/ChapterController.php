<?php

namespace App\Http\Controllers\instructor;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreChapterRequest;
use App\Models\Chapter;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChapterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courseId = request('course_id');
        $chapters = Chapter::where('course_id', $courseId)->get();

        return view('instructor.chapters.index', compact('chapters'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $courses = Course::all();

        return view('instructor.chapters.create', compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreChapterRequest $request)
    {
        $chapter = Chapter::create($request->validated());

        return redirect()->route('instructor.courses.show', $chapter->course_id)
            ->with('success', 'Chapter created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $chapter = Chapter::findOrFail($id);
        $lesson = $chapter->lessons;
        $user=Auth::user();
        $courseId=$chapter->course->id;

        if (!$user->isCourseCreator($courseId) && !$user->hasRole('admin')){
            return redirect()->back()->withErrors('you are not allowed to see this content');
        }
        return view('instructor.chapters.show', compact('chapter', 'lesson'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $chapter = Chapter::findOrFail($id);
        $courseId=$chapter->course->id;
        $user = Auth::user();

        if (!$user->isCourseCreator($courseId) && !$user->hasRole('admin')){
            return redirect()->back()->withErrors('you are not allowed to see this content');
        }
        return view('instructor.chapters.edit', compact('chapter' , 'user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreChapterRequest $request, $id)
    {
        $chapter = Chapter::findOrFail($id);
        $chapter->update($request->validated());

        $courseId=$chapter->course->id;
        $user = Auth::user();

        if (!$user->isCourseCreator($courseId) && !$user->hasRole('admin')){
            return redirect()->back()->withErrors('you are not allowed to see this content');
        }

        return redirect()->route('instructor.courses.show', $chapter->course_id)
            ->with('success', 'Chapter updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $chapter = Chapter::findOrFail($id);
        $courseId = $chapter->course_id;
        $user = Auth::user();

        if (!$user->isCourseCreator($courseId) && !$user->hasRole('admin')){
            return redirect()->back()->withErrors('you are not allowed to see this content');
        }
        $chapter->delete();

        return redirect()->route('instructor.courses.show', $courseId)
            ->with('success', 'Chapter deleted successfully.');
    }
}
