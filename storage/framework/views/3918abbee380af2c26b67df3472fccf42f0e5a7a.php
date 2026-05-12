<?php $__env->startSection('title', 'Users'); ?>

<?php $__env->startSection('content'); ?>

<section class="content">
<div class="row">
    <div class="col-12">
        <div class="box">
            <div class="box-header with-border">
                <div class="row text-right">
                     <div class="col-2">
                        <div class="form-group">
                            <input type="text" id="search_keyword" name="search" class="form-control" placeholder="Enter keyword">
                        </div>
                    </div>

                    <div class="col-1">
                        <button class="btn btn-success btn-outline btn-sm mt-5" id="search" type="submit">
                            <?php echo app('translator')->get('view_pages.search'); ?>
                        </button>
                    </div> 

                    <!-- <div class="col-12 text-right">
                        <a href="<?php echo e(url('country/create')); ?>" class="btn btn-primary btn-sm">
                            <i class="mdi mdi-plus-circle mr-2"></i><?php echo app('translator')->get('view_pages.add'); ?></a>
                    </div> -->
                </div>
            </div>

        <div id="js-country-partial-target">
            <include-fragment src="country/fetch">
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
            $('#js-country-partial-target').html(data);
        });
    });

    $('#search').on('click', function(e){
        e.preventDefault();
            var search_keyword = $('#search_keyword').val();
            console.log(search_keyword);
            fetch('country/fetch?search='+search_keyword)
            .then(response => response.text())
            .then(html=>{
                document.querySelector('#js-country-partial-target').innerHTML = html
            });
    });

});
</script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\taxi\resources\views/admin/master/country/index.blade.php ENDPATH**/ ?>