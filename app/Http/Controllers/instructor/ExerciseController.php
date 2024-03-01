<?php

namespace App\Http\Controllers\instructor;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreExerciseRequest;
use App\Models\Chapter;
use App\Models\Exercise;
use Illuminate\Http\Request;

class ExerciseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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

        return view('instructor.exercises.create', compact('chapter'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreExerciseRequest $request)
    {
        $chapter = Chapter::findOrFail($request->chapter_id);
        $courseId = $chapter->course_id;
        Exercise::create($request->validated());
        return redirect()->route('courses.show', $courseId)->with('success', 'Exercise created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Exercise $exercise)
    {
        return view('instructor.exercises.edit', compact('exercise'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreExerciseRequest $request, Exercise $exercise)
    {
        $chapter = Chapter::findOrFail($request->chapter_id);
        $courseId = $chapter->course_id;
        $exercise->update($request->validated());
        return redirect()->route('courses.show', $courseId)->with('success', 'Exercise updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
