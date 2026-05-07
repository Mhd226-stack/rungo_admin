<?php $__env->startSection('title', 'Main page'); ?>

<?php $__env->startSection('content'); ?>

    <!-- Start Page content -->
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-sm-12">

                    <div class="box">
                        <div class="box-header with-border">
                            <form method="get" name="search" action="<?php echo e(url('roles')); ?>">
                                <div class="row text-right">
                            <?php if(auth()->user()->can('create-roles')): ?>
                           <!--      <div class="col-sm-12 text-right">
                                 <a href="<?php echo e(url('roles/create')); ?>" class="btn btn-primary btn-sm">
                                    <i class="mdi mdi-plus-circle mr-2"></i><?php echo app('translator')->get('view_pages.add_role'); ?></a>
                                </div> -->
                            <?php endif; ?>
                                    <div class="col-8 col-md-3">
                                        <div class="form-group">
                                            <input type="text" name="search" class="form-control"
                                                placeholder="<?php echo app('translator')->get('view_pages.enter_keyword'); ?>">
                                        </div>
                                    </div>

                                    <div class="col-4 col-md-2 text-left">
                                        <button class="btn btn-success btn-outline btn-sm py-2" type="submit">
                                            <?php echo app('translator')->get('view_pages.search'); ?>
                                        </button>
                                    </div>

                        </form>
                            <!-- <div class="box-controls pull-right">
                            <div class="lookup lookup-circle lookup-right">
                              <input type="text" name="s">
                            </div>
                          </div> -->
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body no-padding">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>


                                            <th> <?php echo app('translator')->get('view_pages.s_no'); ?>
                                                <span style="float: right;">

                                                </span>
                                            </th>
                                            <th> <?php echo app('translator')->get('view_pages.slug'); ?>
                                                <span style="float: right;">
                                                </span>
                                            </th>
                                            <th> <?php echo app('translator')->get('view_pages.name'); ?>
                                                <span style="float: right;">
                                                </span>
                                            </th>
                                            <th> <?php echo app('translator')->get('view_pages.description'); ?>
                                                <span style="float: right;">
                                                </span>
                                            </th>

                                        <?php if(auth()->user()->can('edit-roles')): ?>
                                            <th> <?php echo app('translator')->get('view_pages.action'); ?>
                                                <span style="float: right;">
                                                </span>
                                            </th>
                                        <?php endif; ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if(count($results) < 1): ?>
                                            <tr>
                                                <td colspan="11">
                                                    <p id="no_data" class="lead no-data text-center">
                                                        <img src="<?php echo e(asset('assets/img/dark-data.svg')); ?>"
                                                            style="width:150px;margin-top:25px;margin-bottom:25px;" alt="">
                                                    <h4 class="text-center" style="color:#333;font-size:25px;">
                                                        <?php echo app('translator')->get('view_pages.no_data_found'); ?></h4>
                                                    </p>
                                                </td>
                                            </tr>
                                        <?php else: ?>
                                            <?php  $i= $results->firstItem(); ?>
                                            <?php $__currentLoopData = $results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                <tr>
                                                    <td><?php echo e($i++); ?> </td>
                                                    <td> <?php echo e($result->slug); ?></td>
                                                    <td><?php echo e($result->name); ?></td>
                                                    <td><?php echo e($result->description); ?> </td>
                                                    <?php if($result->slug != 'dispatcher'): ?>
                                                    <td>
                                                        <a class="btn btn-primary btn-sm"
                                                            href="<?php echo e(url('roles/assign/permissions', $result->id)); ?>">
                                                            <i class="fa fa-pencil" id="edit_session" data-toggle="tooltip"
                                                                data-placement="top" title="Assign Permissions"></i>
                                                        </a>

                                                    </td>
                                                    <?php endif; ?>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="text-right">
                        <span style="float:right">
                            <?php echo e($results->links()); ?>

                        </span>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- container -->

    </div>
    <!-- content -->


<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\taxi\resources\views/admin/master/roles/index.blade.php ENDPATH**/ ?>