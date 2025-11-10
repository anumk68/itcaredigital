@extends('admin.includes.app')

@section('content')

<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Blogs</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item active" aria-current="page">Blog Update</li>
							</ol>
						</nav>
					</div>
					
				</div>
				<!--end breadcrumb-->

				<h6 class="mb-0 text-uppercase">Blog Update</h6>
				<hr/>

                <div class="col-md-6 mx-auto">
                    <div class="card">
                
                        <div class="card-body">
                            <form action="{{route('blog-category.update', $cateogry->id)}}" method="POST" class="row g-3">
                            @csrf
                                <div class="col-12">
                                <label class="form-label">Name</label>
                                <input type="text" class="form-control" name="category_name" value="{{$cateogry->category_name}}" placeholder="Category name" required>
                                </div>
                                <div class="col-12">
                                <label class="form-label">Slug</label>
                                <input type="text" class="form-control" name="slug" value="{{$cateogry->slug}}" placeholder="Slug name">
                                </div>
                                
                                <div class="col-12">
                                <div class="d-grid">
                                    <button class="btn btn-primary">Update Category</button>
                                </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>

@endsection