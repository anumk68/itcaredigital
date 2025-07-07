@extends('layouts.admin.app')
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
								<li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Blog List</li>
							</ol>
						</nav>
					</div>
					<div class="ms-auto">
						<div class="btn-group">
							<a href="{{route('blog.create')}}"><button type="button" class="btn btn-primary">Blog Create</button></a>
						</div>
					</div>
				</div>
				<!--end breadcrumb-->


                <div class="row">
					<div class="col-xl-6 mx-auto">
						
						<div class="card">
							<div class="card-body p-4">
								<h5 class="mb-4">New Blog</h5>
								
    							        <form action="{{ route('update_setting_form', ['id' => $setting->id]) }}" method="post">
                                            @csrf
                                                    <div class="col-md-12 mt-2">
                                                        <div>
                                                            <label class="form-label" for="type">Name :</label>
                                                            <input class="form-control" value="{{ $setting->type}}" type="text" name="type" disabled>
                                                        </div>
                                                    </div>

                                                    
                                                    <div class="col-md-12 mt-2">
                                                        <div>
                                                            <label class="form-label" for="value">Value To Display :</label>
                                                            <input class="form-control" value="{{ $setting->value}}" type="text" name="value" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 mt-3">
                                                        <button class="btn btn-dark btn-sm mt-4 mb-3" type="submit">Update</button>
                                                    </div>
                                        
                                        </form>
								
							</div>
						</div>


					</div>
				</div>
				<!--end row-->



            </div>
		</div>



@endsection