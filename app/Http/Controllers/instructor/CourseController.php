<?php

namespace App\Http\Controllers\instructor;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCourseRequest;
use App\Models\Course;
use App\Models\ProgrammingLanguage;
use App\Models\SpokenLanguage;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $userId = Auth::id();

        $courses = Course::where('creator_id', $userId)->get();

        return view('instructor.courses.index', compact('courses' , 'user'));
    }

    public function dashboard()
    {
        $user = Auth::user();
        $userId = Auth::id();

        $courses = Course::where('creator_id', $userId)->get();

        return view('instructor.dashboard', compact('courses' , 'user'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        $programmingLanguages = ProgrammingLanguage::all();
        $spokenLanguages = SpokenLanguage::all();

        return view('instructor.courses.create', compact('programmingLanguages', 'spokenLanguages' , 'user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCourseRequest $request)
    {
        $validated = $request->validated();
        $validated['creator_id'] = Auth::id();

            if ($request->hasFile('course_images')) {
            $folderPath = 'course_images/';

            $result = Cloudinary::upload($request->file('course_images')->getRealPath(), [
                'folder' => $folderPath
            ]);

            $uploadedFileUrl = $result->getSecurePath();
            $publicId = $result->getPublicId();

            $validated['image_url'] = $uploadedFileUrl;
            $validated['image_public_id'] = $publicId;
        }

        Course::create($validated);

        return redirect()->route('instructor.courses.index')->with('success', 'Course created successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        $user = Auth::user();
        return view('instructor.courses.show', compact('course' , 'user'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        $user = Auth::user();
        $programmingLanguages = ProgrammingLanguage::all();
        $spokenLanguages = SpokenLanguage::all();

        return view('instructor.courses.edit', compact('course', 'programmingLanguages', 'spokenLanguages' , 'user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreCourseRequest $request, Course $course)
    {
        $validated = $request->validated();

        if ($request->hasFile('course_images')) {
            if (!empty($course->image_public_id)) {
                Cloudinary::destroy($course->image_public_id);
            }

            $folderPath = 'course_images/';

            $result = Cloudinary::upload($request->file('course_images')->getRealPath(), [
                'folder' => $folderPath
            ]);

            $uploadedFileUrl = $result->getSecurePath();
            $publicId = $result->getPublicId();

            $course->image_url = $uploadedFileUrl;
            $course->image_public_id = $publicId;
        }

        $course->fill($validated);
        $course->save();

        return redirect()->route('instructor.courses.index')->with('success', 'Course updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        if ($course->image_public_id) {
            Cloudinary::destroy($course->image_public_id);
        }

        $course->delete();

        return redirect()->route('instructor.courses.index')->with('success', 'Course deleted successfully.');
    }
}
