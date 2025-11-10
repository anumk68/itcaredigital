<?php $__env->startSection('content'); ?>
    <div class="page-wrapper">
        <div class="page-content">
            <div class="container">
                <h4>Inquery Details</h1>
                <div class="card">
                    <div class="card-body">
                        <dl class="row">
                            <dt class="col-sm-3">Name:</dt>
                            <dd class="col-sm-9"><?php echo e($data->name); ?></dd>

                            <dt class="col-sm-3">Email:</dt>
                            <dd class="col-sm-9"><?php echo e($data->email); ?></dd>

                            <dt class="col-sm-3">Contact:</dt>
                            <dd class="col-sm-9"><?php echo e($data->country_code .  $data->phone_number); ?></dd>

                            <dt class="col-sm-3">Brand:</dt>
                            <dd class="col-sm-9"><?php echo e($data->brand); ?></dd>

                            <dt class="col-sm-3">Brand Model no:</dt>
                            <dd class="col-sm-9"><?php echo e($data->model_number); ?></dd>

                            <dt class="col-sm-3">Issue:</dt>
                            <dd class="col-sm-9"><?php echo e($data->issue_description); ?></dd>

                            <dt class="col-sm-3">Date:</dt>
                            <dd class="col-sm-9"><?php echo e($data->created_at->format('M,d Y')); ?></dd>
                        </dl>
                        <a href="<?php echo e(route('inquiry.list')); ?>" class="btn btn-primary">Back to List</a>


                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.includes.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/prinhhby/itcaredigital.com/resources/views/admin/customer-inquery/show.blade.php ENDPATH**/ ?>