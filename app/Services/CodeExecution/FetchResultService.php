<?php


namespace App\Services\CodeExecution;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

class FetchResultService
{
    protected $client;
    protected $accessToken;
    protected $endpoint;

    public function __construct()
    {
        $this->client = new Client();
        $this->accessToken = env('SPHERE_ENGINE_ACCESS_TOKEN');
        $this->endpoint = env('SPHERE_ENGINE_ENDPOINT');
    }

    public function fetchResult($submissionId)
    {
        $response = $this->client->get("{$this->endpoint}/submissions/{$submissionId}", [
            'query' => ['access_token' => $this->accessToken],
        ]);

        $statusCode = $response->getStatusCode();
        $content = json_decode($response->getBody()->getContents(), true);
        Log::info('FetchResultService:fetchResult', ['statusCode' => $statusCode, 'content' => $content]);
        if ($statusCode == 200 && isset($content['result']['streams']['output']['uri'])) {
            $outputUri = $content['result']['streams']['output']['uri'];
            $outputResponse = $this->client->get($outputUri);
            Log::info('FetchResultService:fetchResult', ['outputResponse' => $outputResponse]);
            if ($outputResponse->getStatusCode() == 200) {
                $actualOutput = (string) $outputResponse->getBody();
                $content['result']['actualOutput'] = $actualOutput;
                Log::info('FetchResultService:fetchResult', ['actualOutput' => $actualOutput]);
            }
        }

        if ($statusCode == 200) {
            return [
                'success' => true,
                'data' => $content,
            ];
        } else {
            return [
                'success' => false,
                'message' => 'Failed to fetch the result.',
            ];
        }
    }
}
