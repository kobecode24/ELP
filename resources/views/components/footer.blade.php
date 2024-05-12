@if(!request()->is('instructor/exercises/*') && !request()->is('user/exercises/*'))
<div class="bg-[#1D2A35] z-50">
    <footer  class="container mx-auto px-20 py-12">
      <div class="flex flex-col justify-center items-center md:flex-row md:justify-between md: items-center border border-back">
        <div class="flex flex-col   ">
            <img
              src="https://res.cloudinary.com/hkjp5o9bu/image/upload/v1710910639/default_images/hlayp34ieplhtduyhlo9.png"
              class="mx-auto block w-[60px]"
              alt="Logo"
            />
            <span
              class="self-center text-xl font-semibold whitespace-nowrap text-[#FFF4A3] "
              >NEWSLETTER</span
            >
        </div>
        <div class=" ">
          <div>
            <h3 class="mb-5 text-lg font-normal text-[#DDDDDD]">
              Top Tutorials
            </h3>
            <ul class="flex flex-col justify-center items-center">
              <li class="mb-2">
                <a
                  href="#"
                  target="_blank"
                  class="text-[#DDDDDD] text-center hover:underline text-xs font-normal"
                  >C Tutorial
                </a>
              </li>
              <li class="mb-2">
                <a
                  href="#"
                  target="_blank"
                  class="text-[#DDDDDD] hover:underline text-xs font-normal"
                  >JavaScript Tutorial
                </a>
              </li>
              <li class="mb-2">
                <a
                  href="#"
                  target="_blank"
                  class="text-[#DDDDDD] hover:underline text-xs font-normal"
                  >SQL Tutorial
                </a>
              </li>
              <li class="mb-2">
                <a
                  href="#"
                  target="_blank"
                  class="text-[#DDDDDD] hover:underline text-xs font-normal"
                  >Python Tutorial
                </a>
              </li>
              <li class="mb-2">
                <a
                  href="#"
                  target="_blank"
                  class="text-[#DDDDDD] hover:underline text-xs font-normal"
                  >PHP Tutorial
                </a>
              </li>
              <li class="mb-2">
                <a
                  href="#"
                  target="_blank"
                  class="text-[#DDDDDD] hover:underline text-xs font-normal"
                  >Java Tutorial</a
                >
              </li>
            </ul>
          </div>
        </div>



          <div
              class="col-span-2 flex flex-wrap mt-4 space-x-6 items-center justify-center sm:mt-0"
          >
              <a
                  href="#"
                  class="text-gray-500 hover:text-gray-900 dark:hover:text-white"
              >
                  <svg
                      xmlns="http://www.w3.org/2000/svg"
                      class="w-5 h-5"
                      fill="white"
                      aria-hidden="true"
                      viewBox="0 0 448 512"
                  >
                      <path
                          d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64h98.2V334.2H109.4V256h52.8V222.3c0-87.1 39.4-127.5 125-127.5c16.2 0 44.2 3.2 55.7 6.4V172c-6-.6-16.5-1-29.6-1c-42 0-58.2 15.9-58.2 57.2V256h83.6l-14.4 78.2H255V480H384c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64z"
                      />
                  </svg>
              </a>
              <a
                  href="#"
                  class="text-gray-500 hover:text-gray-900 dark:hover:text-white"
              >
                  <img src="{{ asset('images/Icon.svg') }}" alt="" />
              </a>
              <a
                  href="#"
                  class="text-gray-500 hover:text-gray-900 dark:hover:text-white"
              >
                  <svg
                      xmlns="http://www.w3.org/2000/svg"
                      class="w-5 h-5"
                      fill="white"
                      aria-hidden="true"
                      viewBox="0 0 448 512"
                  >
                      <path
                          d="M416 32H31.9C14.3 32 0 46.5 0 64.3v383.4C0 465.5 14.3 480 31.9 480H416c17.6 0 32-14.5 32-32.3V64.3c0-17.8-14.4-32.3-32-32.3zM135.4 416H69V202.2h66.5V416zm-33.2-243c-21.3 0-38.5-17.3-38.5-38.5S80.9 96 102.2 96c21.2 0 38.5 17.3 38.5 38.5 0 21.3-17.2 38.5-38.5 38.5zm282.1 243h-66.4V312c0-24.8-.5-56.7-34.5-56.7-34.6 0-39.9 27-39.9 54.9V416h-66.4V202.2h63.7v29.2h.9c8.9-16.8 30.6-34.5 62.9-34.5 67.2 0 79.7 44.3 79.7 101.9V416z"
                      />
                  </svg>
              </a>
              <a
                  href="#"
                  class="text-gray-500 hover:text-gray-900 dark:hover:text-white"
              >
                  <svg
                      xmlns="http://www.w3.org/2000/svg"
                      class="w-5 h-5"
                      fill="white"
                      aria-hidden="true"
                      viewBox="0 0 448 512"
                  >
                      <path
                          d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"
                      />
                  </svg>
              </a>
              <a href="#" class="text-[#DDDDDD] font-medium text-base">
                  FORUM
              </a>

              <a href="#" class="text-[#DDDDDD] font-medium text-base">
                  ABOUT
              </a>
          </div>

      </div>
    </footer>
  </div>
@endif
