<?php $__env->startSection('title', 'Main page'); ?>

<?php $__env->startSection('content'); ?>


    <!-- Start Page content -->
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-sm-12">
                    <div class="box">

                        <div class="box-header with-border">
                            <a href="<?php echo e(url('needed_doc')); ?>">
                                <button class="btn btn-danger btn-sm pull-right" type="submit">
                                    <i class="mdi mdi-keyboard-backspace mr-2"></i>
                                    <?php echo app('translator')->get('view_pages.back'); ?>
                                </button>
                            </a>
                        </div>

                        <div class="col-sm-12">

                            <form method="post" class="form-horizontal" action="<?php echo e(url('needed_doc/update',$item->id)); ?>">
                                <?php echo csrf_field(); ?>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="name"><?php echo app('translator')->get('view_pages.name'); ?> <span class="text-danger">*</span></label>
                                            <input class="form-control" type="text" id="name" name="name"
                                                value="<?php echo e(old('name',$item->name)); ?>" required=""
                                                placeholder="<?php echo app('translator')->get('view_pages.enter'); ?> <?php echo app('translator')->get('view_pages.name'); ?>">
                                            <span class="text-danger"><?php echo e($errors->first('name')); ?></span>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for=""><?php echo app('translator')->get('view_pages.account_type'); ?> <span class="text-danger">*</span></label>
                                            <select name="account_type" id="account_type" class="form-control" required>
                                                <option value="" selected disabled><?php echo app('translator')->get('view_pages.select'); ?></option>
                                                <option value="individual" <?php echo e(old('account_type',$item->account_type) == 'individual' ? 'selected' : ''); ?>><?php echo app('translator')->get('view_pages.individual'); ?></option>

                                                <option value="fleet_driver" <?php echo e(old('account_type',$item->account_type) == 'fleet_driver' ? 'selected' : ''); ?>><?php echo app('translator')->get('view_pages.fleet_drivers'); ?></option>
                                               
                                                <option value="both" <?php echo e(old('account_type',$item->account_type) == 'both' ? 'selected' : ''); ?>><?php echo app('translator')->get('view_pages.both'); ?></option>
                                            </select>
                                            <span class="text-danger"><?php echo e($errors->first('account_type')); ?></span>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for=""><?php echo app('translator')->get('view_pages.has_expiry_date'); ?> <span class="text-danger">*</span></label>
                                            <select name="has_expiry_date" id="has_expiry_date" class="form-control" required>
                                                <option value="" selected disabled><?php echo app('translator')->get('view_pages.select'); ?></option>
                                                <option value="1" <?php echo e(old('has_expiry_date',$item->has_expiry_date) == '1' ? 'selected' : ''); ?>><?php echo app('translator')->get('view_pages.yes'); ?></option>
                                                <option value="0" <?php echo e(old('has_expiry_date',$item->has_expiry_date) == '0' ? 'selected' : ''); ?>><?php echo app('translator')->get('view_pages.no'); ?></option>
                                            </select>
                                            <span class="text-danger"><?php echo e($errors->first('has_expiry_date')); ?></span>
                                        </div>
                                    </div>
                                    
                                    <!-- <div class="col-6">
                                        <div class="form-group">
                                            <label for=""><?php echo app('translator')->get('view_pages.doc_type'); ?> <span class="text-danger">*</span></label>
                                            <select name="doc_type" id="doc_type" class="form-control" required>
                                                <option value="" selected disabled><?php echo app('translator')->get('view_pages.select'); ?></option>
                                                <?php $__currentLoopData = $format; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $format): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($format); ?>" <?php echo e(old('doc_type',$item->doc_type) == $format ? 'selected' : ''); ?>><?php echo e(ucfirst($format)); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <span class="text-danger"><?php echo e($errors->first('doc_type')); ?></span>
                                        </div>
                                    </div> -->

                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for=""><?php echo app('translator')->get('view_pages.has_identify_number'); ?> <span class="text-danger">*</span></label>
                                            <select name="has_identify_number" id="has_identify_number" class="form-control" required>
                                                <option value="" selected disabled><?php echo app('translator')->get('view_pages.select'); ?></option>
                                                <option value="1" <?php echo e(old('has_identify_number',$item->has_identify_number) == '1' ? 'selected' : ''); ?>><?php echo app('translator')->get('view_pages.yes'); ?></option>
                                                <option value="0" <?php echo e(old('has_identify_number',$item->has_identify_number) == '0' ? 'selected' : ''); ?>><?php echo app('translator')->get('view_pages.no'); ?></option>
                                            </select>
                                            <span class="text-danger"><?php echo e($errors->first('has_identify_number')); ?></span>
                                        </div>
                                    </div>

                                    <div class="col-sm-6 d-none" id="identify_number_div">
                                        <div class="form-group">
                                            <label for="identify_number_locale_key"><?php echo app('translator')->get('view_pages.identify_number_locale_key'); ?> <span class="text-danger">*</span></label>
                                            <input class="form-control" type="text" id="identify_number_locale_key" name="identify_number_locale_key"
                                                value="<?php echo e(old('identify_number_locale_key',$item->identify_number_locale_key)); ?>" 
                                                placeholder="<?php echo app('translator')->get('view_pages.enter'); ?> <?php echo app('translator')->get('view_pages.identify_number_locale_key'); ?>">
                                            <span class="text-danger"><?php echo e($errors->first('identify_number_locale_key')); ?></span>
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

<script>
    let hasIdentifyNumber = "<?php echo e(old('has_identify_number',$item->has_identify_number)); ?>";
    toggleHasIdentifyNumber(hasIdentifyNumber);

    function toggleHasIdentifyNumber(hasIdentifyNumber){

        if(hasIdentifyNumber == 1){
            $('#identify_number_div').removeClass('d-none');
            $('#identify_number_locale_key').attr('required',true);
        }else{
            $('#identify_number_div').addClass('d-none');
            $('#identify_number_locale_key').attr('required',false);
        }
    }

    $('#has_identify_number').change(function(){
        let val = $(this).val();
        toggleHasIdentifyNumber(val);
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\taxi\resources\views/admin/master/needed_doc/update.blade.php ENDPATH**/ ?>