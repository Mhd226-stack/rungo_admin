<?php $__env->startSection('title', 'Main page'); ?>

<?php $__env->startSection('content'); ?>


<!-- Start Page content -->
<div class="content">
<div class="container-fluid">

<div class="row">
<div class="col-sm-12">
    <div class="box">

        <div class="box-header with-border">
            <a href="<?php echo e(url('service_location')); ?>">
                <button class="btn btn-danger btn-sm pull-right" type="submit">
                    <i class="mdi mdi-keyboard-backspace mr-2"></i>
                    <?php echo app('translator')->get('view_pages.back'); ?>
                </button>
            </a>
        </div>

<div class="col-sm-12">

<form  method="post" class="form-horizontal" action="<?php echo e(url('service_location/store')); ?>" enctype="multipart/form-data">
<?php echo csrf_field(); ?>

    <div class="row">

        <div class="col-sm-6">
            <div class="form-group">
                <label for="country"><?php echo app('translator')->get('view_pages.select_country'); ?> <span class="text-danger">*</span></label>
                <select name="country" id="country" class="form-control select2" required>
                    <option value="" selected disabled><?php echo app('translator')->get('view_pages.select'); ?></option>
                    <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($country->id); ?>" <?php echo e(old('country') == $country->id ? 'selected' : ''); ?>><?php echo e($country->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <span class="text-danger"><?php echo e($errors->first('country')); ?></span>

            </div>
        </div>

        <div class="col-sm-6">
            <div class="form-group">
            <label for="name"><?php echo app('translator')->get('view_pages.name'); ?> <span class="text-danger">*</span></label>
            <input class="form-control" type="text" id="name" name="name" value="<?php echo e(old('name')); ?>" required="" placeholder="<?php echo app('translator')->get('view_pages.enter_name'); ?>">
            <span class="text-danger"><?php echo e($errors->first('name')); ?></span>

        </div>
    </div>

    <input type="hidden" name="currency_name" id="currency_name">

    <div class="col-sm-6">
            <div class="form-group">
            <label for="currency_code"><?php echo app('translator')->get('view_pages.currency_code'); ?> <span class="text-danger">*</span></label>
            <input class="form-control" type="text" id="currency_code" name="currency_code" value="<?php echo e(old('currency_code')); ?>" required="" placeholder="<?php echo app('translator')->get('view_pages.enter'); ?> <?php echo app('translator')->get('view_pages.currency_code'); ?>" list="currency_code_list" autocomplete="off">
            <datalist id="currency_code_list">
                
            </datalist>
            <span class="text-danger"><?php echo e($errors->first('currency_code')); ?></span>

        </div>
    </div>

    <div class="col-sm-6">
            <div class="form-group">
            <label for="currency_symbol"><?php echo app('translator')->get('view_pages.currency_symbol'); ?> <span class="text-danger">*</span></label>
            <input class="form-control" type="text" id="currency_symbol" name="currency_symbol" value="<?php echo e(old('currency_symbol')); ?>" required="" placeholder="<?php echo app('translator')->get('view_pages.enter_currency_symbol'); ?>" list="currency_symbol_list" autocomplete="off">
            <datalist id="currency_symbol_list">
                
            </datalist>
            <span class="text-danger"><?php echo e($errors->first('currency_symbol')); ?></span>

        </div>
    </div>

    <div class="col-sm-6">
            <div class="form-group">
            <label for="timezone"><?php echo app('translator')->get('view_pages.timezone'); ?> <span class="text-danger">*</span></label>
            <select name="timezone" id="timezone" class="form-control select2" required>
                <option value="" selected disabled><?php echo app('translator')->get('view_pages.select'); ?></option>
                <?php $__currentLoopData = $timezones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $timezone): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($timezone->timezone); ?>" <?php echo e(old('timezone') == $timezone->timezone ? 'selected' : ''); ?>><?php echo e($timezone->timezone); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <span class="text-danger"><?php echo e($errors->first('timezone')); ?></span>

        </div>
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

<script type="text/javascript"> 
$(document).on('change','#country',function(e){
    var id = $(this).val();

    $.ajax({
        url: '<?php echo e(route("getCurrencyByCountry")); ?>',
        data: {'id':id},
        method: 'get',
        success: function(res){
            $('#currency_name').val(res.currency_name);
            $('#currency_code').val(res.currency_code);
            $('#currency_symbol').val(res.currency_symbol);
            $('#currency_code_list').html('<option value="'+ res.currency_code +'">'+res.currency_code+'</option>');
            $('#currency_symbol_list').html('<option value="'+ res.currency_symbol +'">'+res.currency_symbol+'</option>');
        }
    });
});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\taxi\resources\views/admin/servicelocation/create.blade.php ENDPATH**/ ?>