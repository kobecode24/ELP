@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4 ">
        <h1 class="text-2xl font-bold mb-4">{{ $lesson->title }}</h1>

        {{-- Check and display video based on source --}}
        @if (!empty($lesson->video_public_id))
            {{-- Display video from Cloudinary --}}
            <div class="video-container">
                <video controls class="w-full h-auto">
                    <source src="{{ $lesson->video_url }}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>
        @elseif (!empty($lesson->video_url))
            {{-- Display video from YouTube/Vimeo --}}
            <div class="video-container">
                {{-- Determine whether it's YouTube or Vimeo --}}
                @php
                    $videoId = null;
                    $isYouTube = preg_match("/(youtube\.com\/watch\?v=|youtu\.be\/)([^\&\?\/]+)/", $lesson->video_url, $matches);
                    if ($isYouTube) {
                        $videoId = $matches[2] ?? null;
                    } else {
                        $isVimeo = preg_match("/vimeo\.com\/(\d+)/", $lesson->video_url, $matches);
                        if ($isVimeo) {
                            $videoId = $matches[1] ?? null;
                        }
                    }
                @endphp

                @if ($videoId && $isYouTube)
                    <iframe src="https://www.youtube.com/embed/{{ $videoId }}" frameborder="0" allowfullscreen class="w-full h-auto"></iframe>
                @elseif ($videoId && $isVimeo)
                    <iframe src="https://player.vimeo.com/video/{{ $videoId }}" frameborder="0" allowfullscreen class="w-full h-auto"></iframe>
                @else
                    <p>Invalid video URL</p>
                @endif
            </div>
        @endif

        <div class="mb-4">
            {!! nl2br(e($lesson->content)) !!}
        </div>
    </div>

    <style>
        .video-container {
            position: relative;
            padding-bottom: 56.25%; /* 16:9 Aspect Ratio */
            height: 0;
        }
        .video-container iframe,
        .video-container video {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }
    </style>
@endsection
