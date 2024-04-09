<?php

namespace App\Services\CodeExecution;

use App\Models\Exercise;
use App\Models\UserExercise;
use Illuminate\Support\Facades\Auth;

class CodeExecutionManagerService
{
    protected $codeExecutionWorkflowService;

    public function __construct(CodeExecutionWorkflowService $codeExecutionWorkflowService)
    {
        $this->codeExecutionWorkflowService = $codeExecutionWorkflowService;
    }

    public function handleExecution($exerciseId, $userCode)
    {
        $exercise = Exercise::with('chapter.course')->findOrFail($exerciseId);
        $user = Auth::user();

        $notExerciseCreator = $exercise->chapter->course->creator_id != $user->id;
        $testResults = $this->codeExecutionWorkflowService->executeAndCheck($userCode, $exercise);
        $isCorrect = collect($testResults)->every('passed');

        $previousCorrectAttemptExists = UserExercise::where([
            ['user_id', '=', $user->id],
            ['exercise_id', '=', $exercise->id],
            ['is_correct', '=', true]
        ])->exists();

        UserExercise::create([
            'user_id' => $user->id,
            'exercise_id' => $exercise->id,
            'user_answer' => $userCode,
            'is_correct' => $isCorrect,
        ]);

        if (!$previousCorrectAttemptExists && $isCorrect && $notExerciseCreator) {
            $user->increment('points', $exercise->points_reward);
        }

        return ['testResults' => $testResults, 'firstCorrectAttempt' => !$previousCorrectAttemptExists && $isCorrect];
    }
}
