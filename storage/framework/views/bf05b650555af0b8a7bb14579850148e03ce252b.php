<?php $__env->startSection('title', 'Admin Profile'); ?>
<?php $__env->startSection('content'); ?>

<section class="content">

    <div class="row">
      <div class="col-12">
        <!-- Profile Image -->
        <div class="box">
          <div class="box-body box-profile">
            <div class="row">
                <div class="col-md-4 col-12">
                    <div class="profile-user-info">
                      <p><?php echo app('translator')->get('view_pages.email'); ?> :<span class="text-gray pl-10"><?php echo e($user->email); ?></span> </p>
                      <p><?php echo app('translator')->get('view_pages.mobile'); ?> :<span class="text-gray pl-10"><?php echo e($user->mobile); ?></span></p>
                      <p><?php echo app('translator')->get('view_pages.address'); ?> :<span class="text-gray pl-10"><?php echo e($user->admin ? $user->admin->address : ''); ?></span></p>
                  </div>
               </div>
                <div class="col-md-3 col-12">
                    
               </div>
                <div class="col-md-5 col-12">
                    <div class="profile-user-info">
                      <div class="map-box">
                        <img src="<?php echo e($user->profile_picture ?? asset('assets/img/user-dummy.svg')); ?>" class="float-right rounded-circle" alt="" style="max-width: 25%;">
                      </div>
                  </div>
               </div>
            </div>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->


      <div class="col-12">
        <div class="nav-tabs-custom box-profile">
          <ul class="nav nav-tabs">
            <li><a class="<?php echo e(old('tab','basic_info') == 'basic_info' ? 'active' : ''); ?>" href="#basic_info" data-toggle="tab"><?php echo app('translator')->get('view_pages.basic_information'); ?></a></li>
            <li><a class="<?php echo e(old('tab') == 'manage_password' ? 'active' : ''); ?>" href="#manage_password" data-toggle="tab"><?php echo app('translator')->get('view_pages.manage_password'); ?></a></li>
          </ul>

          <div class="tab-content">

            <div class="<?php echo e(old('tab','basic_info') == 'basic_info' ? 'active' : ''); ?> tab-pane" id="basic_info">
                <form  method="post" class="form-horizontal" action="<?php echo e(url('admins/profile/update',$user->id)); ?>" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                <input type="hidden" name="tab" value="basic_info">
                <div class="box p-15">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                            <label for="first_name"><?php echo app('translator')->get('view_pages.name'); ?></label>
                            <input class="form-control" type="text" id="first_name" name="first_name" value="<?php echo e(old('first_name',$user->admin->first_name)); ?>" required="" placeholder="<?php echo app('translator')->get('view_pages.enter_first_name'); ?>">
                            <span class="text-danger"><?php echo e($errors->first('first_name')); ?></span>

                        </div>
                       </div>
                      </div>

                    


                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                            <label for="name"><?php echo app('translator')->get('view_pages.mobile'); ?></label>
                            <input class="form-control" type="text" id="mobile" name="mobile" value="<?php echo e(old('mobile',$user->admin->mobile)); ?>" required="" placeholder="<?php echo app('translator')->get('view_pages.enter_mobile'); ?>">
                            <span class="text-danger"><?php echo e($errors->first('mobile')); ?></span>

                        </div>
                    </div>

                    <div class="col-sm-6">
                            <div class="form-group">
                            <label for="email"><?php echo app('translator')->get('view_pages.email'); ?></label>
                            <input class="form-control" type="email" id="email" name="email" value="<?php echo e(old('email',$user->admin->email)); ?>" required="" placeholder="<?php echo app('translator')->get('view_pages.enter_email'); ?>">
                            <span class="text-danger"><?php echo e($errors->first('email')); ?></span>

                        </div>
                    </div>

                    </div>

                    <div class="form-group">
                        <div class="col-6">
                            <label for="profile_picture"><?php echo app('translator')->get('view_pages.profile'); ?></label><br>
                            <img id="blah" src="<?php echo e($user->profile_picture ?? asset('assets/img/user-dummy.svg')); ?>" class="rounded-circle mb-4" alt="" style="max-width: 25%;"><br>
                            <input type="file" id="profile_picture" onchange="readURL(this)" name="profile_picture" style="display:none">
                            <button class="btn btn-primary btn-sm" type="button" onclick="$('#profile_picture').click()" id="upload"><?php echo app('translator')->get('view_pages.browse'); ?></button>
                            <button class="btn btn-danger btn-sm" type="button" id="remove_img" style="display: none;"><?php echo app('translator')->get('view_pages.remove'); ?></button><br>
                            <span class="text-danger"><?php echo e($errors->first('profile_picture')); ?></span>
                    </div>
                    </div>

                    <div class="form-group">
                        <div class="col-12">
                            <button class="btn btn-primary btn-sm pull-right" type="submit">
                                <?php echo app('translator')->get('view_pages.update'); ?>
                            </button>
                        </div>
                    </div>

                    </div>
                    </form>
                </div>

            <div class="<?php echo e(old('tab') == 'manage_password' ? 'active' : ''); ?> tab-pane" id="manage_password">
                <div class="box p-15">
                    <form  method="post" class="form-horizontal" action="<?php echo e(url('admins/profile/update',$user->id)); ?>" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="tab" value="manage_password">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="password"><?php echo app('translator')->get('view_pages.password'); ?></label>
                                    <input class="form-control" type="password" id="password" name="password" value="" required="" placeholder="<?php echo app('translator')->get('view_pages.enter_password'); ?>">
                                    <span class="text-danger"><?php echo e($errors->first('password')); ?></span>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="password_confrim"><?php echo app('translator')->get('view_pages.confirm_password'); ?></label>
                                    <input class="form-control" type="password" id="password_confirmation" name="password_confirmation" value="" required="" placeholder="<?php echo app('translator')->get('view_pages.enter_password_confirmation'); ?>">
                                    <span class="text-danger"><?php echo e($errors->first('password')); ?></span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-12">
                                <button class="btn btn-primary btn-sm pull-right" name="action" value="password" type="submit">
                                    <?php echo app('translator')->get('view_pages.update'); ?>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.tab-pane -->
          </div>
          <!-- /.tab-content -->
        </div>
        <!-- /.nav-tabs-custom -->
      </div>
      <!-- /.col -->

    </div>
    <!-- /.row -->

  </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\taxi\resources\views/admin/admin/profile.blade.php ENDPATH**/ ?>