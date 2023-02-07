

<?php $__env->startSection('title'); ?>
    Videos
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid px-4">
    <div class="card mt-4">
        <div class="card-header">
            <h4 class="">Edit Video</h4>
        </div>
        <div class="card-body">
            <?php if($errors->any()): ?>
                <div class="alert alert-danger">
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class=""><?php echo e($error); ?></div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php endif; ?>
            <form action="<?php echo e(url('admin/videos/'.$video->id)); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <?php echo method_field("PUT"); ?>
            <div class="mb-3">
                <label for="">Playlist</label>
                <select name="playlist_id" id="" class="form-control">
                <?php $__currentLoopData = $playlists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $playlist): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($playlist->id); ?>"><?php echo e($playlist->title); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
             <div class="mb-3">
                <label for="">Title</label>
                <input type="text" name="title" class="form-control" value="<?php echo e($video->title); ?>">
             </div>
             <div class="mb-3">
                <label for="">caption</label>
                <input type="text" name="caption" class="form-control" value="<?php echo e($video->caption); ?>">
             </div>
             <div class="mb-3">
                <label for="">Slug</label>
                <input type="text" name="slug" class="form-control" value="<?php echo e($video->slug); ?>">
             </div>
            <div class="mb-3">
                <label for="">Recent Image</label>
                <img src="<?php echo e(asset('uploads/video/'.$video->image)); ?>" alt="No video Image">
            </div>
            <div class="mb-3">
                <label for="">Image</label>
                <input type="file" name="image" class="form-control">
            </div>
            <div class="mb-3">
                <label for="">Related Tags</label>
                <input type="text" name="related_tags" class="form-control" value="<?php echo e($video->related_tags); ?>">
             </div>
            <h6>Status Mode</h6>
            <div class="row">
                <div class="col-md-3 mb-3">
                    <label for="">Status</label>
                    <input type="checkbox" name="status" <?php echo e($video->status==1?'checked':''); ?>>
                </div>
                <div class="col-md-6">
                    <button type="submit" class="btn btn-primary">Update video</button>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\scout\resources\views/admin/video/edit.blade.php ENDPATH**/ ?>