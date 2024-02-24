<?php

namespace App\Http\Controllers\instructor;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreChapterRequest;
use App\Models\Chapter;
use App\Models\Course;
use Illuminate\Http\Request;

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

        return redirect()->route('courses.show', $chapter->course_id)
            ->with('success', 'Chapter created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $chapter = Chapter::findOrFail($id);

        return view('instructor.chapters.show', compact('chapter'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $chapter = Chapter::findOrFail($id);
        return view('instructor.chapters.edit', compact('chapter'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreChapterRequest $request, $id)
    {
        $chapter = Chapter::findOrFail($id);
        $chapter->update($request->validated());

        return redirect()->route('courses.show', $chapter->course_id)
            ->with('success', 'Chapter updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $chapter = Chapter::findOrFail($id);
        $courseId = $chapter->course_id;
        $chapter->delete();

        return redirect()->route('courses.show', $courseId)
            ->with('success', 'Chapter deleted successfully.');
    }
}
