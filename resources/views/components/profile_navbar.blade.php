<header class="fixed z-50 px-7 flex w-full items-center justify-between border-b-2 border-gray-200 bg-white p-2">
    <!-- logo -->

    <div class="flex items-center space-x-2">
        <a href="{{ route('home') }}" class="transform hover:scale-110">
            <img class="w-10 md:w-12" src="https://res.cloudinary.com/{{ config('services.cloudinary.cloud_name') }}/image/upload/v1710910639/default_images/hlayp34ieplhtduyhlo9.png" alt="" />
        </a>
    </div>

    <!-- button profile -->
    <div class="flex justify-center items-center gap-5">
        <div class="">
            <h3 class="font-normal text-base"></h3>
        </div>
        <div class="relative">
            <!-- User Avatar -->
            <div class="w-9 h-9 flex items-center justify-center bg-[#2D2F31] rounded-full">
                <img class="w-8 h-8 rounded-full" src="{{$user->profile_image_url}}" alt="User Avatar" />
            </div>

            <!-- Online Status Dot -->
            <div class="absolute right-0 -top-1 h-4 w-4 rounded-full bg-[#A435F0]" title="User is online">
            </div>
        </div>
    </div>
</header>

