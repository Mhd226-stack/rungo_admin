<table class="table table-hover">
    <thead>
        <tr>
            <th> <?php echo app('translator')->get('view_pages.s_no'); ?></th>
            <th> <?php echo app('translator')->get('view_pages.vehicle_make_name'); ?></th>
            <th> <?php echo app('translator')->get('view_pages.vehicle_make_for'); ?></th>
            <th> <?php echo app('translator')->get('view_pages.status'); ?></th>
            <th> <?php echo app('translator')->get('view_pages.action'); ?></th>
        </tr>
    </thead>

<tbody>
    
    <?php  $i= $results->firstItem();  ?>

    <?php $__empty_1 = true; $__currentLoopData = $results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <tr>
            <td><?php echo e($i++); ?> </td>
            <td><?php echo e($result->name); ?></td>
           
            <?php if($result->vehicle_make_for == 'taxi'): ?>
            <td><?php echo e('Taxi'); ?></td>
            <?php else: ?>
            <td><?php echo e('Motor Bike'); ?></td>
            <?php endif; ?>


            <?php if($result->active): ?>
            <td><span class="label label-success"><?php echo app('translator')->get('view_pages.active'); ?></span></td>
            <?php else: ?>
            <td><span class="label label-danger"><?php echo app('translator')->get('view_pages.inactive'); ?></span></td>
            <?php endif; ?>
            <td>

            <div class="dropdown">
            <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo app('translator')->get('view_pages.action'); ?>
            </button>
                 <div class="dropdown-menu">
                <?php if(auth()->user()->can('edit-carmake')): ?>         
                    <a class="dropdown-item" href="<?php echo e(url('carmake',$result->id)); ?>"><i class="fa fa-pencil"></i><?php echo app('translator')->get('view_pages.edit'); ?></a>
                <?php endif; ?>
                <?php if(auth()->user()->can('toggle-carmake')): ?>         
                    <?php if($result->active): ?>
                    <a class="dropdown-item" href="<?php echo e(url('carmake/toggle_status',$result->id)); ?>"><i class="fa fa-dot-circle-o"></i><?php echo app('translator')->get('view_pages.inactive'); ?></a>
                    <?php else: ?>
                    <a class="dropdown-item" href="<?php echo e(url('carmake/toggle_status',$result->id)); ?>"><i class="fa fa-dot-circle-o"></i><?php echo app('translator')->get('view_pages.active'); ?></a>
                    <?php endif; ?>
                <?php endif; ?>
                <?php if(auth()->user()->can('delete-carmake')): ?>         
                    
                <?php endif; ?>
                </div>
            </div>

            </td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <tr>
            <td colspan="11">
                <p id="no_data" class="lead no-data text-center">
                    <img src="<?php echo e(asset('assets/img/dark-data.svg')); ?>" style="width:150px;margin-top:25px;margin-bottom:25px;" alt="">
                    <h4 class="text-center" style="color:#333;font-size:25px;"><?php echo app('translator')->get('view_pages.no_data_found'); ?></h4>
                </p>
            </td>
        </tr>
    <?php endif; ?>

    </tbody>
    </table>
    <ul class="pagination pagination-sm pull-right">
        <li>
            <a href="#"><?php echo e($results->links()); ?></a>
        </li>
    </ul>
<?php /**PATH C:\laragon\www\taxi\resources\views/admin/master/carmake/_make.blade.php ENDPATH**/ ?>