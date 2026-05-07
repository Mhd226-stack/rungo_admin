<?php $__env->startSection('title', 'Owners'); ?>

<?php $__env->startSection('content'); ?>

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
                        <?php if(auth()->user()->can('add-owner')): ?>
                            <div class="col-12 text-right">
                                <a href="<?php echo e(url('owners/create',$area->id)); ?>" class="btn btn-primary btn-sm">
                                    <i class="mdi mdi-plus-circle mr-2"></i><?php echo app('translator')->get('view_pages.add'); ?></a>
                               <!--  <a class="btn btn-danger">
                                    Export</a> -->
                            </div>
                    <?php endif; ?>
            </div>



    </div>

    <div id="js-owners-partial-target">
        <include-fragment src="fetch/<?php echo e($area->id); ?>">
            <span style="text-align: center;font-weight: bold;"> <?php echo app('translator')->get('view_pages.loading'); ?></span>
        </include-fragment>
    </div>



</div>
</div>
</div>


<!-- container -->


    <script src="<?php echo e(asset('assets/vendor_components/jquery/dist/jquery.js')); ?>"></script>

       <script src="<?php echo e(asset('assets/js/fetchdata.min.js')); ?>"></script>
        <script>
            var search_keyword = '';
            var query = '';

            $(function() {
                $('body').on('click', '.pagination a', function(e) {
                    e.preventDefault();
                    var url = $(this).attr('href');
                    $.get(url, $('#search').serialize(), function(data) {
                        $('#js-owners-partial-target').html(data);
                    });
                });

                $('#search').on('click', function(e) {

                    // alert("test");
                    e.preventDefault();
                    search_keyword = $('#search_keyword').val();

                    fetch('fetch/'+"<?php echo e($area->id); ?>"+'?search=' + search_keyword)
                        .then(response => response.text())
                        .then(html => {
                            document.querySelector('#js-owners-partial-target').innerHTML = html
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

                    fetch('fetch/'+"<?php echo e($area->id); ?>"+'?' + query)
                        .then(response => response.text())
                        .then(html => {
                            document.querySelector('#js-owners-partial-target').innerHTML = html
                        });
                });
            });

            $(document).on('click', '.sweet-delete', function(e) {
                e.preventDefault();

                // let url = $(this).attr('data-url');
                let url = $(this).attr('href');
               // alert(url)

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

                                fetch('fetch/'+"<?php echo e($area->id); ?>"+'?search=' + search_keyword + '&' + query)
                                    .then(response => response.text())
                                    .then(html => {
                                        document.querySelector('#js-owners-partial-target')
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


</script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\taxi\resources\views/admin/owners/index.blade.php ENDPATH**/ ?>