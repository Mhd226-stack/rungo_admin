<?php $__env->startSection('title', 'Driver Document'); ?>

<?php $__env->startSection('content'); ?>
<style>
    .fas {
        padding: 12px 13px;
        background: rgba(85, 110, 230, 0.3);
        color: rgb(85, 110, 230);
        font-size: 15px;
        border-radius: 50%;
        cursor: pointer;
    }
    .text-red {
        color: red;
    }
</style>
<!-- Start Page content -->
<section class="content">

<div class="row">
<div class="col-12">
<div class="box">

    <div class="box-header with-border">
        <a href="<?php echo e(url()->previous()); ?>">
            <button class="btn btn-danger btn-sm pull-right" type="submit">
                <i class="mdi mdi-keyboard-backspace mr-2"></i>
                <?php echo app('translator')->get('view_pages.back'); ?>
            </button>
        </a>
    </div>

    <div class="box-body no-padding">
        <div class="table-responsive">
        <form action="#" method="post">
            <?php echo csrf_field(); ?>
          <table class="table table-hover">
            <thead>
                <tr>
                    <th> <?php echo app('translator')->get('view_pages.s_no'); ?></th>
                    <th> <?php echo app('translator')->get('view_pages.driver_name'); ?></th>
                    <th> <?php echo app('translator')->get('view_pages.document_name'); ?></th>
                    <th> <?php echo app('translator')->get('view_pages.expiry_date'); ?></th>
                    <th> <?php echo app('translator')->get('view_pages.status'); ?></th>
                    <th> <?php echo app('translator')->get('view_pages.comment'); ?></th>
                    <th> <?php echo app('translator')->get('view_pages.action'); ?></th>
                    <th> <?php echo app('translator')->get('view_pages.approval_action'); ?></th>

                </tr>
            </thead>

            <tbody>
                <?php $i = 1; ?>
                <?php $__empty_1 = true; $__currentLoopData = $neededDocument; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <?php
                        $count=0;
                        $expiry_date="-";
                        $driver_doc_id="";
                        $doc_comment = '-';
                        $doc_status = '';
                    ?>
                    <?php $__currentLoopData = $driverDoc; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doc_dets): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($doc_dets->document_id == $item->id): ?>
                            <?php
                                $count++;
                                $expiry_date = $doc_dets->expiry_date;
                                $driver_doc_id = $doc_dets->id;
                                $doc_status = $doc_dets->document_status;
                                $doc_comment = $doc_dets->comment;
                                 $docImage=$doc_dets->image;
                                // dd($docImage);
                            ?>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <input type="hidden" name="driver_id" class="driver_id" value="<?php echo e($driver->id); ?>">
                    <input type="hidden" name="document_id[]" class="document_id" value="<?php echo e($driver_doc_id); ?>">
                    <input type="hidden" name="document_status[]" class="document_status" value="<?php echo e($doc_status); ?>">
                    <input type="hidden" name="comment[]" class="comment" value="<?php echo e($doc_comment); ?>">

                    <td><?php echo e($i++); ?></td>
                    <td>
                        <?php echo e($driver->name); ?>

                    </td>
                    <td>
                        <?php echo e($item->name); ?>

                    </td>
                    <td><?php echo e($expiry_date); ?></td>
                    <td>
                        <?php if($count == 0): ?>
                            <span class="badge badge-danger"><?php echo app('translator')->get('view_pages.not_uploaded'); ?></span>
                        <?php else: ?>
                            <?php if($doc_status == 1): ?>
                                <span class="badge badge-success"><?php echo e(driver_document_name($doc_status)); ?></span>
                            <?php elseif($doc_status == 5): ?>
                                <span class="badge badge-danger"><?php echo e(driver_document_name($doc_status)); ?></span>
                            <?php else: ?>
                                <span class="badge badge-warning"><?php echo e(driver_document_name($doc_status)); ?></span>
                            <?php endif; ?>
                        <?php endif; ?>
                    </td>


                    <td class="comment_td">
                        <?php echo e($doc_comment ?? '-'); ?>

                    </td>

                     <td>
                        <?php if($count == 0): ?>
                            <a href="<?php echo e(url('drivers/upload/document',[$driver->id,$item->id])); ?>" class="fas fa fa-upload"></a>
                        <?php else: ?>
                            <a href="#" class="open-image"  title="View Image">
                                <i class="imageresource fas fa fa-file-image-o" data-src="<?php echo e($docImage); ?>"></i>
                            </a>
                            
                            <a href="<?php echo e(url('drivers/upload/document',[$driver->id,$item->id])); ?>" class="fas fa fa-edit"></a>
                            
                        <?php endif; ?>
                    </td>


                     <td>
                        <?php if($count == 0): ?>
                           <!--  <span class="badge badge-danger"><?php echo app('translator')->get('view_pages.not_uploaded'); ?></span> -->
                           -
                        <?php else: ?>
                            

                            <span class="btn btn-sm btn-success btn-outline approve"><?php echo app('translator')->get('view_pages.approve'); ?></span>
                            <span class="btn btn-sm  btn-outline btn-danger decline"><?php echo app('translator')->get('view_pages.decline'); ?></span>

                        <?php endif; ?>
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

        <div class="form-group">
            <div class="col-12">
                <button class="btn btn-primary btn-sm pull-right m-5" id="approveDocument" type="button">
                    <?php echo app('translator')->get('view_pages.update'); ?>
                </button>
            </div>
        </div>
    </form>

    <div class="text-right">
    <span  style="float:right">
    
    </span>
    </div>
    </div>
    </div>

