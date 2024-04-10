<?php

namespace App\Services\Media;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class VideoDurationService
{
    public function getDurationFromYoutube($videoId)
    {
        $apiKey = config('services.youtube.key');
        $url = "https://www.googleapis.com/youtube/v3/videos?id={$videoId}&part=contentDetails&key={$apiKey}";

        $response = Http::get($url);

        if ($response->successful()) {
            Log::info($response->json());
            $duration = $response->json()['items'][0]['contentDetails']['duration'];
            return $this->convertYoutubeDurationToSeconds($duration);
        }

        return null;
    }

    public function getDurationFromVimeo($videoId)
    {
        $accessToken = config('services.vimeo.access_token');
        $url = "https://api.vimeo.com/videos/{$videoId}";

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $accessToken,
        ])->get($url);

        if ($response->successful()) {
            Log::info($response->json());
            $duration = $response->json()['duration'];
            return $duration;
        }

        return null;
    }

    private function convertYoutubeDurationToSeconds($duration)
    {
        $interval = new \DateInterval($duration);
        return ($interval->h * 3600) + ($interval->i * 60) + $interval->s;
    }
}
