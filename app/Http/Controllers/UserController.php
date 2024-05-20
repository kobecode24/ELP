<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileImageRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Models\UserProgress;
use Auth;
use Illuminate\Http\Request;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class UserController extends Controller
{
    public function uploadProfileImage(UpdateProfileImageRequest  $request)
    {
        $folderPath = 'user_profiles/';

        $result = Cloudinary::upload($request->file('profile_image')->getRealPath(), [
            'folder' => $folderPath
        ]);


        $uploadedFileUrl = $result->getSecurePath();
        $publicId = $result->getPublicId();

        $user = auth()->user();
        $user->profile_image_url = $uploadedFileUrl;
        $user->profile_image_public_id = $publicId;
        $user->save();

        return redirect()->back()->with('success', 'Profile image updated successfully!');
    }

    public function showProfile()
    {
        $user = auth()->user();
        $roles = $user->roles;
        return view('user.profile', compact('roles' , 'user'));
    }

    public function becomeInstructor()
    {
        $user = auth()->user();

        if ($user->hasRole('instructor')) {
            return redirect()->route('instructor.dashboard');
        }

        $user->assignRole('instructor');

        return redirect()->route('instructor.dashboard')->with('success', 'Congratulations! You are now an instructor.');
    }

    public function updateProfile(UpdateProfileRequest $request)
    {
        $user = auth()->user();
        $user->update($request->validated());
        return redirect()->back()->with('success', 'Profile updated successfully!');
    }

    public function getStats()
    {
        $courses = auth()->user()->courses()->paginate(5);
        $userId = auth()->id();

        $lastCourses = UserProgress::where('user_id', $userId)
            ->with(['course', 'lesson', 'exercise'])
            ->latest('updated_at')
            ->get()
            ->unique('course_id')
            ->take(3)
            ->map(function ($progress) {
                if ($progress->lesson_id) {
                    $progress->last_item_type = 'lesson';
                    $progress->last_item_id = $progress->lesson_id;
                } elseif ($progress->exercise_id) {
                    $progress->last_item_type = 'exercise';
                    $progress->last_item_id = $progress->exercise_id;
                }
                return $progress;
            });

        $user = auth()->user();
        return view('user.stats', compact('user', 'lastCourses' , 'courses'));
    }

}
