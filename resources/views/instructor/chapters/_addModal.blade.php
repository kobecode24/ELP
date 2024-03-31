<div x-show="open" class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">​</span>

        <div class="inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full sm:p-6">
            <div>
                <div class="mt-3 text-center sm:mt-5">
                    <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">Add New Chapter</h3>
                    <div class="mt-2">
                        <form method="POST" action="{{ route('instructor.chapters.store', ['course' => $course->id]) }}">
                            @csrf
                            <input type="hidden" name="course_id" value="{{ $course->id }}">
                            <div class="mt-4">
                                <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                                <input type="text" name="title" id="title" class="mt-1 p-2 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border border-gray-300 rounded-md" placeholder="Chapter title" required>
                            </div>
                            <div class="mt-4">
                                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                                <textarea id="description" name="description" rows="3" class="mt-1 p-2 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border border-gray-300 rounded-md" placeholder="Chapter description"></textarea>
                            </div>
                            <div class="mt-5 sm:mt-6 bg-[#A435F0]">
                                <button type="submit" class="inline-flex justify-center w-full rounded-md border border-transparent shadow-sm px-4 py-2  text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:text-sm">
                                    Add Chapter
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="mt-5 sm:mt-6">
                <button type="button" @click="open = false" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                    Cancel
                </button>
            </div>
        </div>
    </div>
</div>
