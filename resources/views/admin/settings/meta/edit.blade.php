
@extends('admin.includes.app')

@section('content')

        <!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Pages</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item active" aria-current="page">Edit Page</li>
							</ol>
						</nav>
					</div>
				</div>
				<!--end breadcrumb-->

				<h6 class="mb-0 text-uppercase">Edit Page</h6>
				<hr/>
                
                <div class="card">
                    
                    <div class="card-body">
                        <form id="add_form" class="form-horizontal" action="{{ route('meta.edit.post') }}" enctype="multipart/form-data" method="POST">
                            @csrf

                            <input type="hidden" name="id" value="{{ $setting->id }}">
                            <div class="form-group row mb-4">
                              <label class="col-md-3 col-form-label">
                                    Page
                                    <span class="text-danger">*</span>
                              </label>
                              <div class="col-md-9">
                                    <select id="page" name="page" class="form-control" required>
                                          <option value="" disabled selected>Select a Page</option>
                                          @foreach($pagedata as $page)
                                          <option value="{{ $page->page }}" {{ $setting->page == $page->page ? 'selected' : '' }}>{{ $page->page }}</option>
                                          @endforeach
                                    </select>
                              </div>
                              </div>

                              <div class="form-group row mb-4">
                                <label class="col-md-3 col-form-label">
                                    Title
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="col-md-9">
                                    <input type="text" placeholder="Title" id="page" value="{{ $setting->title }}" name="title" class="form-control" required>
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-md-3 col-form-label">
                                    Description
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="col-md-9">
                                    <input type="text" placeholder="Description" value="{{ $setting->description }}" id="page" name="description" class="form-control" required>
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-md-3 col-form-label">
                                    Keyword
                                    <!-- <span class="text-danger">*</span> -->
                                </label>
                                <div class="col-md-9">
                                    <input type="text" placeholder="Keyword" id="page" value="{{ $setting->keyword }}" name="keyword" class="form-control">
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-md-3 col-form-label">
                                    FAQ Schema<br>
                                    <span class="text-danger">( Kindly avoid script opening and closing tag )</span>
                                </label>
                                <div class="col-md-9">
                                    <textarea name="faq_schema" rows="5" class="form-control" >{{ $setting->faq_schema }}</textarea>
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-md-3 col-form-label">
                                    Extra Schema<br>
                                    <span class="text-danger">( Kindly avoid script opening and closing tag )</span>
                                    <!-- <span class="text-danger">*</span> -->
                                </label>
                                <div class="col-md-9">
                                    <textarea name="extra_schema" rows="5" class="form-control" >{{ $setting->extra_schema }}</textarea>
                                </div>
                            </div>

                            <div class="form-group mb-0 text-right">
                                <button type="submit" id="submit_button" class="btn btn-primary">
                                    Update
                                </button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>

@endsection
