<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

<div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8">
        <div>
            <img class="mx-auto h-12 w-auto" src="https://res.cloudinary.com/hkjp5o9bu/image/upload/v1708207076/website_base/tixzbooolz7duy1nod4n.png" alt="Brand Logo">
            <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                Welcome back, {{ auth()->user()->name }}!
            </h2>
            <div class="flex items-center justify-center">
                <div class="flex items-center bg-white p-2 rounded-full shadow-lg">
                    <div class="p-1">
                        <img src="https://res.cloudinary.com/hkjp5o9bu/image/upload/v1708208873/website_base/points.png" class="h-6 w-6" alt="Points">
                    </div>
                    <span class="text-lg font-semibold text-gray-900 ml-2">{{ auth()->user()->points }}</span>
                </div>
            </div>


            <p class="mt-2 text-center text-sm text-gray-600">
                Here's your profile dashboard.
            </p>
        </div>
        <div class="bg-white shadow overflow-hidden sm:rounded-lg">
            <div class="px-4 py-5 sm:px-6">
                <h3 class="text-lg leading-6 font-medium text-gray-900">
                    User Information
                </h3>
                <p class="mt-1 max-w-2xl text-sm text-gray-500">
                    Personal details and application.
                </p>
            </div>
            <div class="border-t border-gray-200">
                <dl>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Full name
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ auth()->user()->name }}
                        </dd>
                    </div>
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Email address
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ auth()->user()->email }}
                        </dd>
                    </div>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Profile photo
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2 relative">
                            <form method="POST" action="{{ route('user.upload-profile-image') }}" enctype="multipart/form-data">
                                @csrf
                                <input type="file" name="profile_image" id="profile_image" class="hidden" onchange="this.form.submit()">
                                <label for="profile_image" class="cursor-pointer">
                                    <img class="h-10 w-10 rounded-full" src="{{ auth()->user()->profile_image_url ?? 'https://res.cloudinary.com/hkjp5o9bu/image/upload/v1708089267/default_images/jlkamkirtzmtuiruyiwo.png' }}" alt="Profile picture">
                                    <span class="absolute inset-0 flex items-center justify-center opacity-0 hover:opacity-100 bg-gray-800 bg-opacity-50 text-white text-sm font-semibold rounded-full transition-opacity">
                            Upload
                        </span>
                                </label>
                            </form>
                        </dd>
                    </div>

                </dl>
            </div>
        </div>
        <div class="mt-6 flex justify-center">
            <a href="{{--{{ route('profile.edit') }}--}}" class="group relative w-1/2 flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Edit Profile
            </a>
        </div>
    </div>
</div>

</body>
</html>
