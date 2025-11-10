
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

                <div class="card">
                
                    <div class="card-body">
                        <form id="add_form" class="form-horizontal" action="{{ route('blog.update',$blog->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row mb-4">
                                <label class="col-md-3 col-form-label">
                                    Blog Title
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="col-md-9">
                                    <input type="text" placeholder="Blog Title" onkeyup="makeSlug(this.value)" id="title" name="title" value="{{$blog->title}}" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-md-3 col-form-label">Slug
                                    <span class="text-danger">*</span></label>
                                <div class="col-md-9">
                                    <input type="text" placeholder="Slug" name="slug" id="slug" class="form-control" value="{{$blog->slug}}" required>
                                </div>
                            </div>
                            <div class="form-group row mb-4" id="category">
                                <label class="col-md-3 col-from-label">
                                    Category
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="col-md-9">
                                    <select class="form-control aiz-selectpicker" name="category_id" id="category_id" data-live-search="true" required>
                                        <option value="">Select One</option>
                                        @foreach ($blog_categories as $category)
                                        <option @if($blog->category_id == $category->id) {{'selected'}} @endif value="{{ $category->id }}">
                                            {{ $category->category_name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                            <div class="form-group row mb-4">
                                <label class="col-md-3 col-form-label">Banner Alt
                                    <span class="text-danger">*</span></label>
                                <div class="col-md-9">
                                    <input type="text" placeholder="Banner Alt" name="banner_alt" value="{{$blog->banner_alt}}" id="slug" class="form-control" >
                                </div>
                            </div>


                            <div class="form-group row mb-4">
                                <label class="col-md-3 col-form-label" for="signinSrEmail">
                                    Banner
                                    {{-- <small>(1300x650)</small> --}}
                                </label>
                                <div class="col-md-9">
                                    <div class="input-group" data-toggle="aizuploader" data-type="image">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text bg-soft-secondary font-weight-medium">
                                                <input type="file" name="banner" value="{{ asset($blog->banner) }}" class="selected-files" > 
                                            </div>
                                            
                                        </div>

                                    </div>
                                    <div class="file-preview box sm">
                                            <img src="{{asset('public/'.$blog->banner)}}" alt="bruce" class="w- border-radius-lg shadow-sm" height="200px" width="200px">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-md-3 col-form-label">Video URL</label>
                                <div class="col-md-9">
                                    <input type="url" name="video_url" class="form-control" placeholder="https://www.youtube.com/watch?v=..." value="{{ $blog->video_url }}">
                                    <small class="text-muted">YouTube ya Vimeo video ka link yahan daalein</small>
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-md-3 col-form-label">
                                    Short Description
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="col-md-9">
                                    <textarea name="short_description" rows="5" class="form-control" required="">{{$blog->short_description}}</textarea>
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-md-3 col-from-label">
                                    Description
                                </label>
                                <div class="col-md-9">
                                    <textarea class="form-control" id="description" rows="3" name="description">{{$blog->description}}</textarea> 
                                    {{-- <textarea class="form-control" name="description"></textarea> --}}
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-md-3 col-form-label">Meta Title</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="meta_title" value="{{$blog->meta_title}}" placeholder="Meta Title">
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-md-3 col-form-label" for="signinSrEmail">
                                    Meta Image
                                    <small>(200x200)</small>
                                </label>
                                <div class="col-md-9">
                                    <div class="input-group" data-toggle="aizuploader" data-type="image">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text bg-soft-secondary font-weight-medium">
                                                <input type="file" name="meta_img" class="selected-files">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="file-preview box sm">
                                        @if(('header_logo') != null)
                                            <img src="{{ asset('public/' . $blog->meta_img) }}" alt="bruce" width="150px" height="150px" class="border-radius-lg shadow-sm">
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-md-3 col-form-label">Meta Description</label>
                                <div class="col-md-9">
                                    <textarea name="meta_description" id="meta_description" rows="5" class="form-control">{{$blog->meta_description}}</textarea>
                                    <div id="meta_char_count">0/160 characters</div>
                                    <div id="meta_error_message" style="color: red; display: none;"></div>
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-md-3 col-form-label">
                                    Meta Keywords
                                </label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" id="meta_keywords" name="meta_keywords" value="{{$blog->meta_keywords}}" placeholder="Meta Keywords">
                                </div>
                            </div>

                            <div class="form-group mb-0 text-right">
                                <button type="submit" class="btn btn-primary">
                                    Save
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


    // document.getElementById('title').addEventListener('input', function() {
    //     const input = this.value.length;
    //     const message = document.getElementById('lengthMessage');
        
    //     if (input < 50 || input > 160) {
    //         message.style.display = 'block';
    //     } else {
    //         message.style.display = 'none';
    //     }
    // });


    // Update character count for Meta Description
    document.getElementById('meta_description').addEventListener('input', function() {
        const input = this.value.length;
        const minLength = 150; // Minimum length
        const maxLength = 160; // Maximum length
        const charCountDisplay = document.getElementById('meta_char_count');
        const errorMessage = document.getElementById('meta_error_message');
        const submitButton = document.getElementById('submit_button');

        charCountDisplay.textContent = `${input}/${maxLength} characters`;

        if (input < minLength) {
            errorMessage.style.display = 'block';
            errorMessage.textContent = `Meta description must be at least ${minLength} characters.`;
            submitButton.disabled = true; // Disable the submit button
        } else if (input > maxLength) {
            errorMessage.style.display = 'block';
            errorMessage.textContent = `Meta description must not exceed ${maxLength} characters.`;
            submitButton.disabled = true; // Disable the submit button
        } else {
            errorMessage.style.display = 'none';
            submitButton.disabled = false; // Enable the submit button
        }
    });

    ClassicEditor
    .create(document.querySelector('#blog_description'), {
        ckfinder: {
            uploadUrl: '{{ route('ckeditor.upload').'?_token='.csrf_token() }}'
        },
        toolbar: [
            'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote', 
            'imageUpload', 'listStart', 'listStyle', '|', 'undo', 'redo',
        ],
        heading: {
            options: [
                { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
                { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' },
                { model: 'heading4', view: 'h4', title: 'Heading 4', class: 'ck-heading_heading4' },
                { model: 'heading5', view: 'h5', title: 'Heading 5', class: 'ck-heading_heading5' },
                { model: 'heading6', view: 'h6', title: 'Heading 6', class: 'ck-heading_heading6' }
            ]
        },
        image: {
            toolbar: [ 'imageTextAlternative', 'imageStyle:full', 'imageStyle:side' ]
        },
        mediaEmbed: {
            previewsInData: true
        },
        list: {
            properties: {
                styles: true,
                startIndex: true
            }
        }
    })
    .catch(error => {
        console.error(error);
    });
</script>

@endsection

