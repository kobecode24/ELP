@extends('layouts.auth')

@section('content')


    <main class="container mx-auto py-10 px-4">
        <div class="container mx-auto p-4">
            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">Oops!</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
        <!-- component -->
        <div class="flex items-center justify-center w-full">
            <div
                class="bg-white dark:bg-gray-900 shadow-md border rounded-lg px-8 py-6 w-[32rem]"
            >
                <form action="{{ route('login') }}" method="POST" class="pt-10">
                    @csrf
                    <div class="pb-10">
                        <span class="text-3xl font-bold">Log In</span>
                    </div>
                    <!-- email -->
                    <div>
                        <div class="flex items-center justify-between px-1">
                            <label
                                for="email"
                                class="block text-base font-semibold leading-6 text-black"
                            >Email</label
                            >
                            <div class="flex text-sm">
                                <p class="text-sm font-normal">Need an account?</p>
                                <a
                                    href="{{route('register')}}"
                                    class="font-semibold text-[#A435F0] hover:text-purple-500 pl-4"
                                >Sign up</a
                                >
                            </div>
                        </div>
                        <div class="mt-2">
                            <input
                                type="email" name="email" required
                                class="w-full rounded-md py-2 px-4 border text-sm md:text-lg ring-1 ring-inset ring-gray-300 focus:ring-1 focus:ring-inset focus:ring-balck"
                            />
                        </div>
                    </div>
                    <!-- password -->
                    <div class="mt-6">
                        <div class="flex items-center justify-between px-1">
                            <label
                                for="password"
                                class="block text-base font-semibold leading-6 text-black"
                            >Password</label
                            >
                            <div class="flex text-sm">
                                <p class="text-sm font-normal">Show</p>
                            </div>
                        </div>
                        <div class="mt-2">
                            <input
                                type="password"
                                name="password"
                                class="w-full rounded-md py-2 px-4 border text-sm md:text-lg ring-1 ring-inset ring-gray-300 focus:ring-1 focus:ring-inset focus:ring-balck"
                            />
                        </div>
                    </div>
                    <!-- login btn -->
                    <div class="block mt-6">
                        <button  type="submit"
                                 class="h-12 w-full rounded-3xl text-lg font-semibold text-white transition-all duration-300 bg-[#A435F0] hover:bg-purple-500"
                        >
                            Login
                        </button>
                    </div>
                    <!-- hr -->
                    <div
                        class="inline-flex relative items-center justify-center w-full"
                    >
                        <hr
                            class="w-full h-px my-8 bg-gray-300 border-0 dark:bg-gray-700"
                        />
                        <span
                            class="absolute px-3 font-medium text-black -translate-x-1/2 bg-white left-1/2 dark:text-white dark:bg-gray-900"
                        >OR</span
                        >
                    </div>
                    <div class="block mt-6">
                        <a
                            href="#"
                            class="border-black group m-auto my-0 inline-flex h-12 w-full items-center justify-center space-x-2 rounded-3xl border px-4 py-2 transition-colors duration-300 focus:outline-none"
                        >
                  <span>
                    <svg
                        class="h-5 w-5 fill-current text-black"
                        viewBox="0 0 16 16"
                        version="1.1"
                        aria-hidden="true"
                    >
                      <path
                          fill-rule="text-white"
                          d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.013 8.013 0 0016 8c0-4.42-3.58-8-8-8z"
                      ></path>
                    </svg>
                  </span>
                            <span class="text-base font-normal text-black dark:text-white"
                            >Continue with GitHub</span
                            >
                        </a>
                    </div>

                    <div class="flex items-center justify-center mt-4 py-16">
                        <a
                            class="hover:underline font-semibold text-sm text-gray-600 hover:text-gray-900 rounded-md"
                        >
                            Forgot password?
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </main>

@endsection

