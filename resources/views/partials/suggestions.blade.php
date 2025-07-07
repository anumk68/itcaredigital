@if($blogs->count())
    <h6 class="dropdown-header">Blogs</h6>
    @foreach($blogs as $blog)
        <a href="{{ route('blog.blog_details', $blog->slug) }}" class="dropdown-item">
            {{ $blog->title }}
        </a>
    @endforeach
@endif

@if($brands->count())
    <h6 class="dropdown-header">Printers</h6>
    @foreach($brands as $brand)
        <a href="{{ route('printer', ['brand_slug' => $brand->slug]) }}" class="dropdown-item">
            {{ $brand->brand_name }}
        </a>
    @endforeach
@endif

@if($services->count())
    <h6 class="dropdown-header">Services</h6>
    @foreach($services as $service)
        <a href="{{ route('service_detail', ['brand_slug' => $service->brand->slug, 'service_slug' => $service->slug]) }}" class="dropdown-item">
            {{ $service->service_name }}
        </a>
    @endforeach
@endif

@if(!$blogs->count() && !$brands->count() && !$services->count())
    <p class="dropdown-item text-muted mb-0">No results found.</p>
@endif
