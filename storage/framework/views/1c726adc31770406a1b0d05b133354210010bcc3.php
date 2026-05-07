<?php $__env->startSection('title', 'Users'); ?>

<?php $__env->startSection('content'); ?>

<section class="content">
<div class="row">
    <div class="col-12">
        <div class="box">
            <div class="box-header with-border">
                <div class="row text-right">
                    

                    <?php if(!auth()->user()->company_key): ?>
                        <?php if(auth()->user()->can('add-cancellation')): ?>         
                    <div class="col-12 text-right">
                        <a href="<?php echo e(url('cancellation/create')); ?>" class="btn btn-primary btn-sm">
                            <i class="mdi mdi-plus-circle mr-2"></i><?php echo app('translator')->get('view_pages.add_cancellation_reason'); ?></a>
                    </div>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            </div>

        <div id="js-cancellation-partial-target">
            <include-fragment src="cancellation/fetch">
                <span style="text-align: center;font-weight: bold;"><?php echo app('translator')->get('view_pages.loading'); ?></span>
            </include-fragment>
        </div>

        </div>
    </div>
</div>

<script src="<?php echo e(asset('assets/js/fetchdata.min.js')); ?>"></script>
<script>
    $(function() {
    $('body').on('click', '.pagination a', function(e) {
        e.preventDefault();
        var url = $(this).attr('href');
        $.get(url, $('#search').serialize(), function(data){
            $('#js-cancellation-partial-target').html(data);
        });
    });

    $('#search').on('click', function(e){
        e.preventDefault();
            var search_keyword = $('#search_keyword').val();
            console.log(search_keyword);
            fetch('cancellation/fetch?search='+search_keyword)
            .then(response => response.text())
            .then(html=>{
                document.querySelector('#js-cancellation-partial-target').innerHTML = html
            });
    });

});


$(document).on('click','.sweet-delete',function(){
// $('.sweet-delete').click(function(e){
    button=$(this);
    e.preventDefault();

        swal({
            title: "Are you sure to delete ?",
            type: "error",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Delete",
            cancelButtonText: "No! Keep it",
            closeOnConfirm: false,
            closeOnCancel: true
        }, function(isConfirm){
            if (isConfirm) {
                button.unbind();
                button[0].click();
            }
        });
    });
</script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\taxi\resources\views/admin/cancellation/index.blade.php ENDPATH**/ ?>