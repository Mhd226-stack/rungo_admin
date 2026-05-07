<?php $__env->startSection('title', 'Main page'); ?>

<?php $__env->startSection('content'); ?>

<!-- Start Page content -->
<section class="content">


<div class="row">
<div class="col-12">
<div class="box">

    <div class="box-header with-border">
        <div class="row text-right">
            <div class="col-2">
                <div class="form-group">
                <input type="text" name="search" class="form-control" placeholder="<?php echo app('translator')->get('view_pages.enter_keyword'); ?>">
                </div>
            </div>

            <div class="col-1">
                <button class="btn btn-success btn-outline btn-sm mt-5" type="submit">
                <?php echo app('translator')->get('view_pages.search'); ?>
                </button>
            </div>
            <div class="col-9 text-right">
            <a href="<?php echo e(url('vehicle_fare/rental_package/create',$zone_type->id)); ?>" class="btn btn-primary btn-sm">
            <i class="mdi mdi-plus-circle mr-2"></i><?php echo app('translator')->get('view_pages.add_package_type'); ?></a>
            <a href="<?php echo e(url('vehicle_fare')); ?>" class="btn btn-danger btn-sm">
            <i class="mdi mdi-keyboard-backspace mr-2"></i><?php echo app('translator')->get('view_pages.back'); ?></a>
            </div>
        </div>
    </div>

        <div class="box-body no-padding">
            <div class="table-responsive">
              <table class="table table-hover">
                <thead>
                <tr>


                <th> <?php echo app('translator')->get('view_pages.s_no'); ?>
                <span style="float: right;">

                </span>
                </th>

                <th> <?php echo app('translator')->get('view_pages.package_type'); ?>
                <span style="float: right;">
                </span>
                </th>
                <th> <?php echo app('translator')->get('view_pages.base_price'); ?>
                <span style="float: right;">
                </span>
                </th>
                <th> <?php echo app('translator')->get('view_pages.distance_price'); ?>
                <span style="float: right;">
                </span>
                </th>
                <th> <?php echo app('translator')->get('view_pages.time_price'); ?>
                <span style="float: right;">
                </span>
                </th>
                <th> <?php echo app('translator')->get('view_pages.free_distance'); ?>
                <span style="float: right;">
                </span>
                </th>
                <th> <?php echo app('translator')->get('view_pages.free_minute'); ?>
                <span style="float: right;">
                </span>
                </th>
                <th> <?php echo app('translator')->get('view_pages.cancellation_fee'); ?>
                <span style="float: right;">
                </span>
                </th>
                <th> <?php echo app('translator')->get('view_pages.status'); ?>
                <span style="float: right;">
                </span>
                </th>
                <th> <?php echo app('translator')->get('view_pages.action'); ?>
                <span style="float: right;">
                </span>
                </th>
                </tr>
                </thead>
                <tbody>
                <?php if(count($results)<1): ?>
                    <tr>
                        <td colspan="11">
                        <p id="no_data" class="lead no-data text-center">
                        <img src="<?php echo e(asset('assets/img/dark-data.svg')); ?>" style="width:150px;margin-top:25px;margin-bottom:25px;" alt="">
                     <h4 class="text-center" style="color:#333;font-size:25px;"><?php echo app('translator')->get('view_pages.no_data_found'); ?></h4>
                 </p>
                    </tr>
                    <?php else: ?>

                <?php  $i= $results->firstItem(); ?>

                <?php $__currentLoopData = $results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <tr>
                <td><?php echo e($i++); ?> </td>
                <td>
                    <?php echo e($result->PackageName->name); ?>

                    
                </td>
                <td> <?php echo e($result->base_price); ?></td>
                <td> <?php echo e($result->distance_price_per_km); ?></td>
                <td> <?php echo e($result->time_price_per_min); ?></td>
                <td> <?php echo e($result->free_distance); ?></td>
                <td> <?php echo e($result->free_min); ?></td>
                <td> <?php echo e($result->cancellation_fee); ?></td>
                <?php if($result->active): ?>
                <td><button class="btn btn-success btn-sm"><?php echo app('translator')->get('view_pages.active'); ?></button></td>
                <?php else: ?>
                <td><button class="btn btn-danger btn-sm"><?php echo app('translator')->get('view_pages.inactive'); ?></button></td>
                <?php endif; ?>
                <td>

                <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo app('translator')->get('view_pages.action'); ?>
                </button>

                    <div class="dropdown-menu" x-placement="bottom-start">
                    <a class="dropdown-item" href="<?php echo e(url('vehicle_fare/rental_package/edit',$result->id)); ?>"><i class="fa fa-pencil"></i><?php echo app('translator')->get('view_pages.edit'); ?></a> 

                       
                        <?php if($result->active): ?>
                        <a class="dropdown-item" href="<?php echo e(url('zone/types/zone_package_price/toggleStatus',$result->id)); ?>"><i class="fa fa-dot-circle-o"></i><?php echo app('translator')->get('view_pages.inactive'); ?></a>
                        <?php else: ?>
                        <a class="dropdown-item" href="<?php echo e(url('zone/types/zone_package_price/toggleStatus',$result->id)); ?>"><i class="fa fa-dot-circle-o"></i><?php echo app('translator')->get('view_pages.active'); ?></a>
                        <?php endif; ?>

                        

                        <a class="dropdown-item sweet-delete" href="<?php echo e(url('zone/types/zone_package_price/delete',$result->id)); ?>"><i class="fa fa-trash-o"></i><?php echo app('translator')->get('view_pages.delete'); ?></a>
                    </div>

                </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
                </tbody>
                </table>
                <div class="text-right">
                    <span  style="float:right">
                    <?php echo e($results->links()); ?>

                    </span>
                </div>
            </div>
        </div>
</div>

</div>
</div>
<!-- content -->

<script>
    
$('.sweet-delete').click(function(e){
    button=$(this);
    e.preventDefault();

        swal({
            title: "Are you sure to delete ?",
            type: "error",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Delete",
            cancelButtonText: "No! Keep it",
            closeOnConfirm: false,
            closeOnCancel: true
        }, function(isConfirm){
            if (isConfirm) {
                button.unbind();
                button[0].click();
            }
        });
    });
</script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\taxi\resources\views/admin/zone_type_package/index.blade.php ENDPATH**/ ?>