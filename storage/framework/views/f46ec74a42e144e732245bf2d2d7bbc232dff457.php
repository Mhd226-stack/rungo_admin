<div class="box-body">
    <div class="table-responsive">
      <table class="table table-hover">
<thead>
<tr>


<th> <?php echo app('translator')->get('view_pages.s_no'); ?>
<span style="float: right;">

</span>
</th>


<th> <?php echo app('translator')->get('view_pages.name'); ?>
<span style="float: right;">
</span>
</th>
<th> <?php echo app('translator')->get('view_pages.area'); ?>
<span style="float: right;">
</span>
</th>
<th> <?php echo app('translator')->get('view_pages.email'); ?>
<span style="float: right;">
</span>
</th>
<th> <?php echo app('translator')->get('view_pages.mobile'); ?>
<span style="float: right;">
</span>
</th>
<!-- <th> <?php echo app('translator')->get('view_pages.gender'); ?>
<span style="float: right;">
</span>
</th> -->
<th> <?php echo app('translator')->get('view_pages.type'); ?>
<span style="float: right;">
</span>
<?php if(auth()->user()->can('driver-document')): ?>         
</th>
<th><?php echo app('translator')->get('view_pages.document_view'); ?></th>
<!-- <th> <?php echo app('translator')->get('view_pages.status'); ?> -->
<span style="float: right;">
</span>
</th>
<?php endif; ?>
<th> <?php echo app('translator')->get('view_pages.approve_status'); ?><span style="float: right;"></span></th>
<th> <?php echo app('translator')->get('view_pages.declined_reason'); ?><span style="float: right;"></span></th>
<th> <?php echo app('translator')->get('view_pages.rating'); ?>
<span style="float: right;">
</span>
</th>
<!-- <th> <?php echo app('translator')->get('view_pages.online_status'); ?><span style="float: right;"></span></th> -->
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
<td><?php echo e($key+1); ?> </td>
<td><?php echo e($result->name); ?></td>
<?php if($result->serviceLocation): ?>
<td><?php echo e($result->serviceLocation->name); ?></td>
<?php else: ?>
<td>--</td>
<?php endif; ?>

<?php if(env('APP_FOR')=='demo'): ?>
<td>**********</td>
<?php else: ?>
<td><?php echo e($result->email); ?></td>
<?php endif; ?>

<?php if(env('APP_FOR')=='demo'): ?>
<td>**********</td>
<?php else: ?>
<td><?php echo e($result->mobile); ?></td>
<!-- <td><?php echo e($result->gender); ?></td> -->
<?php endif; ?>
<?php if($result->vehicleType): ?>
<td><?php echo e($result->vehicleType->name); ?></td>
<?php else: ?>
<td>
<?php $__currentLoopData = $result->driverVehicleTypeDetail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vehicleType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php echo e($vehicleType->vehicleType->name.','); ?>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</td>
<?php endif; ?>
    <?php if(auth()->user()->can('driver-document')): ?>  
<td>

    <a href="<?php echo e(url('drivers/document/view',$result->id)); ?>" class="btn btn-social-icon btn-bitbucket">
        <i class="fa fa-file-text"></i>
    </a>
</td>
    <?php endif; ?>

<!-- <?php if($result->active): ?>
<td><button class="btn btn-success btn-sm"><?php echo e(trans('view_pages.active')); ?></button></td>
<?php else: ?>
<td><button class="btn btn-danger btn-sm"><?php echo e(trans('view_pages.iniive')); ?></button></td>
<?php endif; ?> -->

<?php if($result->approve): ?>
<td><button class="btn btn-success btn-sm"><?php echo e(trans('view_pages.approved')); ?></button></td>
<?php else: ?>
<td><button class="btn btn-danger btn-sm"><?php echo e(trans('view_pages.disapproved')); ?></button></td>
<?php endif; ?>
<?php if($result->reason): ?>
<td><?php echo e($result->reason); ?></td>
<?php else: ?>
<td>--</td>
<?php endif; ?>
<td>
  <?php $rating = $result->rating($result->user_id); ?>  

            <?php $__currentLoopData = range(1,5); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <span class="fa-stack" style="width:1em">
                   
                    <?php if($rating > 0): ?>
                        <?php if($rating > 0.5): ?>
                            <i class="fa fa-star checked"></i>
                        <?php else: ?>
                            <i class="fa fa-star-half-o"></i>
                        <?php endif; ?>
                    <?php else: ?>
                     <i class="fa fa-star-o "></i>
                    <?php endif; ?>
                    <?php $rating--; ?>
                </span>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 

<td>

