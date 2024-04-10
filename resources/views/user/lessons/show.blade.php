@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-20 ">
        <h1 class="text-2xl font-bold mb-4">{{ $lesson->title }}</h1>
        @if ($lesson->is_video_processing)
            <div class="alert alert-warning">
                The video is still uploading and will be available soon.
            </div>
        @elseif (!empty($lesson->video_public_id))
            <div class="video-container">
                <video id="player" playsinline controls data-plyr-provider="html5" data-plyr-embed-id="player">
                    <source src="{{ $lesson->video_url }}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>
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

    @push('scripts')
        <link rel="stylesheet" href="https://cdn.plyr.io/3.7.8/plyr.css" />
        <script src="https://cdn.plyr.io/3.7.8/plyr.polyfilled.js"></script>
        <script>
            const player = new Plyr('#player');
        </script>
    @endpush

@endsection
