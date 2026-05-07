<?php $__env->startSection('title', 'Main page'); ?>

<?php $__env->startSection('content'); ?>

    <style>
        .select2-selection__rendered{
            max-height: 200px !important;
            overflow-y: auto !important;
        }
    </style>

<!-- iCheck for checkboxes and radio inputs -->
<link rel="stylesheet" href="<?php echo e(asset('assets/vendor_plugins/iCheck/all.css')); ?>">


    <!-- Start Page content -->
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-sm-12">
                    <div class="box">

                        <div class="box-header with-border">
                            <a href="<?php echo e(url('notifications/push')); ?>">
                                <button class="btn btn-danger btn-sm pull-right" type="submit">
                                    <i class="mdi mdi-keyboard-backspace mr-2"></i>
                                    <?php echo app('translator')->get('view_pages.back'); ?>
                                </button>
                            </a>
                        </div>

                        <div class="col-sm-12">

                            <form method="post" class="form-horizontal" action="<?php echo e(url('notifications/push/send')); ?>" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="user"><?php echo app('translator')->get('view_pages.user'); ?> <span class="text-danger">*</span></label>
                                            <select name="user[]" id="user" class="form-control select2"  multiple="multiple" data-placeholder="Select User">
                                                
                                                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($user->id); ?>" <?php echo e(old('user') == $user->id ? 'selected' : ''); ?>><?php echo e(ucfirst($user->name)); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <span class="text-danger"><?php echo e($errors->first('user')); ?></span>
                                        </div>
                                    </div>
                                    <div class="col-sm-2 mt-30">
                                        <div class="form-group">
                                            <input type="checkbox" id="all_user" name="all_user" class="filled-in chk-col-light-blue mt-4 selectAll" data-type="user"/>
					                        <label for="all_user"><?php echo app('translator')->get('view_pages.select_all'); ?></label>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="driver"><?php echo app('translator')->get('view_pages.driver'); ?> <span class="text-danger">*</span></label>
                                            <select name="driver[]" id="driver" class="form-control select2"  multiple="multiple" data-placeholder="Select Driver">
                                                
                                                <?php $__currentLoopData = $drivers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $driver): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($driver->id); ?>" <?php echo e(old('driver') == $driver->id ? 'selected' : ''); ?>><?php echo e(ucfirst($driver->name)); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <span class="text-danger"><?php echo e($errors->first('driver')); ?></span>
                                        </div>
                                    </div>

                                    <div class="col-sm-2 mt-30">
                                        <div class="form-group">
                                            <input type="checkbox" id="all_driver" name="all_driver" class="filled-in chk-col-light-blue mt-4 selectAll" data-type="driver"/>
					                        <label for="all_driver"><?php echo app('translator')->get('view_pages.select_all'); ?></label>
                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="title"><?php echo app('translator')->get('view_pages.push_title'); ?> <span class="text-danger">*</span></label>
                                            <input class="form-control" type="text" id="title" name="title"
                                                value="<?php echo e(old('title')); ?>" required
                                                placeholder="<?php echo app('translator')->get('view_pages.enter'); ?> <?php echo app('translator')->get('view_pages.push_title'); ?>">
                                            <span class="text-danger"><?php echo e($errors->first('title')); ?></span>
                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="message"><?php echo app('translator')->get('view_pages.message'); ?> <span class="text-danger">*</span></label>
                                            <textarea class="form-control" name="message" id="message" rows="3" placeholder="<?php echo app('translator')->get('view_pages.enter'); ?> <?php echo app('translator')->get('view_pages.message'); ?>" required><?php echo e(old('message')); ?></textarea>
                                            <span class="text-danger"><?php echo e($errors->first('message')); ?></span>
                                        </div>
                                    </div>

                                    
                                </div>

                                <div class="form-group">
                                    <div class="col-12">
                                        <button class="btn btn-primary btn-sm pull-right m-5 sendPush" type="submit">
                                            <?php echo app('translator')->get('view_pages.send'); ?>
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
    $(document).ready(function() {
        $(".selectAll").click(function(){
            var user_type = $(this).attr('data-type');

            if($(this).is(':checked') ){
                $("#"+user_type).find('option').prop("selected",true);
                // alert($("#"+user_type).find('option:selected').length);
                $("#"+user_type).trigger('change');
            } else {
                $("#"+user_type).find('option').prop("selected",false);
                $("#"+user_type).trigger('change');
            }
        });
    });

    $(document).on('click','.sendPush',function(){
        var isUserSelected = $('#user option:not([disabled])').is(':selected');
        var isDriverSelected = $('#driver option:not([disabled])').is(':selected');

        if(!isUserSelected && !isDriverSelected){
            $.toast({
                heading: '',
                text: 'You have to Select atleast one user or driver',
                position: 'top-center',
                loaderBg: '#ff6849',
                icon: 'error',
                hideAfter: 5000,
                stack: 1
            });
            return false;
        }
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\taxi\resources\views/admin/notification/push/sendpush.blade.php ENDPATH**/ ?>