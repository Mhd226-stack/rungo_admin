<?php $__env->startSection('title', 'Main page'); ?>

<?php $__env->startSection('content'); ?>


    <!-- Start Page content -->
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-sm-12">
                    <div class="box">

                        <div class="box-header with-border">
                            <a href="<?php echo e(url('country')); ?>">
                                <button class="btn btn-danger btn-sm pull-right" type="submit">
                                    <i class="mdi mdi-keyboard-backspace mr-2"></i>
                                    <?php echo app('translator')->get('view_pages.back'); ?>
                                </button>
                            </a>
                        </div>

                        <div class="col-sm-12">

                            <form method="post" enctype="multipart/form-data" class="form-horizontal" action="<?php echo e(url('country/update',$item->id)); ?>">
                                <?php echo csrf_field(); ?>

                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="name"><?php echo app('translator')->get('view_pages.name'); ?> <span class="text-danger">*</span></label>
                                            <input class="form-control" type="text" id="name" name="name"
                                                value="<?php echo e(old('name',$item->name)); ?>" required
                                                placeholder="<?php echo app('translator')->get('view_pages.enter'); ?> <?php echo app('translator')->get('view_pages.name'); ?>">
                                            <span class="text-danger"><?php echo e($errors->first('name')); ?></span>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="name"><?php echo app('translator')->get('view_pages.dial_min_length'); ?> <span class="text-danger">*</span></label>
                                            <input class="form-control" type="text" id="dial_min_length" name="dial_min_length"
                                                value="<?php echo e(old('dial_min_length',$item->dial_min_length)); ?>" required
                                                placeholder="<?php echo app('translator')->get('view_pages.enter'); ?> <?php echo app('translator')->get('view_pages.dial_min_length'); ?>">
                                            <span class="text-danger"><?php echo e($errors->first('dial_min_length')); ?></span>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="name"><?php echo app('translator')->get('view_pages.dial_max_length'); ?> <span class="text-danger">*</span></label>
                                            <input class="form-control" type="text" id="dial_max_length" name="dial_max_length"
                                                value="<?php echo e(old('dial_max_length',$item->dial_max_length)); ?>" required
                                                placeholder="<?php echo app('translator')->get('view_pages.enter'); ?> <?php echo app('translator')->get('view_pages.dial_max_length'); ?>">
                                            <span class="text-danger"><?php echo e($errors->first('dial_max_length')); ?></span>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="name"><?php echo app('translator')->get('view_pages.currency_code'); ?> <span class="text-danger">*</span></label>
                                            <input class="form-control" type="text" id="currency_code" name="currency_code"
                                                value="<?php echo e(old('currency_code',$item->currency_code)); ?>" required
                                                placeholder="<?php echo app('translator')->get('view_pages.enter'); ?> <?php echo app('translator')->get('view_pages.currency_code'); ?>">
                                            <span class="text-danger"><?php echo e($errors->first('currency_code')); ?></span>
                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="name"><?php echo app('translator')->get('view_pages.currency_symbol'); ?> <span class="text-danger">*</span></label>
                                            <input class="form-control" type="text" id="currency_symbol" name="currency_symbol"
                                                value="<?php echo e(old('currency_symbol',$item->currency_symbol)); ?>" required
                                                placeholder="<?php echo app('translator')->get('view_pages.enter'); ?> <?php echo app('translator')->get('view_pages.currency_symbol'); ?>">
                                            <span class="text-danger"><?php echo e($errors->first('currency_symbol')); ?></span>
                                        </div>
                                    </div>

                            <div class="form-group">
                                <div class="col-6">
                                    <label for="flag"><?php echo app('translator')->get('view_pages.flag'); ?></label><br>
                                    <img id="blah" src="<?php echo e(asset($item->flag)); ?>" alt=""><br>
                                    <input value="<?php echo e(old('flag',$item->flag)); ?>" type="file" id="flag" onchange="readURL(this)" name="flag" style="display:none">
                                    <span data-toggle="tooltip" data-placement="right" title="upload image-size:30x20 px">
                                        <button class="btn btn-primary btn-sm" type="button" onclick="$('#flag').click()" id="upload" ><?php echo app('translator')->get('view_pages.browse'); ?></button></span>
                                    <button class="btn btn-danger btn-sm" type="button" id="remove_img" style="display: none;"><?php echo app('translator')->get('view_pages.remove'); ?></button><br>
                                        <span class="text-danger"><?php echo e($errors->first('flag')); ?></span>
                                </div>
                            </div>

                                                            </div>


                                <div class="form-group">
                                    <div class="col-12">
                                        <button class="btn btn-primary btn-sm pull-right m-5" type="submit">
                                            <?php echo app('translator')->get('view_pages.update'); ?>
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

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\taxi\resources\views/admin/master/country/update.blade.php ENDPATH**/ ?>