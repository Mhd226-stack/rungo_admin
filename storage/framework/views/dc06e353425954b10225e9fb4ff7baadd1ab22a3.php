<?php $__env->startSection('title', 'Main page'); ?>

<?php $__env->startSection('content'); ?>


<!-- bootstrap datepicker -->
<link rel="stylesheet" href="<?php echo asset('assets/vendor_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css'); ?>">

    <!-- Start Page content -->
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-sm-12">
                    <div class="box">

                        <div class="box-header with-border">
                            <a href="<?php echo e(url('promo')); ?>">
                                <button class="btn btn-danger btn-sm pull-right" type="submit">
                                    <i class="mdi mdi-keyboard-backspace mr-2"></i>
                                    <?php echo app('translator')->get('view_pages.back'); ?>
                                </button>
                            </a>
                        </div>

                        <div class="col-sm-12">

                            <form method="post" class="form-horizontal" action="<?php echo e(url('promo/store')); ?>">
                                <?php echo csrf_field(); ?>

                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="admin_id"><?php echo app('translator')->get('view_pages.select_area'); ?>
                                                <span class="text-danger">*</span>
                                            </label>
                                            <select name="service_location_id" id="service_location_id" class="form-control"
                                                required>
                                                <option value=""><?php echo app('translator')->get('view_pages.select_area'); ?></option>
                                                <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($city->id); ?>" <?php echo e(old('service_location_id') == $city->id ? 'selected' : ''); ?> ><?php echo e($city->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <span class="text-danger"><?php echo e($errors->first('service_location_id')); ?></span>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="code"><?php echo app('translator')->get('view_pages.code'); ?> <span class="text-danger">*</span></label>
                                            <input class="form-control" type="text" id="code" name="code"
                                                value="<?php echo e(old('code')); ?>" required
                                                placeholder="<?php echo app('translator')->get('view_pages.enter'); ?> <?php echo app('translator')->get('view_pages.code'); ?>">
                                            <span class="text-danger"><?php echo e($errors->first('code')); ?></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="minimum_trip_amount"><?php echo app('translator')->get('view_pages.minimum_trip_amount'); ?> <span class="text-danger">*</span></label>
                                            <input class="form-control" type="text" id="minimum_trip_amount" name="minimum_trip_amount"
                                                value="<?php echo e(old('minimum_trip_amount')); ?>" required
                                                placeholder="<?php echo app('translator')->get('view_pages.enter'); ?> <?php echo app('translator')->get('view_pages.minimum_trip_amount'); ?>">
                                            <span class="text-danger"><?php echo e($errors->first('minimum_trip_amount')); ?></span>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="maximum_discount_amount"><?php echo app('translator')->get('view_pages.maximum_discount_amount'); ?> </label>
                                            <input class="form-control" type="text" id="maximum_discount_amount" name="maximum_discount_amount"
                                                value="<?php echo e(old('maximum_discount_amount')); ?>"
                                                placeholder="<?php echo app('translator')->get('view_pages.enter'); ?> <?php echo app('translator')->get('view_pages.maximum_discount_amount'); ?>">
                                            <span class="text-danger"><?php echo e($errors->first('maximum_discount_amount')); ?></span>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="discount_percent"><?php echo app('translator')->get('view_pages.discount_percent'); ?> <span class="text-danger">*</span></label>
                                            <input class="form-control" type="text" id="discount_percent" name="discount_percent"
                                                value="<?php echo e(old('discount_percent')); ?>" required=""
                                                placeholder="<?php echo app('translator')->get('view_pages.enter'); ?> <?php echo app('translator')->get('view_pages.discount_percent'); ?>">
                                            <span class="text-danger"><?php echo e($errors->first('discount_percent')); ?></span>
                                        </div>
                                    </div>
                                </div>

                               <!--  <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="total_uses"><?php echo app('translator')->get('view_pages.total_uses'); ?> <span class="text-danger">*</span></label>
                                            <input class="form-control" type="text" id="total_uses" name="total_uses"
                                                value="<?php echo e(old('total_uses')); ?>" required
                                                placeholder="<?php echo app('translator')->get('view_pages.enter'); ?> <?php echo app('translator')->get('view_pages.total_uses'); ?>">
                                            <span class="text-danger"><?php echo e($errors->first('total_uses')); ?></span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="uses_per_user"><?php echo app('translator')->get('view_pages.uses_per_user'); ?> <span class="text-danger">*</span></label>
                                            <input class="form-control" type="text" id="uses_per_user" name="uses_per_user"
                                                value="<?php echo e(old('uses_per_user')); ?>" required=""
                                                placeholder="<?php echo app('translator')->get('view_pages.enter'); ?> <?php echo app('translator')->get('view_pages.uses_per_user'); ?>">
                                            <span class="text-danger"><?php echo e($errors->first('uses_per_user')); ?></span>
                                        </div>
                                    </div>
                                </div> -->

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="from"><?php echo app('translator')->get('view_pages.from'); ?> <span class="text-danger">*</span></label>
                                            <input class="form-control datepicker" type="text" id="from" name="from"
                                                value="<?php echo e(old('from')); ?>" required
                                                placeholder="<?php echo app('translator')->get('view_pages.enter'); ?> <?php echo app('translator')->get('view_pages.from'); ?>"  autocomplete="off">
                                            <span class="text-danger"><?php echo e($errors->first('from')); ?></span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="to"><?php echo app('translator')->get('view_pages.to'); ?> <span class="text-danger">*</span></label>
                                            <input class="form-control datepicker" type="text" id="to" name="to"
                                                value="<?php echo e(old('to')); ?>" required=""
                                                placeholder="<?php echo app('translator')->get('view_pages.enter'); ?> <?php echo app('translator')->get('view_pages.to'); ?>"  autocomplete="off">
                                            <span class="text-danger"><?php echo e($errors->first('to')); ?></span>
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


<script src="<?php echo e(asset('assets/vendor_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')); ?>"></script>

<script>
    //Date picker
    $('.datepicker').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd',
      startDate: 'today'
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\taxi\resources\views/admin/promo/create.blade.php ENDPATH**/ ?>