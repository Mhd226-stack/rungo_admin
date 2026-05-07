<!DOCTYPE html>
<html lang="<?php echo e(config('app.locale')); ?>">

<head>
    <meta charset="utf-8" />
    <title><?php echo app('translator')->get('view_pages.admin_login'); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <!-- <link rel="shortcut icon" href="<?php echo e(asset('assets/images/favicon.png')); ?>"> -->
    <link rel="shortcut icon" href="<?php echo e(fav_icon() ?? asset('assets/images/favicon.ico')); ?>">

    <!-- Bootstrap 4.0-->
    <link rel="stylesheet" href="<?php echo e(url('assets/vendor_components/bootstrap/dist/css/bootstrap.min.css')); ?>">

    <!-- Bootstrap extend-->
    <link rel="stylesheet" href="<?php echo e(url('assets/css/bootstrap-extend.css')); ?>">

    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo e(url('assets/css/master_style.css')); ?>">

    <!-- Fab Admin skins -->
    <link rel="stylesheet" href="<?php echo e(url('assets/css/skins/_all-skins.css')); ?>">
    <style>
        .error-style {
            list-style: none;
            color: red;
            text-align: center;
            margin-top: 15%;
            padding: 0;
        }

        body {
         
            background-image:linear-gradient(90deg, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.8)), url(assets/images/ClustAppWhatsappBannerblank.png) !important;
            background-size: cover !important;
        }

    </style>
</head>

<body class="hold-transition login-page">

    <div class="container h-p100">
        <div class="row align-items-center justify-content-md-center h-p100">

            

            <div class="col-lg-4 col-md-8 col-12">
                <div class="login-box">
                    <div class="login-box-body text-center">
                        <img src="<?php echo e(fav_icon() ?? asset('images/favicon.png')); ?>" alt="">
                        <h3 class="text-center"><?php echo app('translator')->get('view_pages.admin_panel'); ?></h3>
                        <p class="login-box-msg"></p>
                        <!-- action="<?php echo e(url('api/spa/login')); ?>" method="post" -->
                        <form class="login_form" id="form" enctype="multipart/form-data">
                            <div class="col-12 form-group has-feedback"
                                style="display:flex;margin-bottom:15px;background: #fff;padding: 0px;">
                                <!-- <div class="col-md-2 float-left text-center"> -->
                                <!-- <span class="ion ion-email form-control-feedback"></span>
                        </div> -->
                        <div class="print-error-msg" style="position: absolute;right: 0;left: 0;">
                            <ul class="error-style"></ul>
                        </div>

                                <div class="col-md-11 mx-auto p-0 login-email">
                                    <input type="email" style="border-radius:none;" class="form-control rounded"
                                        name="email" id="emailaddress" required="" placeholder="Email" maxlength="74"
                                        data-validation="required length email" data-validation-length="8-74"
                                        data-validation-error-msg-email="Please enter valid email address">
                                </div>
                                <span class="text-danger"><?php echo e($errors->first('email')); ?></span>
                            </div>

                            <div class="col-12 form-group has-feedback"
                                style="display:flex;margin-bottom:10px;background: #fff;padding: 0px;">
                                <!-- <div class="col-md-2 float-left text-center">
                           <span class="ion ion-locked form-control-feedback"></span>
                      </div> -->
                                <div class="col-md-11 mx-auto text-center p-0 login-email">
                                    <input type="password" name="password" style="border-radius:none;" required=""
                                        id="password" class="form-control rounded" placeholder="Password" maxlength="30"
                                        data-validation="required length" data-validation-length="8-30"
                                        data-validation-error-msg-length="Password should have atleast 8 characters.">
                                </div>
                                <span class="text-danger"><?php echo e($errors->first('password')); ?></span>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="checkbox">
                                        <input type="checkbox" id="basic_checkbox_1">
                                        <label for="basic_checkbox_1"><?php echo app('translator')->get('view_pages.remember_me'); ?></label>
                                    </div>
                                </div>
                                <div class="col-6">
                                   <span> <a href="<?php echo e(url('forgot_password')); ?>"><?php echo app('translator')->get('view_pages.forgot_password'); ?></a></span>
                                </div>

                                <!-- /.col -->
                                <div class="col-12 text-center login-btn">
                                    <button class="btn btn-info btn-block margin-top-10 submit_button"
                                        type="submit"><?php echo app('translator')->get('view_pages.sign_in'); ?></button>
                                </div>
                                <!-- /.col -->
                            </div>
                        </form>

                    </div>
                    <!-- /.login-box-body -->
                </div>
                <!-- /.login-box -->

            </div>


        </div>
    </div>

    <!-- jQuery 3 -->
    <script src="<?php echo e(url('assets/vendor_components/jquery/dist/jquery.min.js')); ?>"></script>


    <!-- Bootstrap 4.0-->
    <script src="<?php echo e(url('assets/vendor_components/bootstrap/dist/js/bootstrap.min.js')); ?>"></script>

    <!-- App js -->
    <script src="<?php echo e(asset('assets/js/jquery.form-validator.js')); ?>"></script>
    <script src="<?php echo e(asset('js/login.js')); ?>"></script>
    <?php if (session()->has('success')) {
    $alertMessage = session()->get('success'); ?>
    <script>
        var alertMessage = "<?php echo $alertMessage; ?>";

        //alert(alertMessage);
        $.toast({
            heading: '',
            text: alertMessage,
            position: 'top-right',
            loaderBg: '#5ba035',
            icon: 'success',
            hideAfter: 5000,
            stack: 1
        });

    </script>
    <?php
    } ?>

</body>

</html>
<?php /**PATH C:\laragon\www\taxi\resources\views/admin/login.blade.php ENDPATH**/ ?>