<?php

namespace App\Services;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;

class CodeExecutionService
{
    protected $accessToken;
    protected $endpoint;

    public function __construct()
    {
        $this->accessToken = env('SPHERE_ENGINE_ACCESS_TOKEN');
        $this->endpoint = env('SPHERE_ENGINE_ENDPOINT');
    }

    /**
     * Execute code on Sphere Engine.
     *
     * @param string $sourceCode The source code to be executed.
     * @param int $languageId The ID of the programming language.
     * @return array The initial response from Sphere Engine.
     */
    public function executeCode($sourceCode, $languageId)
    {
        $response = Http::post("{$this->endpoint}/submissions?access_token={$this->accessToken}", [
            'source' => $sourceCode,
            'compilerId' => $languageId,
            'input' => '',
        ]);

        if ($response->successful()) {
            return [
                'success' => true,
                'data' => $response->json(),
            ];
        }

        return [
            'success' => false,
            'message' => 'Failed to execute code.',
        ];
    }
}

