<?php $__env->startSection('title', 'Upload Driver Document'); ?>

<?php $__env->startSection('content'); ?>

	<!-- bootstrap datepicker -->	
    <link rel="stylesheet" href="<?php echo asset('assets/vendor_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css'); ?>">
    
<div class="content">
    <div class="container-fluid">
    
    <div class="row">
        <div class="col-sm-12">
            <div class="box">
                <div class="box-header with-border">
                    <a href="<?php echo e(url()->previous()); ?>">
                        <button class="btn btn-danger btn-sm pull-right" type="submit">
                            <i class="mdi mdi-keyboard-backspace mr-2"></i>
                            <?php echo app('translator')->get('view_pages.back'); ?>
                        </button>
                    </a>
                </div>
    
        <div class="col-sm-12">
            <form  method="post" class="form-horizontal" action="<?php echo e(url('drivers/upload/document',[$driver->id,$needed_document->id])); ?>" enctype="multipart/form-data">
            <?php echo e(csrf_field()); ?>


                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="name"><?php echo app('translator')->get('view_pages.name'); ?></label>
                            <input class="form-control" type="text" id="name" name="name" value="<?php echo e($needed_document->name); ?>" placeholder="<?php echo app('translator')->get('view_pages.document_name'); ?>" readonly>
                            <span class="text-danger"><?php echo e($errors->first('name')); ?></span>
                        </div>
                    </div>

                    <?php if($needed_document->has_identify_number): ?>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="identify_number"><?php echo app('translator')->get('view_pages.identify_number'); ?></label>
                                <input class="form-control" type="text" id="identify_number" name="identify_number" value="<?php echo e(old('identify_number',$driverDoc ? $driverDoc->identify_number : '')); ?>" required="" placeholder="<?php echo app('translator')->get('view_pages.identify_number'); ?>">
                                <span class="text-danger"><?php echo e($errors->first('identify_number')); ?></span>
                            </div>
                        </div>
                    <?php endif; ?>
                

                    <?php if($needed_document->has_expiry_date): ?>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="expiry_date"><?php echo app('translator')->get('view_pages.expiry_date'); ?></label>
                                <input class="form-control datepicker" type="text" id="expiry_date" name="expiry_date" value="<?php echo e(old('expiry_date',$driverDoc ? $driverDoc->expiry_date : '')); ?>" required="" placeholder="<?php echo app('translator')->get('view_pages.enter_expiry_date'); ?>" autocomplete="off">
                                <span class="text-danger"><?php echo e($errors->first('expiry_date')); ?></span>
                            </div>
                        </div>
                    <?php endif; ?>

                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label for="document"><?php echo app('translator')->get('view_pages.document'); ?></label><br>
                        <img id="blah" src="<?php echo e($driverDoc ? $driverDoc->image : ''); ?>" alt=""><br>
                        <input type="file" id="document" onchange="readURL(this)" name="document" style="display:none">
                        <button class="btn btn-primary btn-sm" type="button" onclick="$('#document').click()" id="upload"><?php echo app('translator')->get('view_pages.browse'); ?></button>
                        <button class="btn btn-danger btn-sm" type="button" id="remove_img" style="display: none;"><?php echo app('translator')->get('view_pages.remove'); ?></button><br>
                        <span class="text-danger"><?php echo e($errors->first('document')); ?></span>
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
<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\taxi\resources\views/admin/drivers/documents/upload.blade.php ENDPATH**/ ?>