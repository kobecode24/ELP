<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCourseRequest;
use App\Models\Course;
use App\Models\ProgrammingLanguage;
use App\Models\SpokenLanguage;
use App\Services\Education\CourseService;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{

    public function dashboard()
    {
        $courses = Course::where('is_approved', true)
            ->orderby('updated_at', 'desc')
            ->paginate(5);
        $user = Auth::user();
        return view('admin.dashboard', compact('courses', 'user'));
    }

    public  function blacklist()
    {
        $courses = Course::where('is_approved', false)
            ->orderby('updated_at', 'desc')
            ->paginate(5);
        $user = Auth::user();
        return view('admin.blacklist', compact('courses', 'user'));
    }

    public function approve(Course $course)
    {
        $course->timestamps = false;
        $course->is_approved = !$course->is_approved;
        $course->save();
        $course->timestamps = true;

        return redirect()->back()->with('success', 'Course approval status updated successfully!');
    }

    public function pulse()
    {
        return view('vendor.pulse.dashboard');
    }

}
