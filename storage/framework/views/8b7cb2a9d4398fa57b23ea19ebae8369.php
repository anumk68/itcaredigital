<?php $__env->startSection('content'); ?>

    <div class="page-wrapper">
        <div class="page-content">
            <div class="container">

                <h3>Inquery Listing</h3>

                <?php if(session('success')): ?>
                    <div class="alert alert-success">
                        <?php echo e(session('success')); ?>

                    </div>
                <?php endif; ?>

                <?php if(session('error')): ?>
                    <div class="alert alert-danger">
                        <?php echo e(session('error')); ?>

                    </div>
                <?php endif; ?>
 
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" id="contactTable">
                            <thead>
                                <tr>
                                   
                                    <th>S.No</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Brand name</th>
                                    <th>Model no.</th>
                                    <th>Issue</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>                                    
                                        <td><?php echo e($index + 1); ?></td>
                                        <td><?php echo e($item->name); ?></td>
                                        <td><?php echo e($item->email); ?></td>
                                        <td><?php echo e($item->brand); ?></td>
                                        <td><?php echo e($item->model_number); ?></td>
                                        <td class="text-wrap"><?php echo e(substr($item->issue_description, 0, 32)); ?></td>
                                        <td><?php echo e($item->created_at->format('M d, Y')); ?></td>
                                        <td>
                                            <a href="<?php echo e(route('inquery.show', $item->id)); ?>"
                                                class="btn btn-info btn-sm">View</a>
                                            <form action="<?php echo e(route('inquery.destroy', $item->id)); ?>" method="POST"
                                                class="delete-form" style="display:inline;">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>               
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('heads'); ?>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
    <script>
        $(document).ready(function () {
            // Initialize DataTable
            $('#contactTable').DataTable({
                // Customize DataTable settings if necessary
                "order": [[0, "asc"]], // Order by first column (Serial)
                "pageLength": 10, // Display 10 records per page
            });

            // Attach event delegation to handle clicks on delete buttons
            document.body.addEventListener('submit', function (event) {
                if (event.target.matches('.delete-form')) {
                    event.preventDefault(); // Prevent the form from submitting immediately

                    Swal.fire({
                        title: 'Are you sure?',
                        text: 'You will not be able to recover this record!',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!',
                        cancelButtonText: 'Cancel'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            event.target.submit(); // Submit the form if confirmed
                        }
                    });
                }
            });
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.includes.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\project\DigitalMarketingCommonBackend\resources\views/admin/customer-inquery/list.blade.php ENDPATH**/ ?>