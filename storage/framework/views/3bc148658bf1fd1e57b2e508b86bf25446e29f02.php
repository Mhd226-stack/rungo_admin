<?php $__env->startSection('title', 'Users'); ?>

<?php $__env->startSection('content'); ?>

    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="box table-responsive">
                    <div class="box-header with-border">
                        <div class="row text-right">
                            
                        </div>
                    </div>

                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th> <?php echo app('translator')->get('view_pages.s_no'); ?></th>
                                <th> <?php echo app('translator')->get('view_pages.complaint_type'); ?></th>
                                <th> <?php echo app('translator')->get('view_pages.user_name'); ?></th>
                                <th> <?php echo app('translator')->get('view_pages.title'); ?></th>
                                <th> <?php echo app('translator')->get('view_pages.description'); ?></th>
                                <th> <?php echo app('translator')->get('view_pages.status'); ?></th>
                                <th> <?php echo app('translator')->get('view_pages.action'); ?></th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php  $i= $results->firstItem(); ?>

                            <?php $__empty_1 = true; $__currentLoopData = $results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td><?php echo e($i++); ?> </td>
                                    <td>
                                        <?php if($result->complaint_type == 'request_help'): ?>
                                            <span
                                                class="badge badge-warning"> <?php echo app('translator')->get('view_pages.trip_complaint'); ?></span>
                                        <?php else: ?>
                                            <span class="badge badge-danger"> <?php echo app('translator')->get('view_pages.general_complaint'); ?></span>
                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo e($result->user->name); ?></td>
                                    <td><?php echo e($result->complaint->title); ?></td>
                                    <td><?php echo e($result->description); ?></td>

                                    <td>
                                        <?php if($result->status == 'new'): ?>
                                            <span class="badge badge-danger"><?php echo e(strtoupper($result->status)); ?> </span>
                                        <?php elseif($result->status == 'taken'): ?>
                                            <span class="badge badge-warning"><?php echo e(strtoupper($result->status)); ?> </span>
                                        <?php elseif($result->status == 'solved'): ?>
                                            <span class="badge badge-success"><?php echo e(strtoupper($result->status)); ?> </span>
                                        <?php endif; ?>
                                    </td>


                                    <?php if($result->status == 'solved'): ?>
                                        <td>-</td>
                                    <?php else: ?>
                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn btn-info btn-sm dropdown-toggle"
                                                    data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false"><?php echo app('translator')->get('view_pages.action'); ?>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <?php if($result->status == 'new'): ?>
                                                        <a class="dropdown-item"
                                                            href="<?php echo e(url('complaint/taken', $result->id)); ?>"><i
                                                                class="fa fa-dot-circle-o"></i><?php echo app('translator')->get('view_pages.taken'); ?></a>
                                                    <?php elseif($result->status == 'taken'): ?>
                                                        <a class="dropdown-item"
                                                            href="<?php echo e(url('complaint/solved', $result->id)); ?>"><i
                                                                class="fa fa-dot-circle-o"></i><?php echo app('translator')->get('view_pages.solved'); ?></a>
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
                                            <img src="<?php echo e(asset('assets/img/dark-data.svg')); ?>"
                                                style="width:150px;margin-top:25px;margin-bottom:25px;" alt="">
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

                </div>
            </div>
        </div>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\taxi\resources\views/admin/complaints/user/index.blade.php ENDPATH**/ ?>