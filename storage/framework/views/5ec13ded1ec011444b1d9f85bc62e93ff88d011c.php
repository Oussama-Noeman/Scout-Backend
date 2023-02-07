

<?php $__env->startSection('title'); ?>
    Books
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid px-4">
    <div class="card mt-4">
        <div class="card-header">
            <h4 class="">Edit Book</h4>
        </div>
        <div class="card-body">
            <?php if($errors->any()): ?>
                <div class="alert alert-danger">
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class=""><?php echo e($error); ?></div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php endif; ?>
            <form action="<?php echo e(url('admin/books/'.$book->id)); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <?php echo method_field("PUT"); ?>
             <div class="mb-3">
                <label for="">Book Title</label>
                <input type="text" name="title" class="form-control" value="<?php echo e($book->title); ?>">
             </div>
             <div class="mb-3">
                <label for="">Caption</label>
                <input type="text" name="caption" class="form-control" value="<?php echo e($book->caption); ?>">
             </div>
            <div class="mb-3">
                <label for="">Recent Image</label>
                <img src="<?php echo e(asset('uploads/book/'.$book->image)); ?>" alt="No book Image">
            </div>
            <div class="mb-3">
                <label for="">Image</label>
                <input type="file" name="image" class="form-control">
            </div>
            <div class="mb-3">
                <label for="">Related Tags</label>
                <input type="text" name="related_tags" class="form-control" value="<?php echo e($book->related_tags); ?>">
             </div>
            <h6>Status Mode</h6>
            <div class="row">
                <div class="col-md-3 mb-3">
                    <label for="">Status</label>
                    <input type="checkbox" name="status" <?php echo e($book->status==1?'checked':''); ?>>
                </div>
                <div class="col-md-6">
                    <button type="submit" class="btn btn-primary">Update book</button>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\scout\resources\views/admin/book/edit.blade.php ENDPATH**/ ?>