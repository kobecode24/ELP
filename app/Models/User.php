<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class User extends Authenticatable implements HasMedia
{
    use HasApiTokens, HasFactory, Notifiable;
    use InteractsWithMedia;

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

    public function points()
    {
        return $this->points;
    }

    public function addPoints($points)
    {
        $this->points += $points;
        $this->save();
    }

    public function removePoints($points)
    {
        $this->points -= $points;
        $this->save();
    }
}
