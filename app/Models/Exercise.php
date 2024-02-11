<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    use HasFactory;

    protected $fillable = [
        'question',
        'initial_code',
        'test_code',
        'expected_output',
        'points_reward',
        'chapter_id',
    ];

    public function chapter()
    {
        return $this->belongsTo(Chapter::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_exercise')
            ->withPivot(['user_answer', 'is_correct'])
            ->withTimestamps();
    }

}
