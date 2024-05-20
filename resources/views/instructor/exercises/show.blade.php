@extends('layouts.app')

@section('content')
    <div class="pl-10  text-[#C0C4FC]  pt-20 w-full  flex flex-row flex-wrap items-end justify-start pt-2 px-1 pb-[7.8px] box-border gap-[4px] leading-[normal] tracking-[normal] text-left text-xl">

        <div class="flex flex-col items-start justify-start py-0 pr-[6.3px] pl-0 bg-[#401B9C[">
            <a href="{{route('instructor.dashboard')}}"><b class=" leading-[17px] inline-block min-w-[83px]">Your Courses</b></a>
        </div>
        <img class="h-4 w-4  overflow-hidden shrink-0" loading="lazy" alt="" src="{{ asset('images/right_svg.svg') }}">
        <div class="flex flex-col items-start justify-start py-0 pr-[8.5px] pl-0">
            <a href="{{route('instructor.courses.show' , $exercise->chapter->course->id)}}"><b class=" leading-[17px] inline-block">{{$exercise->chapter->course->title}}</b></a>
        </div>
        <img class="h-4 w-4 overflow-hidden shrink-0" loading="lazy" alt="" src="{{ asset('images/right_svg.svg') }}">
        <a href="{{route('instructor.exercises.show' , $exercise->id)}}"><b class=" leading-[17px] inline-block min-w-[83px]">{{ $exercise->title }}</b></a>
    </div>

    <!-- Exercise Title and Question -->
    <div class="pt-12 pl-10  block">
        <h1 class="text-3xl font-bold text-gray-900 mb-4">{{ $exercise->title }}</h1>
        <p class="text-base text-gray-700 whitespace-pre-line">{!! $exercise->question !!}</p>
    </div>
    <div class="container p-10 flex flex-wrap m-auto">


        <!-- Left Column: Editors -->
        <div class="w-full md:w-1/2 pr-52">
            <!-- Initial Code Editor -->
            <h2 class="text-2xl font-semibold text-gray-800 mt-8 mb-2">Initial Code</h2>
            <div id="editor" class="p-12 mb-5 pl-36" style="height: 400px; width: 600px;">{{ $exercise->initial_code }}</div>



            <!-- Submit Button -->
            <button onclick="submitCode()" class="bg-[#A435F0] hover:bg-[#3F00E7] text-white font-semibold py-2 px-4 rounded-lg text-sm transition duration-150 ease-in-out focus:outline-none focus:shadow-outline">
                Submit
            </button>


            <!-- Overlay for Loading Spinner -->
            <div id="overlay" style="display:none; position:fixed; top:0; left:0; right:0; bottom:0; background:rgba(0,0,0,0.5); z-index:100;">
                <img id="loadingSpinner" src="https://media1.giphy.com/media/v1.Y2lkPTc5MGI3NjExZWs4ZWRkcWc4N2drY2dlaXpqNG50N3Y3ZGZndHlrNmMyaG5hNG9zNyZlcD12MV9pbnRlcm5hbF9naWZfYnlfaWQmY3Q9Zw/RgzryV9nRCMHPVVXPV/giphy.gif" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); width: 50px; height: 50px;" alt="Loading...">
            </div>

            <!-- Test Case Editor (if available) -->
            @if($exercise->test_code)
                <h2 class="text-2xl font-semibold text-gray-800 mt-8 mb-2">Test Case</h2>
                <div id="testCaseEditor" style="height: 200px; width: 600px;;"></div>
                <h2 class="text-2xl font-semibold text-gray-800 mt-8 mb-2">Expected Output</h2>
                <div id="expectedOutputEditor" style="height: 200px; width: 600px;;"></div>
            @endif
        </div>

        <!-- Right Column: Course Content -->
        <div class="w-full md:w-1/2 pt-16 flex justify-end ">
            <div class="bg-white p-4 max-w-xs rounded-lg border border-gray-200 shadow-md scrollable-content">
                <h5 class="text-md font-bold mb-3">Course content</h5>
                @foreach($course->chapters as $index => $chapter)
                    <h2 id="accordion-collapse-heading-{{ $chapter->id }}">
                        <button type="button" class="flex items-center justify-between w-full p-3 font-medium text-left border-b border-gray-200"
                                data-accordion-target="#accordion-collapse-body-{{ $chapter->id }}" aria-expanded="true" aria-controls="accordion-collapse-body-{{ $chapter->id }}">
                    <span class="flex-1">
                        <span class="block text-lg">{{ $chapter->title }}</span>
                        <span class="block text-xs text-gray-500 mt-1">{{ $chapter->completedLessonsCount + $chapter->completedExercisesCount }}/{{ $chapter->lessons->count() + $chapter->exercises->count() }} |  {{ $chapter->total_duration }}</span>
                    </span>
                            <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                 xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                          d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                    </h2>
                    <div id="accordion-collapse-body-{{ $chapter->id }}" class="@if ($chapter->id != $exercise->chapter_id){{ 'hidden' }}@endif" aria-labelledby="accordion-collapse-heading-{{ $chapter->id }}">
                        <ul class="list-none pl-4 pb-4 ">
                            @foreach($chapter->sortedItems as $item)
                                <li class="border-b border-gray-200 pb-2 @if ($item->id == $exercise->id) bg-[#D1D7DC] @endif">
                                    @if ($item->is_completed)
                                        <!-- Checked box replacement -->
                                        <div class="flex items-center ml-6">
                                            <div class="w-3 h-3 mr-2 border-[1px] border-solid bg-black">
                                                <img class="w-3 h-3" alt="" src="{{ asset('images/frame-1.svg') }}">
                                            </div>
                                            <div class="flex flex-col">
                                                <label><a href="{{ $item instanceof \App\Models\Lesson ? route('instructor.lessons.show', $item) : route('instructor.exercises.show', $item) }}"
                                                          class="text-xs md:text-sm font-normal text-[#5624D0] truncate dark:text-white underline">
                                                        {{ strlen($item->title) > 20 ? substr($item->title, 0, 20).'...' : $item->title }}
                                                    </a></label>
                                                <div class="flex items-center space-x-2">
                                                    <img class="flex-shrink-0" src="{{ asset($item->image) }}" alt="" />
                                                    <p class="text-xs text-gray-600">{{ $item->formatted_video_duration ?? '' }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <!-- Unchecked box replacement -->
                                        <div class="flex items-center ml-6">
                                            <div class="w-3 h-3 mr-2 border-[1px] border-solid border-black border-4"></div>
                                            <div class="flex flex-col">
                                                <label><a href="{{ $item instanceof \App\Models\Lesson ? route('instructor.lessons.show', $item) : route('instructor.exercises.show', $item) }}"
                                                          class="text-xs md:text-sm font-normal text-[#2D2F31] truncate dark:text-white">
                                                        {{ strlen($item->title) > 20 ? substr($item->title, 0, 20).'...' : $item->title }}
                                                    </a></label>
                                                <div class="flex items-center space-x-2">
                                                    <img class="flex-shrink-0" src="{{ asset($item->image) }}" alt="" />
                                                    <p class="text-xs text-gray-600">{{ $item->formatted_video_duration ?? '' }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Navigation buttons -->
    <div class="flex justify-center pb-6">
        <div class="navigation flex items-center">
            <a href="{{ route('instructor.items.prev', ['courseId' => $exercise->chapter->course_id, 'type' => 'exercise', 'currentItemId' => $exercise->id]) }}" class="w-5 h-5 border border-black rounded-full p-4 flex items-center justify-center mr-4">
                <i class="fa-solid fa-angle-left"></i>
            </a>
            <a href="{{ route('instructor.items.next', ['courseId' => $exercise->chapter->course_id, 'type' => 'exercise', 'currentItemId' => $exercise->id]) }}" class="w-5 h-5 border border-black rounded-full p-4 flex items-center justify-center">
                <i class="fa-solid fa-angle-right"></i>
            </a>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.4.12/ace.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/izitoast/dist/js/iziToast.min.js"></script>
    <script>
        function htmlDecode(input) {
            var doc = new DOMParser().parseFromString(input, "text/html");
            return doc.documentElement.textContent;
        }

        var editor = ace.edit("editor");
        editor.setTheme("ace/theme/monokai");
        editor.session.setMode("{{ $editorMode }}");

        function initializeAceEditor(editorId, content) {
            var editor = ace.edit(editorId);
            editor.setTheme("ace/theme/monokai");
            editor.session.setMode("{{ $editorMode }}");
            editor.setValue(content, 1);
            editor.setOptions({
                maxLines: Infinity
            });
            return editor;
        }

        @if(!empty($exercise->test_code))
        var testCodeContent = htmlDecode(`{{ addslashes($exercise->test_code) }}`);
        var expectedOutputContent = htmlDecode(`{{ addslashes($exercise->expected_output) }}`);

        var testCaseEditor = initializeAceEditor("testCaseEditor", testCodeContent);
        testCaseEditor.setReadOnly(true);

        var expectedOutputEditor = initializeAceEditor("expectedOutputEditor", expectedOutputContent);
        expectedOutputEditor.setReadOnly(true);
        @endif

        async function submitCode() {
            const code = editor.getValue();
            const exerciseId = "{{ $exercise->id }}";
            const submitUrl = `/user/exercises/${exerciseId}/execute`;
            const overlay = document.getElementById('overlay');

            overlay.style.display = 'flex';

            try {
                const response = await fetch(submitUrl, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    },
                    body: JSON.stringify({ code })
                });

                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }

                const data = await response.json();
                displayFeedback(data);
            } catch (error) {
                console.error('Error:', error);
                iziToast.error({
                    title: 'Error',
                    message: 'Error submitting code. Please try again.',
                    position: 'topRight'
                });
                document.getElementById('feedback').textContent = 'Error submitting code. Please try again.';
            } finally {
                overlay.style.display = 'none';
            }
        }

        function displayFeedback(data) {
            const annotations = [];
            let allPassed = true;

            if (data.testResults && data.testResults.length) {
                data.testResults.forEach((result, index) => {
                    const type = result.passed ? 'info' : 'error';
                    const text = result.passed ? `Passed (Expected: ${result.expected}, Actual: ${result.actual})` : `Failed (Expected: ${result.expected}, Actual: ${result.actual})`;

                    annotations.push({
                        row: index,
                        column: 0,
                        type: type,
                        text: text
                    });

                    if (!result.passed) {
                        allPassed = false;
                    }
                });

                testCaseEditor.getSession().setAnnotations(annotations);

                if (allPassed) {
                    iziToast.success({
                        title: 'Congratulations',
                        message: 'You have passed all the tests!',
                        position: 'center'
                    });
                } else {
                    iziToast.error({
                        title: 'Test Errors',
                        message: 'Some tests have failed. Check the annotations for details.',
                        position: 'center'
                    });
                }
            } else {
                console.error('No test case results available.');
                iziToast.error({
                    title: 'Error',
                    message: 'No test case results available.',
                    position: 'center'
                });
            }

            // Notify if the user is the course creator
            if (data.isCourseCreator) {
                iziToast.warning({
                    title: 'Notice',
                    message: 'You are the course creator. No points are awarded for solving your own exercise.',
                    position: 'center'
                });
            }

            if (data.pointsRewarded) {
                iziToast.success({
                    title: 'Points Awarded',
                    message: `You have earned ${data.points} points for this exercise!`,
                    position: 'center'
                });
            }

            if (!data.firstCorrectAttempt && allPassed) {
                iziToast.info({
                    title: 'No Points',
                    message: 'You have previously solved this exercise correctly. No additional points.',
                    position: 'center'
                });
            }
        }

        document.addEventListener('DOMContentLoaded', () => {
            document.querySelectorAll('button[data-accordion-target]').forEach(button => {
                button.addEventListener('click', () => {
                    const accordionTargetId = button.getAttribute('data-accordion-target');
                    const accordionTarget = document.querySelector(accordionTargetId);
                    const expanded = button.getAttribute('aria-expanded') === 'true' || false;
                    button.setAttribute('aria-expanded', !expanded);
                    accordionTarget.classList.toggle('hidden');
                });
            });
        });
    </script>
    <style>
        .test-cases-container {
            display: flex;
            flex-wrap: wrap;
        }
        .test-case {
            margin-right: 20px;
            margin-bottom: 20px;
        }
        .expected-output {
            margin-top: 10px;
        }
        .ace_error {
            color: #ff5f58;
        }
        .ace_success {
            color: #23d18b;
        }
        .ace_annotation {
            position: absolute;
            z-index: 9;
        }

        .ace_gutter-cell.ace_info {
            background-color: #28a745;
            color: #fff !important;
        }

        .ace_gutter-cell.ace_error {
            background-color: #dc3545;
            color: #fff !important;
        }

    </style>
@endsection
