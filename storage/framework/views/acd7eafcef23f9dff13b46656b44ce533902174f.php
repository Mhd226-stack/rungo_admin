<style>
    .timeline .timeline-item>.timeline-point {
        color: yellow !important;
        padding: 3px;
    }

    .dropdown.user.user-menu a.dropdown-toggle {
        display: inherit;
    }

</style>

<?php $__env->startSection('content'); ?>


    <section class="content">

        <div class="row">

            <div class="col-12">
                <div class="box">
                    <div class="box-body box-profile pad0">
                        <div class="row">
                            <div class="col-md-2 m-auto text-right">
                                <img class="avatar avatar-xxl avatar-bordered"
                                    src="<?php echo e($item->user->profile_pic ?: asset('/assets/img/user-dummy.svg')); ?>" alt="">
                            </div>
                            <div class="col-md-4 col-12">
                                <div>
                                    <h3>
                                        <span class="text-gray"><?php echo e($item->name); ?> </span>
                                    </h3>
                                    <p>
                                        <span class="text-gray">
                                            <?php echo e($item->user->email); ?> <br>
                                            <?php echo e($item->user->mobile); ?>

                                        </span>
                                    </p>
                                    <p>
                                        <?php $rating = $item->rating($item->user_id); ?>
                                        <?php $__currentLoopData = range(1, 5); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <span class="fa-stack" style="width:1em">


                                                <?php if($rating > 0): ?>
                                                    <?php if($rating > 0.5): ?>
                                                        <i class="fa fa-star checked" style="color: yellow"></i>
                                                    <?php else: ?>
                                                        <i class="fa fa-star-half-o" style="color: yellow"></i>
                                                    <?php endif; ?>
                                                <?php else: ?>

                                                    <i class="fa fa-star-o " style="color: yellow"></i>
                                                <?php endif; ?>

                                                <?php $rating--; ?>
                                            </span>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        
                                    </p>
                                   
                                </div>
                            </div>
                            <div class="col-md-2 m-auto">
                                 <img class="w-fill" src="<?php echo e($item->vehicleType ? $item->vehicleType->icon : asset('assets/images/2.jpg')); ?>"
                                    alt="">
                            </div>
                            <div class="col-md-4 col-12">
                                <div>
                                    <h3>
                                        <span class="text-gray"><?php echo e($item->carMake ? $item->carMake->name : "vehicle Not Assigned"); ?></span>
                                    </h3>
                                    <p>
                                        <span class="text-gray">
                                             <?php echo e($item->carModel ? $item->carModel->name : "vehicle Not Assigned"); ?> (<?php echo e($item->vehicleType ? $item->vehicleType->name : "vehicle Not Assigned"); ?>)
                                        </span>
                                    </p>
                                    <p>
                                        <span class="text-gray">
                                            <?php echo e($item->car_number ?? "Vehicle Not Assigned"); ?>

                                        </span>
                                    </p>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>

            <div class="col-lg-12">

                <div class="nav-tabs-custom box-profile">

                    <div class="tab-content">

                        <div class="active tab-pane" id="timeline">

                            <div class="box p-15">
                                <div class="timeline timeline-single-column" style="max-width: max-content;">
                                    <?php $__currentLoopData = $trips; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trip): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                        <div class="timeline-item">
                                            <div class="timeline-point">
                                                <i class="fa fa-star text-yellow"></i>
                                            </div>
                                            
                                            <div class="timeline-event p-10">
                                                <div class="post">
                                                    <div class="user-block">

                                                        <img class="img-bordered-sm rounded-circle"
                                                            src="<?php echo e($trip->userDetail->profile_picture ?: asset('/assets/img/user-dummy.svg')); ?>"
                                                            alt="user image">

                                                        <span class="username">
                                                            <a href="#"><?php echo e($trip->userDetail->name); ?></a>
                                                            <?php echo e($trip->requestDetail->request_number); ?>

                                                        </span>
                                                        <span
                                                            class="description"><?php echo e($trip->created_at->diffForHumans() ?? ''); ?></span>
                                                        <p style="position: absolute;right: 15px;top: 15px;">
                                                            <?php echo e($trip->created_at->format('d-M-Y')); ?></p>
                                                    </div>

                                                    <div class="activitytimeline">
                                                        <p>
                                                            <b>  <?php echo app('translator')->get('view_pages.pickup_address'); ?>:</b>
                                                            
                                                            <span class="text-gray">
                                                                <?php echo e($trip->requestDetail->requestPlace->pick_address); ?>

                                                            </span>
                                                        </p>
                                                        <p class="mar0"><?php echo e($trip->comment); ?></p>
                                                    <span>
                                                        <?php $rating = $trip->rating; ?>
                                                        <?php $__currentLoopData = range(1, 5); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <span class="fa-stack" style="width:1em">
                                                                <?php if($rating > 0): ?>
                                                                    <?php if($rating > 0.5): ?>
                                                                        <i class="fa fa-star checked"
                                                                            style="color: yellow"></i>
                                                                    <?php else: ?>
                                                                        <i class="fa fa-star-half-o"
                                                                            style="color: yellow"></i>
                                                                    <?php endif; ?>
                                                                <?php else: ?>

                                                                    <i class="fa fa-star-o " style="color: yellow"></i>
                                                                <?php endif; ?>

                                                                <?php $rating--; ?>
                                                            </span>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        
                                                    </span>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>




                                    <span class="timeline-label">
                                        <button class="btn btn-danger"><i class="fa fa-clock-o"></i></button>
                                    </span>

                                     <div class="text-right">
                <span  style="float:right">
                <?php echo e($trips->links()); ?>

                </span>
                </div>
                                </div>


                            </div>
                        </div>


                    </div>

           
                </div>

            </div>


        </div>


    </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\taxi\resources\views/admin/drivers/driver-rating-view.blade.php ENDPATH**/ ?>