

<div class="w-full bg-[#0D1721] min-h-[calc(100vh-200px)]">


    <div
    class="flex justify-around items-center pt-28  min-h-[calc(100vh-170px)]"
  >
    <div class="space-y-5 lg:space-y-10 p-4">
      <div class="space-y-2 md:space-y-5 pt-8 md:pt-0">
        <h3
          class="font-bold text-5xl md:text-7xl text-white text-center pb-7"
        >
          Learn to Code
        </h3>
        <p class="font-bold text-lg md:text-2xl text-[#FFF4A3] text-center">
          With the world's largest web developer site.
        </p>
      </div>
      <!-- search -->

      <div
        class="flex justify-items-center justify-center w-60 md:w-[35rem] bg-white rounded-full ml-16 md:ml-0"
      >
        <div class="w-full">
          <input
            type="search"
            class="w-full px-8 font-normal text-lg py-1 text-[#757575] rounded-full focus:outline-none"
            placeholder="Search our tutorials, e.g. HTML"
          />
        </div>
        <div>
          <button
            type="submit"
            class="flex items-center bg-[#A435F0] justify-center w-16 md:w-28 h-10 text-white rounded-r-full"
          >
            <svg
              class="w-5 h-5"
              fill="none"
              stroke="currentColor"
              viewBox="0 0 24 24"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"
              ></path>
            </svg>
          </button>
        </div>
      </div>
      <div>
          <a href="{{route( 'user.courses')}}" class="font-bold text-lg md:text-2xl underline text-white text-center block">
              Not Sure Where To Begin?
          </a>
      </div>
    </div>
  </div>

</div>
