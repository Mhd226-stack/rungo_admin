<table class="table table-hover">
    <thead>
        <tr>    
            <th> <?php echo app('translator')->get('view_pages.s_no'); ?></th>   
            <th> <?php echo app('translator')->get('view_pages.push_title'); ?></th>
            <th> <?php echo app('translator')->get('view_pages.message'); ?></th>
            <th> <?php echo app('translator')->get('view_pages.user_type'); ?></th>
            <th> <?php echo app('translator')->get('view_pages.action'); ?></th>
        </tr>
    </thead>

<tbody>
    <?php  $i= $results->firstItem(); ?>
    
    <?php $__empty_1 = true; $__currentLoopData = $results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <tr>
            <td><?php echo e($i++); ?> </td>
            <td><?php echo e($result->title); ?></td>
            <td><?php echo e($result->body); ?></td>
            <td>
                <?php if($result->for_user && $result->for_driver): ?>
                    <span class="badge badge-success"><?php echo app('translator')->get('view_pages.both'); ?></span>
                <?php elseif($result->for_user): ?>
                    <span class="badge badge-warning"><?php echo app('translator')->get('view_pages.user'); ?></span>
                <?php else: ?>
                    <span class="badge badge-danger"><?php echo app('translator')->get('view_pages.driver'); ?></span>
                <?php endif; ?>    
            </td>
            
            <td>
                    <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo app('translator')->get('view_pages.action'); ?></button>
                        <div class="dropdown-menu">
                         <?php if(auth()->user()->can('delete-notifications')): ?>         
                            <a class="dropdown-item sweet-delete" href="<?php echo e(url('notifications/push/delete',$result->id)); ?>"><i class="fa fa-trash-o"></i><?php echo app('translator')->get('view_pages.delete'); ?></a>
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
    </ul><?php /**PATH C:\laragon\www\taxi\resources\views/admin/notification/push/_pushnotification.blade.php ENDPATH**/ ?>