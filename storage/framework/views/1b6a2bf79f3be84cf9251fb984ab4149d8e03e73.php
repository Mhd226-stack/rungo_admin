
    <!-- jQuery 3 -->
    <script src="<?php echo e(asset('assets/vendor_components/jquery/dist/jquery.js')); ?>"></script>


    <!-- jQuery UI 1.11.4 -->
    <script src="<?php echo e(asset('assets/vendor_components/jquery-ui/jquery-ui.js')); ?>"></script>

    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>

    <!-- popper -->
    <script src="<?php echo e(asset('assets/vendor_components/popper/dist/popper.min.js')); ?>"></script>

    <!-- Bootstrap 4.0-->
    <script src="<?php echo e(asset('assets/vendor_components/bootstrap/dist/js/bootstrap.js')); ?>"></script>

    <!-- Select2 -->
    <script src="<?php echo e(asset('assets/vendor_components/select2/dist/js/select2.full.js')); ?>"></script>

    <!-- ChartJS -->
    <script src="<?php echo e(asset('assets/vendor_components/chart.js-master/Chart.min.js')); ?>"></script>

    <!-- Slimscroll -->
    <script src="<?php echo e(asset('assets/vendor_components/jquery-slimscroll/jquery.slimscroll.js')); ?>"></script>

    <!-- FastClick -->
    <script src="<?php echo e(asset('assets/vendor_components/fastclick/lib/fastclick.js')); ?>"></script>

    <!-- peity -->
    <script src="<?php echo e(asset('assets/vendor_components/jquery.peity/jquery.peity.js')); ?>"></script>

    <!-- Fab Admin App -->
    <script src="<?php echo e(asset('assets/js/template.js')); ?>"></script>
    <!-- Fab Admin for demo purposes -->
    <script src="<?php echo e(asset('assets/js/demo.js')); ?>"></script>

    <!-- Vector map JavaScript -->
    <script src="<?php echo e(asset('assets/vendor_components/jvectormap/lib2/jquery-jvectormap-2.0.2.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/vendor_components/jvectormap/lib2/jquery-jvectormap-world-mill-en.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/vendor_components/jvectormap/lib2/jquery-jvectormap-us-aea-en.js')); ?>"></script>

    <!-- Sweet-Alert  -->
    <script src="<?php echo e(asset('assets/vendor_components/sweetalert/sweetalert.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/vendor_components/sweetalert/jquery.sweet-alert.custom.js')); ?>"></script>

    <!-- toast -->
    <script src="<?php echo e(asset('assets/vendor_components/jquery-toast-plugin-master/src/jquery.toast.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/pages/toastr.js')); ?>"></script>
    <!-- InputMask -->
    <script src="<?php echo e(asset('assets/vendor_plugins/input-mask/jquery.inputmask.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/vendor_plugins/input-mask/jquery.inputmask.date.extensions.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/vendor_plugins/input-mask/jquery.inputmask.extensions.js')); ?>"></script>
        <!-- bootstrap time picker -->
    <script src="<?php echo e(asset('assets/vendor_plugins/timepicker/bootstrap-timepicker.min.js')); ?>"></script>
        <!-- date-range-picker -->
    <script src="<?php echo e(asset('assets/vendor_components/moment/min/moment.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/vendor_components/bootstrap-daterangepicker/daterangepicker.js')); ?>"></script>
        <!-- bootstrap color picker -->
    <script src="<?php echo e(asset('assets/vendor_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js')); ?>"></script>

        <!-- iCheck 1.0.1 -->
    <script src="<?php echo e(asset('assets/vendor_plugins/iCheck/icheck.min.js')); ?>"></script>
     <script src="<?php echo e(asset('taxi/assets/bootstrap/js/bootstrap.min.js')); ?>"></script>
      <script src="<?php echo e(asset('taxi/assets/bootstrap/js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('taxi/assets/js/bootstrap-select.js')); ?>"></script>
    <script src="<?php echo e(asset('taxi/assets/js/jquery.scrollbar.min.js')); ?>"></script>
    <script src="<?php echo e(asset('taxi/assets/js/tail.select-full.min.js')); ?>"></script>


     
    <script src="<?php echo e(asset('dispatcher/assets/js/flatpickr.js')); ?>"></script>
    <script src="<?php echo e(asset('dispatcher/vendors/popper/popper.min.js')); ?>"></script>
    <script src="<?php echo e(asset('dispatcher/vendors/bootstrap/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('dispatcher/vendors/anchorjs/anchor.min.js')); ?>"></script>
    <script src="<?php echo e(asset('dispatcher/vendors/is/is.min.js')); ?>"></script>
    <script src="<?php echo e(asset('dispatcher/vendors/echarts/echarts.min.js')); ?>"></script>
    <script src="<?php echo e(asset('dispatcher/vendors/progressbar/progressbar.min.js')); ?>"></script>
    
    <script src="<?php echo e(asset('dispatcher/vendors/lodash/lodash.min.js')); ?>"></script>
    <script src="../polyfill.io/v3/polyfill.min58be.js?features=window.scroll"></script>
    <script src="<?php echo e(asset('dispatcher/vendors/list.js/list.min.js')); ?>"></script>
    <script src="<?php echo e(asset('dispatcher/vendors/swiper/swiper-bundle.min.js')); ?>"></script>
    <script src="<?php echo e(asset('dispatcher/assets/js/theme.js')); ?>"></script>
    <script src="<?php echo e(asset('dispatcher/assets/js/user.js')); ?>"></script>
    <script src="<?php echo e(asset('dispatcher/jquery.fancybox.min.js')); ?>"></script>


    
    <script src="https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.js"></script>
    <script src='https://api.tiles.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.js'></script>





    <?php echo $__env->yieldContent('extra-scripts'); ?>

    
    <!-- Fab Admin for advanced form element -->
    <script src="<?php echo e(asset('assets/js/pages/advanced-form-element.js')); ?>"></script>
    
