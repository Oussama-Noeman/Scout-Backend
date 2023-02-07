

<?php $__env->startSection('title'); ?>
    Books
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid px-4">
    <div class="card mt-4">
        <div class="card-header">
            <h4>View Books <a href="<?php echo e(url('admin/books/create')); ?>" class="btn btn-primary btn-sm float-end">Add a Book</a></h4>
        </div>
        <div class="card-body">
            <?php if(session('message')): ?>
                <div class="alert alert-success"><?php echo e(session('message')); ?></div>
            <?php endif; ?>
            <table id="myDataTable" class="table table-bordered">
                <thead>
                    <th>ID</th>
                    <th>Book Title</th>
                    <th>Caption</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($book->id); ?></td>
                        <td><?php echo e($book->title); ?></td>
                        <td><?php echo e($book->caption); ?></td>
                        <td><img src="<?php echo e(asset('uploads/book/'.$book->image)); ?>" alt="book Image" width="50px" height="50px"></td>
                        <td><?php echo e($book->status=='0'?'Hidden':'Shown'); ?></td>
                        <td>
                            <a href="<?php echo e(url('admin/books/'.$book->id.'/edit')); ?>" class="btn btn-success">Edit</a>
                        </td>
                        <td>
                            <form action="<?php echo e(url('admin/books/'.$book->id)); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-danger">Delete</button>
                                </form> 
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                   
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\scout\resources\views/admin/book/index.blade.php ENDPATH**/ ?>