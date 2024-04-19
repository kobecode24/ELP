<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'course_id',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }

    public function exercises()
    {
        return $this->hasMany(Exercise::class);
    }

    public function getTotalDurationAttribute()
    {
        $totalSeconds = $this->lessons->sum('video_duration');
        $hours = floor($totalSeconds / 3600);
        $minutes = floor(($totalSeconds % 3600) / 60);

        if ($hours > 0) {
            return sprintf("%d hr %02d min", $hours, $minutes);
        } else {
            return sprintf("%d min", $minutes);
        }
    }
}
