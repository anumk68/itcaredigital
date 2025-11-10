<?php $__env->startSection('content'); ?>
    <div class="page-wrapper">
        <div class="page-content">
            <div class="container">


                <!-- Display flash messages -->
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

                <div class="page-breadcrumb d-sm-flex align-items-center mb-3">
                    <div class="breadcrumb-title pe-3">Blog</div>
                    <div class="ms-auto">
                        <div class="btn-group" style="margin-top: 20px;">
                            <a href="<?php echo e(route('blog.create')); ?>"><button type="button"
                                    class="btn btn-primary">Create</button></a>
                        </div>
                    </div>
                </div>
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" id="blogTable">
                            <thead>
                                <tr>                                  
                                    <th>Sr No.</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Short Description</th>
                                    <th>Created Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                       
                                        <td><?php echo e($loop->iteration); ?></td>
                                        <td>
                                            <?php echo e($blog->title); ?>

                                        </td>
                                        <td>
                                            <?php if($blog->category != null): ?>
                                                <?php echo e($blog->category->category_name); ?>

                                            <?php else: ?>
                                                --
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <?php
                                                $words = explode(' ', $blog->short_description);
                                                $displayText = implode(' ', array_slice($words, 0, 8));
                                                $isLongText = count($words) > 8;
                                            ?>
                                            <p><?php echo e($displayText); ?><?php echo e($isLongText ? '...' : ''); ?></p>
                                        </td>
                                        <td><?php echo e($blog->created_at->format('Y-m-d')); ?></td>
                                        <td>
                                            <!-- Add action buttons here -->
                                            <a href="<?php echo e(route('blog.edit', $blog->id)); ?>" class="btn btn-info btn-sm">Edit</a>
                                            <form action="<?php echo e(route('blog.destroy', $blog->id)); ?>" method="POST"
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
    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>

    <script>
        $(document).ready(function () {
            // Initialize DataTable
            $('#blogTable').DataTable({
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
                            event.target.submit(); 
                        }
                    });
                }
            });
        });

        function confirmDelete(button) {
            // Show confirmation dialog
            const confirmation = confirm("Are you sure you want to delete this blog?");

            if (confirmation) {
                // If confirmed, submit the form
                button.closest('form').submit();
            }
        }
    </script>

    


<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.includes.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\project\DigitalMarketingCommonBackend\resources\views/admin/blog/list.blade.php ENDPATH**/ ?>