<button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo app('translator')->get('view_pages.action'); ?>
</button>
<?php if($result->approve == 1): ?>
     <div class="dropdown-menu w-48 ">
    <?php if(auth()->user()->can('edit-drivers')): ?>         

        <a class="dropdown-item" href="<?php echo e(url('drivers',$result->id)); ?>">
            <i class="fa fa-pencil"></i><?php echo app('translator')->get('view_pages.edit'); ?>
      </a>
    <?php endif; ?>
        <!-- <?php if($result->active): ?>
        <a class="dropdown-item" href="<?php echo e(url('drivers/toggle_status',$result->id)); ?>">
        <i class="fa fa-dot-circle-o"></i><?php echo app('translator')->get('view_pages.inactive'); ?></a>
        <?php else: ?>
        <a class="dropdown-item" href="<?php echo e(url('drivers/toggle_status',$result->id)); ?>">
        <i class="fa fa-dot-circle-o"></i><?php echo app('translator')->get('view_pages.active'); ?></a>
        <?php endif; ?> -->
    <?php if(auth()->user()->can('toggle-drivers')): ?>         
        <a class="dropdown-item decline" data-reason="<?php echo e($result->reason); ?>" data-id="<?php echo e($result->id); ?>" href="<?php echo e(url('drivers/toggle_approve',['driver'=>$result->id,'approval_status'=>0])); ?>">
        <i class="fa fa-dot-circle-o"></i><?php echo app('translator')->get('view_pages.disapproved'); ?></a>

        <a class="dropdown-item" href="<?php echo e(url('drivers/toggle_approve',['driver'=>$result->id,'approval_status'=>1])); ?>">
        <i class="fa fa-dot-circle-o"></i><?php echo app('translator')->get('view_pages.approved'); ?></a>
    <?php endif; ?>
        <!-- <?php if($result->available): ?>
        <a class="dropdown-item" href="<?php echo e(url('drivers/toggle_available',$result->id)); ?>">
        <i class="fa fa-dot-circle-o"></i><?php echo app('translator')->get('view_pages.offline'); ?></a>
        <?php else: ?>
        <a class="dropdown-item" href="<?php echo e(url('drivers/toggle_available',$result->id)); ?>">
        <i class="fa fa-dot-circle-o"></i><?php echo app('translator')->get('view_pages.online'); ?></a>
        <?php endif; ?> -->
    <?php if(auth()->user()->can('delete-drivers')): ?>         
        <a class="dropdown-item sweet-delete" href="#" data-url="<?php echo e(url('drivers/delete',$result->id)); ?>">
        <i class="fa fa-trash-o"></i><?php echo app('translator')->get('view_pages.delete'); ?></a> 
    <?php endif; ?> 
    <?php if(auth()->user()->can('view-request-list')): ?>         
        <a class="dropdown-item" href="<?php echo e(url('drivers/request-list',$result->id)); ?>">
        <i class="fa fa-dot-circle-o"></i><?php echo app('translator')->get('view_pages.request_list'); ?></a> 
    <?php endif; ?>
    <?php if(auth()->user()->can('driver-payment-history')): ?>         
        <a class="dropdown-item" href="<?php echo e(url('drivers/payment-history',$result->id)); ?>">
        <i class="fa fa-dot-circle-o"></i><?php echo app('translator')->get('view_pages.driver_payment_history'); ?></a>
    <?php endif; ?>
    <?php if(auth()->user()->can('view-driver-profile')): ?>         
        <a class="dropdown-item" href="<?php echo e(url('driver_profile_dashboard_view',$result->id)); ?>">
        <i class="fa fa-dot-circle-o"></i><?php echo app('translator')->get('view_pages.view_profile'); ?></a>
    <?php endif; ?>
    </div>
<?php else: ?>
    <div class="dropdown-menu">
        <?php if(auth()->user()->can('edit-drivers')): ?>         
            <a class="dropdown-item" href="<?php echo e(url('drivers',$result->id)); ?>">
                <i class="fa fa-pencil"></i><?php echo app('translator')->get('view_pages.edit'); ?>
            </a>
        <?php endif; ?>

        <!-- <?php if($result->active): ?>
        <a class="dropdown-item" href="<?php echo e(url('drivers/toggle_status',$result->id)); ?>">
        <i class="fa fa-dot-circle-o"></i><?php echo app('translator')->get('view_pages.inactive'); ?></a>
        <?php else: ?>
        <a class="dropdown-item" href="<?php echo e(url('drivers/toggle_status',$result->id)); ?>">
        <i class="fa fa-dot-circle-o"></i><?php echo app('translator')->get('view_pages.active'); ?></a>
        <?php endif; ?> -->
        <?php if(auth()->user()->can('toggle-drivers')): ?>         
        <a class="dropdown-item decline" data-reason="<?php echo e($result->reason); ?>" data-id="<?php echo e($result->id); ?>" href="<?php echo e(url('drivers/toggle_approve',['driver'=>$result->id,'approval_status'=>0])); ?>">
        <i class="fa fa-dot-circle-o"></i><?php echo app('translator')->get('view_pages.disapproved'); ?></a>

        <a class="dropdown-item" href="<?php echo e(url('drivers/toggle_approve',['driver'=>$result->id,'approval_status'=>1])); ?>">
        <i class="fa fa-dot-circle-o"></i><?php echo app('translator')->get('view_pages.approved'); ?></a>
        <?php endif; ?>
        <!-- <?php if($result->available): ?>
        <a class="dropdown-item" href="<?php echo e(url('drivers/toggle_available',$result->id)); ?>">
        <i class="fa fa-dot-circle-o"></i><?php echo app('translator')->get('view_pages.offline'); ?></a>
        <?php else: ?>
        <a class="dropdown-item" href="<?php echo e(url('drivers/toggle_available',$result->id)); ?>">
        <i class="fa fa-dot-circle-o"></i><?php echo app('translator')->get('view_pages.online'); ?></a>
        <?php endif; ?> -->
        <?php if(auth()->user()->can('delete-drivers')): ?>         
        <a class="dropdown-item sweet-delete" href="#" data-url="<?php echo e(url('drivers/delete',$result->id)); ?>">
        <i class="fa fa-trash-o"></i><?php echo app('translator')->get('view_pages.delete'); ?></a> 
        <?php endif; ?>
</div>
<?php endif; ?>
                     
</td>   
</a>
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
</div><?php /**PATH C:\laragon\www\taxi\resources\views/admin/drivers/_drivers.blade.php ENDPATH**/ ?>