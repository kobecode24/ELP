<?php

namespace App\Services\Education;

use App\Jobs\UploadVideoToCloudinary;
use App\Models\Lesson;
use App\Services\Media\CloudinaryService;
use App\Services\Media\VideoDurationService;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class LessonService
{
    protected $videoDurationService;
    protected $cloudinaryService;

    public function __construct(VideoDurationService $videoDurationService, CloudinaryService $cloudinaryService)
    {
        $this->videoDurationService = $videoDurationService;
        $this->cloudinaryService = $cloudinaryService;
    }

    public function createOrUpdateLesson($data, $lesson = null, $videoFile = null)
    {
        if (!empty($data['video_url'])) {
            $urlData = $this->getDurationFromUrl($data['video_url']);
            $data['video_duration'] = $urlData['duration'];
            if ($urlData['publicId']) {
                $data['video_public_id'] = $urlData['publicId'];
            }
            unset($data['video']);
        }

        if ($lesson) {
            $lesson->update($data);
        } else {
            $lesson = Lesson::create($data);
        }

        if ($videoFile) {
            /*$destinationPath = 'uploads/videos';
            $fileName = $videoFile->getClientOriginalName();
            $videoFile->move(public_path($destinationPath), $fileName);
            $tempVideoPath = public_path("$destinationPath/$fileName");*/
            $lesson->update(['is_video_processing' => true]);
            /*UploadVideoToCloudinary::dispatch($lesson->id, $tempVideoPath);*/

            UploadVideoToCloudinary::dispatch($lesson->id, $videoFile->getRealPath());
        }

        return $lesson;
    }

    /*public function createOrUpdateLesson($data, $lesson = null, $videoFile = null)
    {
        if (!empty($data['video_url'])) {
            $urlData = $this->getDurationFromUrl($data['video_url']);
            $data['video_duration'] = $urlData['duration'];
            if ($urlData['publicId']) {
                $data['video_public_id'] = $urlData['publicId'];
            }
            unset($data['video']);
        } elseif ($videoFile) {
            $uploadResult = Cloudinary::uploadVideo($videoFile->getRealPaath(), [
                'folder' => 'course_videos',
                'resource_type' => 'video',
            ]);
            $data = $this->updateDataWithCloudinaryResult($data, $uploadResult);
        }

        if ($lesson) {
            $lesson->update($data);
            return $lesson;
        } else {
            return Lesson::create($data);
        }
    }*/


    protected function getDurationFromUrl($url)
    {
        if ($this->isCloudinaryUrl($url)) {
            $publicId = $this->extractPublicIdFromUrl($url);
            $duration = $publicId ? round($this->cloudinaryService->getVideoDuration($publicId)) : 0;
            return ['duration' => $duration, 'publicId' => $publicId];
        } elseif (preg_match("/youtube\.com\/watch\?v=([^\&\?\/]+)/", $url, $matches) ||
            preg_match("/youtu\.be\/([^\&\?\/]+)/", $url, $matches)) {
            $duration = $this->videoDurationService->getDurationFromYoutube($matches[1]);
            return ['duration' => $duration, 'publicId' => null];
        } elseif (preg_match("/vimeo\.com\/(\d+)/", $url, $matches)) {
            $duration = $this->videoDurationService->getDurationFromVimeo($matches[1]);
            return ['duration' => $duration, 'publicId' => null];
        }

        return ['duration' => 0, 'publicId' => null];
    }



    protected function extractPublicIdFromUrl($url)
    {
        $pattern = '/res\.cloudinary\.com\/[^\/]+\/video\/upload\/(?:v\d+\/)?((?:[^\/]+\/)*[^\.]+)\.mp4$/';
        if (preg_match($pattern, $url, $matches)) {
            return $matches[1];
        }
        return null;
    }

    protected function updateDataWithCloudinaryResult($data, $uploadResult)
    {
        $data['video_url'] = $uploadResult->getSecurePath();
        $data['video_public_id'] = $uploadResult->getPublicId();
        $data['video_duration'] = round($this->cloudinaryService->getVideoDuration($data['video_public_id']));

        return $data;
    }

    protected function isCloudinaryUrl($url)
    {
        return preg_match('/res\.cloudinary\.com/', $url);
    }

}
