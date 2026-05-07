<?php $__env->startSection('title', 'Main page'); ?>

<!-- Bootstrap fileupload css -->
<?php $__env->startSection('content'); ?>



<!-- Start Page content -->
<div class="content">
<div class="container-fluid">

<div class="row">
<div class="col-sm-12">
    <div class="box">

        <div class="box-header with-border">
            <a href="<?php echo e(url('types')); ?>">
                <button class="btn btn-danger btn-sm pull-right" type="submit">
                    <i class="mdi mdi-keyboard-backspace mr-2"></i>
                    <?php echo app('translator')->get('view_pages.back'); ?>
                </button>
            </a>
        </div>

        <div class="col-sm-12">
<form  method="post" class="form-horizontal" action="<?php echo e(url('types/update',$type->id)); ?>" enctype="multipart/form-data">
<?php echo e(csrf_field()); ?>


<div class="row">


    <div class="col-6">
        <div class="form-group m-b-25">
            <label for="name"><?php echo app('translator')->get('view_pages.name'); ?> <span class="text-danger">*</span></label>
            <input class="form-control" type="text" id="name" name="name" value="<?php echo e(old('name',$type->name)); ?>" required="" placeholder="<?php echo app('translator')->get('view_pages.enter_name'); ?>">
            <span class="text-danger"><?php echo e($errors->first('name')); ?></span>

        </div>
    </div>

        <div class="col-6">
            <div class="form-group m-b-25">
            <label for="name"><?php echo app('translator')->get('view_pages.capacity'); ?> <span class="text-danger">*</span></label>
            <input class="form-control" type="text" id="capacity" name="capacity" value="<?php echo e(old('capacity',$type->capacity)); ?>" required="" placeholder="<?php echo app('translator')->get('view_pages.enter_capacity'); ?>"  min="1">
            <span class="text-danger"><?php echo e($errors->first('capacity')); ?></span>
        </div>
    </div>
     <div class="col-6">
        <div class="form-group m-b-25">
            <label for="short_description"><?php echo app('translator')->get('view_pages.short_description'); ?> <span class="text-danger">*</span></label>
            <input class="form-control" type="text" id="name" name="short_description" value="<?php echo e(old('short_description',$type->short_description)); ?>" required="" placeholder="<?php echo app('translator')->get('view_pages.enter_short_description'); ?>">
            <span class="text-danger"><?php echo e($errors->first('short_description')); ?></span>

        </div>
    </div>
     <div class="col-6">
        <div class="form-group m-b-25">
            <label for="description"><?php echo app('translator')->get('view_pages.description'); ?> <span class="text-danger">*</span></label>
            <textarea name="description" id="description" class="form-control" placeholder="<?php echo app('translator')->get('view_pages.enter_description'); ?>"><?php echo e(old('description',$type->description)); ?></textarea>
           
            <span class="text-danger"><?php echo e($errors->first('description')); ?></span>

        </div>
    </div> 

    <div class="col-6">
        <div class="form-group m-b-25">
            <label for="supported_vehicles"><?php echo app('translator')->get('view_pages.supported_vehicles'); ?> <span class="text-danger">*</span></label>
            <textarea name="supported_vehicles" id="supported_vehicles" class="form-control" placeholder="Example: Toyato,Audi,Acura"><?php echo e(old('supported_vehicles',$type->supported_vehicles)); ?></textarea>
           
            <span class="text-danger"><?php echo e($errors->first('supported_vehicles')); ?></span>

        </div>
    </div>
        <div class="col-6">
                                        <div class="form-group">
                                            <label for=""><?php echo app('translator')->get('view_pages.icon_types_for'); ?> <span
                                                    class="text-danger">*</span></label>
                                            <select name="icon_types_for" id="icon_types_for" class="form-control"
                                                    required>
                                                <option value="" selected disabled><?php echo app('translator')->get('view_pages.select'); ?></option>
                                                <option
                                                    value="taxi" <?php echo e(old('icon_types_for', $type->icon_types_for) == 'taxi' ? 'selected' : ''); ?>><?php echo app('translator')->get('view_pages.taxi'); ?></option>
                                              <!--   <option
                                                    value="truck" <?php echo e(old('icon_types_for', $type->icon_types_for) == 'truck' ? 'selected' : ''); ?>><?php echo app('translator')->get('view_pages.truck'); ?></option> -->
                                                    <option
                                                    value="motor_bike" <?php echo e(old('icon_types_for', $type->icon_types_for) == 'motor_bike' ? 'selected' : ''); ?>><?php echo app('translator')->get('view_pages.motor_bike'); ?></option>

                                            </select>
                                            <span class="text-danger"><?php echo e($errors->first('icon_types_for')); ?></span>
                                        </div>
                                    </div>
</div>

    <div class="form-group">
        <div class="col-6">
            <label for="icon"><?php echo app('translator')->get('view_pages.icon'); ?></label><br>
            <img id="blah" src="<?php echo e(asset($type->icon)); ?>" alt=""><br>
            <input type="file" id="icon" onchange="readURL(this)" name="icon" style="display:none">
            <button class="btn btn-primary btn-sm" type="button" onclick="$('#icon').click()" id="upload"><?php echo app('translator')->get('view_pages.browse'); ?></button>
            <button class="btn btn-danger btn-sm" type="button" id="remove_img" style="display: none;"><?php echo app('translator')->get('view_pages.remove'); ?></button><br>
            <span class="text-danger"><?php echo e($errors->first('icon')); ?></span>
    </div>
</div>
<div class="form-group">
        <div class="col-12">
            <button class="btn btn-primary btn-sm m-5 pull-right" type="submit">
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



<!-- Bootstrap fileupload js -->

<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\taxi\resources\views/admin/types/update.blade.php ENDPATH**/ ?>