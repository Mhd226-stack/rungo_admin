<?php $__env->startSection('title', 'Admin'); ?>

<section>
    <div class="container py-12 mt-10">
        <div class="row">
            <div class="col-md-12 m-auto text-justify">
                <?php if($data): ?>
                  <?php echo $data->privacy; ?>   
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<?php echo $__env->make('admin.layouts.web_footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('admin.layouts.web_header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\taxi\resources\views/webfront/privacy.blade.php ENDPATH**/ ?>