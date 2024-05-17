<div class="w-full bg-[#0D1721]">
    <!-- navbar -->
    <div class="navbar fixed top-0 z-50 w-full px-2 py-2 bg-[#0D1721]">
        <div class="navbar-start">
          <div class="dropdown">
            <div tabindex="0" role="button" class="btn btn-ghost lg:hidden">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-5 w-5"
                fill="none"
                viewBox="0 0 24 24"
                stroke="white"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M4 6h16M4 12h8m-8 6h16"
                />
              </svg>
            </div>

              <ul tabindex="0" class="dropdown-content mt-1 origin-top-left bg-white divide-y divide-gray-100 rounded-md opacity-0 invisible group-hover:opacity-100 z-50 p-2 shadow bg-base-100 rounded-box w-56">


                  <li>
                      <a
                          href="{{route('user.courses')}}#our_courses"
                          class="block px-4 py-2 text-black dark:text-white hover:bg-gray-100"
                      >All course</a
                      >
                  </li>

                  <li>
                      <a
                          href="{{route('user.profile')}}"
                          class="block px-4 py-2 text-black dark:text-white hover:bg-gray-100"
                      >Profile</a
                      >
                  </li>

                  <li>
                      <a
                          href="{{route('instructor.dashboard')}}"
                          class="block px-4 py-2 text-black dark:text-white hover:bg-gray-100"
                      >Teach on ELP</a
                      >
                  </li>
                  @if(Auth::check() && Auth::user()->hasRole('admin'))
                      <li>
                          <a href="{{ route('admin.dashboard') }}" class="block px-4 py-2 text-black dark:text-white hover:bg-gray-100">Admin Panel</a>
                      </li>
                  @endif

              @if(!Auth::id())
                      <li>
                          <div class="flex gap-3 p-2">
                              <a  class="px-4 py-2 w-28 rounded-3xl text-base font-normal text-white transition-all duration-300 bg-[#A435F0]" href="{{route('register')}}">
                              <button
                              >
                                  Sign Up
                              </button>
                            </a>
                              <a class="px-4 py-2 w-28 rounded-3xl text-base font-normal text-black transition-all duration-300 bg-[#D9EEE1]" href="{{route('login')}}">
                              <button
                              >
                                  Log in
                              </button>
                            </a>
                          </div>
                      </li>
                  @else
                      <form class="mt-px px-4 py-2 w-28 rounded-3xl text-base font-normal text-black text-center transition-all duration-300 bg-red-300 hover:bg-red-200" action="{{ route('logout') }}" method="POST">
                          @csrf
                          <button type="submit">
                              logout
                          </button>
                      </form>
                  @endif
              </ul>



          </div>
          <!-- logo -->
          <a class="mr-6" href="{{route('home')}}">
            <div class="inline-block">
              <button type="button" class="transform hover:scale-110 duration-2 00 ease-in-out" >
                <div>
                  <img class="w-10 md:w-12" src="https://res.cloudinary.com/hkjp5o9bu/image/upload/v1710910639/default_images/hlayp34ieplhtduyhlo9.png" alt="" />
                </div>
              </button>
            </div>
          </a>
          <div
            class="hidden lg:visible items-center justify-between w-full lg:flex lg:w-auto lg:order-1"
            id="mobile-menu-2"
          >
            <ul
              class="flex flex-col mt-4 font-medium lg:flex-row lg:space-x-8 lg:mt-0"
            >
              <!-- dropdown Services -->
              <li>
                <div class="relative inline-block text-left">
                  <div class="group">
                    <button
                      type="button"
                      class="inline-flex justify-center items-center py-2 pl-3 pr-4 text-base font-normal text-[#DDDDDD] dark:text-white lg:hover:bg-transparent lg:border-0 lg:p-0"
                    >
                      Tutorials
                      <!-- Dropdown arrow -->
                      <svg
                        class="w-4 h-4 ml-1 mt-1 -mr-1"
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20"
                        fill="currentColor"
                      >
                        <path fill-rule="evenodd" d="M10 12l-5-5h10l-5 5z" />
                      </svg>
                    </button>

                    <!-- Dropdown menu -->
                  </div>
                </div>
              </li>
              <!-- dropdown Company -->
              <li>
                <div class="relative inline-block text-left">
                  <div class="group">
                      <a href="{{route('user.courses')}}#our_courses">
                    <button
                      type="button"
                      class="inline-flex justify-center items-center py-2 pl-3 pr-4 text-base font-normal text-[#DDDDDD] dark:text-white lg:hover:bg-transparent lg:border-0 lg:p-0"
                    >
                        All Courses
                    </button>
                        </a>
                    <!-- Dropdown menu -->
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </div>
        <div class=" navbar-center hidden lg:flex">
          <!-- search -->
            <form action="{{ route('user.courses') }}" method="GET">
                <div class="relative mx-auto text-[#757575]">
            <input
              class="bg-white italic h-10 px-5 pr-16 rounded-full text-base focus:outline-none"
              type="search"
              name="search"
              placeholder="Search..."
            />
            <button type="submit" class="absolute right-0 top-0 mt-3 mr-4">
              <svg
                class="text-black h-4 w-4 fill-current"
                xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink"
                version="1.1"
                id="Capa_1"
                x="0px"
                y="0px"
                viewBox="0 0 56.966 56.966"
                style="enable-background: new 0 0 56.966 56.966"
                xml:space="preserve"
                width="512px"
                height="512px"
              >
                <path
                  d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z"
                />
              </svg>
            </button>
          </div>
            </form>
        </div>

        @if(!Auth::id())


        <div class="navbar-end">
            <div class="grid grid-cols-3 items-center justify-center pr-3">
              <div class="hidden lg:block">
                <button
                  class="text-base font-normal text-[#DDDDDD] dark:text-white lg:hover:bg-transparent"
                >
                  Teach on ELP
                </button>
              </div>
              <div class="relative hidden lg:block">
                <div class="absolute z-10 -top-5 left-5 right-0 ml-1.5">
                  <a href="{{route('register')}}">
                    <button
                    class="px-4 py-2 w-28 rounded-3xl text-base font-normal text-white transition-all duration-300 bg-[#A435F0]"
                  >
                    Sign Up
                  </button>
                  </a>
                </div>
              </div>
              <div class="hidden lg:block">
                <div class="z-0">
                    <a href="{{route('login')}}">
                  <button
                    class="px-4 py-2 w-28 rounded-3xl text-base font-normal text-black transition-all duration-300 bg-[#D9EEE1]"
                  >
                    Log in
                  </button>
                    </a>
                </div>
              </div>
            </div>
          </div>

            @else

            <div class="navbar-end">
                <div class="grid grid-cols-2 items-center justify-center gap-10">
                    <a href="{{route('instructor.dashboard')}}">
                  <div class="hidden lg:block">
                    <button class="text-base font-normal text-[#DDDDDD] dark:text-white lg:hover:bg-transparent">
                      Teach on ELP
                    </button>
                  </div>
                    </a>

                  <div class="hidden lg:block">
                    <a href="{{--{{route('userProfile')}}--}}">
                      <div class="inline-block">
                        <button type="button" class="transform hover:scale-110">
                          <div>
                              <a  href="{{route('user.profile')}}">
                            <img class="w-10 md:w-12  rounded-full" src="{{ $user->profile_image_url  }}" alt="" />
                            </a>
                          </div>
                        </button>
                      </div>
                    </a>
                  </div>
                </div>
                <div class="relative pr-3 text-[#757575] block lg:hidden">
                  <input class="bg-white italic h-8 md:h-10 px-5 pr-3 md:pr-16 rounded-full text-base focus:outline-none"
                    type="search" name="search" placeholder="Search..." />
                  <button type="submit" class="absolute right-0 -top-1 md:top-0 mt-3 mr-5">
                    <svg class="text-black h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg"
                      xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px"
                      viewBox="0 0 56.966 56.966" style="enable-background: new 0 0 56.966 56.966" xml:space="preserve"
                      width="512px" height="512px">
                      <path
                        d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z" />
                    </svg>
                  </button>
                </div>
              </div>
        </div>
 @endif



          <div class="relative pr-3 text-[#757575] block lg:hidden">
            <input
              class="bg-white italic h-8 md:h-10 px-5 pr-3 md:pr-16 rounded-full text-base focus:outline-none"
              type="search"
              name="search"
              placeholder="Search..."
            />
            <button
              type="submit"
              class="absolute right-0 -top-1 md:top-0 mt-3 mr-5"
            >
              <svg
                class="text-black h-4 w-4 fill-current"
                xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink"
                version="1.1"
                id="Capa_1"
                x="0px"
                y="0px"
                viewBox="0 0 56.966 56.966"
                style="enable-background: new 0 0 56.966 56.966"
                xml:space="preserve"
                width="512px"
                height="512px"
              >
                <path
                  d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z"
                />
              </svg>
            </button>
          </div>

    <!-- languages menu -->
    @if(request()->is('/'))
        <div class="fixed w-full z-10 mt-4 md:mt-16 pt-1 sm:hidden xl:block lg:block @guest pt-6 navhidden @endguest">
            <div class="lg-mt-negative-50 grid grid-cols-8 justify-items-center bg-[#282A35] py-2 @guest relative right-2 @endguest">
                <div class="font-normal text-base text-[#F1F1F1]">
                    <a href="{{ route('user.courses') }}">RUST</a>
                </div>
                <div class="font-normal text-base text-[#F1F1F1]">
                    <a href="{{ route('user.courses') }}">JAVASCRIPT</a>
                </div>
                <div class="font-normal text-base text-[#F1F1F1]">
                    <a href="{{ route('user.courses') }}">Bash</a>
                </div>
                <div class="font-normal text-base text-[#F1F1F1]">
                    <a href="{{ route('user.courses') }}">PHP</a>
                </div>
                <div class="font-normal text-base text-[#F1F1F1]">
                    <a href="{{ route('user.courses') }}">PYTHON</a>
                </div>
                <div class="font-normal text-base text-[#F1F1F1]">
                    <a href="{{ route('user.courses') }}">C</a>
                </div>
                <div class="font-normal text-base text-[#F1F1F1]">
                    <a href="{{ route('user.courses') }}">JAVA</a>
                </div>
                <div class="font-normal text-base text-[#F1F1F1]">
                    <a href="{{ route('user.courses') }}">GO</a>
                </div>
            </div>
        </div>
        <div class="fixed w-full z-30 mt-4 md:mt-16 pt-1 xl:hidden lg:hidden sm:block @guest pt-20 w-full block @endguest">
            <div class="lg-mt-negative-50 grid grid-cols-4 justify-items-center bg-[#282A35] py-2 @guest relative right-2 @endguest">
                {{--<div class="font-normal text-base text-[#F1F1F1]">
                    <a href="{{ route('user.courses') }}">RUST</a>
                </div>--}}
                <div class="font-normal text-base text-[#F1F1F1]">
                    <a href="{{ route('user.courses') }}">JAVASCRIPT</a>
                </div>
                {{--<div class="font-normal text-base text-[#F1F1F1]">
                    <a href="{{ route('user.courses') }}">Bash</a>
                </div>--}}
                <div class="font-normal text-base text-[#F1F1F1]">
                    <a href="{{ route('user.courses') }}">PHP</a>
                </div>
                <div class="font-normal text-base text-[#F1F1F1]">
                    <a href="{{ route('user.courses') }}">PYTHON</a>
                </div>
                {{--<div class="font-normal text-base text-[#F1F1F1]">
                    <a href="{{ route('user.courses') }}">C</a>
                </div>--}}
                <div class="font-normal text-base text-[#F1F1F1]">
                    <a href="{{ route('user.courses') }}">JAVA</a>
                </div>
                {{--<div class="font-normal text-base text-[#F1F1F1]">
                    <a href="{{ route('user.courses') }}">GO</a>
                </div>--}}
            </div>
        </div>
    @endif
        <!-- banner -->
    </div>



    <script>
        function authView(value) {
            window.location.href = value;
        }






    </script>

<style>
    @media (min-width: 768px) {
        .lg-mt-negative-50 {
            margin-top: -40px;
        }
    }

    @media (min-width: 1024px) {
        .lg-mt-negative-50 {
            margin-top: 0;
        }
    }
    @auth
@media (max-width: 768px) {
        .lg-mt-negative-50 {
             padding-top: 20px !important;
        }
    }
    @endauth

    @media (max-width: 768px) {
        .navhidden {
            display: none;
        }
    }
</style>




