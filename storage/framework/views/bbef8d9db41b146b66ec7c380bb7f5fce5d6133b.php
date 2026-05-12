                            <div class="col-12">
                                <div class="box">           
                                   <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th> <?php echo app('translator')->get('view_pages.s_no'); ?></th>
                                            <th> <?php echo app('translator')->get('view_pages.name'); ?></th>
                                            <th> <?php echo app('translator')->get('view_pages.mobile'); ?></th>
                                            <th> <?php echo app('translator')->get('view_pages.type'); ?></th>
                                        <?php if(auth()->user()->can('view-driver-rating')): ?>         
                                            <th> <?php echo app('translator')->get('view_pages.rating'); ?></th>
                                        <?php endif; ?>                                            <th> <?php echo app('translator')->get('view_pages.action'); ?></th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        

                                        <?php $__empty_1 = true; $__currentLoopData = $results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                                        <tr>
                                            <td><?php echo e($key+1); ?> </td>
                                            <td><?php echo e($result->name); ?></td>
                                            <?php if(env('APP_FOR')=='demo'): ?>
                                            <td>**********</td>
                                            <?php else: ?>
                                            <td><?php echo e($result->mobile); ?></td>
                                            <?php endif; ?>                                           
                                            <?php if($result->vehicleType): ?>
                                            <td><?php echo e($result->vehicleType->name); ?></td>
                                            <?php else: ?>
                                            <td>
                                            <?php $__currentLoopData = $result->driverVehicleTypeDetail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vehicleType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php echo e($vehicleType->vehicleType->name.','); ?>

                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </td>
                                            <?php endif; ?>                                           
                                           <td>
                                          <?php $rating = $result->rating($result->user_id); ?>  

                                                    <?php $__currentLoopData = range(1,5); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <span class="fa-stack" style="width:1em">
                                                           

                                                            <?php if($rating > 0): ?>
                                                                <?php if($rating > 0.5): ?>
                                                                    <i class="fa fa-star checked"></i>
                                                                <?php else: ?>
                                                                    <i class="fa fa-star-half-o"></i>
                                                                <?php endif; ?>
                                                    <?php else: ?>


                                                             <i class="fa fa-star-o "></i>
                                                            <?php endif; ?>
                                                            <?php $rating--; ?>
                                                        </span>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 

                                        </td>
                                        <td> <a href="<?php echo e(url('driver-ratings/view',$result->id)); ?>" class="btn btn-primary btn-sm"><?php echo app('translator')->get('view_pages.view'); ?></a></td>

                                        
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

             <div class="text-right">
                <span  style="float:right">
                <?php echo e($results->links()); ?>

                </span>
            </div>
        </div>
    </div><?php /**PATH C:\laragon\www\taxi\resources\views/admin/drivers/_driver-ratings.blade.php ENDPATH**/ ?>