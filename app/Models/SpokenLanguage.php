<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpokenLanguage extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function courses()
    {
        return $this->hasMany(Course::class);
    }
}
