<div class="row p-0 m-0">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="col-sm-12 p-0">
                    <table class="table table-hover" style="border-collapse: collapse; border-spacing: 0px; width: 100%;" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                        <thead>
                            <tr>
                                <th> <?php echo app('translator')->get('view_pages.s_no'); ?></th>
                                <th> <?php echo app('translator')->get('view_pages.company_name'); ?></th>
                                <th> <?php echo app('translator')->get('view_pages.owner_name'); ?></th>
                                <th> <?php echo app('translator')->get('view_pages.email'); ?></th>
                                <th> <?php echo app('translator')->get('view_pages.mobile'); ?></th>
                                <?php if(auth()->user()->can('view-owner-document')): ?>
                                <th> <?php echo app('translator')->get('view_pages.document_view'); ?></th>
                                <?php endif; ?>
                                <th> <?php echo app('translator')->get('view_pages.approve_status'); ?></th>
                                
                                    <th> <?php echo app('translator')->get('view_pages.action'); ?></th>    
                                
                                
                            </tr>
                        </thead>

                        <tbody>
                            <?php if(count($results) < 1): ?>
                                <td class="no-result" colspan="11"><?php echo e(trans('view_pages.no_data_found')); ?></td>
                            <?php else: ?>

                                <?php $i= $results->firstItem(); ?>

                                <?php $__currentLoopData = $results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <tr>
                                        <td><?php echo e($i++); ?> </td>
                                        <td> <?php echo e($result->company_name); ?></td>
                                        <td> <?php echo e($result->owner_name); ?></td>
                                        <td><?php echo e($result->email); ?></td>
                                        <td><?php echo e($result->mobile); ?></td>
                                        <td class="manage-driver text-center">
                                            <a href="<?php echo e(url('owners/document/view', $result->id)); ?>" class="btn btn-social-icon btn-bitbucket">
                                                <i class="fa fa-file-code-o"></i>
                                            </a>
                                        </td>

                                        <td>
                                            <?php if($result->approve == '1'): ?>
                                                <span class="badge badge-success font-size-10"><?php echo e(trans('view_pages.approved')); ?></span>
                                            <?php else: ?>
                                                <span class="badge badge-danger font-size-10"><?php echo e(trans('view_pages.blocked')); ?></span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
    <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo app('translator')->get('view_pages.action'); ?>
    </button>
  <div class="dropdown-menu">
        <?php if(auth()->user()->can('edit-owner')): ?>         
            <a class="dropdown-item" href="<?php echo e(url('owners',$result->id)); ?>">
            <i class="fa fa-pencil"></i><?php echo app('translator')->get('view_pages.edit'); ?></a>
        <?php endif; ?>
        <?php if(auth()->user()->can('toggle-owner-status')): ?>         

            <?php if($result->approve=='1'): ?>
            <a class="dropdown-item" href="<?php echo e(url('owners/toggle_approve',$result->id)); ?>">
            <i class="fa fa-dot-circle-o"></i><?php echo app('translator')->get('view_pages.blocked'); ?></a>
            <?php else: ?>
            <a class="dropdown-item" href="<?php echo e(url('owners/toggle_approve',$result->id)); ?>">
            <i class="fa fa-dot-circle-o"></i><?php echo app('translator')->get('view_pages.approve'); ?></a>
            <?php endif; ?>
        <?php endif; ?>
        <?php if(auth()->user()->can('owner-payment-history')): ?>         
            <a class="dropdown-item" href="<?php echo e(url('owners/payment-history',$result->id)); ?>">
            <i class="fa fa-dot-circle-o"></i><?php echo app('translator')->get('view_pages.owner_payment_history'); ?></a>
        <?php endif; ?>
        <?php if(auth()->user()->can('delete-owner')): ?>         
            <a class="dropdown-item sweet-delete" href="<?php echo e(url('owners/delete',$result->id)); ?>">
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
<?php /**PATH C:\laragon\www\taxi\resources\views/admin/owners/_owners.blade.php ENDPATH**/ ?>