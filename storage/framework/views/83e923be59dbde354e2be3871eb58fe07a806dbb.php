<?php $__env->startSection('title', 'Company Page'); ?>

<?php $__env->startSection('content'); ?>
    <style>
        .demo-radio-button label {
            min-width: 100px;
            margin: 0 0 5px 50px;
        }

    </style>
    <!-- Start Page content -->
    <section class="content">
        

        <div class="row">
            <div class="col-12">
                <div class="box">

                    <div class="box-header with-border">
                        <div class="row text-right">
                            <div class="col-8 col-md-3">
                                <div class="form-group">
                                    <div class="controls">
                                        <input type="text" id="search_keyword" name="search" class="form-control"
                                            placeholder="<?php echo app('translator')->get('view_pages.enter_keyword'); ?>">
                                    </div>
                                </div>
                            </div>

                            <div class="col-2 col-md-1 text-left">
                                <button id="search" class="btn btn-success btn-outline btn-sm py-2" type="submit">
                                    <?php echo app('translator')->get('view_pages.search'); ?>
                                </button>
                            </div>

                            <div class="col-5 col-md-1 text-left">
                                <button class="btn btn-outline btn-sm btn-danger py-2" type="button" data-toggle="modal"
                                    data-target="#modal-default">
                                         <?php echo app('translator')->get('view_pages.filter_drivers'); ?>                                </button>
                            </div>
                        <div class="col-12 col-md-7 text-right">
                            <?php if(auth()->user()->can('add-drivers')): ?>         
                                <a href="<?php echo e(url('drivers/create')); ?>" class="btn btn-primary btn-sm">
                                    <i class="mdi mdi-plus-circle mr-2"></i><?php echo app('translator')->get('view_pages.add_driver'); ?></a>
                                <!--  <a class="btn btn-danger">
                                    Export</a> -->
                            <?php endif; ?>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="modal-default">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title"><?php echo app('translator')->get('view_pages.filter_drivers'); ?></h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <div class="modal-body text-left">
                                        <div class="driver-status">
                                            <h4><?php echo app('translator')->get('view_pages.active_status'); ?></h4>
                                            <div class="demo-radio-button">
                                                <input name="active" type="radio" id="active" data-val="1"
                                                    class="with-gap radio-col-green">
                                                <label for="active"><?php echo app('translator')->get('view_pages.active'); ?></label>
                                                <input name="active" type="radio" id="inactive" data-val="0"
                                                    class="with-gap radio-col-grey">
                                                <label for="inactive"><?php echo app('translator')->get('view_pages.inactive'); ?></label>
                                            </div>
                                            <h4><?php echo app('translator')->get('view_pages.approve_status'); ?></h4>
                                            <div class="demo-radio-button">
                                                <input name="approve" type="radio" id="approved" data-val="1"
                                                    class="with-gap radio-col-green">
                                                <label for="approved"><?php echo app('translator')->get('view_pages.approved'); ?></label>
                                                <input name="approve" type="radio" id="disapproved" data-val="0"
                                                    class="with-gap radio-col-grey">
                                                <label for="disapproved"><?php echo app('translator')->get('view_pages.disapproved'); ?></label>
                                            </div>
                                            <h4><?php echo app('translator')->get('view_pages.online_status'); ?></h4>
                                            <div class="demo-radio-button">
                                                <input name="available" type="radio" id="online" data-val="1"
                                                    class="with-gap radio-col-green">
                                                <label for="online"><?php echo app('translator')->get('view_pages.online'); ?></label>
                                                <input name="available" type="radio" id="offline" data-val="0"
                                                    class="with-gap radio-col-grey">
                                                <label for="offline"><?php echo app('translator')->get('view_pages.offline'); ?></label>
                                            </div>

                                            <h4><?php echo app('translator')->get('view_pages.select_area'); ?></h4>
                                            <div class="form-group">
                                                <select name="service_location_id" id="service_location_id" class="form-control">
                                                    <option value="all" selected><?php echo app('translator')->get('view_pages.all'); ?></option>
                                                    <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($service->id); ?>"><?php echo e($service->name); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" data-dismiss="modal"
                                            class="btn btn-success btn-sm float-right filter"><?php echo app('translator')->get('view_pages.apply_filters'); ?></button>

                                        <button type="button" data-dismiss="modal"
                                            class="btn btn-danger btn-sm resetfilter float-right mr-2"><?php echo app('translator')->get('view_pages.reset_filters'); ?></button>
                                    </div>
                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                        <!-- /.modal -->
                    </div>

                    <div id="js-drivers-partial-target">
                        <include-fragment src="fetch/approval-pending-drivers">
                            <span style="text-align: center;font-weight: bold;"> <?php echo app('translator')->get('view_pages.loading'); ?></span>
                        </include-fragment>
                    </div>
                </div>
            </div>
        </div>

        
        <!-- container -->


        <script src="<?php echo e(asset('assets/js/fetchdata.min.js')); ?>"></script>
        <script>
            var search_keyword = '';
            var query = '';

            $(function() {
                $('body').on('click', '.pagination a', function(e) {
                    e.preventDefault();
                    var url = $(this).attr('href');
                    $.get(url, $('#search').serialize(), function(data) {
                        $('#js-drivers-partial-target').html(data);
                    });
                });

                $('#search').on('click', function(e) {
                    e.preventDefault();
                    search_keyword = $('#search_keyword').val();

                    fetch('fetch/approval-pending-drivers?search=' + search_keyword)
                        .then(response => response.text())
                        .then(html => {
                            document.querySelector('#js-drivers-partial-target').innerHTML = html
                        });
                });

                $('.filter,.resetfilter').on('click', function() {
                    let filterColumn = ['active', 'approve', 'available','area'];

                    let className = $(this);
                    query = '';
                    $.each(filterColumn, function(index, value) {
                        if (className.hasClass('resetfilter')) {
                            $('input[name="' + value + '"]').prop('checked', false);
                            if(value == 'area') $('#service_location_id').val('all')
                            query = '';
                        } else {
                            if ($('input[name="' + value + '"]:checked').attr('id') != undefined) {
                                var activeVal = $('input[name="' + value + '"]:checked').attr(
                                    'data-val');

                                query += value + '=' + activeVal + '&';
                            }else if (value == 'area') {
                                var area = $('#service_location_id').val()

                                query += 'area=' + area + '&';
                            }
                        }
                    });

                    fetch('fetch/approval-pending-drivers?' + query)
                        .then(response => response.text())
                        .then(html => {
                            document.querySelector('#js-drivers-partial-target').innerHTML = html
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

                                fetch('fetch/approval-pending-drivers?search=' + search_keyword + '&' + query)
                                    .then(response => response.text())
                                    .then(html => {
                                        document.querySelector('#js-drivers-partial-target')
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


            $(document).on('click', '.decline', function(e) {
                e.preventDefault();
                var button = $(this);
                var inpVal = button.attr('data-reason');
                var driver_id = button.attr('data-id');
                var redirect = button.attr('href')

                if (inpVal == '-') {
                    inpVal = '';
                }

                swal({
                        title: "",
                        text: "Reason for Decline",
                        type: "input",
                        showCancelButton: true,
                        closeOnConfirm: false,
                        confirmButtonText: 'Decline',
                        cancelButtonText: 'Close',
                        confirmButtonColor: '#fc4b6c',
                        confirmButtonBorderColor: '#fc4b6c',
                        animation: "slide-from-top",
                        inputPlaceholder: "Enter Reason for Decline",
                        inputValue: inpVal
                    },
                    function(inputValue) {
                        if (inputValue === false) return false;

                        if (inputValue === "") {
                            swal.showInputError("Reason is required!");
                            return false
                        }

                        $.ajax({
                            url: '<?php echo e(route('UpdateDriverDeclineReason')); ?>',
                            data: {
                                "_token": "<?php echo e(csrf_token()); ?>",
                                'reason': inputValue,
                                'id': driver_id
                            },
                            method: 'post',
                            success: function(res) {
                                if (res == 'success') {
                                    window.location.href = redirect;

                                    swal.close();
                                }
                            }
                        });
                    });
            });

            $(function() {
  $('table.container').on("click", "tr.table-tr", function() {
        e.preventDefault();
    window.location = $(this).data("url");
    alert($(this).data("url"));
  });
});

        </script>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\taxi\resources\views/admin/drivers/pending-for-approval.blade.php ENDPATH**/ ?>