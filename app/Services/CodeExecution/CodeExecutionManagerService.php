<?php

namespace App\Services\CodeExecution;

use App\Models\Exercise;
use App\Models\UserExercise;
use App\Models\UserProgress;
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

        $isCourseCreator = $exercise->chapter->course->creator_id == $user->id;
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

        $pointsRewarded = false;
        if (!$previousCorrectAttemptExists && $isCorrect && !$isCourseCreator) {
            $user->increment('points', $exercise->points_reward);
            $this->completeExercise($exercise->chapter->course->id , $exerciseId,$user->id);
            $pointsRewarded = true;
            $points = $exercise->points_reward;
        }

        return ['testResults' => $testResults, 'firstCorrectAttempt' => !$previousCorrectAttemptExists && $isCorrect , 'pointsRewarded' => $pointsRewarded ,         'isCourseCreator' => $isCourseCreator , 'points' => $points ?? 0];
    }

    public function completeExercise($courseId, $exerciseId , $userId) {

        UserProgress::create([
            'user_id' => $userId,
            'course_id' => $courseId,
            'lesson_id' => null,
            'exercise_id' => $exerciseId,
            'completed_at' => now()
        ]);
    }

}
