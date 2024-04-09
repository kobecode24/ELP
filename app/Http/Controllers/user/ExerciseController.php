<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Exercise;
use App\Services\CodeExecution\CodeExecutionManagerService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ExerciseController extends Controller
{

    /**
     * Display the specified resource.
     */
    public function show(Exercise $exercise)
    {
        $user= Auth::user();
        $editorMode = 'ace/mode/plain_text';
        if ($exercise->chapter && $exercise->chapter->course && $exercise->chapter->course->programmingLanguage) {
            $editorMode = $exercise->chapter->course->programmingLanguage->editor_mode;
        }

        return view('user.exercises.show', compact('exercise', 'editorMode' , 'user'));
    }


    public function executeCode(Request $request, $exerciseId, CodeExecutionManagerService $managerService)
    {
        try {
            $userCode = $request->input('code');
            $executionData = $managerService->handleExecution($exerciseId, $userCode);

            return response()->json(['success' => true] + $executionData);
        } catch (\Exception $e) {
            Log::error('Execution error: ' . $e->getMessage());
            return response()->json(['error' => 'Execution failed: ' . $e->getMessage()], 500);
        }
    }

    /*public function executeCode(Request $request, $exerciseId, CodeExecutionWorkflowService $workflowService) {
        $exercise = Exercise::findOrFail($exerciseId);
        $userCode = $request->input('code');

        try {
            $testResults = $workflowService->executeAndCheck($userCode, $exercise);
            return response()->json(['success' => true, 'testResults' => $testResults]);
        } catch (\Exception $e) {
            Log::error('Execution error: ' . $e->getMessage());
            return response()->json(['error' => 'Execution failed: ' . $e->getMessage()], 500);
        }
    }*/

}
