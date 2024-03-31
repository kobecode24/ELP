<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileImageRequest;
use App\Http\Requests\UpdateProfileRequest;
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
        $user->assignRole('instructor');

        return redirect()->back()->with('success', 'Congratulations! You are now an instructor.');
    }

    public function updateProfile(UpdateProfileRequest $request)
    {
        $user = auth()->user();
        $user->update($request->validated());
        return redirect()->back()->with('success', 'Profile updated successfully!');
    }

    public function getStats()
    {
        $user = auth()->user();
        return view('user.stats', compact('user'));
    }
}
