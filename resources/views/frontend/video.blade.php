@extends('layouts.app')

@section('content')
<section class="video_banner" style="background: linear-gradient(rgb(31 191 255 / 52%), rgb(31 191 255 / 52%)), url('{{ asset('public/images/about_bannner.png') }}');">
    <div class="container">
        <div class="row">
            <div class="text_video_heading">
                <h1>Vlogs</h1>
            </div>
        </div>
    </div>
</section>

<section class="video_main_ban">
    <div class="container py-5">
        <h2 class="text-center mb-4">Welcome To AllPrinter Vlogs ..</h2>
        <div class="row g-4">
            
            @forelse($vlogs as $vlog)
                <div class="col-md-4 mb-3">
                    <div class="card h-100 shadow">
                        <a href="{{ route('video_detail', $vlog->slug) }}" class="card-img-top">
                            <img src="{{ asset('storage/app/public/' . $vlog->meta_img) }}" alt="{{ $vlog->title }}" class="profile">
                        </a>
                        <div class="card-body">
                            <small class="text-muted">
                                <i class="bi bi-calendar3"></i> 
                                {{ \Carbon\Carbon::parse($vlog->created_at)->format('M d, Y') }}
                                &nbsp; By {{ 'All Printer Setup' }}
                            </small>
                            <h5 class="card-title mt-2">
                                <a href="{{ route('video_detail', $vlog->slug) }}" class="text-decoration-none text-dark">{{ $vlog->title }}</a>
                            </h5>
                            <p class="card-text">
                                {{ Str::limit($vlog->short_description, 100) }}
                            </p>
                        </div>
                        <div class="btn_video">
                            <a href="{{ route('video_detail', $vlog->slug) }}" class="btn">See More</a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-warning text-center">No vlogs available at the moment.</div>
                </div>
            @endforelse

        </div>
    </div>
</section>
@endsection
