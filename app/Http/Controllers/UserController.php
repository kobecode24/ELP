<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileImageRequest;
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

}
