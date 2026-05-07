<table class="table table-hover">
    <thead>
        <tr>
            <th> <?php echo app('translator')->get('view_pages.s_no'); ?></th>
            <th> <?php echo app('translator')->get('view_pages.request_id'); ?></th>
            <th> <?php echo app('translator')->get('view_pages.date'); ?></th>
            <th> <?php echo app('translator')->get('view_pages.user_name'); ?></th>
            <th> <?php echo app('translator')->get('view_pages.driver_name'); ?></th>
            <th> <?php echo app('translator')->get('view_pages.pick_location'); ?></th>
            <th> <?php echo app('translator')->get('view_pages.drop_location'); ?></th>
            <th> <?php echo app('translator')->get('view_pages.action'); ?></th>
        </tr>
    </thead>

    <tbody>
        <tr>
            <td><?php echo e(1); ?> </td>
            <td><?php echo e($item->request_number); ?></td>
            <td><?php echo e($item->trip_start_time); ?></td>
            <td><?php echo e($item->userDetail ? $item->userDetail->name : '-'); ?></td>
            <td><?php echo e($item->driverDetail ? $item->driverDetail->name : '-'); ?></td>
            <td><?php echo e($item->requestPlace ? $item->requestPlace->pick_address : '-'); ?></td>
            <td><?php echo e($item->requestPlace ? $item->requestPlace->drop_address : '-'); ?></td>

            <?php if($item->is_completed): ?>
            <td>
                <div class="dropdown">
                    <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false"><?php echo app('translator')->get('view_pages.action'); ?>
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="<?php echo e(url('requests',$item->id)); ?>">
                            <i class="fa fa-eye"></i><?php echo app('translator')->get('view_pages.view'); ?></a>
                    </div>
                </div>
            </td>
            <?php else: ?>
                 <?php if(($item->is_completed == 0) && ($item->is_cancelled == 0)): ?>
            <td>
                <div class="dropdown">
                    <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false"><?php echo app('translator')->get('view_pages.action'); ?>
                    </button>
                    <div class="dropdown-menu">
                             <a class="dropdown-item" href="<?php echo e(url('requests/trip_view',$item->id)); ?>">
                            <i class="fa fa-eye"></i><?php echo app('translator')->get('view_pages.trip_request'); ?></a>
                    </div>
                </div>
            </td>
            <?php else: ?>
               <td>-</td>
                  <?php endif; ?>
            <?php endif; ?>
        </tr>

    </tbody>
</table>
<?php /**PATH C:\laragon\www\taxi\resources\views/admin/request/_singlerequest.blade.php ENDPATH**/ ?>