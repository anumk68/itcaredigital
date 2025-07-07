@extends('layouts.adminapp')
@section('content')
		<!--end header -->
		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
            <div class="container">

            <div class="card">
                    <div class="card-body flex flex-col p-6">
                        <header
                            class="mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
                            <div class="flex-1">
                                <div class="card-title text-slate-900 dark:text-white">Setting</div>
                            </div>
                            
                        </header>
                        <div class="card-text h-full  nav_tab_Dashboard">
                            <div>
                                <ul class="nav nav-tabs flex flex-col md:flex-row flex-wrap list-none border-b-0 pl-0 mb-4"
                                    id="tabs-tab" role="tablist">
                                    {{-- <li class="nav-item" role="presentation">
                                        <a href="#tabs-home"
                                            class="nav-link w-full block font-medium text-sm font-Inter leading-tight capitalize border-x-0 border-t-0 border-b border-transparent px-4 pb-2 my-2 hover:border-transparent focus:border-transparent dark:text-slate-300"
                                            id="tabs-home-tab" data-bs-toggle="pill" data-bs-target="#tabs-home"
                                            role="tab" aria-controls="tabs-home" aria-selected="true">Header</a>
                                    </li> --}}
                                    <li class="nav-item" role="presentation">
                                        <a href="#tabs-profile"
                                            class="nav-link w-full block font-medium text-sm font-Inter leading-tight capitalize border-x-0 border-t-0 border-b border-transparent px-4 pb-2 my-2 hover:border-transparent focus:border-transparent active dark:text-slate-300"
                                            id="tabs-profile-tab" data-bs-toggle="pill" data-bs-target="#tabs-profile"
                                            role="tab" aria-controls="tabs-profile" aria-selected="false">Contact Details</a>
                                    </li>
                                    {{-- <li class="nav-item" role="presentation">
                                        <a href="#tabs-messages"
                                            class="nav-link w-full block font-medium text-sm font-Inter leading-tight capitalize border-x-0 border-t-0 border-b border-transparent px-4 pb-2 my-2 hover:border-transparent focus:border-transparent dark:text-slate-300"
                                            id="tabs-messages-tab" data-bs-toggle="pill" data-bs-target="#tabs-messages"
                                            role="tab" aria-controls="tabs-messages" aria-selected="false">Footer</a>
                                    </li> --}}
                                    <li class="nav-item" role="presentation">
                                        <a href="#tabs-settings"
                                            class="nav-link w-full block font-medium text-sm font-Inter leading-tight capitalize border-x-0 border-t-0 border-b border-transparent px-4 pb-2 my-2 hover:border-transparent focus:border-transparent dark:text-slate-300"
                                            id="tabs-settings-tab" data-bs-toggle="pill" data-bs-target="#tabs-settings"
                                            role="tab" aria-controls="tabs-settings" aria-selected="false">Meta</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="tabs-tabContent">
                                    <div class="tab-pane fade" id="tabs-home" role="tabpanel"
                                        aria-labelledby="tabs-home-tab">

                                        <!--Header setting start here-->

                                        <div class="col-md-8">
                                            <form action="{{route('setting.update')}}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group row">

                                                    <label class="col-md-2 col-from-label" for="avatar">Add Image</label>
                                                    
                                                    <div class="col-md-10">
                                                        <input type="hidden" name="types[]" value="header_logo">
                                                        <input type="file" name="header_logo" accept="image/*" id="avatar" class="form-control" required>
                                                    </div>

                                                    <div class="col-sm-auto col-4">
                                                        <div class="avatar avatar-xl position-relative">
                                                            <div>
                                                                <label for="file-input"
                                                                    class="btn btn-sm btn-icon-only bg-gradient-light position-absolute bottom-0 end-0 mb-n2 me-n2">
                                                                    <i class="fa fa-pen top-0" data-bs-toggle="tooltip" data-bs-placement="top" title="" aria-hidden="true" data-bs-original-title="Edit Image" aria-label="Edit Image"></i>
                                                                    {{-- <span class="sr-only">Edit Image</span> --}}
                                                                </label>

                                                                <span
                                                                    class="h-12 w-12 rounded-full overflow-hidden bg-gray-100">
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="text-right btn_bcnd-updte">
                                                    <button type="submit" class="btn btn-primary">Update</button>
                                                </div>
                                            </form>
                                        </div>

                                        <!--Header setting end here-->

                                    </div>
                                    <div class="tab-pane fade show active" id="tabs-profile" role="tabpanel"
                                        aria-labelledby="tabs-profile-tab">

                                        <!--Contact setting start here-->

                                        <form action="{{ route('setting.update') }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-6">

                                                    <div class="form-group row my-2">

                                                        <label class="col-md-2 col-from-label" for="avatar">Phone</label>
                                                        <div class="col-md-10">
                                                            <input type="hidden" name="types[]" value="header_phone">
                                                        </div>

                                                    </div>
                                                    <div class="form-group row my-2">

                                                        <label class="col-md-2 col-from-label" for="avatar">Second Phone</label>
                                                        <div class="col-md-10">
                                                            <input type="hidden" name="types[]" value="header_phone_sec">
                                                        </div>

                                                    </div>

                                                    <div class="form-group row my-2">

                                                        <label class="col-md-2 col-from-label"for="avatar">Email</label>
                                                        <div class="col-md-10">
                                                            <input type="hidden" name="types[]" value="main_email">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row my-2">

                                                        <label class="col-md-2 col-from-label" for="avatar">Address</label>
                                                        <div class="col-md-10">
                                                            <input type="hidden" name="types[]" value="main_address">
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>
                                            <div class="text-right btn_bcnd-updte">
                                                <button type="submit" class="btn btn-primary">Update</button>
                                            </div>



                                        </form>

                                        <!--Contact setting end here-->

                                    </div>
                                    <div class="tab-pane fade" id="tabs-messages" role="tabpanel"
                                        aria-labelledby="tabs-messages-tab">

                                        <!--Footer setting start here-->
                                        {{-- <form action="{{route('settings_footer')}}" method="POST" id="useful_links">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-6">

                                                    <div class="form-group row my-2">

                                                        <label class="col-md-2 col-from-label" for="avatar">1</label>
                                                        <div class="col-md-10">
                                                            <input type="hidden" name="types[]" value="footer_about">
                                                            <input type="text" value="{{ $sett->where('type', 'fields[field_one]')->first()->value}}" name="fields[field_one]" class="form-control" id="fields[field_one]">
                                                        </div>

                                                    </div>
                                                    <div class="form-group row my-2">

                                                        <label class="col-md-2 col-from-label" for="avatar">2</label>
                                                        <div class="col-md-10">
                                                        <input type="hidden" name="types[]" value="footer_review_name">
                                                            <input type="text" name="fields[field_two]" value="{{ $sett->where('type', 'fields[field_two]')->first()->value}}" class="form-control" id="fields[field_two]">
                                                        </div>

                                                    </div>

                                                    <div class="form-group row my-2">

                                                        <label class="col-md-2 col-from-label"for="avatar">3</label>
                                                        <div class="col-md-10">
                                                            <input type="hidden" name="types[]" value="footer_sample_name">
                                                            <input type="text" name="fields[field_three]" value="{{ $sett->where('type', 'fields[field_three]')->first()->value}}" class="form-control" id="fields[field_three]">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row my-2">

                                                        <label class="col-md-2 col-from-label" for="avatar">4</label>
                                                        <div class="col-md-10">
                                                            <input type="hidden" name="types[]" value="footer_blog_name">
                                                            <input type="text" name="fields[field_four]" value="{{ $sett->where('type', 'fields[field_four]')->first()->value}}" class="form-control" id="fields[field_four]">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row my-2">

                                                        <label class="col-md-2 col-from-label" for="avatar">5</label>
                                                        <div class="col-md-10">
                                                            <input type="hidden" name="types[]" value="footer_privacy_policy">
                                                            <input type="text" name="fields[field_five]" value="{{ $sett->where('type', 'fields[field_five]')->first()->value}}" class="form-control" id="fields[field_five]">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row my-2">

                                                        <label class="col-md-2 col-from-label" for="avatar">6</label>
                                                        <div class="col-md-10">
                                                            <input type="hidden" name="types[]" value="footer_terms_nd_condition">
                                                            <input type="text" name="fields[field_six]" value="{{ $sett->where('type', 'fields[field_six]')->first()->value}}" class="form-control" id="fields[field_six]">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row my-2">

                                                        <label class="col-md-2 col-from-label" for="avatar">7</label>
                                                        <div class="col-md-10">
                                                            <input type="hidden" name="types[]" value="footer_contact_us">
                                                            <input type="text" name="fields[field_seven]" value="{{ $sett->where('type', 'fields[field_seven]')->first()->value}}" class="form-control" if="fields[field_seven]">
                                                        </div>
                                                        
                                                    </div>
                                                    

                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group row icon_main_rigth">
                                                        <label class="col-from-label" for="avatar">Useful Links</label>
                                                        <div class="input-group form-group my-2">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">1</span>
                                                            </div>
                                                            <input type="hidden" name="types[]" value="footer_about_us_link">
                                                            <input type="text" class="form-control" placeholder="http://" name="links[field_one]" value="{{ $sett->where('type', 'links[field_one]')->first()->value}}" id="links[field_one]">
                                                        </div>
                                                        <div class="input-group form-group my-2">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">2</span>
                                                            </div>
                                                            <input type="hidden" name="types[]" value="footer_review_link">
                                                            <input type="text" class="form-control" placeholder="http://" name="links[field_two]" value="{{ $sett->where('type', 'links[field_two]')->first()->value}}" id="links[field_two]">
                                                        </div>
                                                        <div class="input-group form-group my-2">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">3</i></span>
                                                            </div>
                                                            <input type="hidden" name="types[]" value="footer_sample_link">
                                                            <input type="text" class="form-control" placeholder="http://" name="links[field_three]" value="{{ $sett->where('type', 'links[field_three]')->first()->value}}" id="links[field_three]">
                                                        </div>
                                                        <div class="input-group form-group my-2">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">4</span>
                                                            </div>
                                                            <input type="hidden" name="types[]" value="footer_blog_link">
                                                            <input type="text" class="form-control" placeholder="http://" name="links[field_four]" value="{{ $sett->where('type', 'links[field_four]')->first()->value}}" id="links[field_four]">
                                                        </div>
                                                        <div class="input-group form-group my-2">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">5</span>
                                                            </div>
                                                            <input type="hidden" name="types[]" value="footer_privacy_policy_link">
                                                            <input type="text" class="form-control" placeholder="http://" name="links[field_five]" value="{{ $sett->where('type', 'links[field_five]')->first()->value}}" id="links[field_five]">
                                                        </div>
                                                        <div class="input-group form-group my-2">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">6</span>
                                                            </div>
                                                            <input type="hidden" name="types[]" value="footer_terms_nd_condition_link">
                                                            <input type="text" class="form-control" placeholder="http://" name="links[field_six]" value="{{ $sett->where('type', 'links[field_six]')->first()->value}}" id="links[field_six]">
                                                        </div>
                                                        <div class="input-group form-group my-2">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">7</span>
                                                            </div>
                                                            <input type="hidden" name="types[]" value="footer_contactus_link">
                                                            <input type="text" class="form-control" placeholder="http://" name="links[field_seven]" value="{{ $sett->where('type', 'links[field_seven]')->first()->value}}" id="links[field_seven]">
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-right btn_bcnd-updte">
                                                <button type="submit" class="btn btn-primary">Update</button>
                                            </div>

                                        </form> --}}
                                            
                                        <!--Footer setting end here-->

                                    </div>

                                    <div class="tab-pane fade" id="tabs-settings" role="tabpanel"
                                        aria-labelledby="tabs-settings-tab">
                                        {{-- <p class="text-sm text-gray-500 dark:text-gray-200">
                                            This is some placeholder content the
                                            <strong>Settings</strong>
                                            tab's associated content. Clicking another tab will toggle the visibility of
                                            this one for the next. The tab JavaScript swaps classes to control the
                                            content visibility and styling. consectetur adipisicing elit. Ab ipsa!
                                        </p> --}}
                                        <div class="container">
                                        <div class="row">
                                            <form action="{{ route('settings.new_meta') }}" method="post">
                                                @csrf
                                            
                                                        <div class="col-md-12 mt-3">
                                                            <div>
                                                                <label class="form-label" for="selectmeta">Select Meta Type :</label>
                                                                <select name="metaselect" class="form-select" required id="">
                                                                    <option value="" selected>Select your meta type</option>
                                                                    <option value="description_">Description</option>
                                                                    <option value="title_">Title</option>
                                                                    <option value="keyword_">Keyword</option>
                                                                </select>
                                                            </div>
                                                        </div>


                                                        <div class="col-md-12 mt-2">
                                                            <div>
                                                                <label class="form-label" for="type">Name :</label>
                                                                <input class="form-control" type="text" name="type" required>
                                                            </div>
                                                        </div>

                                                        
                                                        <div class="col-md-12 mt-2">
                                                            <div>
                                                                <label class="form-label" for="value">Value To Display :</label>
                                                                <input class="form-control" type="text" name="value" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 mt-3">
                                                            <button class="btn btn-success btn-sm mt-4 mb-3" type="submit">Add Value</button>
                                                        </div>
                                            
                                            </form>
                                        </div>
                                        </div>
                                        
                                        <div class="container">
                    <ul class="nav nav-tabs mt-4 mb-5" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Description</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Keyword</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Title</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <table class="table table-success table-bordered table-striped text-center mt-3">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Meta Name</th>
                                    <th>Meta Value</th>
                                    <th>Action</th>
                                   
                                </tr>
                            </thead>
                                @foreach($descriptionsettings as $description)
                            <tbody>
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $description->type }}</td>
                                    <td>{{ $description->value }}</td>
                                    <td><a href="{{ route('settings.edit_meta', ['id' => $description->id])}}" class="btn btn-primary btn-sm ">Edit</a>
                                    {{-- <a href="{{ route('delete_setting_form', ['id' => $description->id])}}" class="btn btn-danger btn-sm ">Delete</a></td> --}}
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <table class="table table-success table-bordered table-stripped text-center">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Meta Name</th>
                                    <th>Meta Value</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                                @foreach($keywordsettings as $keyword)
                            <tbody>
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $keyword->type }}</td>
                                    <td>{{ $keyword->value }}</td>
                                    <td><a href="{{ route('settings.edit_meta', ['id' => $keyword->id])}}" class="btn btn-primary btn-sm ">Edit</a>
                                    {{-- <a href="{{ route('delete_setting_form', ['id' => $keyword->id])}}" class="btn btn-danger btn-sm ">Delete</a></td> --}}
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        </div>
                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                        <table class="table table-success table-bordered table-striped text-center">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Meta Name</th>
                                    <th>Meta Value</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                                @foreach($titlesettings as $title)
                            <tbody>
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $title->type }}</td>
                                    <td>{{ $title->value }}</td>
                                    <td><a href="{{ route('settings.edit_meta', ['id' => $title->id])}}" class="btn btn-primary btn-sm ">Edit</a>
                                    {{-- <a href="{{ route('delete_setting_form', ['id' => $title->id])}}" class="btn btn-danger btn-sm ">Delete</a></td> --}}
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        </div>
                    </div>
                
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

    <!-- Displaying Existing Settings -->
    
</div>
            </div>
		</div>
		<!--end page wrapper -->
		<!--start overlay-->
		 <div class="overlay toggle-icon"></div>
		<!--end overlay-->
		<!--Start Back To Top Button-->
		  <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
		<!--End Back To Top Button-->
	
	</div>
	<!--end wrapper-->




@endsection