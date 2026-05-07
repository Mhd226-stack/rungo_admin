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
    <td> <?php echo e($result->name); ?></td>
    <?php if($result->active): ?>
    <td><button class="btn btn-success btn-sm"><?php echo app('translator')->get('view_pages.active'); ?></button></td>
    <?php else: ?>
    <td><button class="btn btn-danger btn-sm"><?php echo app('translator')->get('view_pages.inactive'); ?></button></td>
    <?php endif; ?>
    <td>

    <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo app('translator')->get('view_pages.action'); ?>
    </button>
    <div class="dropdown-menu" x-placement="bottom-start">
    <?php if(auth()->user()->can('view-zone-map')): ?>            

             <a class="dropdown-item" href="<?php echo e(url('zone/mapview',$result->id)); ?>"><i class="fa fa-eye"></i><?php echo app('translator')->get('view_pages.map_view'); ?></a>
    <?php endif; ?>

    <?php if(auth()->user()->can('edit-zone')): ?>            
            
             <a class="dropdown-item" href="<?php echo e(url('zone/edit',$result->id)); ?>"><i class="fa fa-pencil"></i><?php echo app('translator')->get('view_pages.edit'); ?></a>
    <?php endif; ?>
          
           <!-- <a class="dropdown-item" href="<?php echo e(url('zone/assigned/types',$result->id)); ?>"><i class="fa fa-plus"></i><?php echo app('translator')->get('view_pages.assign_types'); ?></a> -->
     <?php if(auth()->user()->can('toggle-zone')): ?>            
            
            <?php if($result->active): ?>
            <a class="dropdown-item" href="<?php echo e(url('zone/toggle_status',$result->id)); ?>">
            <i class="fa fa-dot-circle-o"></i><?php echo app('translator')->get('view_pages.inactive'); ?></a>
            <?php else: ?>
            <a class="dropdown-item" href="<?php echo e(url('zone/toggle_status',$result->id)); ?>">
            <i class="fa fa-dot-circle-o"></i><?php echo app('translator')->get('view_pages.active'); ?></a>
            <?php endif; ?>
    <?php endif; ?>
    <?php if(auth()->user()->can('surge-zone')): ?>            

           <a class="dropdown-item" href="<?php echo e(url('zone/surge',$result->id)); ?>"><i class="fa fa-book"></i><?php echo app('translator')->get('view_pages.surge_price'); ?></a>
    <?php endif; ?>    
    <?php if(auth()->user()->can('delete-zone')): ?>            

           <!--  <a class="dropdown-item sweet-delete" href="#" data-url="<?php echo e(url('zone/delete',$result->id)); ?>"><i class="fa fa-trash-o"></i><?php echo app('translator')->get('view_pages.delete'); ?></a> -->
    <?php endif; ?>
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
<?php /**PATH C:\laragon\www\taxi\resources\views/admin/zone/_zone.blade.php ENDPATH**/ ?>