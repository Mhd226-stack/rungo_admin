<table class="table table-hover">
    <thead>
        <tr>
            <th> <?php echo app('translator')->get('view_pages.s_no'); ?></th>
            <th> <?php echo app('translator')->get('view_pages.reason'); ?></th>
            <th> <?php echo app('translator')->get('view_pages.user_type'); ?></th>
            <th> <?php echo app('translator')->get('view_pages.payment_type'); ?></th>
            <th> <?php echo app('translator')->get('view_pages.arrival_status'); ?></th>
            <th> <?php echo app('translator')->get('view_pages.status'); ?></th>
            <?php if(!auth()->user()->company_key): ?>
            <th> <?php echo app('translator')->get('view_pages.action'); ?></th>
            <?php endif; ?>
        </tr>
    </thead>

<tbody>
    <?php  $i= $results->firstItem(); ?>

    <?php $__empty_1 = true; $__currentLoopData = $results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <tr>
            <td><?php echo e($i++); ?> </td>
            <td><?php echo e($result->reason); ?></td>
            <td>
                <span class="label label-warning"><?php echo e(ucfirst($result->user_type)); ?></span>
            </td>
            <td>
                <span class="badge badge-purple badge-md"><?php echo e(ucfirst($result->payment_type)); ?></span>
            </td>
            <td><?php echo e($result->arrival_status); ?></td>
            
            <?php if($result->active): ?>
            <td><span class="label label-success"><?php echo app('translator')->get('view_pages.active'); ?></span></td>
            <?php else: ?>
            <td><span class="label label-danger"><?php echo app('translator')->get('view_pages.inactive'); ?></span></td>
            <?php endif; ?>
            <?php if(!auth()->user()->company_key): ?>
            <td>

            <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo app('translator')->get('view_pages.action'); ?>
            </button>
               <div class="dropdown-menu">
                <?php if(auth()->user()->can('edit-cancellation')): ?>         
                    <a class="dropdown-item" href="<?php echo e(url('cancellation',$result->id)); ?>"><i class="fa fa-pencil"></i><?php echo app('translator')->get('view_pages.edit'); ?></a>
                <?php endif; ?>
                <?php if(auth()->user()->can('toggle-cancellation')): ?>         
                    <?php if($result->active): ?>
                    <a class="dropdown-item" href="<?php echo e(url('cancellation/toggle_status',$result->id)); ?>"><i class="fa fa-dot-circle-o"></i><?php echo app('translator')->get('view_pages.inactive'); ?></a>
                    <?php else: ?>
                    <a class="dropdown-item" href="<?php echo e(url('cancellation/toggle_status',$result->id)); ?>"><i class="fa fa-dot-circle-o"></i><?php echo app('translator')->get('view_pages.active'); ?></a>
                    <?php endif; ?>
                <?php endif; ?>
                <?php if(auth()->user()->can('delete-cancellation')): ?>         
                    <a class="dropdown-item sweet-delete" href="<?php echo e(url('cancellation/delete',$result->id)); ?>"><i class="fa fa-trash-o"></i><?php echo app('translator')->get('view_pages.delete'); ?></a>
                <?php endif; ?>
                </div>
            </div>

            </td>
            <?php endif; ?>
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
<?php /**PATH C:\laragon\www\taxi\resources\views/admin/cancellation/_cancellation.blade.php ENDPATH**/ ?>