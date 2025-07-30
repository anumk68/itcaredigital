@extends('layouts.app')


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
                <div class="plan-title">{{ $packag->package_name }}</div>
                <div class="plan-short">{!! $packag->short_description !!}</div>
                @php
                    $priceArray = explode(',', $packag->price);
                    $mainPrice = isset($priceArray[0]) ? number_format($priceArray[0], 2) : '0.00';
                    $cutPrice = isset($priceArray[1]) ? number_format($priceArray[1], 2) : null;
                @endphp

                <div class="plan-price">
                    $. {{ $mainPrice }}
                    @if ($cutPrice)
                        <span style="text-decoration: line-through; color: #888; margin-left: 8px;">
                            $. {{ $cutPrice }}
                        </span>
                    @endif
                </div>

                @php
                    $packageReview = $packag->review->where('status', 1) ?? collect();
                    $average = $packageReview->avg('rating');
                    $rounded = round($average * 2) / 2;
                @endphp

                <div class="star-rating">
                    @for ($i = 1; $i <= 5; $i++)
                        @if ($i <= floor($rounded))
                            <i class="fas fa-star text-warning"></i>
                        @elseif ($i - 0.5 == $rounded)
                            <i class="fas fa-star-half-alt text-warning"></i>
                        @else
                            <i class="far fa-star text-warning"></i>
                        @endif
                    @endfor

                    <span class="text-muted ms-2">
                        ({{ number_format($average, 1) }}/5 from {{ $packageReview->count() }} reviews)
                    </span>
                </div>

                <p>{!! $packag->description !!}</p>

                <div class="add_to_cart mt-4">
                    <a href="{{ route('cart', $packag->id) }}" class="btn">
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
                        <button class="nav-link" id="review-tab" data-bs-toggle="tab" data-bs-target="#review" type="button"
                            role="tab">Review</button>
                    </li>
                </ul>

                <div class="tab-content p-3 border border-top-0" id="myTabContent">
                    <div class="tab-pane fade show active" id="desc" role="tabpanel">
                        {!! $packag->short_description !!}
                        <ul class="features">
                            @php
                                $amenities = explode(',', $packag->amenities);
                            @endphp
                            @foreach ($amenities as $amenity)
                                <li>✓ {{ trim($amenity) }}</li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="tab-pane fade" id="review" role="tabpanel">
                        <div class="write_review_btn mt-4">
                            @if (Auth::guard('user')->check())
                                <form method="POST" action="{{ route('review.store') }}">
                                    @csrf
                                    <input type="hidden" name="package_id" value="{{ $packag->id }}">

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
                                        <textarea name="comment" class="form-control" rows="3"
                                            placeholder="Write your review..." required></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit Review</button>
                                </form>
                            @else
                                <p><a href="{{ route('login_frontend') }}">Login</a> to write a review.</p>
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

<main class="pricing-section  ">
    <div class="container">
         <h2 class="text-center title mb-4">Recent Packages</h2>
        <!-- One Time Fix -->
        <section class="plan-section">
            
            <div class="card-container">
                @foreach ($packages->take(4) as $package)
                @php
                $packageReviews = $package->review ?? collect();
                $average = $packageReviews->avg('rating');

                $rounded = round($average * 2) / 2;
                $count = $packageReviews->count();
                $subscriberCount = $package->orders->count();
                @endphp

                <div class="card">
                    @if ($package->package_type == 'recommended')
                    <span class="badge recommended">RECOMMENDED</span>
                    @elseif($package->package_type == 'limited')
                             <span class="badge limited">LIMITED TIME OFFER</span>
                    @endif
                    <h3>{{ $package->package_name }}</h3>

                    @php
                    $priceArray = explode(',', $package->price);
                    $mainPrice = isset($priceArray[0]) ? number_format($priceArray[0], 2) : '0.00';
                    $cutPrice = isset($priceArray[1]) ? number_format($priceArray[1], 2) : null;
                    @endphp

                    <div class="price-box">
                        <span class="discounted-price">${{ $mainPrice }}</span>

                        @if ($cutPrice)
                        <span class="original-price">${{ $cutPrice }}</span>
                        @endif
                    </div>


                    <p>{{ $package->short_description }}</p>
                    <a href="{{ route('package.detail', $package->slug) }}" class="select-btn">Select Membership</a>

                    <div class="rating-review-box">
                        <div class="stars">
                            @for ($i = 1; $i <= 5; $i++) @if ($rounded>= $i)
                                <i class="fas fa-star"></i>
                                @elseif ($rounded >= $i - 0.5)
                                <i class="fas fa-star-half-alt"></i>
                                @else
                                <i class="far fa-star"></i>
                                @endif
                                @endfor

                        </div>
                        <div class="reviews">{{ $count }}+ Reviews</div>
                        @php
                        $displaySubscriberCount = ($subscriberCount ?? 0) > 0 ? $subscriberCount : rand(100, 200);
                        @endphp
                        <div class="reviewws">{{ $displaySubscriberCount }}+ already Subscribed</div>
                    </div>

                    <div class="features-toggle">
                        <div class="toggle-btn-wrapper">
                            <button class="toggle-btn">Show More Features ▼</button>
                        </div>

                        <div class="feature-wrapper">
                            <ul class="feature-list">
                                @php
                                $amenities = explode(',', $package->amenities);
                                @endphp
                                @foreach ($amenities as $amenity)
                                <li>✓ {{ trim($amenity) }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </section>

        
    </div>
</main>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
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