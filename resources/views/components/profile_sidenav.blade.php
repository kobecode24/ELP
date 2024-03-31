<aside
    class="z-10 h-full fixed group-hover:overflow-hidden group flex-col space-y-2 bg-white inline-block group-hover:grid group-hover:justify-center group-hover:items-center transition-transform duration-3000 ease-in-out transform group-hover:translate-x-24"
    x-show="asideOpen"
        >

          <div
            class="flex w-10 lg:w-12 group-hover:w-48 items-center justify-center hover:border-l-4 hover:border-[#A435F0] mt-6 group-hover:my-0 group-hover:mt-4"
          >
            <a
              href="

                {{ route('user.profile.stats') }}
              "
              class="flex items-center justify-start gap-4 space-x-1 rounded-md px-2 py-2"
            >
                <img src="{{ asset('images/stats.svg') }}" alt="" class="{{ request()->is('user/profile/stats') ? 'svg-purple' : '' }}">
              <h3
                class="hidden group-hover:block font-medium text-lg text-black"
              >
                Stats
              </h3>
            </a>
          </div>
          <div
            class="z-20 flex w-10 lg:w-12 group-hover:w-60 items-center justify-center hover:border-l-4 hover:border-[#A435F0] my-4 group-hover:my-0 group-hover:mt-4 group-hover:pr-2"
          >
              <a href="

            {{ route('user.profile') }}
              " class="flex items-center justify-start gap-6 space-x-1 rounded-md px-2 py-2">
                  <img src="{{ asset('images/Link_Profile.svg') }}" alt="" class="{{ request()->is('user/profile') ? 'svg-purple' : '' }}">
                  <h3 class="hidden group-hover:block font-medium text-lg text-black">Profile</h3>
              </a>



          </div>


        </aside>
