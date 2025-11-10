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
                            <li class="breadcrumb-item active" aria-current="page">Blog Category</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--end breadcrumb-->

            <h6 class="mb-0 text-uppercase">Blog Category</h6>
            <hr />

            <div class="card">
                <div class="card-header py-3">
                    <h6 class="mb-0">Add Product Category</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-lg-4 d-flex">
                            <div class="card border shadow-none w-100">
                                <div class="card-body">
                                    <form action="<?php echo e(route('blog-category.store')); ?>" method="POST" class="row g-3">
                                        <?php echo csrf_field(); ?>
                                        <div class="col-12">
                                            <label class="form-label">Name</label>
                                            <input type="text" class="form-control" name="category_name"
                                                placeholder="Category name" required>
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label">Slug</label>
                                            <input type="text" class="form-control" name="slug"
                                                placeholder="Slug name">
                                        </div>


                                        <div class="col-12">
                                            <div class="d-grid">
                                                <button class="btn btn-primary">Add Category</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-8 d-flex">
                            <div class="card border shadow-none w-100">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table align-middle">
                                            <thead class="table-light">
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Name</th>
                                                    <th>Slug</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $categorie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td><?php echo e($key + 1); ?></td>
                                                        <td><?php echo e($categorie->category_name); ?></td>
                                                        <td><?php echo e($categorie->slug); ?></td>
                                                        <td>
                                                            <div class="d-flex align-items-center gap-3 fs-6">
                                                                <a href="<?php echo e(route('blog-category.edit', $categorie->id)); ?>"
                                                                    class="text-warning" data-bs-toggle="tooltip"
                                                                    data-bs-placement="bottom" title=""
                                                                    data-bs-original-title="Edit info" aria-label="Edit"><i
                                                                        class="bi bi-pencil-fill"></i>Edit</a>
                                                                <form
                                                                    action="<?php echo e(route('blog-category.destroy', $categorie->id)); ?>"
                                                                    method="POST" class="delete-form"
                                                                    style="display:inline;">
                                                                    <?php echo csrf_field(); ?>
                                                                    <?php echo method_field('DELETE'); ?>
                                                                    <button type="submit"
                                                                        class="text-danger border-0 bg-transparent"
                                                                        data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                                        title="Delete">
                                                                        <i class="bi bi-trash-fill"></i>Delete
                                                                    </button>
                                                                </form>
                                                                
                                                            </div>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div><!--end row-->
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
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.delete-form').forEach(function(form) {
                form.addEventListener('submit', function(e) {
                    e.preventDefault(); // Prevent the form from submitting immediately

                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit(); // Submit the form if confirmed
                        }
                    });
                });
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.includes.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\project\DigitalMarketingCommonBackend\resources\views/admin/blog/category/index.blade.php ENDPATH**/ ?>