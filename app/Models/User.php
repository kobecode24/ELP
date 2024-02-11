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
        'points'
    ];

    protected $casts = [
        'points' => 'integer',
    ];
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
        $this->roles()->attach(Role::where('name', $role)->first());
    }

    public function removeRole($role)
    {
        $this->roles()->detach(Role::where('name', $role)->first());
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