</div>
</div>
</div>
</section>

<div class="modal fade bd-example-modal-lg" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" style="width: fit-content;">
        <div class="modal-content">
            <div class="modal-body">
                <img src="" class="imagepreview" style="height: 80vh;">
            </div>
            <div class="modal-footer">
                <button type="button" data-bs-dismiss="modal" class="btn btn-danger btn-sm float-right">Close</button>
                <a href="" class="downloadImage" download>
                    <button type="button" class="btn btn-success btn-sm float-right mr-2">Download</button>
                </a>
            </div>
        </div>
    </div>
</div>


<script>
     $(document).on('click','.open-image',function(){
        let image = $(this).find('.imageresource').attr('data-src');
        console.log(image);
        $('.imagepreview').attr('src', image);
        $('.downloadImage').attr('href',image);
        $('#imagemodal').modal('show');
    });

$(document).on('click','.decline',function(){
    var button = $(this);
    var inpVal = button.closest('tr').find('.comment_td').text().trim();

    if(inpVal == '-'){
        inpVal = '';
    }

    swal({
        title: "",
        text: "Add A Comment For Your Action",
        type: "input",
        showCancelButton: true,
        closeOnConfirm: false,
        confirmButtonText: 'Decline',
        cancelButtonText: 'Cancel',
        confirmButtonColor: '#fc4b6c',
        confirmButtonBorderColor: '#fc4b6c',
        animation: "slide-from-top",
        inputPlaceholder: "Enter Comment for Decline",
        inputValue: inpVal
    },
    function(inputValue){
        if (inputValue === false) return false;

        if (inputValue === "") {
            swal.showInputError("Reason is required!");
            return false
        }

        button.prev().text('Approve');

        if(!button.prev().hasClass('btn-outline')){
            button.prev().addClass('btn-outline')
        }

        button.text('Declined');
        button.removeClass('btn-outline');
        button.closest('tr').find('.comment_td').text(inputValue);
        button.closest('tr').find('.comment').val(inputValue);
        button.closest('tr').find('.document_status').val(5);

        swal.close();
    });
});

$(document).on('click','.approve',function(){
    let span = $(this);

    span.text('Approved');
    span.removeClass('btn-outline');
    span.closest('tr').find('.comment_td').text('-');
    span.next().text('Decline');
    span.closest('tr').find('.comment').val('');
    span.closest('tr').find('.document_status').val(1);

    if(!span.next().hasClass('btn-outline')){
        span.next().addClass('btn-outline');
    }

});

$(document).on('click','#approveDocument',function(){
    var url = "<?php echo e(url('drivers')); ?>";

    $.ajax({
        url: '<?php echo e(route("approveDriverDocument")); ?>',
        data: $('form').serialize(),
        method: 'post',
        success: function(res){
            if(res == 'success'){
                window.location.href = url;
            }
        }
    });
});

</script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\taxi\resources\views/admin/drivers/documents/index.blade.php ENDPATH**/ ?>