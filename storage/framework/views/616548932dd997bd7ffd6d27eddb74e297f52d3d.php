<?php $__env->startSection('title', 'Main page'); ?>

<?php $__env->startSection('content'); ?>


    <!-- Start Page content -->
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-sm-12">
                    <div class="box">

                        <div class="box-header with-border">
                            <a href="<?php echo e(url('banner_image')); ?>">
                                <button class="btn btn-danger btn-sm pull-right" type="submit">
                                    <i class="mdi mdi-keyboard-backspace mr-2"></i>
                                    <?php echo app('translator')->get('view_pages.back'); ?>
                                </button>
                            </a>
                        </div>

                        <div class="col-sm-12">

                            <form method="post" class="form-horizontal" action="<?php echo e(url('banner_image/store')); ?>" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="image"><?php echo app('translator')->get('view_pages.banner_image'); ?></label><br>
                                <img id="blah" src="#" alt=""><br>
                                <input type="file" id="image" onchange="readURL(this)" name="image" style="display:none">
                                <button class="btn btn-primary btn-sm" type="button" onclick="$('#image').click()" id="upload"><?php echo app('translator')->get('view_pages.browse'); ?></button>
                                <button class="btn btn-danger btn-sm" type="button" id="remove_img" style="display: none;"><?php echo app('translator')->get('view_pages.remove'); ?></button><br>
                                <span class="text-danger"><?php echo e($errors->first('image')); ?></span>
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

        <script src="<?php echo e(asset('assets/vendor_components/jquery/dist/jquery.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\taxi\resources\views/admin/master/banner_image/create.blade.php ENDPATH**/ ?>