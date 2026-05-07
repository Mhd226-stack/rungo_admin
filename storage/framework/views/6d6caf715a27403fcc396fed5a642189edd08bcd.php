


<!-- Toastr css -->


<!-- Top Bar Start  #0B4DD8 -->
<style>
    :root{
    --top_nav: <?php echo e($navs -> value); ?>;
    --side_menu: <?php echo e($side -> value); ?>;
    --side_menu_txt: <?php echo e($side_txt -> value); ?>;
}
.skin-blue .main-header .navbar {
    background-color:var(--top_nav);
}
.skin-blue .main-header .logo {
    background-color: var(--top_nav);
    color: #ffffff;
    border-bottom: 0 solid transparent;
}

.skin-blue-light .sidebar a {
    color: var(--side_menu_txt);
}

.skin-blue-light .sidebar a:hover {
    text-decoration: none;
}

.skin-blue-light .sidebar-menu .treeview-menu>li>a {
    color: var(--side_menu_txt);
}

.skin-blue .main-header .logo:hover {
    background-color: var(--top_nav);
}
.skin-blue .sidebar {
    border-color: var(--top_nav);
}
.skin-blue .sidebar-menu>li:hover>a {
    color: var(--top_nav);
    background-color: transparent;
}
.skin-blue .sidebar-menu>li.active>a,
.skin-blue .sidebar-menu>li.menu-open>a {
    color: #ffffff;
    background: var(--top_nav);
}
.skin-blue .sidebar-menu>li.active>a {
    border-left-color: var(--top_nav);
}
.skin-blue.layout-top-nav .main-header>.logo {
    background-color: var(--top_nav);
    color: #ffffff;
    border-bottom: 0 solid transparent;
}

.skin-blue.layout-top-nav .main-header>.logo:hover {
    background-color: var(--top_nav);
}

.skin-blue .btn-blue {
    background-color: var(--top_nav);
    color: #fff;
    border: 1px solid var(--top_nav);
}

.skin-blue .btn-blue:hover {
    background-color: #fff;
    color: var(--top_nav);
    color: var(--top_nav);
    color: var(--top_nav);
}

.horizontal-menu .skin-blue.layout-top-nav .sidebar-menu>li.active>a {
    background: var(--top_nav);
    color: #fff;
}

.skin-blue .main-header .messages-menu .dropdown-toggle i::after,
.skin-blue .main-header .notifications-menu .dropdown-toggle i::after,
.skin-blue .main-header .tasks-menu .dropdown-toggle i::after {
    border-color: var(--top_nav);
}


/*---Skin: Blue light---*/


/*---light sidebar---*/

.skin-blue-light .main-header .navbar {
    background-color: var(--top_nav);
}
@media (max-width: 767px) {
    .skin-blue-light .main-header .navbar .dropdown-menu li.divider {
        background-color: rgba(255, 255, 255, 0.1);
    }
    .skin-blue-light .main-header .navbar .dropdown-menu li a:hover {
        background: var(--top_nav);
    }
}
.skin-blue-light .sidebar {
    border-color: var(--top_nav);
}
.skin-blue-light .sidebar-menu>li.active>a {
    border-left-color: var(--top_nav);
}
.skin-blue-light.layout-top-nav .main-header>.logo {
    background-color:var(--top_nav);
    color: #ffffff;
    border-bottom: 0 solid transparent;
}

.skin-blue-light.layout-top-nav .main-header>.logo:hover {
    background-color:var(--top_nav);
}

.skin-blue-light .btn-blue {
    background-color:var(--top_nav);
    color: #fff;
    border: 1px solidvar(--top_nav);
}

.skin-blue-light .btn-blue:hover {
    background-color: #fff;
    color:var(--top_nav);
    color:var(--top_nav);
    color:var(--top_nav);
}

.horizontal-menu .skin-blue-light.layout-top-nav .sidebar-menu>li.active>a {
    background:var(--top_nav);
    color: #fff;
}

.skin-blue-light .main-header .messages-menu .dropdown-toggle i::after,
.skin-blue-light .main-header .notifications-menu .dropdown-toggle i::after,
.skin-blue-light .main-header .tasks-menu .dropdown-toggle i::after {
    border-color:var(--top_nav);
}
</style>

