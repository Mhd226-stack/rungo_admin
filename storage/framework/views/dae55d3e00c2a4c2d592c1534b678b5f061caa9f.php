<div class="row p-0 m-0">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">

                <div class="col-sm-12 p-0">
                    <table class="table table-hover" style="border-collapse: collapse; border-spacing: 0px; width: 100%;" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                        <thead>
                            <tr>
                                 <th><?php echo e(trans('view_pages.s_no')); ?></th>
                                 <th><?php echo e(trans('view_pages.driver')); ?></th>
                                 <th><?php echo e(trans('view_pages.vehicle_type')); ?></th>
                                 <th><?php echo e(trans('view_pages.car_brand')); ?></th>
                                 <th><?php echo e(trans('view_pages.car_model')); ?></th>
                                <?php if(auth()->user()->can('view-fleet-document')): ?>
                                    <th> <?php echo app('translator')->get('view_pages.document_view'); ?></th>
                                <?php endif; ?>                                 <!-- <th><?php echo e(trans('view_pages.qr_code')); ?></th> -->
                                 <th><?php echo e(trans('view_pages.license_number')); ?></th>
                                 <th><?php echo e(trans('view_pages.status')); ?></th> 
                                <th><?php echo e(trans('view_pages.action')); ?></th>
                                 
                            </tr>
                        </thead>

                        <tbody>
                            <?php if(count($results) == 0): ?>
                                <td class="no-result" colspan="11"><?php echo e(trans('view_pages.no_data_found')); ?></td>
                            <?php endif; ?>

                            <?php
                                $i = $results->firstItem();
                            ?>

                            <?php $__currentLoopData = $results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="odd">
                                    <td><?php echo e($i++); ?></td>
                                    <td><?php echo e($result->driver ? $result->driver->name : '-'); ?></td>
                                    <td><?php echo e($result->vehicleType->name); ?></td>
                                    <td><?php echo e($result->carBrand->name ?? $result->custom_make); ?></td>
                                    <td><?php echo e($result->carModel->name ?? $result->custom_model); ?></td>
                                    <td class="manage-driver text-center">
                                    <a href="<?php echo e(url('fleets/document/view', $result->id)); ?>" class="btn btn-social-icon btn-bitbucket">
                                    <i class="fa fa-file-code-o"></i>
                                    </a>
                                    </td>

<!--                                     <td>
                                        <?php if($result->approve): ?>
                                            <a href="<?php echo e($result->qr_code_image); ?>" download title="Click to Download">
                                                <img src="<?php echo e($result->qr_code_image); ?>" alt="" width="30" height="30">    
                                            </a>
                                        <?php else: ?>
                                            -
                                        <?php endif; ?>
                                        
                                    </td> -->
                                    <td><?php echo e($result->license_number); ?></td>
                                    <td>
                                        <?php if($result->approve): ?>
                                            <span class="badge badge-success"><?php echo app('translator')->get('view_pages.approved'); ?></span>
                                        <?php else: ?>
                                            <span class="badge badge-danger"><?php echo app('translator')->get('view_pages.blocked'); ?></span>
                                        <?php endif; ?>
                                    </td>

                                    
                                    <td>
                                  <div class="dropdown">
                                            <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo app('translator')->get('view_pages.action'); ?>
                                             </button>
                                           <div class="dropdown-menu">
                                                <?php if(auth()->user()->hasRole('owner')): ?>
                                                <a class="dropdown-item" href="<?php echo e(url('fleets/assign_driver',$result->id)); ?>"><?php echo e(trans('view_pages.assign_driver')); ?></a>
                                                <?php else: ?>
                                                    <?php if(auth()->user()->can('edit-fleet')): ?>
                                                    <a class="dropdown-item" href="<?php echo e(url('fleets/edit',$result->id)); ?>"><?php echo e(trans('view_pages.edit')); ?></a>
                                                    <?php endif; ?>

                                                    <?php if(auth()->user()->can('toggle-fleet-approval')): ?>
                                                        <?php if($result->approve): ?>
                                                        
                                                            <a class="decline dropdown-item" data-reason="<?php echo e($result->reason); ?>" data-id="<?php echo e($result->id); ?>" href="<?php echo e(url('fleets/toggle_approve',$result->id)); ?>"><?php echo app('translator')->get('view_pages.decline'); ?></a>
                                                        <?php else: ?>
                                                            <a class="sweet-approve dropdown-item" href="<?php echo e(url('fleets/toggle_approve',$result->id)); ?>"><?php echo app('translator')->get('view_pages.approve'); ?></a>
                                                        <?php endif; ?>
                                                    <?php endif; ?>

                                                    <?php if(auth()->user()->can('delete-fleet')): ?>
                                                    <a class="sweet-delete dropdown-item" href="<?php echo e(url('fleets/delete',$result->id)); ?>"><?php echo e(trans('view_pages.delete')); ?></a>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                            </div>
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
    </div>
 </div>
<?php /**PATH C:\laragon\www\taxi\resources\views/admin/fleets/_fleets.blade.php ENDPATH**/ ?>