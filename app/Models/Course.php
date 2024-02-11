<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = ['name',
        'title',
        'description',
        'requirements',
        'creator_id',
        'programming_language_id',
        'spoken_language_id',
    ];
    public function users()
    {
        return $this->belongsToMany(User::class, 'enrollments')
            ->withTimestamps();
    }


    public function creator()
    {
        return $this->belongsTo(User::class, 'creator_id');
    }

    public function spokenLanguage()
    {
        return $this->belongsTo(SpokenLanguage::class);
    }

    public function programmingLanguage()
    {
        return $this->belongsTo(ProgrammingLanguage::class);
    }

    public function chapters()
    {
        return $this->hasMany(Chapter::class);
    }
}
