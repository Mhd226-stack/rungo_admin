<?php $__env->startSection('title', 'Main page'); ?>


<?php $__env->startSection('content'); ?>
<br>
<div class="content">
<div class="container-fluid">

 <div class="content">

        <div class="row">
            <div class="col-12">
        <div class="box">            
            <table class="table table-hover">
    <thead>
        <tr>
            <th> <?php echo app('translator')->get('view_pages.s_no'); ?></th>
            <th> <?php echo app('translator')->get('view_pages.date'); ?></th>
            <th> <?php echo app('translator')->get('view_pages.name'); ?></th>
            <th> <?php echo app('translator')->get('view_pages.mobile'); ?></th>
            <th> <?php echo app('translator')->get('view_pages.requested_amount'); ?></th>
            <th> <?php echo app('translator')->get('view_pages.balance_amount'); ?></th>
            <th> <?php echo app('translator')->get('view_pages.status'); ?></th>
            <th> <?php echo app('translator')->get('view_pages.action'); ?></th>
           
        </tr>
    </thead>
    <tbody>

        <?php $__empty_1 = true; $__currentLoopData = $history; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

        <tr>
            <td><?php echo e($key+1); ?> </td>
            <td><?php echo e($result->getConvertedCreatedAtAttribute()); ?></td>
            <td><?php echo e($result->driverDetail->name); ?></td>
            <?php if(env('APP_FOR')=='demo'): ?>
            <td>**********</td>
            <?php else: ?>
            <td><?php echo e($result->driverDetail->mobile); ?></td>
            <?php endif; ?>
            <td> <?php echo e($result->requested_currency); ?> <?php echo e($result->requested_amount); ?></td>
            <td><?php echo e($result->driverDetail->driverWallet->amount_balance); ?></td>
            <?php if($result->status == 0): ?>
                <td><button class="btn btn-success btn-sm"><?php echo app('translator')->get('view_pages.requested'); ?></button></td>
            <?php elseif($result->status==1): ?>
                 <td><button class="btn btn-danger btn-sm"><?php echo app('translator')->get('view_pages.approved'); ?></button></td>
            <?php else: ?>
                 <td><button class="btn btn-danger btn-sm"><?php echo app('translator')->get('view_pages.declined'); ?></button></td>
            <?php endif; ?>
            <td>
                <div class="dropdown">
<button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo app('translator')->get('view_pages.action'); ?>
</button>
 <div class="dropdown-menu">
        <?php if(auth()->user()->can('driver-withdrwal-request-view')): ?>         
        <a class="dropdown-item" href="<?php echo e(url('withdrawal-requests-lists/view',$result->driverDetail->id)); ?>">
        <i class="fa fa-dot-circle-o"></i><?php echo app('translator')->get('view_pages.view_in_detail'); ?></a>
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
<div class="text-right">
<span  style="float:right">
<?php echo e($history->links()); ?>

</span>
</div>

        </div>
        </div>
        </div>
        </div>

        

       

</div>

</div>
<!-- container -->

</div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\taxi\resources\views/admin/drivers/driver-wallet-withdrawal-requests-list.blade.php ENDPATH**/ ?>