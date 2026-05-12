<footer style="background: <?php echo e($data->footerbgcolor); ?> !important;">
  <div class="pt-10 px-5 px-md-10">
    <div class="container-fluid text-white">
      <div class="row pt-md doot">
        <div class="col-lg-4 mb-5 mb-lg-0 p-0">
          <a href="#">
            <img src="<?php echo e(asset($p.$data->footerlogo)); ?>" alt="Footer logo" style="height: 70px;">
          </a>
          <p class="pt-2">
            <?php echo $data->footertextsub; ?>   
            <!--Blue is a rideshare platform facilitating peer to peer ridesharing by means of connecting passengers who are in need of rides from drivers with available cars to get from point A to point B with the press of a button.-->
          </p>
        </div>
        <div class="col-lg-2 col-sm-4 ml-lg-auto mb-5 mb-lg-0">

          <h6 class="heading ml-n5 mb-3">Quick links</h6>
          <ul class="list-unstyled">
            <li><a href="<?php echo e(url('/')); ?>" class="text-white opacity-80">Home</a></li>
            <li><a href="<?php echo e(url('serviceareas')); ?>" class="text-white opacity-80">Service Locations</a></li>
            <li><a href="<?php echo e(url('compliance')); ?>" class="text-white opacity-80">Compliance </a></li>
            <li><a href="<?php echo e(url('contactus')); ?>" class="text-white opacity-80">Contact Us</a></li>
            <li><a href="<?php echo e(url('privacy')); ?>" class="text-white opacity-80">Privacy Policy</a></li>
            <li><a href="<?php echo e(url('terms')); ?>" class="text-white opacity-80">Terms & Conditions</a></li>
          </ul>
        </div>
        <div class="col-lg-2 col-sm-4 mb-5 mb-lg-0">
          <h6 class="heading ml-n5 mb-3">Rider</h6>
          <ul class="list-unstyled">
            <!-- <li><a href="#" class="text-white opacity-80">How it works</a></li>
            <li><a href="#" class="text-white opacity-80">Rider Requirements</a></li> -->
            <li><a href="<?php echo e(url('safety')); ?>" class="text-white opacity-80">Safety</a></li>
          </ul>
          <div class="row">
            <div class="col-md-12 mb-1">
              <a href="<?php echo e(url($data->userioslink)); ?>" target="_blank">
                <img src="<?php echo e(asset($p.$data->playstoreicon1)); ?>" alt="" class="w-50 w-md-75 wow slideInLeft animated" style="visibility: visible;">
              </a>
            </div>
            <div class="col-md-12 mb-1">
              <a href="<?php echo e(url($data->userandroidlink)); ?>" target="_blank">
                <img src="<?php echo e(asset($p.$data->playstoreicon2)); ?>" alt="" class="w-50 w-md-75 wow slideInRight animated" style="visibility: visible;">
              </a>
            </div>
          </div>
        </div>
        <div class="col-lg-2 col-md-4 mb-5 mb-lg-0">
          <h6 class="heading ml-n5 mb-3">Driver</h6>
          <ul class="list-unstyled text-small">
            <li><a href="<?php echo e(url('howdriving')); ?>" class="text-white opacity-80">How it works</a></li>
            <li><a href="<?php echo e(url('driverrequirements')); ?>" class="text-white opacity-80">Driver Requirements</a></li>
            <li><a href="<?php echo e(url('dmv')); ?>" class="text-white opacity-80">DMV check</a></li>
            <li><a href="<?php echo e(url('safety')); ?>" class="text-white opacity-80">Safety</a></li>
          </ul>
          <div class="row">
            <div class="col-md-12 mb-1">
              <a href="<?php echo e(url($data->driverioslink)); ?>" target="_blank">
                <img src="<?php echo e(asset($p.$data->playstoreicon1)); ?>" alt="" class="w-50 w-md-75 wow slideInLeft animated" style="visibility: visible;">
              </a>
            </div>
            <div class="col-md-12 mb-1">
              <a href="<?php echo e(url($data->driverandroidlink)); ?>" target="_blank">
                <img src="<?php echo e(asset($p.$data->playstoreicon2)); ?>" alt="" class="w-50 w-md-75 wow slideInLeft animated" style="visibility: visible;">
              </a>
            </div>
          </div>
        </div>
      </div>
      <div class="row align-items-center justify-content-md-between py-4 mt-4 delimiter-top border-top">
        <div class="col-md-6">
          <div class="copyright font-size-xs text-center text-md-left">
            <?php echo $data->footercopytextsub; ?>

            <!--© 2021 blue, LLC All rights reserved.
            <a href="#" target="blank" class="text-dark">
              Powered By Blue
            </a>-->
          </div>
        </div>
        <div class="col-md-6">
          <ul class="nav justify-content-center justify-content-md-end mt-3 mt-md-0">
            <li class="nav-item">
              <a class="nav-link" href="<?php echo e(url($data->footerinstagramlink)); ?>" target="_blank">
                <i class="fab fa-instagram text-white"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo e(url($data->footerfacebooklink)); ?> " target="_blank">
                <i class="fab fa-facebook text-white"></i>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</footer>



<!-- JAVASCRIPT -->
<!-- Libs JS -->
<?php echo $__env->make('admin.layouts.web_common_scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</body>

</html><?php /**PATH C:\laragon\www\taxi\resources\views/admin/layouts/web_footer.blade.php ENDPATH**/ ?>