@extends('layouts.app')

@section('content')
    <div class="pl-24  text-[#C0C4FC]  pt-20 w-full  overflow-hidden flex flex-row flex-wrap items-end justify-start pt-2 px-1 pb-[7.8px] box-border gap-[4px] leading-[normal] tracking-[normal] text-left text-xl ">
        <div class="flex flex-col items-start justify-start py-0 pr-[6.3px] pl-0 bg-[#401B9C[">
            <a href="{{route('instructor.dashboard')}}"><b class=" leading-[17px] inline-block min-w-[83px]">Your Courses</b></a>
        </div>
        <img class="h-4 w-4  overflow-hidden shrink-0" loading="lazy" alt="" src="{{ asset('images/right_svg.svg') }}">
        <div class="flex flex-col items-start justify-start py-0 pr-[8.5px] pl-0">
            <a href="{{route('instructor.courses.show' , $lesson->chapter->course->id)}}"><b>{{$lesson->chapter->course->title}}</b></a>
        </div>
        <img class="h-4 w-4 overflow-hidden shrink-0" loading="lazy" alt="" src="{{ asset('images/right_svg.svg') }}">
        <a href="{{route('instructor.lessons.show' , $lesson->id)}}"><b class=" leading-[17px] inline-block min-w-[83px]">{{ $lesson->title }}</b></a>
    </div>
    <h1 class="text-2xl font-bold mb-4 pt-20 text-center text-[#2d2f31]">{{ $lesson->title }}</h1>
    <div class="container mx-auto p-10 flex flex-wrap">
        <div class="video-container mr-8"  style="width: 800px;">
            @if ($lesson->is_video_processing)
                <div class="alert alert-warning">
                    The video is still uploading and will be available soon.
                </div>
            @elseif (!empty($lesson->video_public_id))
                <video id="player" playsinline controls data-plyr-provider="html5" data-plyr-embed-id="player">
                    <source src="{{ $lesson->video_url }}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            @elseif (!empty($lesson->video_url))
                @php
                    $videoId = null;
                    $provider = null;
                    if (preg_match("/(youtube\.com\/watch\?v=|youtu\.be\/)([^\&\?\/]+)/", $lesson->video_url, $matches)) {
                        $videoId = $matches[2];
                        $provider = 'youtube';
                    } elseif (preg_match("/vimeo\.com\/(\d+)/", $lesson->video_url, $matches)) {
                        $videoId = $matches[1];
                        $provider = 'vimeo';
                    }
                @endphp

                @if ($videoId && $provider)
                    <div id="player" data-plyr-provider="{{ $provider }}" data-plyr-embed-id="{{ $videoId }}"></div>
                @else
                    <p>Invalid video URL</p>
                @endif
            @endif
        </div>

        <div class="course-content min-w-[340px] max-w-[340px]">

            <div class="sm:pt-6  bg-white p-4 w-120 rounded-lg border border-gray-200 shadow-md scrollable-content">
                <h5 class="text-md font-bold mb-3">Course content</h5>
                @foreach($course->chapters as $index => $chapter)
                    <h2 id="accordion-collapse-heading-{{ $chapter->id }}">
                        <button type="button" class="flex items-center justify-between w-full p-3 font-medium text-left border-b border-gray-200"
                                data-accordion-target="#accordion-collapse-body-{{ $chapter->id }}" aria-expanded="true" aria-controls="accordion-collapse-body-{{ $chapter->id }}">
                            <span class="flex-1">
                                <span class="block text-lg">{{ $chapter->title }}</span>
                                <span class="block text-xs text-gray-500 mt-1">{{ $chapter->completedLessonsCount + $chapter->completedExercisesCount }}/{{ $chapter->lessons->count() + $chapter->exercises->count() }} |  {{ $chapter->total_duration }}</span>
                            </span>
                            <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                    </h2>
                    <div id="accordion-collapse-body-{{ $chapter->id }}" class="@if ($chapter->id != $lesson->chapter_id){{ 'hidden' }}@endif" aria-labelledby="accordion-collapse-heading-{{ $chapter->id }}">
                        <ul class="list-none pl-4 pb-4 ">
                            @foreach($chapter->sortedItems as $item)
                                <li class="border-b border-gray-200 pb-2 @if ($item->id == $lesson->id) bg-[#D1D7DC] @endif">
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
    @if($lesson->content)
        <h2 class="pl-12 text-2xl font-semibold text-gray-800 mt-8 mb-2">Description</h2>
        <div class="text-base text-gray-800 leading-relaxed   max-w-[500px] pl-12 pb-6">{!!  $lesson->content !!} </div>
    @endif
    <!-- Navigation buttons -->
    <div class="flex justify-center pb-6">
        <div class="navigation flex items-center">
            <a href="{{ route('instructor.items.prev', ['courseId' => $lesson->chapter->course_id, 'type' => 'lesson', 'currentItemId' => $lesson->id]) }}" class="w-5 h-5 border border-black rounded-full p-4 flex items-center justify-center mr-4">
                <i class="fa-solid fa-angle-left"></i>
            </a>
            <a href="{{ route('instructor.items.next', ['courseId' => $lesson->chapter->course_id, 'type' => 'lesson', 'currentItemId' => $lesson->id]) }}" class="w-5 h-5 border border-black rounded-full p-4 flex items-center justify-center">
                <i class="fa-solid fa-angle-right"></i>
            </a>
        </div>
    </div>




    @push('scripts')
        <link rel="stylesheet" href="https://cdn.plyr.io/3.7.8/plyr.css" />
        <script src="https://cdn.plyr.io/3.7.8/plyr.polyfilled.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const player = new Plyr('#player');

                player.on('timeupdate', event => {
                    const instance = event.detail.plyr;
                    const percentageWatched = (instance.currentTime / instance.duration) * 100;

                    if (percentageWatched >= 95) {
                        markLessonAsCompleted();
                    }
                });

                async function markLessonAsCompleted() {
                    if (window.lessonCompleted) return;
                    window.lessonCompleted = true;

                    try {
                        const lessonId = "{{ $lesson->id }}";
                        const url = `/user/lessons/${lessonId}/complete`;
                        const response = await fetch(url, {
                            method: 'POST',
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                                'Content-Type': 'application/json'
                            },
                            body: JSON.stringify({ lesson_id: lessonId })
                        });

                        if (!response.ok) {
                            throw new Error('Network response was not ok.');
                        }

                        const data = await response.json();
                        console.log(data.message);
                    } catch (error) {
                        console.error('Error marking lesson as completed', error);
                    }
                }
            });


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

    @endpush

@endsection



