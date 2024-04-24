<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'description',
        'profile_image_url',
        'profile_image_public_id',
        'points'
    ];

    protected $casts = [
        'points' => 'integer',
    ];

    public function getProfileImageUrlAttribute($value)
    {
        return $value ?: 'path/to/default/image.png';
    }
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function hasRole($role)
    {
        if ($this->roles()->where('name', $role)->first()) {
            return true;
        }
        return false;
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'enrollments')
            ->withTimestamps();
    }

    public function createdCourses()
    {
        return $this->hasMany(Course::class, 'creator_id');
    }

    public function exercises()
    {
        return $this->belongsToMany(Exercise::class, 'user_exercise')
            ->withPivot(['user_answer', 'is_correct'])
            ->withTimestamps();
    }

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }

    public function assignRole($role)
    {
        if (is_string($role)) {
            $role = Role::whereName($role)->firstOrFail();
        }
        $this->roles()->syncWithoutDetaching([$role->id]);
    }

    public function removeRole($role)
    {
        if (is_string($role)) {
            $role = Role::whereName($role)->firstOrFail();
        }
        $this->roles()->detach($role->id);
    }

    public function isEnrolledInCourse($courseId)
    {
        return $this->enrollments()->where('course_id', $courseId)->exists();
    }

    public function isCourseCreator($courseId)
    {
        return $this->createdCourses()->where('id' , $courseId)->exists();
    }
}
