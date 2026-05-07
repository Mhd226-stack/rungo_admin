<div class="box-body no-padding">
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
    <th> <?php echo app('translator')->get('view_pages.company_key'); ?>
    <span style="float: right;">
    </span>
    </th>
    <th> <?php echo app('translator')->get('view_pages.mobile'); ?>
    <span style="float: right;">
    </span>
    </th>
      <th> <?php echo app('translator')->get('view_pages.email'); ?>
    <span style="float: right;">
    </span>
    </th>
    <th> <?php echo app('translator')->get('view_pages.service_location'); ?>
    <span style="float: right;">
    </span>
    </th>
    <th> <?php echo app('translator')->get('view_pages.role'); ?>
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
    <td> <?php echo e($result->first_name .' '.$result->last_name); ?></td>
    <td><?php echo e($result->user->company_key); ?></td>
    <td><?php echo e($result->mobile); ?></td>
    <td><?php echo e($result->email); ?></td>
    <td><?php echo e($result->service_location_name); ?></td>
    <td>

        <?php $__currentLoopData = $result->user->roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php echo e($role->name); ?>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </td>
    <?php if($result->user->active): ?>
    <td><button class="btn btn-success btn-sm"><?php echo app('translator')->get('view_pages.active'); ?></button></td>
    <?php else: ?>
    <td><button class="btn btn-danger btn-sm"><?php echo app('translator')->get('view_pages.inactive'); ?></button></td>
    <?php endif; ?>
    <td>

    <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo app('translator')->get('view_pages.action'); ?>
    </button>
       <div class="dropdown-menu">
        <?php if(auth()->user()->can('edit-admin')): ?>         

            <a class="dropdown-item" href="<?php echo e(url('admins/edit',$result->id)); ?>">
            <i class="fa fa-pencil"></i><?php echo app('translator')->get('view_pages.edit'); ?></a>
        <?php endif; ?>
        <?php if(auth()->user()->can('toggle-admin-status')): ?>         

            <?php if($result->user->active): ?>
            <a class="dropdown-item" href="<?php echo e(url('admins/toggle_status',$result->user->id)); ?>">
            <i class="fa fa-dot-circle-o"></i><?php echo app('translator')->get('view_pages.inactive'); ?></a>
            <?php else: ?>
            <a class="dropdown-item" href="<?php echo e(url('admins/toggle_status',$result->user->id)); ?>">
            <i class="fa fa-dot-circle-o"></i><?php echo app('translator')->get('view_pages.active'); ?></a>
            <?php endif; ?>
        <?php endif; ?>    
        <?php if(auth()->user()->can('delete-admin')): ?>         
            <a class="dropdown-item sweet-delete" href="#" data-url="<?php echo e(url('admins/delete',$result->user->id)); ?>">
            <i class="fa fa-trash-o"></i><?php echo app('translator')->get('view_pages.delete'); ?></a>
        <?php endif; ?>    
            
        </div>
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
<?php /**PATH C:\laragon\www\taxi\resources\views/admin/admin/_admin.blade.php ENDPATH**/ ?>