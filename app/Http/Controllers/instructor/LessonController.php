<?php

namespace App\Http\Controllers\instructor;

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
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lessons = Lesson::all();
        return view('instructor.lessons.index', compact('lessons'));
    }

    /**
     * Show the form for creating a new resource.
     */
        public function create(Request $request)
    {
        $user = Auth::user();
        $chapterId = $request->input('chapter_id');

        $chapter = null;
        if ($chapterId) {
            $chapter = Chapter::find($chapterId);
        }

        return view('instructor.lessons.create', compact('chapter' , 'user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLessonRequest $request)
    {
        $data = $request->validated();

        if (!empty($data['video_url'])) {
            $data['video'] = null;
        } else if ($request->hasFile('video')) {
            $uploadResult = Cloudinary::uploadVideo($request->file('video')->getRealPath(), [
                'folder' => 'course_videos',
                'resource_type' => 'video'
            ]);

            $data['video_url'] = $uploadResult->getSecurePath();
            $data['video_public_id'] = $uploadResult->getPublicId();

        }

        $data['chapter_id'] = $request->chapter_id;

        $lesson = Lesson::create($data);

        return redirect()->route('instructor.courses.show', $lesson->chapter->course_id)->with('success', 'Lesson created successfully.');
    }

    public function edit(Lesson $lesson)
    {
        $user = Auth::user();
        return view('instructor.lessons.edit', compact('lesson' , 'user'));
    }

    public function update(UpdateLessonRequest $request, Lesson $lesson)
    {
        $data = $request->validated();

        if (!empty($data['video_url'])) {
            $data['video'] = null;
        } else if ($request->hasFile('video')) {
            $uploadedVideo = Cloudinary::uploadVideo($request->file('video')->getRealPath(), [
                'folder' => 'course_videos',
                'resource_type' => 'video'
            ])->getSecurePath();

            $data['video_url'] = $uploadedVideo;
        }

        $lesson->update($data);

        return redirect()->route('courses.show', $lesson->chapter->course_id)->with('success', 'Lesson updated successfully.');
    }

    public function show(Lesson $lesson)
    {
        $user = Auth::user();
        return view('instructor.lessons.show', compact('lesson' , 'user'));
    }


}
