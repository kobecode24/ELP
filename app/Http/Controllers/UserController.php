<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileImageRequest;
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
        return view('dashboard.profile', compact('roles'));
    }

    public function becomeInstructor()
    {
        $user = auth()->user();
        $user->assignRole('instructor');

        return redirect()->back()->with('success', 'Congratulations! You are now an instructor.');
    }

}
