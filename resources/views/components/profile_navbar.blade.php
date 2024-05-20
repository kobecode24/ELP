<header class="fixed z-50 px-7 flex w-full items-center justify-between border-b-2 border-gray-200 bg-white p-2">
    <!-- logo -->
    <div class="flex items-center space-x-2">
        <a href="{{ route('home') }}" class="transform hover:scale-110">
            <img class="w-10 md:w-12" src="https://res.cloudinary.com/hkjp5o9bu/image/upload/v1710910639/default_images/hlayp34ieplhtduyhlo9.png" alt="Logo" />
        </a>
    </div>

    <!-- button profile -->
    <div class="flex justify-center items-center gap-5">
        <a href="{{route('user.courses')}}#our_courses" class="block px-4 py-2 text-black dark:text-white hover:bg-gray-100">
            All courses
        </a>

        <!-- User Profile Section -->
        <div class="relative group">
            <!-- User Avatar -->
            <div id="userAvatar" class="w-9 h-9 flex items-center justify-center bg-[#2D2F31] rounded-full cursor-pointer">
                <img class="w-8 h-8 rounded-full" src="{{$user->profile_image_url}}" alt="User Avatar" />
            </div>

            <!-- Online Status Dot -->
            <div class="absolute right-0 -top-1 h-4 w-4 rounded-full bg-[#A435F0]" title="User is online"></div>

            <!-- Dropdown Menu -->
            <ul id="dropdownMenu" class="dropdown-content mt-1 origin-top-left bg-white divide-y divide-gray-100 rounded-md opacity-0 invisible group-hover:opacity-100 group-hover:visible z-50 p-2 shadow bg-base-100 rounded-box w-56 absolute right-0 top-full transition-opacity duration-500">
                <li>
                    <a href="{{route('user.courses')}}#our_courses" class="block px-4 py-2 text-black dark:text-white hover:bg-gray-100">
                        All courses
                    </a>
                </li>
                <li>
                    <a href="{{route('user.profile')}}" class="block px-4 py-2 text-black dark:text-white hover:bg-gray-100">
                        Profile
                    </a>
                </li>
                <li>
                    <a id="becomeInstructorLink" class="cursor-pointer block px-4 py-2 text-black dark:text-white hover:bg-gray-100">
                        Teach on ELP
                    </a>
                    <form id="becomeInstructorForm" action="{{ route('user.become-instructor') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
                @if(Auth::check() && Auth::user()->hasRole('admin'))
                    <li>
                        <a href="{{ route('admin.dashboard') }}" class="block px-4 py-2 text-black dark:text-white hover:bg-gray-100">
                            Admin Panel
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.pulse') }}" class="block px-4 py-2 text-black dark:text-white hover:bg-gray-100">
                            Pulse Panel
                        </a>
                    </li>
                @endif
                @if(!Auth::id())
                    <li>
                        <div class="flex gap-3 p-2">
                            <a class="px-4 py-2 w-28 rounded-3xl text-base font-normal text-white transition-all duration-300 bg-[#A435F0]" href="{{route('register')}}">
                                <button>Sign Up</button>
                            </a>
                            <a class="px-4 py-2 w-28 rounded-3xl text-base font-normal text-black transition-all duration-300 bg-[#D9EEE1]" href="{{route('login')}}">
                                <button>Log in</button>
                            </a>
                        </div>
                    </li>
                @else
                    <form class="mt-px px-4 py-2 w-28 rounded-3xl text-base font-normal text-black text-center transition-all duration-300 bg-red-300 hover:bg-red-200" action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit">Logout</button>
                    </form>
                @endif
            </ul>
        </div>
    </div>
</header>

<style>
    .group:hover .dropdown-content {
        opacity: 1;
        visibility: visible;
    }

    .dropdown-content.show {
        opacity: 1;
        visibility: visible;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const userAvatar = document.getElementById('userAvatar');
        const dropdownMenu = document.getElementById('dropdownMenu');
        let hideTimeout;

        userAvatar.addEventListener('mouseover', () => {
            clearTimeout(hideTimeout);
            dropdownMenu.classList.add('show');
        });

        userAvatar.addEventListener('mouseleave', () => {
            hideTimeout = setTimeout(() => {
                dropdownMenu.classList.remove('show');
                }, 500);
        });

        dropdownMenu.addEventListener('mouseover', () => {
            clearTimeout(hideTimeout);
        });

        dropdownMenu.addEventListener('mouseleave', () => {
            hideTimeout = setTimeout(() => {
                dropdownMenu.classList.remove('show');
            }, 0);
        });

        document.getElementById('becomeInstructorLink').addEventListener('click', function (event) {
            event.preventDefault();
            document.getElementById('becomeInstructorForm').submit();
        });
    });
</script>
