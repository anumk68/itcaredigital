@extends('layouts.app')
<meta name="robots" content="noindex, nofollow" />

@section('content')
<section class="video_banner" style="background: linear-gradient(rgb(31 191 255 / 52%), rgb(31 191 255 / 52%)), url('{{ asset('public/images/about_bannner.png') }}');">
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
      <div class="video-box" id="videoContainer">
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
    </div>

    <!-- Right: Sidebar -->
    <div class="col-md-4">
      <!-- Chat Box -->
      <div class="printer-box">
        <a href="{{ route('home') }}">
            <img src="{{ asset('public/images/all_print_logo.webp') }}" alt="Logo">
        </a>
        <h6>The <strong>3</strong> steps solution to an error-free <strong>Printer</strong></h6>

        <div class="step-btn"><img src="https://img.icons8.com/ios-filled/50/00677f/chat.png"> Chat with Technician</div>
        <div class="step-btn"><img src="https://img.icons8.com/ios-filled/50/00677f/help.png"> Discuss your Problem</div>
        <div class="step-btn"><img src="https://img.icons8.com/ios-filled/50/00677f/checked.png"> Get solution over chat</div>
        <a href="#" class="chat-now-main">Chat Now</a>
      </div>

      <!-- Fix Epson Box -->
      <div class="fix-epson-box">
        <h6>Fix Your Epson Printer Now</h6>
        <ul>
          <li><a href="#"><span class="arrow">→</span> Epson Printer Driver</a></li>
          <li><a href="#"><span class="arrow">→</span> Epson Printer Not Printing</a></li>
          <li><a href="#"><span class="arrow">→</span> Epson Other Issues</a></li>
        </ul>
      </div>

      <!-- Recent Posts -->
      <div class="recent-post-box">
        <h6>Recent Posts</h6>
        @foreach($recent_posts as $post)
        <div class="recent-post">
          <img src="{{ asset('storage/' . $post->meta_img) }}" alt="{{ $post->title }}" class="profile" onerror="this.src='{{ asset('public/images/dummy.webp') }}'">
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
    const videoId = videoUrl.includes("watch?v=")
      ? videoUrl.split("watch?v=")[1].split("&")[0]
      : videoUrl;

    iframe.src = "https://www.youtube.com/embed/" + videoId + "?autoplay=1&rel=0";
    iframe.allow = "autoplay; encrypted-media";
    iframe.allowFullscreen = true;
    iframe.width = "100%";
    iframe.height = "400px";

    container.innerHTML = '';
    container.appendChild(iframe);
  }
</script>
