<?php $__env->startSection('title', 'Package Type'); ?>

<?php $__env->startSection('content'); ?>

<section class="content">
<div class="row">
    <div class="col-12">
    Note : <span class="text-danger">Do Not Forgot To Set Package Price </span>
        <div class="box">
            <div class="box-header with-border">
                <div class="row text-right">
                    


                    <?php if(auth()->user()->can('add-package-type')): ?>                         
                    <div class="col-12 text-right">
                        <a href="<?php echo e(url('package_type/create')); ?>" class="btn btn-primary btn-sm">
                            <i class="mdi mdi-plus-circle mr-2"></i><?php echo app('translator')->get('view_pages.add_package_type'); ?></a>
                    </div>
                   <?php endif; ?>
                   
                </div>
            </div>

        <div id="js-packageType-partial-target">
            <include-fragment src="package_type/fetch">
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
            $('#js-packageType-partial-target').html(data);
        });
    });

    $('#search').on('click', function(e){
        e.preventDefault();
            var search_keyword = $('#search_keyword').val();
            console.log(search_keyword);
            fetch('package_type/fetch?search='+search_keyword)
            .then(response => response.text())
            .then(html=>{
                document.querySelector('#js-packageType-partial-target').innerHTML = html
            });
    });

});
</script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\taxi\resources\views/admin/master/package_type/index.blade.php ENDPATH**/ ?>