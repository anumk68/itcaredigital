@extends('layouts.app')


@section('content')
    <section class="video_banner"
        style="background: linear-gradient(rgb(31 191 255 / 52%), rgb(31 191 255 / 52%)), url('{{ asset('public/images/about_bannner.png') }}');">
        <div class="container">
            <div class="row">
                <div class="text_video_heading">
                    <h1>Vlog Detail</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="video_detailed py_8">
        <div class="container">
            <div class="row g-4">

                <!-- Left: Video -->
                <div class="col-md-8">
                    @php
                        // Extract YouTube Video ID
                        preg_match(
                            '/(?:youtube\.com\/(?:watch\?v=|embed\/)|youtu\.be\/)([\w\-]+)/',
                            $vlog->video_url,
                            $matches,
                        );
                        $videoId = $matches[1] ?? null;
                        $backgroundImage = $videoId
                            ? "https://img.youtube.com/vi/$videoId/maxresdefault.jpg"
                            : asset('public/images/default_video_thumb.jpg');
                    @endphp

                    <div class="video-box" id="videoContainer"
                        style="background: url('{{ $backgroundImage }}'); background-size: cover; background-position: center;">
                        <div class="play-overlay" id="playButton" onclick="playVideo('{{ $vlog->video_url }}')">
                            <img src="{{ asset('public/images/play_red.png') }}" alt="Play">
                        </div>
                    </div>


                    <div class="text_video_detail">
                        <div class="ahead_detail_video">
                            <h2>{{ $vlog->title }}</h2>
                            <p>{!! $vlog->description !!}</p>
                        </div>
                    </div>
                    <div class="tags-share-section">
                        <div class="tags-section">
                            <h4>TAGS:</h4>
                            <span class="tag-button">Canon TS3722 Wireless Setup</span>
                        </div>

                        <div class="share-section">
                            <h4 class="mt-4">SHARE:</h4>
                            <div class="social_icon_main">
                                <div class="follow_us">
                                    <a href="https://www.youtube.com/@allprintersetup"><i
                                            class="fa-brands fa-youtube"></i></a>
                                    <a href="https://x.com/allprintersetup"> <i class="fa-solid fa-x"></i></a>
                                    <a href="https://www.facebook.com/allprintersetupusa/"> <i
                                            class="fa-brands fa-facebook"></i></a>
                                    <a href="https://www.instagram.com/allprintersetupusa/"> <i
                                            class="fa-brands fa-instagram"></i></a>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="feedback-container">
                        <p><strong>Was this article helpful?</strong></p>
                        <div id="buttonGroup">
                            <button id="yesBtn" class="btn feedback-btn"><i class="fa-solid fa-check"></i> Yes</button>
                            <button id="noBtn" class="btn feedback-btn">✘ No</button>
                        </div>

                        <div id="yesResponse" class="response-box response-success">
                            Thanks 👍 for your feedback
                        </div>

                        <div id="noResponse" class="response-box response-error">

                            Watch detailed video here: <a href="#" target=""></a>

                            Thanks for your feedback.

                        </div>

                    </div>
                </div>

                <!-- Right: Sidebar -->
                <div class="col-md-4">
                    <!-- Chat Box -->
                    <div class="printer-box">
                        <a href="{{ route('home') }}">
                            <img src="{{ asset('public/images/all_print_logo.webp') }}" alt="Logo">
                        </a>
                        <h6>The <strong>3</strong> steps solution to an error-free <strong>Printer</strong></h6>

                        <div class="step-btn"><img src="https://img.icons8.com/ios-filled/50/00677f/chat.png"> Chat with
                            Technician</div>
                        <div class="step-btn"><img src="https://img.icons8.com/ios-filled/50/00677f/help.png"> Discuss your
                            Problem</div>
                        <div class="step-btn"><img src="https://img.icons8.com/ios-filled/50/00677f/checked.png"> Get
                            solution over chat</div>
                        <a href="javascript:void(0);" onclick="parent.LiveChatWidget.call('maximize')"
                            class="chat-now-main">Chat Now</a>
                    </div>

                    <!-- Fix Epson Box -->
                    <div class="fix-epson-box">
                        <h6>Fix Your {{ $vlog->brand->brand_name ?? '' }} Printer Now</h6>
                        <ul>
                            @forelse ($services as $service)
                                <li><a href="{{ route('service_detail', ['brand_slug' => $vlog->brand->slug, 'service_slug' => $service->slug]) }}""><span class="arrow">→</span> {{ $service->service_name }}</a></li>
                            @empty
                                <li><em>No services available.</em></li>
                            @endforelse
                        </ul>

                    </div>

                    <!-- Recent Posts -->
                    <div class="recent-post-box">
                        <h6>Recent Posts</h6>
                        @foreach ($recent_posts as $post)
                            <div class="recent-post">
                                <img src="{{ asset('storage/app/public/' . $post->meta_img) }}" alt="{{ $post->title }}"
                                    class="profile" onerror="this.src='{{ asset('public/images/dummy.webp') }}'">
                                <div>
                                    <a href="{{ route('video_detail', $post->slug) }}">{{ $post->title }}</a>
                                    <small>{{ \Carbon\Carbon::parse($post->created_at)->format('M d, Y') }}</small>
                                </div>
                            </div>
                        @endforeach
                    </div>




                </div>
            </div>
        </div>
    </section>
@endsection

<script>
    function playVideo(videoUrl) {
        const container = document.getElementById("videoContainer");
        const button = document.getElementById("playButton");
        const iframe = document.createElement("iframe");

        // Extract YouTube video ID if full URL is given
        const videoId = videoUrl.includes("watch?v=") ?
            videoUrl.split("watch?v=")[1].split("&")[0] :
            videoUrl;

        iframe.src = "https://www.youtube.com/embed/" + videoId + "?autoplay=1&rel=0";
        iframe.allow = "autoplay; encrypted-media";
        iframe.allowFullscreen = true;
        iframe.width = "100%";
        iframe.height = "400px";

        container.innerHTML = '';
        container.appendChild(iframe);
    }
</script>
