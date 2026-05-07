<!DOCTYPE html>
<html lang="<?php echo e(config('app.locale')); ?>">


<head>
    <meta charset="utf-8" />

    <meta dir="rtl" lang="ar">

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta http-equiv="x-pjax-version" content="<?php echo e(mix('/css/app.css')); ?>">
    <title><?php echo e(app_name() ?? 'Clust'); ?> - Admin App</title>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <meta content="Tag your clust Admin portal, helps to manage your fleets and trip requests" name="description" />
    <meta content="Clust" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <meta name="theme-color" content="#0B4DD8">


    <!-- App favicon -->
    <link rel="shortcut icon" href="<?php echo e(fav_icon() ?? asset('assets/images/favicon.ico')); ?>">


    <?php echo $__env->make('admin.layouts.common_styles', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->yieldContent('extra-css'); ?>
</head>

<body class="hold-transition skin-blue sidebar-mini fixed" dir="<?php echo e((App::isLocale('ar') ? 'rtl' : 'ltr')); ?>">

    <!-- Begin page -->
    <div class="wrapper skin-blue-light">
        <!-- Navigation -->
        <?php echo $__env->make('admin.layouts.topnavbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php echo $__env->make('admin.layouts.navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="content-wrapper">
            <!-- Page wrapper -->
            <?php echo $__env->make('admin.layouts.common_scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <!-- Main view  -->
            <?php echo $__env->yieldContent('content'); ?>

        </div>
        <!-- Footer -->

    </div>

    <?php echo $__env->yieldContent('extra-js'); ?>

</body>

</html>
<?php /**PATH C:\laragon\www\taxi\resources\views/admin/layouts/app.blade.php ENDPATH**/ ?>