<?php $__env->startSection('title', 'ServiceLocation'); ?>

<?php $__env->startSection('content'); ?>

    <!-- Start Page content -->

    <!-- Start Page content -->
    <section class="content">
        

        <div class="row">
            <div class="col-12">
                <div class="box">

                    <div class="box-header with-border">
                        <div class="row text-right">

                            <div class="col-8 col-md-3">
                                <div class="form-group">
                                    <input type="text" id="search_keyword" name="search" class="form-control"
                                        placeholder="<?php echo app('translator')->get('view_pages.enter_keyword'); ?>">
                                </div>
                            </div>

                            <div class="col-4 col-md-2 text-left">
                                <button id="search" class="btn btn-success btn-outline btn-sm py-2" type="submit">
                                    <?php echo app('translator')->get('view_pages.search'); ?>
                                </button>
                            </div>
               
                    <?php if(auth()->user()->can('Add_Service_Location')): ?>         
                            
                            <div class="col-md-7 text-center text-md-right">
                                <a href="<?php echo e(url('service_location/create')); ?>" class="btn btn-primary btn-sm">
                                    <i class="mdi mdi-plus-circle mr-2"></i><?php echo app('translator')->get('view_pages.add_service_location'); ?></a>
                               
                            </div>
                     <?php endif; ?>

                        </div>
                        <!-- <div class="box-controls pull-right">
                            <div class="lookup lookup-circle lookup-right">
                              <input type="text" name="s">
                            </div>
                          </div> -->

                    </div>

                    <div id="js-service_location-partial-target">
                        <include-fragment src="service_location/fetch">
                            <span style="text-align: center;font-weight: bold;"> <?php echo app('translator')->get('view_pages.loading'); ?></span>
                        </include-fragment>
                    </div>


                    
                </div>
            </div>
        </div>

        </div>
        <!-- container -->

        </div>
        <!-- content -->

        <script src="<?php echo e(asset('assets/js/fetchdata.min.js')); ?>"></script>
        <script>
            var search_keyword = '';

            $(function() {
                $('body').on('click', '.pagination a', function(e) {
                    e.preventDefault();
                    var url = $(this).attr('href');
                    $.get(url, $('#search').serialize(), function(data) {
                        $('#js-service_location-partial-target').html(data);
                    });
                });

                $('#search').on('click', function(e) {
                    e.preventDefault();
                    search_keyword = $('#search_keyword').val();
                    console.log(search_keyword);
                    fetch('service_location/fetch?search=' + search_keyword)
                        .then(response => response.text())
                        .then(html => {
                            document.querySelector('#js-service_location-partial-target').innerHTML =
                                html
                        });
                });

            });

            $(document).on('click', '.sweet-delete', function(e) {
                e.preventDefault();

                let url = $(this).attr('data-url');

                swal({
                    title: "Are you sure to delete ?",
                    type: "error",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Delete",
                    cancelButtonText: "No! Keep it",
                    closeOnConfirm: false,
                    closeOnCancel: true
                }, function(isConfirm) {
                    if (isConfirm) {
                        swal.close();

                        $.ajax({
                            url: url,
                            cache: false,
                            success: function(res) {

                                fetch('service_location/fetch?search=' + search_keyword)
                                    .then(response => response.text())
                                    .then(html => {
                                        document.querySelector(
                                                '#js-service_location-partial-target')
                                            .innerHTML = html
                                    });

                                $.toast({
                                    heading: '',
                                    text: res,
                                    position: 'top-right',
                                    loaderBg: '#ff6849',
                                    icon: 'success',
                                    hideAfter: 5000,
                                    stack: 1
                                });
                            }
                        });
                    }
                });
            });

        </script>

    <?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\taxi\resources\views/admin/servicelocation/index.blade.php ENDPATH**/ ?>