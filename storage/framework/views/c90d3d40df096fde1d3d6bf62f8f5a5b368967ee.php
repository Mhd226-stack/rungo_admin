<?php $__env->startSection('title', 'Main page'); ?>

<?php $__env->startSection('content'); ?>


    <!-- Start Page content -->
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-sm-12">
                    <div class="box">

                        <div class="box-header with-border">
                            <a href="<?php echo e(url('faq')); ?>">
                                <button class="btn btn-danger btn-sm pull-right" type="submit">
                                    <i class="mdi mdi-keyboard-backspace mr-2"></i>
                                    <?php echo app('translator')->get('view_pages.back'); ?>
                                </button>
                            </a>
                        </div>

                        <div class="col-sm-12">

                            <form method="post" class="form-horizontal" action="<?php echo e(url('faq/store')); ?>">
                                <?php echo csrf_field(); ?>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="user_type"><?php echo app('translator')->get('view_pages.user_type'); ?> <span class="text-danger">*</span></label>
                                            <select name="user_type" id="user_type" class="form-control" required>
                                                <option value="" selected disabled><?php echo app('translator')->get('view_pages.select'); ?></option>
                                                <option value="user" <?php echo e(old('user_type') == 'user' ? 'selected' : ''); ?> ><?php echo app('translator')->get('view_pages.user'); ?></option>
                                                <option value="driver" <?php echo e(old('user_type') == 'driver' ? 'selected' : ''); ?> ><?php echo app('translator')->get('view_pages.driver'); ?></option>
                                                <option value="owner" <?php echo e(old('user_type') == 'owner' ? 'selected' : ''); ?> ><?php echo app('translator')->get('view_pages.owner'); ?></option>
                                                <option value="all" <?php echo e(old('user_type') == 'all' ? 'selected' : ''); ?> ><?php echo app('translator')->get('view_pages.all'); ?></option>
                                            </select>
                                            <span class="text-danger"><?php echo e($errors->first('user_type')); ?></span>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="question"><?php echo app('translator')->get('view_pages.question'); ?> <span class="text-danger">*</span></label>
                                            <input class="form-control" type="text" id="question" name="question"
                                                value="<?php echo e(old('question')); ?>" required
                                                placeholder="<?php echo app('translator')->get('view_pages.enter'); ?> <?php echo app('translator')->get('view_pages.question'); ?>">
                                            <span class="text-danger"><?php echo e($errors->first('question')); ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="answer"><?php echo app('translator')->get('view_pages.answer'); ?> <span class="text-danger">*</span></label>
                                            <input class="form-control" type="text" id="answer" name="answer"
                                                value="<?php echo e(old('answer')); ?>" required=""
                                                placeholder="<?php echo app('translator')->get('view_pages.enter'); ?> <?php echo app('translator')->get('view_pages.answer'); ?>">
                                            <span class="text-danger"><?php echo e($errors->first('answer')); ?></span>

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

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\taxi\resources\views/admin/faq/create.blade.php ENDPATH**/ ?>