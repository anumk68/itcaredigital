<?php $__env->startSection('content'); ?>

        <!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Blogs</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item active" aria-current="page">New Blog</li>
							</ol>
						</nav>
					</div>
					
				</div>
				<!--end breadcrumb-->

				<h6 class="mb-0 text-uppercase">Blog Create</h6>
				<hr/>
                
                <div class="card">
                    
                    <div class="card-body">
                        <form id="add_form" class="form-horizontal" action="<?php echo e(route('blog.store')); ?>" enctype="multipart/form-data" method="POST">
                            <?php echo csrf_field(); ?>
                            <div class="form-group row mb-4">
                                <label class="col-md-3 col-form-label">
                                    Blog Title
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="col-md-9">
                                    <input type="text" placeholder="Blog Title" onkeyup="makeSlug(this.value)" id="title" name="title" class="form-control" minlength="10" required>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-md-3 col-form-label">Slug
                                    <span class="text-danger">*</span></label>
                                <div class="col-md-9">
                                    <input type="text" placeholder="Slug" name="slug" id="slug" class="form-control"  required>
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
                                        <?php $__currentLoopData = $blog_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($category->id); ?>">
                                            <?php echo e($category->category_name); ?>

                                        </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>


                            

                            <div class="form-group row mb-4">
                                <label class="col-md-3 col-form-label">Banner Alt
                                    <span class="text-danger">*</span></label>
                                <div class="col-md-9">
                                    <input type="text" placeholder="Banner Alt" name="banner_alt" id="slug" class="form-control" required>
                                </div>
                            </div>

                            
                            <div class="form-group row mb-4">
                                <label class="col-md-3 col-form-label" for="signinSrEmail">
                                    Banner
                                    
                                </label>
                                <div class="col-md-9">
                                    <div class="input-group" data-toggle="aizuploader" data-type="image">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text bg-soft-secondary font-weight-medium">
                                                <input type="file" name="banner" class="selected-files" required>
                                            </div>
                                        </div>
                                        
                                        
                                    </div>
                                    <div class="file-preview box sm">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group row mb-4">
                                <label class="col-md-3 col-form-label">Video URL</label>
                                <div class="col-md-9">
                                    <input type="url" name="video_url" class="form-control" placeholder="https://www.youtube.com/watch?v=..." value="<?php echo e(old('video_url')); ?>">
                                    <small class="text-muted">YouTube ya Vimeo video ka link yahan daalein</small>
                                </div>
                            </div>


                            <div class="form-group row mb-4">
                                <label class="col-md-3 col-form-label">
                                    Short Description
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="col-md-9">
                                    <textarea name="short_description" rows="5" class="form-control"  required=""></textarea>
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-md-3 col-from-label">
                                    Description
                                </label>
                                <div class="col-md-9">
                                   <textarea class="form-control"  id="description" rows="3" name="description"  minlength="160" maxlength="200"></textarea> 
                               
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-md-3 col-form-label">Meta Title</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="meta_title" placeholder="Meta Title">
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
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-md-3 col-form-label">Meta Description</label>
                                <div class="col-md-9">
                                    <textarea id="meta_description" name="meta_description" rows="5" class="form-control"></textarea>
                                    <div id="meta_char_count">0/160 characters</div>
                                    <div id="meta_error_message" style="color: red; display: none;"></div>
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-md-3 col-form-label">
                                    Meta Keywords
                                </label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" id="meta_keywords" name="meta_keywords" placeholder="Meta Keywords">
                                </div>
                            </div>

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

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.includes.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\ITcaredigital_29oct\SendAnywhere_085453\itCareDigital_For_SEO_Chnages_From_Mamta\itCareDigital_For_SEO_Chnages_From_Mamta\resources\views/admin/blog/create.blade.php ENDPATH**/ ?>