<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLessonRequest;
use App\Http\Requests\UpdateLessonRequest;
use App\Models\Chapter;
use App\Models\Course;
use App\Models\Lesson;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class LessonController extends Controller
{
    public function show(Lesson $lesson)
    {
        $user = Auth::user();
        return view('user.lessons.show', compact('lesson' , 'user'));
    }


}
