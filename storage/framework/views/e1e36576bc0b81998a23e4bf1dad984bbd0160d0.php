<?php $__env->startSection('title', 'Driver Document'); ?>

<?php $__env->startSection('content'); ?>

<section class="content">
<div class="row">
    <div class="col-12">
        <div class="box">
            <div class="box-header with-border">
                <div class="row text-right">
                    
                    <?php if(auth()->user()->can('add-driver-needed-document')): ?>         
                    <div class="col-12 text-right">
                        <a href="<?php echo e(url('needed_doc/create')); ?>" class="btn btn-primary btn-sm">
                            <i class="mdi mdi-plus-circle mr-2"></i><?php echo app('translator')->get('view_pages.add_needed_doc'); ?></a>
                    </div>
                    <?php endif; ?>
                </div>
            </div>

        <div id="js-needed_doc-partial-target">
            <include-fragment src="needed_doc/fetch">
                <span style="text-align: center;font-weight: bold;"> <?php echo app('translator')->get('view_pages.loading'); ?></span>
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
            $('#js-needed_doc-partial-target').html(data);
        });
    });

    $('#search').on('click', function(e){
        e.preventDefault();
            var search_keyword = $('#search_keyword').val();
            console.log(search_keyword);
            fetch('needed_doc/fetch?search='+search_keyword)
            .then(response => response.text())
            .then(html=>{
                document.querySelector('#js-needed_doc-partial-target').innerHTML = html
            });
    });

});
</script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\taxi\resources\views/admin/master/needed_doc/index.blade.php ENDPATH**/ ?>