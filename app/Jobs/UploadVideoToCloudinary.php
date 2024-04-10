<?php

namespace App\Jobs;


use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Lesson;
use App\Services\Media\CloudinaryService;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class UploadVideoToCloudinary implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $lessonId;
    protected $videoPath;

    public function __construct($lessonId, $videoPath)
    {
        $this->lessonId = $lessonId;
        $this->videoPath = $videoPath;
    }

    public function handle()
    {

        Log::info("Lesson ID: {$this->lessonId}, Type: " . gettype($this->lessonId));
        Log::info("Video Path: {$this->videoPath}, Type: " . gettype($this->videoPath));

        $cloudinaryService = resolve(CloudinaryService::class);
        $lesson = Lesson::findOrFail($this->lessonId);

        try {
            $uploadResult = Cloudinary::uploadVideo($this->videoPath, [
                'folder' => 'course_videos',
                'resource_type' => 'video',
            ]);

            $videoUrl = $uploadResult->getSecurePath();
            $publicId = $uploadResult->getPublicId();
            $videoDuration = round($cloudinaryService->getVideoDuration($publicId));

            $lesson->update([
                'is_video_processing' => false,
                'video_url' => $videoUrl,
                'video_public_id' => $publicId,
                'video_duration' => $videoDuration,
            ]);
            if(file_exists($this->videoPath)) {
                Log::info("File exists before attempting deletion: true");
                $deleteAttempt = unlink($this->videoPath) ? "successful" : "failed";
                Log::info("File deletion attempt: " . $deleteAttempt);
            } else {
                Log::info("File exists before attempting deletion: false");
            }

        } catch (\Exception $e) {
            Log::error("Failed to upload video for lesson ID {$this->lessonId}: " . $e->getMessage());
        }
    }

}
