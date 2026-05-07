<?php $__env->startSection('title', 'Main page'); ?>


<?php $__env->startSection('content'); ?>
<br>

<!-- Start Page content -->
 <div class="row">
            <?php $__currentLoopData = $card; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-xl-4 col-md-6 col-12">
                    <div class="box box-body">
                        <h5 class="text-capitalize"><?php echo e($items['display_name']); ?></h5>
                        <div class="flexbox wid-icons mt-2">
                            <span class="<?php echo e($items['icon']); ?> font-size-40"></span>
                            <span class=" font-size-30"><?php echo e($items['count']); ?></span>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>


<div class="content">
<div class="container-fluid">

<div class="row">
<div class="col-sm-12">
    <div class="box">

       

<div class="col-sm-12">

<form  method="post" class="form-horizontal" action="<?php echo e(url('users/payment-history',$item->id)); ?>" enctype="multipart/form-data">
<?php echo e(csrf_field()); ?>



<div class="row">
        <div class="col-sm-6">
            <div class="form-group">
            <label for="amount"><?php echo app('translator')->get('view_pages.amount'); ?> <span class="text-danger">*</span></label>
            <input class="form-control" type="text" id="amount" name="amount" value="<?php echo e(old('amount')); ?>" required="" placeholder="<?php echo app('translator')->get('view_pages.enter_amount'); ?>">
            <span class="text-danger"><?php echo e($errors->first('amount')); ?></span>

        </div>
    </div>

               
</div>


<div class="form-group">
        <div class="col-12">
            <button class="btn btn-primary btn-sm m-5 pull-right" type="submit">
                <?php echo app('translator')->get('view_pages.submit'); ?>
            </button>
        </div>
    </div>

</form>

            </div>
        </div>


    </div>
</div>

 <div class="content">

        <div class="row">
<h5>Wallet History</h5>
            <div class="col-12">
        <div class="box">            
            <table class="table table-hover">
    <thead>
        <tr>
            <th> <?php echo app('translator')->get('view_pages.s_no'); ?></th>
            <th> <?php echo app('translator')->get('view_pages.request_id'); ?></th>
            <th> <?php echo app('translator')->get('view_pages.name'); ?></th>
            <th> <?php echo app('translator')->get('view_pages.transaction_id'); ?></th>
            <th> <?php echo app('translator')->get('view_pages.amount'); ?></th>
            <th> <?php echo app('translator')->get('view_pages.remarks'); ?></th>
            <th> <?php echo app('translator')->get('view_pages.date'); ?></th>
           
        </tr>
    </thead>
    <tbody>

        <?php $__empty_1 = true; $__currentLoopData = $history; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

        <tr>
            <td><?php echo e($key+1); ?> </td>
            <td><?php echo e($result->requestDetail->request_number ?? '-'); ?></td>
            <td><?php echo e($item->name ?? '-'); ?></td>
            <td><?php echo e($result->transaction_id); ?></td>
            <?php if($result->is_credit == 1): ?>
                <td><button class="btn btn-success btn-sm"><?php echo e($result->amount); ?></button></td>
            <?php else: ?>
                 <td><button class="btn btn-danger btn-sm"><?php echo e($result->amount); ?></button></td>
            <?php endif; ?>
            <td><?php echo $result->remarks; ?></td>
            <td><?php echo e($result->getConvertedCreatedAtAttribute()); ?></td>

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


<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\taxi\resources\views/admin/users/user-payment-wallet.blade.php ENDPATH**/ ?>