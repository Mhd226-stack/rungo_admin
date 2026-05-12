<?php $__env->startSection('title', 'Main page'); ?>

<?php $__env->startSection('content'); ?>


    <!-- Start Page content -->
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-sm-12">
                    <div class="box">

                        <div class="box-header with-border">
                            <a href="<?php echo e(url('package_type')); ?>">
                                <button class="btn btn-danger btn-sm pull-right" type="submit">
                                    <i class="mdi mdi-keyboard-backspace mr-2"></i>
                                    <?php echo app('translator')->get('view_pages.back'); ?>
                                </button>
                            </a>
                        </div>

                        <div class="col-sm-12">

                            <form method="post" class="form-horizontal" action="<?php echo e(url('package_type/store')); ?>">
                                <?php echo csrf_field(); ?>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="name"><?php echo app('translator')->get('view_pages.name'); ?> <span class="text-danger">*</span></label>
                                            <input class="form-control" type="text" id="name" name="name"
                                                value="<?php echo e(old('name')); ?>" required
                                                placeholder="<?php echo app('translator')->get('view_pages.enter'); ?> <?php echo app('translator')->get('view_pages.name'); ?>">
                                            <span class="text-danger"><?php echo e($errors->first('name')); ?></span>
                                        </div>
                                    </div>

                                 <div class="col-6">
                                <div class="form-group m-b-25">
                                <label for="short_description"><?php echo app('translator')->get('view_pages.short_description'); ?> <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" id="name" name="short_description" value="<?php echo e(old('short_description')); ?>" required="" placeholder="<?php echo app('translator')->get('view_pages.enter_short_description'); ?>">
                                <span class="text-danger"><?php echo e($errors->first('short_description')); ?></span>

                                </div>
                                </div>

                                <div class="col-6">
                                <div class="form-group m-b-25">
                                <label for="description"><?php echo app('translator')->get('view_pages.description'); ?> <span class="text-danger">*</span></label>
                                <textarea name="description" id="description" class="form-control" placeholder="<?php echo app('translator')->get('view_pages.enter_description'); ?>"></textarea>

                                <span class="text-danger"><?php echo e($errors->first('description')); ?></span>

                                </div>
                                </div> 


                                </div>


                                <div class="form-group">
                                    <div class="col-12">
                                        <button class="btn btn-primary btn-sm pull-right m-5" type="submit">
                                            <?php echo app('translator')->get('view_pages.save'); ?>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- container -->
</div>
    <!-- content -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\taxi\resources\views/admin/master/package_type/create.blade.php ENDPATH**/ ?>