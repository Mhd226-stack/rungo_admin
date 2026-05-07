<?php $__env->startSection('title', 'Main page'); ?>

<?php $__env->startSection('content'); ?>


<!-- Start Page content -->
<div class="content">
<div class="container-fluid">

<div class="row">
<div class="col-sm-12">
    <div class="box">

        <div class="box-header with-border">
          <a href="<?php echo e(url('vehicle_fare/rental_package/index',$zone_type->id)); ?>">
                <button class="btn btn-danger btn-sm pull-right" type="submit">
                    <i class="mdi mdi-keyboard-backspace mr-2"></i>
                    <?php echo app('translator')->get('view_pages.back'); ?>
                </button>
            </a>
        </div>

<div class="col-sm-12">

<form  method="post" class="form-horizontal" action="<?php echo e(url('vehicle_fare/rental_package/store',$zone_type->id)); ?>" enctype="multipart/form-data">
<?php echo csrf_field(); ?>

    <div class="row">

        <div class="col-sm-6">
            <div class="form-group">
                <label for="type"><?php echo app('translator')->get('view_pages.select_package_type'); ?> <span class="text-danger">*</span></label>
                <select name="type_id" id="type_id" class="form-control select2" required>
                    <option value="" selected disabled><?php echo app('translator')->get('view_pages.select'); ?></option>
                    <?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($type->id); ?>" <?php echo e(old('type') == $type->id ? 'selected' : ''); ?>><?php echo e($type->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <span class="text-danger"><?php echo e($errors->first('type_id')); ?></span>

            </div>
        </div>

         <div class="col-sm-6">
                                <div class="form-group">
                               <label for="base_price"><?php echo app('translator')->get('view_pages.base_price'); ?>&nbsp (<?php echo app('translator')->get('view_pages.kilometer'); ?>) <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" id="base_price" name="base_price" value="<?php echo e(old('base_price')); ?>" required="" placeholder="<?php echo app('translator')->get('view_pages.enter'); ?> <?php echo app('translator')->get('view_pages.base_price'); ?>">
                                <span class="text-danger"><?php echo e($errors->first('base_price')); ?></span>
                            </div>
                        </div>

        <div class="col-sm-6">
            <div class="form-group">
            <label for="distance_price"><?php echo app('translator')->get('view_pages.distance_price'); ?> <span class="text-danger">*</span></label>
            <input class="form-control" type="number" id="distance_price" name="distance_price" value="<?php echo e(old('distance_price_per_km')); ?>" required="" placeholder="<?php echo app('translator')->get('view_pages.enter_distance_price'); ?>">
            <span class="text-danger"><?php echo e($errors->first('distance_price')); ?></span>

        </div>
    </div> 
    <div class="col-sm-6">
            <div class="form-group">
            <label for="time_price"><?php echo app('translator')->get('view_pages.time_price'); ?> <span class="text-danger">*</span></label>
            <input class="form-control" type="number" id="time_price" name="time_price" value="<?php echo e(old('time_price_per_min')); ?>" required="" placeholder="<?php echo app('translator')->get('view_pages.enter_time_price'); ?>">
            <span class="text-danger"><?php echo e($errors->first('time_price')); ?></span>

        </div>
    </div> 
    <div class="col-sm-6">
            <div class="form-group">
            <label for="free_distance"><?php echo app('translator')->get('view_pages.free_distance'); ?> <span class="text-danger">*</span></label>
            <input class="form-control" type="number" id="free_distance" name="free_distance" value="<?php echo e(old('free_distance')); ?>" required="" placeholder="<?php echo app('translator')->get('view_pages.enter_free_distance'); ?>">
            <span class="text-danger"><?php echo e($errors->first('free_distance')); ?></span>

        </div>
    </div>
    <div class="col-sm-6">
                <div class="form-group">
                <label for="free_minute"><?php echo app('translator')->get('view_pages.free_minute'); ?> <span class="text-danger">*</span></label>
                <input class="form-control" type="number" id="free_minute" name="free_minute" value="<?php echo e(old('free_min')); ?>" required="" placeholder="<?php echo app('translator')->get('view_pages.enter_free_minute'); ?>">
                <span class="text-danger"><?php echo e($errors->first('free_minute')); ?></span>

            </div>
    </div>
    <div class="col-sm-6">
                <div class="form-group">
                <label for="cancellation_fee"><?php echo app('translator')->get('view_pages.cancellation_fee'); ?> <span class="text-danger">*</span></label>
                <input class="form-control" type="number" id="cancellation_fee" name="cancellation_fee" value="<?php echo e(old('cancellation_fee')); ?>" required="" placeholder="<?php echo app('translator')->get('view_pages.enter_cancellation_fee'); ?>">
                <span class="text-danger"><?php echo e($errors->first('cancellation_fee')); ?></span>

            </div>
        </div>

    
   

   
   


    <div class="form-group">
        <div class="col-12">
            <button class="btn btn-primary pull-right btn-sm m-5" type="submit">
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

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\taxi\resources\views/admin/zone_type_package/create.blade.php ENDPATH**/ ?>