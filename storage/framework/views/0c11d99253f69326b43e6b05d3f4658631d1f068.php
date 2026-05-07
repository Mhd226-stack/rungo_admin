<div class="box-body no-padding">
    <div class="table-responsive">
      <table class="table table-hover">
<thead>
<tr>


<th> <?php echo app('translator')->get('view_pages.s_no'); ?>
<span style="float: right;">

</span>
</th>

<th> <?php echo app('translator')->get('view_pages.name'); ?>
<span style="float: right;">
</span>
</th>
<!-- <th> <?php echo app('translator')->get('view_pages.tansport_type'); ?>
<span style="float: right;">
</span>
</th> -->
 <th> <?php echo app('translator')->get('view_pages.icon_types_for'); ?>
    <span style="float: right;">
    </span>
</th>
<th> <?php echo app('translator')->get('view_pages.icon'); ?>
<span style="float: right;">
</span>
</th>
<th> <?php echo app('translator')->get('view_pages.status'); ?>
<span style="float: right;">
</span>
</th>
<?php if(!auth()->user()->company_key): ?>
<th> <?php echo app('translator')->get('view_pages.action'); ?>
<span style="float: right;">
</span>
</th>
<?php endif; ?>
</tr>
</thead>
<tbody>
 <?php if(count($results)<1): ?>
    <tr>
        <td colspan="11">
        <p id="no_data" class="lead no-data text-center">
        <img src="<?php echo e(asset('assets/img/dark-data.svg')); ?>" style="width:150px;margin-top:25px;margin-bottom:25px;" alt="">
     <h4 class="text-center" style="color:#333;font-size:25px;"><?php echo app('translator')->get('view_pages.no_data_found'); ?></h4>
 </p>
    </tr>
    <?php else: ?>

<?php  $i= $results->firstItem(); ?>

<?php $__currentLoopData = $results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<tr>
<td><?php echo e($i++); ?> </td>
<td> <?php echo e($result->name); ?></td>


<!-- <td>  <?php if($result->is_taxi == 'taxi' ): ?>
                        <?php echo e("Taxi"); ?>

                    <?php else: ?>
                        <?php echo e("Delivery"); ?>

                    <?php endif; ?>
</td> -->
  <td> <?php if($result->icon_types_for == 'taxi' ): ?>
                                <?php echo e("Taxi"); ?>

                            <?php elseif($result->icon_types_for == 'truck' ): ?>
                                <?php echo e("Truck"); ?>

                                <?php else: ?>
                                <?php echo e("Motor Bike"); ?>

                            <?php endif; ?></td>


<td><img class="img-circle" src="<?php echo e(asset($result->icon)); ?>" alt=""></td>
<?php if($result->active): ?>
<td><button class="btn btn-success btn-sm"><?php echo app('translator')->get('view_pages.active'); ?></button></td>
<?php else: ?>
<td><button class="btn btn-danger btn-sm"><?php echo app('translator')->get('view_pages.inactive'); ?></button></td>
<?php endif; ?>
<?php if(!auth()->user()->company_key): ?>
<td>

<button type="button" class="btn btn-info dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo app('translator')->get('view_pages.action'); ?>
</button>

    <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 35px, 0px); top: 0px; left: 0px; will-change: transform;">
    <!-- <?php if(auth()->user()->can('edit-vehicle-types')): ?>          -->
        <a class="dropdown-item" href="<?php echo e(url('types/edit',$result->id)); ?>"><i class="fa fa-pencil"></i><?php echo app('translator')->get('view_pages.edit'); ?></a>
<!--     <?php endif; ?>
     <?php if(auth()->user()->can('toggle-vehicle-types')): ?>     -->     

        <?php if($result->active): ?>
            <a class="dropdown-item" href="<?php echo e(url('types/toggle_status',$result->id)); ?>">
            <i class="fa fa-dot-circle-o"></i><?php echo app('translator')->get('view_pages.inactive'); ?></a>
        <?php else: ?>
            <a class="dropdown-item" href="<?php echo e(url('types/toggle_status',$result->id)); ?>">
            <i class="fa fa-dot-circle-o"></i><?php echo app('translator')->get('view_pages.active'); ?></a>
        <?php endif; ?>
    <!-- <?php endif; ?> -->
       <!--  <a class="dropdown-item sweet-delete" href="#" data-url="<?php echo e(url('types/delete',$result->id)); ?>"><i class="fa fa-trash-o"></i><?php echo app('translator')->get('view_pages.delete'); ?></a> -->
    </div>

</td>
<?php endif; ?>
</tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
</tbody>
</table>
<div class="text-right">
<span  style="float:right">
<?php echo e($results->links()); ?>

</span>
</div></div></div>
<?php /**PATH C:\laragon\www\taxi\resources\views/admin/types/_types.blade.php ENDPATH**/ ?>