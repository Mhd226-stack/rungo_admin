<div class="row p-0 m-0">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="col-sm-12 p-0">
                    <table class="table table-hover" style="border-collapse: collapse; border-spacing: 0px; width: 100%;" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                        <thead>
                            <tr>
                           <th><?php echo app('translator')->get('view_pages.s_no'); ?></th>
                            <th><?php echo app('translator')->get('view_pages.vehicle_type'); ?></th>
                            <th><?php echo app('translator')->get('view_pages.price_type'); ?></th>
                            <th><?php echo app('translator')->get('view_pages.status'); ?></th>
                            <th><?php echo app('translator')->get('view_pages.action'); ?></th>
                            </tr>
                        </thead>

                        <tbody>

                            <?php if(!$results): ?>
                                <td class="no-result" colspan="11"><?php echo e(trans('view_pages.no_data_found')); ?></td>
                            <?php else: ?>
                                <?php $i= $results->firstItem(); ?>

                                <?php $__currentLoopData = $results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                    <td><?php echo e($i++); ?></td>
                    <td><?php echo e($result->zoneType->vehicleType->name); ?>

                            <?php if($result->zoneType->zone->default_vehicle_type == $result->zoneType->vehicleType->id): ?>
                            <button class="btn btn-warning btn-sm">Default</button>
                            <?php endif; ?>
                            <?php if($result->zoneType->zone->default_vehicle_type_for_delivery == $result->zoneType->vehicleType->id): ?>
                            <button class="btn btn-warning btn-sm">Default</button>
                            <?php endif; ?>
                            </td>
                    <td>
                        <?php if($result->price_type == 1): ?>
                        <span class="btn btn-success btn-sm"><?php echo e(__('view_pages.ride_now')); ?></span>
                        <?php else: ?>
                        <span class="btn btn-danger btn-sm"><?php echo e(__('view_pages.ride_later')); ?></span>
                        <?php endif; ?>
                    </td>
                    <td>
                        <?php if($result->zoneType->active): ?>
                        <button class="btn btn-success btn-sm"><?php echo app('translator')->get('view_pages.active'); ?></button>
                        <?php else: ?>
                        <button class="btn btn-danger btn-sm"><?php echo app('translator')->get('view_pages.inactive'); ?></button>
                        <?php endif; ?>
                    </td>
                    <td>
                        <!-- Dropdown for Actions -->
                        <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo app('translator')->get('view_pages.action'); ?></button>
                        <div class="dropdown-menu w-48">
                            <a class="dropdown-item" href="<?php echo e(url('vehicle_fare/edit', $result->id)); ?>">
                                <i class="fa fa-pencil"></i><?php echo app('translator')->get('view_pages.edit'); ?>
                            </a>
                            <a class="dropdown-item" href="<?php echo e(url('vehicle_fare/rental_package/index', $result->zoneType->id)); ?>">
                                <i class="fa fa-plus"></i><?php echo app('translator')->get('view_pages.assign_rental_package'); ?>
                            </a>
                            <?php if($result->active == 1 && $result->zoneType->zone->default_vehicle_type != $result->zoneType->vehicleType->id): ?>
                            <a class="dropdown-item" href="<?php echo e(url('vehicle_fare/set/default',$result->id)); ?>"><i class="fa fa-dot-circle-o"></i><?php echo app('translator')->get('view_pages.set_as_default'); ?></a>
                            <?php endif; ?>
                            <?php if($result->zoneType->active): ?>
                            <a class="dropdown-item" href="<?php echo e(url('vehicle_fare/toggle_status', $result->id)); ?>">
                                <i class="fa fa-dot-circle-o"></i><?php echo app('translator')->get('view_pages.inactive'); ?></a>
                            <?php else: ?>
                            <a class="dropdown-item" href="<?php echo e(url('vehicle_fare/toggle_status', $result->id)); ?>">
                                <i class="fa fa-dot-circle-o"></i><?php echo app('translator')->get('view_pages.active'); ?></a>
                            <?php endif; ?>
                            <a class="dropdown-item sweet-delete" href="#" data-url="<?php echo e(url('vehicle_fare/delete',$result->id)); ?>">
                                <i class="fa fa-trash-o"></i><?php echo app('translator')->get('view_pages.delete'); ?></a>
                        </div>
                    </td>   

                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="">
                <div class="col-sm-12 col-md-5 float-left">

                </div>
                <div class="col-sm-12 col-md-7 float-left">
                    <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
                        <ul class="pagination float-right">
                            <?php echo e($results->links()); ?>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
                    <?php endif; ?>                                    

    </div>
</div>
<?php /**PATH C:\laragon\www\taxi\resources\views/admin/vehicle_fare/_set_price.blade.php ENDPATH**/ ?>