

<?php $__env->startSection('title'); ?>
    playlists
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid px-4">
    <div class="card mt-4">
        <div class="card-header">
            <h4 class="">Edit Playlist</h4>
        </div>
        <div class="card-body">
            <?php if($errors->any()): ?>
                <div class="alert alert-danger">
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class=""><?php echo e($error); ?></div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php endif; ?>
            <form action="<?php echo e(url('admin/playlists/'.$playlist->id)); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <?php echo method_field("PUT"); ?>
             <div class="mb-3">
                <label for="">Playlist Title</label>
                <input type="text" name="title" class="form-control" value="<?php echo e($playlist->title); ?>">
             </div>
             <div class="mb-3">
                <label for="">Slug</label>
                <input type="text" name="slug" class="form-control" value="<?php echo e($playlist->slug); ?>">
             </div>
            <div class="mb-3">
                <label for="">Recent Image</label>
                <img src="<?php echo e(asset('uploads/playlist/'.$playlist->image)); ?>" alt="No playlist Image">
            </div>
            <div class="mb-3">
                <label for="">Image</label>
                <input type="file" name="image" class="form-control">
            </div>
            <h6>Status Mode</h6>
            <div class="row">
                <div class="col-md-3 mb-3">
                    <label for="">Status</label>
                    <input type="checkbox" name="status" <?php echo e($playlist->status==1?'checked':''); ?>>
                </div>
                <div class="col-md-6">
                    <button type="submit" class="btn btn-primary">Update Playlist</button>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\scout\resources\views/admin/playlist/edit.blade.php ENDPATH**/ ?>