<?php $__env->startSection('title', 'Users'); ?>

<?php $__env->startSection('content'); ?>


<style type="text/css">
    input[type=file]::file-selector-button {
  margin-right: 10px;
  border: none;
  background: #084cdf;
  padding: 10px 10px;
  border-radius: 5px;
  color: #fff;
  cursor: pointer;
  transition: background .2s ease-in-out;
  font-size: 10px;
}

input[type=file]::file-selector-button:hover {
  background: #0d45a5;
}

/*#import{
    border: 1px solid #F2F3F4 ;
    width: 250px;
    padding: 5px;
    margin-left: 980px;
    background: #F2F3F4 ;
}*/
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
                                    <input type="text" name="search" id="search_keyword" class="form-control"
                                        placeholder="<?php echo app('translator')->get('view_pages.enter_keyword'); ?>">
                                </div>
                            </div>

                            <div class="col-4 col-md-2 text-left">
                                <button id="search" class="btn btn-success btn-outline btn-sm py-2" type="submit">
                                    <?php echo app('translator')->get('view_pages.search'); ?>
                                </button>
                            </div>


                            <div class="col-md-7 text-center text-md-right">
                            <?php if(auth()->user()->can('add-user')): ?>
                                <a href="<?php echo e(url('users/create')); ?>" class="btn btn-primary btn-sm">
                                    <i class="mdi mdi-plus-circle mr-2"></i><?php echo app('translator')->get('view_pages.add_user'); ?></a>
                                <!--  <a class="btn btn-danger">
                                                Export</a> -->
                             <?php endif; ?>                            </div>

                             <div class="col-md-7 text-center text-md-left">
                            <?php if(auth()->user()->can('import-user')): ?>
                                <!-- <a href="<?php echo e(url('users/import-view')); ?>" class="btn btn-primary btn-sm">
                                    <i class="mdi mdi-plus-circle mr-2"></i><?php echo app('translator')->get('view_pages.import_user'); ?></a> -->
                                     <form method="post" class="form-horizontal" action="<?php echo e(url('users/import-user')); ?>"
                                enctype="multipart/form-data">
                                <?php echo e(csrf_field()); ?>


                                <div class="row" id="import">
                     <div class="col-sm-6 ">
                      <div class="form-group">
                        <!-- <label for="import"><?php echo app('translator')->get('view_pages.select_file'); ?>(.csv) <span class="text-danger">*</span></label> -->
             <input type="file" name="file"><br><br>
             <!-- class="form-control" -->
            <button class="btn btn-sm btn-success">Import</button>
                   </div>
               </div>
                    </div>

                        </form>
                             <?php endif; ?>
                                 </div>

                                  <div class="col-md-12 text-md-left">
                                    <i class="fa fa-download" aria-hidden="true"></i>
                                    <a class="text-danger" href="<?php echo e(url('users/download')); ?>">Download Sample File Format</a>

                                  </div>
                        </div>
                        <!-- <div class="box-controls pull-right">
                        <div class="lookup lookup-circle lookup-right">
                          <input type="text" name="s">
                        </div>
                      </div> -->

                    </div>

                    <div id="js-user-partial-target">
                        <include-fragment src="users/fetch">
                            <span style="text-align: center;font-weight: bold;"> <?php echo app('translator')->get('view_pages.loading'); ?></span>
                        </include-fragment>
                    </div>


                </div>
            </div>

        </div>
        <!-- container -->

        
        <!-- content -->

        <script src="<?php echo e(asset('assets/js/fetchdata.min.js')); ?>"></script>
        <script>
            var search_keyword = '';
            $(function() {
                $('body').on('click', '.pagination a', function(e) {
                    e.preventDefault();
                    var url = $(this).attr('href');
                    $.get(url, $('#search').serialize(), function(data) {
                        $('#js-user-partial-target').html(data);
                    });
                });

                $('#search').on('click', function(e) {
                    e.preventDefault();
                    search_keyword = $('#search_keyword').val();

                    fetch('users/fetch?search=' + search_keyword)
                        .then(response => response.text())
                        .then(html => {
                            document.querySelector('#js-user-partial-target').innerHTML = html
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

                                fetch('users/fetch?search=' + search_keyword)
                                    .then(response => response.text())
                                    .then(html => {
                                        document.querySelector('#js-user-partial-target')
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

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\taxi\resources\views/admin/users/index.blade.php ENDPATH**/ ?>