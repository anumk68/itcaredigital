<?php $__env->startSection('content'); ?>

<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Settings</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href=""><i class="bx bx-home-alt"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Setting</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                </div>
            </div>
        </div>
        <!--end breadcrumb-->

        <div class="row">
            <div class="col-xl-6 mx-auto">
                
                <div class="card">
                    <div class="card-body p-4">
                        <h5 class="mb-4">Edit Setting</h5>
                        
                        <form action="<?php echo e(route('setting.update')); ?>" method="post" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
    <!-- Include the hidden id field -->
    <input type="hidden" name="id" value="<?php echo e($setting->id); ?>">

    <input type="hidden" name="type" value="<?php echo e($setting->type); ?>">

    <div class="col-md-12 mt-2">
        <div>
            <label class="form-label" for="value">Value To Display:</label>
            <input class="form-control" value="<?php echo e($setting->value); ?>" type="text" name="value" id="value" required>
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

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.includes.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\project\DigitalMarketingCommonBackend\resources\views/admin/settings/edit.blade.php ENDPATH**/ ?>