<script>

$('.logout').click(function(e){
    button=$(this);
    e.preventDefault();

        swal({
            title: "Are you sure to logout ?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Logout",
            cancelButtonText: "Stay in",
            closeOnConfirm: false,
            closeOnCancel: true
        }, function(isConfirm){
            if (isConfirm) {
                button.unbind();
                button[0].click();
            }
        });
    });+

    // $(document).on('click','.sweet-delete',function(e){
$('.sweet-delete').click(function(e){
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


<?php

if (session()->has('success')) {
    $alertMessage = session()->get('success'); ?>
<script>
    var alertMessage = "<?php echo $alertMessage ?>";

    //alert(alertMessage);
    $.toast({
        heading: '',
        text: alertMessage,
        position: 'top-right',
        loaderBg: '#ff6849',
        icon: 'success',
        hideAfter: 5000,
        stack: 1
    });

</script>
<?php
}?>

<?php
if (session()->has('warning')) {
    $alertMessage = session()->get('warning'); ?>
<script>
    var alertMessage = "<?php echo $alertMessage ?>";

    $.toast({
        heading: '',
        text: alertMessage,
        position: 'top-right',
        loaderBg: '#ff6849',
        icon: 'warning',
        hideAfter: 5000,
        stack: 1
    });

</script>
<?php
}?>

<script>
     function readURL(input) {
         var parentDiv = input.closest('div');

        // if label is present childnodes may differ
         if(parentDiv.childNodes.length == 16){
             $keys = [4,9,11];
         }else{
            // for settings page only
            $keys = [1,7,9];
         }

            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    if(e.target.result){
                        parentDiv.childNodes[$keys[1]].innerText = 'Change';
                        parentDiv.childNodes[$keys[2]].style.display = 'inline-block';
                    }else{
                        parentDiv.childNodes[$keys[2]].style.display = 'none';
                        parentDiv.childNodes[$keys[1]].innerText = 'Browse';
                    }
                    parentDiv.childNodes[$keys[0]].setAttribute('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#profile").change(function() {
            console.log(this);
            readURL(this);
        });


    $(document).on('click','#remove_img',function(){
        // $('#remove_img').click(function(){
            $('#blah').removeAttr('src');
            $('#remove_img').hide();
            $('#upload').text('Browse');
        });

        // setTimeout(function(){
        //     $('.text-danger').fadeOut('slow');
        // },5000);


$(document).on('click','.chooseLanguage',function(){
    let langValue = $(this).attr('data-value')

    var link = "<?php echo url('/change/lang')?>";
    var finalLink = link+'/'+langValue;

    console.log(finalLink);

    window.location = finalLink;
});
</script>

<?php if(session('failure')): ?>
<script>
        swal({
            title: '',
            text: "<?php echo e(session('failure')); ?>"
        });
</script>
<?php endif; ?>



    <script src="<?php echo e(asset('assets/js/fetchdata.min.js')); ?>"></script>
    <!-- The core Firebase JS SDK is always required and must be listed first -->
    <script src="https://www.gstatic.com/firebasejs/7.19.0/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/7.19.0/firebase-database.js"></script>
    <!-- TODO: Add SDKs for Firebase products that you want to use https://firebase.google.com/docs/web/setup#available-libraries -->
    <script src="https://www.gstatic.com/firebasejs/7.19.0/firebase-analytics.js"></script>

    <script>
        var $toast;
        var role = "<?php echo e(auth()->user()->roles[0]->slug); ?>"
        var adminArea = "<?php echo e(auth()->user()->admin ? auth()->user()->admin->service_location_id : ''); ?>"

        // Your web app's Firebase configuration
        var firebaseConfig = {
                apiKey: "<?php echo e(get_settings('firebase-api-key')); ?>",
    authDomain: "<?php echo e(get_settings('firebase-auth-domain')); ?>",
    databaseURL: "<?php echo e(get_settings('firebase-db-url')); ?>",
    projectId: "<?php echo e(get_settings('firebase-project-id')); ?>",
    storageBucket: "<?php echo e(get_settings('firebase-storage-bucket')); ?>",
    messagingSenderId: "<?php echo e(get_settings('firebase-messaging-sender-id')); ?>",
    appId: "<?php echo e(get_settings('firebase-app-id')); ?>",
    measurementId: "<?php echo e(get_settings('firebase-measurement-id')); ?>"
        };
        // Initialize Firebase
        firebase.initializeApp(firebaseConfig);
        firebase.analytics();

        var sosRef = firebase.database().ref('SOS');

        sosRef.on('value', async function(snapshot) {
            var sosData = snapshot.val();

            var date = new Date();
            var timestamp = date.getTime();
            var conditional_timestamp = new Date(timestamp - 5 * 60000);

            $('.sosList').html('')
            $('.sosicon').removeClass('active')
            Object.entries(sosData).forEach(([key, val]) => {
                var area = val.serv_loc_id

                if (role == 'super-admin' || adminArea == area) {
                    // Filter sos request within five minutes
                    if (conditional_timestamp < val.updated_at) {

                        if(val.is_user=="1"){
                            var requested = 'User'
                        } else{
                            var requested = 'Driver'
                        }

                        $('.sosicon').addClass('active')
                        $('.sosList').append(`<a class="dropdown-item curser" href="<?php echo e(url('requests')); ?>/${key}" target="_blank">
                                                <li class="header">A new sos request from ${requested}</li>
                                            </a>`);

                        $toast = $.toast({
                            closeButton: true,
                            heading: '',
                            text: `A new sos request from ${requested}`,
                            position: 'top-right',
                            loaderBg: '#ff6849',
                            icon: 'error',
                            hideAfter: false,
                            loader: false,
                            stack: 5
                        });

                        var url = "<?php echo e(url('requests/fetch/request')); ?>/"+key
                        fetch(url)
                        .then(response => response.text())
                        .then(html => {
                            document.querySelector('#js-request-partial-target').innerHTML = html
                        });
                    }
                }
            });
        });
    </script>
   <!--  <script>
        var $toast;
        var role = "<?php echo e(auth()->user()->roles[0]->slug); ?>"
        var adminArea = "<?php echo e(auth()->user()->admin ? auth()->user()->admin->service_location_id : ''); ?>"

        var tripRef = firebase.database().ref('requests');

        tripRef.on('value', async function(snapshot) {
            var tripData = snapshot.val();

            var date = new Date();
            var timestamp = date.getTime();
            var conditional_timestamp = new Date(timestamp - 5 * 60000);

            $('.sosList').html('')
            $('.sosicon').removeClass('active')
            Object.entries(tripData).forEach(([key, val]) => {
                var area = val.serv_loc_id

                if (role == 'super-admin' || adminArea == area) {
                    // Filter sos request within five minutes
                    if (conditional_timestamp < val.updated_at) {

                        if(val.is_user){
                            var requested = 'User'
                        } else if(val.is_driver){
                            var requested = 'Driver'
                        }

                        $('.sosicon').addClass('active')
                        $('.sosList').append(`<a class="dropdown-item curser" href="<?php echo e(url('requests')); ?>/${key}" target="_blank">
                                                <li class="header">A new trip request from ${requested}</li>
                                            </a>`);

                        $toast = $.toast({
                            closeButton: true,
                            heading: '',
                            text: `A new trip request from ${requested}`,
                            position: 'top-right',
                            loaderBg: '#ff6849',
                            icon: 'error',
                            hideAfter: false,
                            loader: false,
                            stack: 5
                        });

                        var url = "<?php echo e(url('requests/fetch/request')); ?>/"+key
                        fetch(url)
                            .then(response => response.text())
                            .then(html => {
                                document.querySelector('#js-request-partial-target-trip-request').innerHTML = html
                            });
                    }
                }
            });
        });
    </script> -->

<?php /**PATH C:\laragon\www\taxi\resources\views/admin/layouts/common_scripts.blade.php ENDPATH**/ ?>