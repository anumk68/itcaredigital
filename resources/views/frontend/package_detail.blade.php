@extends('layouts.app')
<meta name="robots" content="noindex, nofollow" />

@section('content')


    <style>
        .star {
            font-size: 24px;
            color: #ccc;
            cursor: pointer;
            transition: color 0.2s;
        }

        .star.filled {
            color: #f7c411;
            /* gold/yellow filled star */
        }
    </style>


    <section class="package_detail_page py_8">
        <div class="container">
            <div class="plan-box">
                <div class="plan-title">{{ $package->package_name }}</div>
                <div class="plan-price">Rs. {{ number_format($package->price, 2) }}</div>

                <div class="star-rating">
                    @php
                        $avgRating = round($package->reviews);
                    @endphp

                    @for ($i = 1; $i <= 5; $i++)
                        @if ($i <= $avgRating)
                            <span>⭐</span>
                        @else
                            <span style="opacity: 0.3;">⭐</span>
                        @endif
                    @endfor

                    <span class="text-muted ms-2">({{ $package->reviews }}/5)</span>
                </div>


                <p>{!! $package->description !!}</p>

                <div class="add_to_cart mt-4">
                    <a href="{{ route('cart',$package->id) }}" class="btn">
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i> Add to Cart
                    </a>
                </div>


                <!-- Tabs -->
                <ul class="nav nav-tabs mt-4" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="desc-tab" data-bs-toggle="tab" data-bs-target="#desc"
                            type="button" role="tab">Description</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="review-tab" data-bs-toggle="tab" data-bs-target="#review"
                            type="button" role="tab">Review</button>
                    </li>
                </ul>

                <div class="tab-content p-3 border border-top-0" id="myTabContent">
                    <div class="tab-pane fade show active" id="desc" role="tabpanel">
                        {!! $package->description !!}
                    </div>

                    <div class="tab-pane fade" id="review" role="tabpanel">
                        <div class="write_review_btn mt-4">
                            @if (Auth::check())
                                <form method="POST" action="{{ route('review.store') }}">
                                    @csrf
                                    <input type="hidden" name="package_id" value="{{ $package->id }}">

                                    <div class="mb-3">
                                        <label class="form-label">Share Your Reviews</label>
                                        <div id="starRating" class="d-flex gap-2">
                                            @for ($i = 1; $i <= 5; $i++)
                                                <i class="fa fa-star star" data-value="{{ $i }}"></i>
                                            @endfor

                                        </div>
                                        <input type="hidden" name="rating" id="ratingInput" required>
                                    </div>


                                    <div class="mb-3">
                                        <textarea name="comment" class="form-control" rows="3" placeholder="Write your review..." required></textarea>
                                    </div>

                                    <button type="submit" class="btn btn-primary">Submit Review</button>
                                </form>
                            @else
                                <p><a href="{{ route('login') }}">Login</a> to write a review.</p>
                            @endif
                        </div>

                        <div class="mt-4">
                            <h5>User Reviews</h5>
                            @forelse ($reviews as $review)
                                <div class="review-block mt-3 border p-3 rounded">
                                    <div class="d-flex align-items-center mb-2">
                                        <div class="me-2 bg-primary text-white rounded-circle d-flex justify-content-center align-items-center"
                                            style="width: 35px; height: 35px;">
                                            {{ strtoupper(substr($review->user->name ?? 'U', 0, 1)) }}
                                        </div>
                                        <div>
                                            <div class="fw-bold">{{ $review->user->name ?? 'Anonymous' }}</div>
                                            <div class="text-muted" style="font-size: 12px;">
                                                {{ \Carbon\Carbon::parse($review->created_at)->format('d M Y') }}
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="mb-1">Rating:
                                            @for ($i = 1; $i <= $review->rating; $i++)
                                                ⭐
                                            @endfor
                                        </div>
                                        <div class="text-muted">{{ $review->comment }}</div>
                                    </div>
                                </div>
                            @empty
                                <p>No reviews yet.</p>
                            @endforelse
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="member_pricing py_8 pt-0">
        <div class="container">
            <h2 class="text-center title mb-4">Recent Packages</h2>
            <div class="row justify-content-center">
                @foreach ($packages->where('id', '!=', $package->id) as $pkg)
                    <div class="col-md-3 mb-3">
                        <div class="plan">
                            <h3>{{ $pkg->package_name }}</h3>
                            <div class="price">${{ number_format($pkg->price, 2) }}</div>
                            <div class="desc">{{ $pkg->short_description }}</div>
                            <button class="select-btn">
                                <a href="{{ route('package.detail', $pkg->slug) }}">Select Membership</a>
                            </button>
                            <div class="rating-review-box">
                                <div class="stars">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                    <div class="reviews">24000+ Reviews</div>
                                </div>
                                <div class="reviewws">1L+ already Subscribed</div>
                            </div>
                            <span class="toggle-link" onclick="toggleList(this)">Show More Features</span>
                            <ul class="features">
                                @php $amenities = explode(',', $pkg->amenities); @endphp
                                @foreach ($amenities as $item)
                                    <li>✓ {{ trim($item) }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const stars = document.querySelectorAll('.star');
            const ratingInput = document.getElementById('ratingInput');
            let selectedRating = 0;

            stars.forEach((star, index) => {
                const value = index + 1;

                star.addEventListener('mouseover', () => {
                    highlightStars(value);
                });

                star.addEventListener('mouseout', () => {
                    highlightStars(selectedRating);
                });

                star.addEventListener('click', () => {
                    selectedRating = value;
                    ratingInput.value = selectedRating;
                    highlightStars(selectedRating);
                });
            });

            function highlightStars(count) {
                stars.forEach((star, i) => {
                    if (i < count) {
                        star.classList.add('fa-solid', 'filled');
                        star.classList.remove('fa-regular');
                    } else {
                        star.classList.remove('fa-solid', 'filled');
                        star.classList.add('fa-regular');
                    }
                });
            }
        });
    </script>

@endsection
