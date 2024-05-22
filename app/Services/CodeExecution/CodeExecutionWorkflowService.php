<?php

namespace App\Services\CodeExecution;

use App\Models\Exercise;
use Illuminate\Support\Facades\Log;

class CodeExecutionWorkflowService
{
    protected $codeExecutionService;
    protected $fetchResultService;

    public function __construct(CodeExecutionService $codeExecutionService, FetchResultService $fetchResultService)
    {
        $this->codeExecutionService = $codeExecutionService;
        $this->fetchResultService = $fetchResultService;
    }

    public function executeAndCheck($userCode, Exercise $exercise)
    {
        $languageId = $exercise->chapter->course->programmingLanguage->compiler_id;
        $testCode = $exercise->test_code;
        $combinedCode = $userCode . "\n" . $testCode;

        try {
            $executionResult = $this->codeExecutionService->executeCode($combinedCode, $languageId);
            if (!$executionResult['success']) {
                Log::error('Code execution failed: ' . $executionResult['message']);
                throw new \Exception('Execution failed: ' . $executionResult['message']);
            }

            if ($languageId == 93) {
                sleep(10);
            } else {
                sleep(2);
            }

            $submissionId = $executionResult['data']['id'];
            $fetchResult = $this->fetchResultService->fetchResult($submissionId);

            if (!$fetchResult['success']) {
                throw new \Exception('Failed to fetch result: ' . $fetchResult['message']);
            }

            return $this->compareOutputs($fetchResult['data']['result']['actualOutput'] ?? '', $exercise->expected_output);
        } catch (\Exception $e) {
            Log::error('Code execution workflow error: ' . $e->getMessage());
            throw $e;
        }
    }

    protected function compareOutputs($actualOutput, $expectedOutput)
    {
        $expectedOutputs = explode("\n", trim($expectedOutput));
        $actualOutputs = explode("\n", trim($actualOutput));
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

        return $testResults;
    }
}

