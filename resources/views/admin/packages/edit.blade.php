@extends('layouts.adminapp')

@section('content')

<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Packages</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item active" aria-current="page">Package Update</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->

        <h6 class="mb-0 text-uppercase">Package Update</h6>
        <hr/>

        <div class="card">
            <div class="card-body">
                <form class="form-horizontal" action="{{ route('packages.update', $package->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')

                    <!-- Package Name -->
                    <div class="form-group row mb-3">
                        <label class="col-md-3 col-form-label">Package Name <span class="text-danger">*</span></label>
                        <div class="col-md-9">
                            <input type="text" placeholder="Package Name" onkeyup="makeSlug(this.value)" name="package_name" value="{{ $package->package_name }}" class="form-control" required>
                        </div>
                    </div>

                    <!-- Slug -->
                    <div class="form-group row mb-3">
                        <label class="col-md-3 col-form-label">Slug <span class="text-danger">*</span></label>
                        <div class="col-md-9">
                            <input type="text" name="slug" id="slug" class="form-control" value="{{ $package->slug }}" required>
                        </div>
                    </div>

                    <!-- Price -->
                    <div class="form-group row mb-3">
                        <label class="col-md-3 col-form-label">Price <span class="text-danger">*</span></label>
                        <div class="col-md-9">
                            <input type="text" name="price" class="form-control" value="{{ $package->price }}" step="0.01" required  placeholder="Enter price(s), use comma for multiple e.g. 999,1299">
                        </div>
                    </div>

                    <!-- Short Description -->
                    <div class="form-group row mb-3">
                        <label class="col-md-3 col-form-label">Short Description <span class="text-danger">*</span></label>
                        <div class="col-md-9">
                            <textarea name="short_description" rows="4" class="form-control" required>{{ $package->short_description }}</textarea>
                        </div>
                    </div>

                    <!-- Description -->
                    <div class="form-group row mb-3">
                        <label class="col-md-3 col-form-label">Description</label>
                        <div class="col-md-9">
                            <textarea name="description" class="form-control" rows="5">{{ $package->description }}</textarea>
                        </div>
                    </div>

                    <!-- Amenities -->
                    <div class="form-group row mb-3">
                        <label class="col-md-3 col-form-label">Amenities</label>
                        <div class="col-md-9">
                            <input type="text" name="amenities" class="form-control" placeholder="Separate with commas" value="{{ $package->amenities }}">
                        </div>
                    </div>

                    <!-- Reviews -->
                    <div class="form-group row mb-3">
                        <label class="col-md-3 col-form-label">Reviews</label>
                        <div class="col-md-9">
                            <textarea name="reviews" rows="4" class="form-control">{{ $package->reviews }}</textarea>
                        </div>
                    </div>

                    <!-- Subscriptions -->
                   

                    <!-- Status -->
                    <div class="form-group row mb-3">
                        <label class="col-md-3 col-form-label">Status</label>
                        <div class="col-md-9">
                            <select name="status" class="form-control">
                                <option value="1" {{ $package->status == 1 ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ $package->status == 0 ? 'selected' : '' }}>Inactive</option>
                            </select>
                        </div>
                    </div>

              <!-- Label Type -->
<div class="form-group row mb-3">
    <label class="col-md-3 col-form-label">Package Type</label>
    <div class="col-md-9 d-flex flex-wrap gap-3">

        <div class="form-check">
            <input class="form-check-input" type="radio" name="package_type" id="none" value="none"
                {{ $package->package_type == 'none' ? 'checked' : '' }}>
            <label class="form-check-label" for="none">None</label>
        </div>

        <div class="form-check">
            <input class="form-check-input" type="radio" name="package_type" id="recommended" value="recommended"
                {{ $package->package_type == 'recommended' ? 'checked' : '' }}>
            <label class="form-check-label" for="recommended">Recommended</label>
        </div>

        <div class="form-check">
            <input class="form-check-input" type="radio" name="package_type" id="limited" value="limited"
                {{ $package->package_type == 'limited' ? 'checked' : '' }}>
            <label class="form-check-label" for="limited">Limited Time Offer</label>
        </div>

    </div>
</div>

                    <!-- Submit Button -->
                    <div class="form-group mb-0 text-right">
                        <button type="submit" class="btn btn-primary">
                            Update Package
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
function makeSlug(val) {
    let slug = val.toLowerCase().replace(/[^\w ]+/g, '').replace(/ +/g, '-');
    document.getElementById('slug').value = slug;
}
</script>
@endsection
