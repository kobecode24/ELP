<?php

namespace App\Http\Controllers\instructor;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreExerciseRequest;
use App\Models\Chapter;
use App\Models\Exercise;
use App\Services\CodeExecution\CodeExecutionService;
use App\Services\CodeExecution\FetchResultService;
use App\Services\Education\CourseService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ExerciseController extends Controller
{

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $user = auth()->user();
        $chapterId = $request->input('chapter_id');
        $editorMode = 'ace/mode/plain_text';

        $chapter = Chapter::with('course.programmingLanguage')->find($chapterId);

        if (!$chapter || !$chapter->course) {
            return redirect()->back()->withErrors('Invalid chapter or course not found.');
        }

        if ($chapter->course->programmingLanguage) {
            $editorMode = $chapter->course->programmingLanguage->editor_mode;
        }

        if (!$user->isCourseCreator($chapter->course_id) && !$user->hasRole('admin')) {
            return redirect()->back()->withErrors('You are not authorized to access this page.');
        }

        return view('instructor.exercises.create', compact('chapter', 'editorMode', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreExerciseRequest $request)
    {
        $user = Auth::user();
        $chapter = Chapter::with('course')->findOrFail($request->input('chapter_id'));
        $courseId = $chapter->course_id;

        if (!$user->isCourseCreator($courseId) && !$user->hasRole('admin')) {
            return redirect()->back()->withErrors('You are not authorized to create exercises for this course.');
        }

        Exercise::create($request->validated());

        return redirect()->route('instructor.courses.show', $courseId)
            ->with('success', 'Exercise created successfully.');
    }


    /**
     * Display the specified resource.
     */

    public function show(Exercise $exercise, CourseService $courseService)
    {
        $user= Auth::user();
        $courseId = $exercise->chapter->course_id;
        $details = $courseService->getCourseDetails($courseId);
        $course = $details['course'];

        if (!$user->isCourseCreator($courseId) && !$user->hasRole('admin')){
            return redirect()->back()->withErrors('you are not allowed to see this content');
        }

        $editorMode = 'ace/mode/plain_text';
        if ($exercise->chapter && $exercise->chapter->course && $exercise->chapter->course->programmingLanguage) {
            $editorMode = $exercise->chapter->course->programmingLanguage->editor_mode;
        }

        return view('instructor.exercises.show', compact('exercise', 'editorMode' , 'user', 'course'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = auth()->user();
        $exercise = Exercise::findOrFail($id);

        $courseId = $exercise->chapter->course_id;

        if (!$user->isCourseCreator($courseId) && !$user->hasRole('admin')){
            return redirect()->back()->withErrors('you are not allowed to see this content');
        }

        $editorMode = 'ace/mode/plain_text';

        if ($exercise->chapter && $exercise->chapter->course && $exercise->chapter->course->programmingLanguage) {
            $editorMode = $exercise->chapter->course->programmingLanguage->editor_mode;
        }

        $chapter = $exercise->chapter;

        return view('instructor.exercises.edit', compact('exercise', 'chapter', 'editorMode' , 'user'));
    }

    public function update(StoreExerciseRequest $request, $id)
    {
        $user=Auth::user();
        $exercise = Exercise::findOrFail($id);
        $exercise->update($request->validated());

        $courseId = $exercise->chapter->course_id;
        if (!$user->isCourseCreator($courseId) && !$user->hasRole('admin')){
            return redirect()->back()->withErrors('you are not allowed to see this content');
        }

        return redirect()->route('instructor.courses.show', $courseId)->with('success', 'Exercise updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $exercise = Exercise::findOrFail($id);
        $courseId = $exercise->chapter->course_id;
        $user = Auth::user();
        if (!$user->isCourseCreator($courseId) && !$user->hasRole('admin')){
            return redirect()->back()->withErrors('you are not allowed to see this content');
        }
        $exercise->delete();

        return redirect()->back()->with('success', 'Exercise deleted successfully.');
    }

    public function executeCode(Request $request, $exerciseId, CodeExecutionService $codeExecutionService, FetchResultService $fetchResultService) {
        $exercise = Exercise::findOrFail($exerciseId);
        $languageId = $exercise->chapter->course->programmingLanguage->compiler_id;
        $userCode = $request->input('code');
        $testCode = $exercise->test_code;

        $combinedCode = $userCode . "\n" . $testCode;

        try {
            $executionResult = $codeExecutionService->executeCode($combinedCode, $languageId);

            if (!$executionResult['success']) {
                throw new \Exception('Execution failed: ' . $executionResult['message']);
            }

            $submissionId = $executionResult['data']['id'];
            sleep(7);
            $fetchResult = $fetchResultService->fetchResult($submissionId);

            if (!$fetchResult['success']) {
                throw new \Exception('Failed to fetch result: ' . $fetchResult['message']);
            }

            $actualOutput = $fetchResult['data']['result']['actualOutput'] ?? '';
            Log::info('Actual Output: ' . $actualOutput);
            $expectedOutputs = explode("\n", trim($exercise->expected_output));
            Log::info('Expected Outputs: ' . json_encode($expectedOutputs));
            $actualOutputs = explode("\n", trim($actualOutput));
            Log::info('Actual Outputs: ' . json_encode($actualOutput));
            $testResults = [];
            foreach ($expectedOutputs as $index => $expected) {
                $expected = trim($expected);
                $actual = trim($actualOutputs[$index] ?? 'No Output');
                $testResults[] = [
                    'testCase' => $index + 1,
                    'expected' => $expected,
                    'actual' => $actual,
                    'passed' => $expected === $actual,
                ];
            }

            return response()->json(['success' => true, 'testResults' => $testResults]);
        } catch (\Exception $e) {
            Log::error('Execution error: ' . $e->getMessage());
            return response()->json(['error' => 'Execution failed: ' . $e->getMessage()], 500);
        }
    }




}
