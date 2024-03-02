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
    ];

    public function chapter()
    {
        return $this->belongsTo(Chapter::class);
    }
}
