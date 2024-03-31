<?php
namespace App\Http\Controllers;

use App\Http\Requests\RegistrationRequest;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Cloudinary\Cloudinary;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    /**
     * @throws FileDoesNotExist
     * @throws FileIsTooBig
     */
    public function register(RegistrationRequest $request)
    {
        $cloudName = config('services.cloudinary.cloud_name');
        $defaultImagePublicId = config('services.cloudinary.default_image');
        $defaultImageUrl = "https://res.cloudinary.com/{$cloudName}/image/upload/{$defaultImagePublicId}.png";

            $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'profile_image_url' => $defaultImageUrl,
            'profile_image_public_id' => $defaultImagePublicId,
        ]);

        $user->assignRole('student');
        Auth::login($user);

        return redirect()->route('login');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {
        if (Auth::attempt($request->validated())) {
            return redirect()->route('user.profile');
        }

        return redirect()->back()->withInput($request->except('password'))
            ->withErrors(['email' => 'The provided credentials do not match our records.']);
    }

    public function logout(Request $request) {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
