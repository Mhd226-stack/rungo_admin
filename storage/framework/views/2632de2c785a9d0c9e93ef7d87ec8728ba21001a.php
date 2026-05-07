<table class="table table-hover">
    <thead>
        <tr>
            <th> <?php echo app('translator')->get('view_pages.s_no'); ?></th>
            <th> <?php echo app('translator')->get('view_pages.request_id'); ?></th>
            <th> <?php echo app('translator')->get('view_pages.date'); ?></th>
            <th> <?php echo app('translator')->get('view_pages.user_name'); ?></th>
            <th> <?php echo app('translator')->get('view_pages.driver_name'); ?></th>
            <th> <?php echo app('translator')->get('view_pages.trip_status'); ?></th>
            <th> <?php echo app('translator')->get('view_pages.is_paid'); ?></th>
            <th> <?php echo app('translator')->get('view_pages.payment_option'); ?></th>
            <th> <?php echo app('translator')->get('view_pages.action'); ?></th>
        </tr>
    </thead>
    <tbody>


        <?php $i= $results->firstItem(); ?>

        <?php $__empty_1 = true; $__currentLoopData = $results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

        <tr>
            <td><?php echo e($i++); ?> </td>
            <td><?php echo e($result->request_number); ?></td>
            <td><?php echo e($result->trip_start_time ?? $result->created_at); ?></td>
            <?php if($result->user_id == null): ?>
            <td><?php echo e($result->adHocuserDetail ? $result->adHocuserDetail->name : '-'); ?></td>
            <?php else: ?>
            <td><?php echo e($result->userDetail ? $result->userDetail->name : '-'); ?></td>
            <?php endif; ?>
            <td><?php echo e($result->driverDetail ? $result->driverDetail->name : '-'); ?></td>

            <?php if($result->is_cancelled == 1): ?>
            <td><span class="label label-danger"><?php echo app('translator')->get('view_pages.cancelled'); ?></span></td>
            <?php elseif($result->is_completed == 1): ?>
            <td><span class="label label-success"><?php echo app('translator')->get('view_pages.completed'); ?></span></td>
            <?php elseif($result->is_trip_start == 0 && $result->is_cancelled == 0): ?>
            <td><span class="label label-warning"><?php echo app('translator')->get('view_pages.not_started'); ?></span></td>
            <?php else: ?>
            <td>-</td>
            <?php endif; ?>

            <?php if($result->is_paid): ?>
            <td><span class="label label-success"><?php echo app('translator')->get('view_pages.paid'); ?></span></td>
            <?php else: ?>
            <td><span class="label label-danger"><?php echo app('translator')->get('view_pages.not_paid'); ?></span></td>
            <?php endif; ?>

            <?php if($result->payment_opt == 0): ?>
            <td><span class="label label-danger"><?php echo app('translator')->get('view_pages.card'); ?></span></td>
            <?php elseif($result->payment_opt == 1): ?>
            <td><span class="label label-primary"><?php echo app('translator')->get('view_pages.cash'); ?></span></td>
            <?php elseif($result->payment_opt == 2): ?>
            <td><span class="label label-warning"><?php echo app('translator')->get('view_pages.wallet'); ?></span></td>
            <?php else: ?>
            <td><span class="label label-info"><?php echo app('translator')->get('view_pages.cash_wallet'); ?></span></td>
            <?php endif; ?>

            <?php if($result->is_completed): ?>
            <td>
            <button type="button" class="btn btn-info btn-sm"> <a class="text-white" href="<?php echo e(url('requests',$result->id)); ?>"><?php echo app('translator')->get('view_pages.view'); ?>
                    </a>
                    </button>
                    <!-- <div class="dropdown-menu">
                        <a class="dropdown-item" href="<?php echo e(url('requests',$result->id)); ?>">
                            <i class="fa fa-eye"></i><?php echo app('translator')->get('view_pages.view'); ?></a> -->

                            <!-- <a class="dropdown-item" target="_blank" href="<?php echo e(url('requests/view-customer-invoice',$result->id)); ?>">
                            <i class="fa fa-eye"></i>View Customer Invoice</a>
                            <a class="dropdown-item" target="_blank" href="<?php echo e(url('requests/view-driver-invoice',$result->id)); ?>">
                            <i class="fa fa-eye"></i>View Driver Invoice</a>
                             -->
                    <!-- </div> -->
                <!-- </div> -->
            </td>
            <?php else: ?>
                 <?php if(($result->is_completed == 0) && ($result->is_cancelled == 0)): ?>
            <td>
                <!-- <div class="dropdown"> -->
                <a class="text-white" href="<?php echo e(url('requests/trip_view',$result->id)); ?>">
                <button type="button" class="btn btn-info btn-sm">
                   <?php echo app('translator')->get('view_pages.view'); ?>
                </button></a>
                    <!-- <div class="dropdown-menu">
                        
                             <a class="dropdown-item" href="<?php echo e(url('requests/trip_view',$result->id)); ?>">
                            <i class="fa fa-eye"></i><?php echo app('translator')->get('view_pages.trip_request'); ?></a>
                    </div>
                </div> -->
            </td>
            <?php else: ?>
               <td>
               <a class="text-white" href="<?php echo e(url('requests/cancelled',$result->id)); ?>">
               <button type="button" class="btn btn-info btn-sm">
                 <?php echo app('translator')->get('view_pages.view'); ?>
                  </button></a>
               </td>
                  <?php endif; ?>
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
</ul><?php /**PATH C:\laragon\www\taxi\resources\views/admin/request/_request.blade.php ENDPATH**/ ?>