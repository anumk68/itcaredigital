@extends('layouts.adminapp')

@section('content')

    <!-- Start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">
            <!-- Breadcrumb -->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Packages</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item active" aria-current="page">New Package</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!-- End breadcrumb -->

            <h6 class="mb-0 text-uppercase">Package Create</h6>
            <hr />

            <div class="card">
                <div class="card-body">
                    <form id="add_form" class="form-horizontal" action="{{ route('packages.store') }}"
                        enctype="multipart/form-data" method="POST">
                        @csrf

                        <!-- Package Name -->
                        <div class="form-group row mb-3">
                            <label class="col-md-3 col-form-label">Package Name <span class="text-danger">*</span></label>
                            <div class="col-md-9">
                                <input type="text" placeholder="Package Name" onkeyup="makeSlug(this.value)" id="title"
                                    name="package_name" class="form-control" required>
                            </div>
                        </div>

                        <!-- Slug -->
                        <div class="form-group row mb-3">
                            <label class="col-md-3 col-form-label">Slug <span class="text-danger">*</span></label>
                            <div class="col-md-9">
                                <input type="text" placeholder="Slug" name="slug" id="slug" class="form-control" required>
                            </div>
                        </div>

                        <!-- Price -->
                        <div class="form-group row mb-3">
                            <label class="col-md-3 col-form-label">Price <span class="text-danger">*</span></label>
                            <div class="col-md-9">
                                <input type="text" name="price" class="form-control" required
                                    placeholder="Enter price(s), use comma for multiple e.g. 999,1299">
                            </div>
                        </div>


                        <!-- Short Description -->
                        <div class="form-group row mb-3">
                            <label class="col-md-3 col-form-label">Short Description <span
                                    class="text-danger">*</span></label>
                            <div class="col-md-9">
                                <textarea name="short_description" rows="4" class="form-control" required></textarea>
                            </div>
                        </div>

                        <!-- Description -->
                        <div class="form-group row mb-3">
                            <label class="col-md-3 col-form-label">Description</label>
                            <div class="col-md-9">
                                <textarea class="form-control" id="description" rows="5" name="description"></textarea>
                            </div>
                        </div>

                        <!-- Amenities -->
                        <div class="form-group row mb-3">
                            <label class="col-md-3 col-form-label">Amenities</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="amenities" placeholder="Separate with commas">
                            </div>
                        </div>

                        <!-- Reviews -->
                        <div class="form-group row mb-3">
                            <label class="col-md-3 col-form-label">Reviews</label>
                            <div class="col-md-9">
                                <textarea name="reviews" rows="4" class="form-control"></textarea>
                            </div>
                        </div>

                        <!-- Subscriptions -->


                        <!-- Status -->
                        <div class="form-group row mb-3">
                            <label class="col-md-3 col-form-label">Status</label>
                            <div class="col-md-9">
                                <select name="status" class="form-control">
                                    <option value="1" selected>Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                        </div>
                        <!-- Label Type -->
                        <div class="form-group row mb-3">
                            <label class="col-md-3 col-form-label">Package Type</label>
                            <div class="col-md-9 d-flex flex-wrap gap-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="package_type" id="none" value="none"
                                        checked>
                                    <label class="form-check-label" for="none">None</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="package_type" id="recommended"
                                        value="recommended">
                                    <label class="form-check-label" for="recommended">Recommended</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="package_type" id="limited"
                                        value="limited">
                                    <label class="form-check-label" for="limited">Limited Time Offer</label>
                                </div>
                            </div>
                        </div>



                        <!-- Submit Button -->
                        <div class="form-group mb-0 text-right">
                            <button type="submit" id="submit_button" class="btn btn-primary">
                                Save
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
<script>
    function makeSlug(val) {
        let slug = val.toLowerCase().replace(/[^\w ]+/g, '').replace(/ +/g, '-');
        document.getElementById('slug').value = slug;
    }
</script>