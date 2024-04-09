<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'content',
        'video_url',
        'chapter_id',
        'video_public_id',
        'video_duration',
        'is_video_processing',
    ];

    public function chapter()
    {
        return $this->belongsTo(Chapter::class);
    }

    public function getImageAttribute() {
        return 'images/play.svg';
    }

    public function getFormattedVideoDurationAttribute()
    {
        $seconds = $this->video_duration ?? 0;
        $hours = floor($seconds / 3600);
        $minutes = floor(($seconds % 3600) / 60);
        $seconds = $seconds % 60;

        if ($hours > 0) {
            return sprintf('%1$d:%2$02d:%3$02d', $hours, $minutes, $seconds);
        } else {
            return sprintf('%1$d:%2$02d', $minutes, $seconds);
        }
    }
}