<header class="main-header">
    <!-- Logo -->
    <a href="#" class="logo">
        <!-- mini logo -->
        <b class="logo-mini">
             <span class="light-logo" style="display: flex;align-items: end;"><img
                     src="<?php echo e(app_logo() ?? asset('images/email/logo.svg')); ?>" style="width: 40px;padding-right: 5px;"
                     alt="logo"><?php echo e(app_name() ?? 'Tagxi'); ?></span>

         </b>
         <!-- logo-->
         <!--  <span class="logo-lg">
             <img src="<?php echo e(app_logo() ?? asset('assets/images/logo-light-text.png')); ?>" alt="logo" class="light-logo">
             <img src="<?php echo e(app_logo() ?? asset('assets/images/logo-dark-text.png')); ?>" alt="logo" class="dark-logo">
         </span> -->
    </a>
    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->

        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only"><?php echo app('translator')->get('view_pages.toggle_navigation'); ?></span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">

            <li class="dropdown notifications-menu">
                    
                </li>
                <li class="dropdown notifications-menu">
                    <a href="<?php echo e(url('dashboard')); ?>" class="dropdown-toggle" data-toggle="dropdown">
                        <span class="sosicon"> <?php echo app('translator')->get('view_pages.sos_request'); ?></span>
                        
                        
                    </a>
                    <ul class="dropdown-menu scale-up sosList">

                    </ul>
                    <ul class="dropdown-menu scale-up tripList">

                    </ul>
                </li>
                <li class="dropdown notifications-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="mdi mdi-google-translate"></i>
                    </a>
                    <ul class="dropdown-menu scale-up">
                        <?php
                            $translations = \DB::table('ltm_translations')->groupBy('locale')->get();

                        ?>



                        <?php $__currentLoopData = $translations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $translation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <a class="<?php echo e($translation->locale == session()->get('applocale') ? 'hover-blue' : ''); ?> dropdown-item chooseLanguage"
                                   href="#" data-value="<?php echo e($translation->locale); ?>">
                                <li class="header">
                                    <?php echo e(ucfirst($translation->locale )); ?>

                                </li>
                            </a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        <!--       <?php $__currentLoopData = config('app.app_lang'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <a class="<?php echo e($k == session()->get('applocale') ? 'hover-blue' : ''); ?> dropdown-item chooseLanguage"
                                 href="#" data-value="<?php echo e($k); ?>">
                                 <li class="header">
                                     <?php echo e(ucfirst($v)); ?>

                            </li>
                        </a>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> -->
                    </ul>
                </li>

                <!-- User Account-->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="<?php echo e(auth()->user()->profile_picture ?: asset('/assets/img/user-dummy.svg')); ?>"
                             class="user-image rounded-circle" alt="User Image">
                    </a>
                    <ul class="dropdown-menu scale-up">
                        <!-- User image -->
                        <li class="user-header d-flex">
                            <img src="<?php echo e(auth()->user()->profile_picture ?: asset('/assets/img/user-dummy.svg')); ?>"
                                 class="float-left rounded-circle" alt="User Image">

                            <p class="pt-1 pl-2">
                                <span><?php echo e(auth()->user()->name); ?></span>
                                <small class="mb-5"><?php echo e(auth()->user()->email); ?></small>

                            </p>

                        </li>
                        <!-- Menu Body -->
                        <li class="user-body">
                            <div class="row no-gutters">
                                <div class="col-12 text-left">
                                    <a href="<?php echo e(url('admins/profile', auth()->user()->id)); ?>"><i
                                            class="ion ion-person"></i> <?php echo app('translator')->get('pages_names.my_profile'); ?></a>
                                </div>
                                <div role="separator" class="divider col-12"></div>
                                <div class="col-12 text-left">
                                    <a href="<?php echo e(url('api/spa/logout')); ?>" class="logout"><i
                                            class="fa fa-power-off"></i> <?php echo app('translator')->get('pages_names.logout'); ?></a>
                                </div>
                            </div>
                            <!-- /.row -->
                        </li>
                    </ul>
                </li>

            </ul>
        </div>
    </nav>
</header>
<!-- Top Bar End -->
<!-- Control Sidebar -->

<!-- /.control-sidebar -->

<!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
<!-- <div class="control-sidebar-bg"></div> -->
<?php /**PATH C:\laragon\www\taxi\resources\views/admin/layouts/topnavbar.blade.php ENDPATH**/ ?>