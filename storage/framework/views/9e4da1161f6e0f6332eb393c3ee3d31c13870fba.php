<?php $__env->startSection('content'); ?>
    <!-- twitter-bootstrap-wizard css -->
    <link rel="stylesheet" href="<?php echo e(asset('taxi/assets/libs/twitter-bootstrap-wizard/prettify.css')); ?>">
    <!-- App Css-->
    <link href="<?php echo e(asset('taxi/assets/css/app.min.css')); ?>" id="app-style" rel="stylesheet" type="text/css"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css" rel="stylesheet"
          type="text/css"/>

    <style>
        .btn-group {
            flex-direction: row-reverse;
        }
    </style>
    <div class="row p-0 m-0">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18"><?php echo app('translator')->get('view_pages.add_owner'); ?></h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a
                                href="<?php echo e(url('owners/by_area',$area->id)); ?>"><?php echo app('translator')->get('view_pages.manage_owner'); ?></a>
                        </li>
                        <li class="breadcrumb-item active"><?php echo app('translator')->get('view_pages.add_owner'); ?></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="row p-0 m-0">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <span class="text-danger iban_err"></span>
                    <form method="post" action="<?php echo e(url('owners/store/')); ?>" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        

                                        <div id="basic-pills-wizard" class="twitter-bs-wizard">
                                            <ul class="twitter-bs-wizard-nav">
                                                <li class="nav-item">
                                                    <a href="#owner-details" class="nav-link" data-toggle="tab">
                                                        <span class="step-number mr-2">01</span>
                                                        <?php echo app('translator')->get('view_pages.owner_details'); ?>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="#contact-person-details" class="nav-link"
                                                       data-toggle="tab">
                                                        <span class="step-number mr-2">02</span>
                                                        <?php echo app('translator')->get('view_pages.contact_person_details'); ?>
                                                    </a>
                                                </li>

                                                <li class="nav-item">
                                                    <a href="#bank-detail" class="nav-link" data-toggle="tab">
                                                        <span class="step-number mr-2">03</span>
                                                        <?php echo app('translator')->get('view_pages.bank_details'); ?>
                                                    </a>
                                                </li>

                                                <li class="nav-item">
                                                    <a href="#documents" class="nav-link" data-toggle="tab">
                                                        <span class="step-number mr-2">04</span>
                                                        <?php echo app('translator')->get('view_pages.document'); ?>
                                                    </a>
                                                </li>
                                            </ul>
                                            <div class="tab-content twitter-bs-wizard-tab-content">

                                                <div class="tab-pane" id="owner-details">
                                                    <div class="row">
                                                        <div class="col-sm-6 float-left mb-md-3">
                                                            <div class="form-group">
                                                                <label
                                                                    for="company_name"><?php echo app('translator')->get('view_pages.company_name'); ?>
                                                                    <span class="text-danger">*</span></label>
                                                                <input class="form-control" type="text"
                                                                       id="company_name"
                                                                       name="company_name"
                                                                       value="<?php echo e(old('company_name')); ?>"
                                                                       required=""
                                                                       placeholder="<?php echo app('translator')->get('view_pages.enter'); ?> <?php echo app('translator')->get('view_pages.company_name'); ?>">
                                                                <span
                                                                    class="text-danger"><?php echo e($errors->first('company_name')); ?></span>
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-6 float-left mb-md-3">
                                                            <div class="form-group">
                                                                <label for="owner_name"><?php echo app('translator')->get('view_pages.owner_name'); ?>
                                                                    <span
                                                                        class="text-danger">*</span></label>
                                                                <input class="form-control" type="text" id="owner_name"
                                                                       name="owner_name" value="<?php echo e(old('owner_name')); ?>"
                                                                       required=""
                                                                       placeholder="<?php echo app('translator')->get('view_pages.enter'); ?> <?php echo app('translator')->get('view_pages.owner_name'); ?>">
                                                                <span
                                                                    class="text-danger"><?php echo e($errors->first('owner_name')); ?></span>
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-4 float-left mb-md-3">
                                                            <div class="form-group">
                                                                <label for="email"><?php echo app('translator')->get('view_pages.email'); ?> <span
                                                                        class="text-danger">*</span></label>
                                                                <input class="form-control" type="email" id="email"
                                                                       name="email" value="<?php echo e(old('email')); ?>"
                                                                       required=""
                                                                       placeholder="<?php echo app('translator')->get('view_pages.enter'); ?> <?php echo app('translator')->get('view_pages.email'); ?>">
                                                                <span
                                                                    class="text-danger"><?php echo e($errors->first('email')); ?></span>
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-4 float-left mb-md-3">
                                                            <div class="form-group">
                                                                <label for="password"><?php echo app('translator')->get('view_pages.password'); ?> <span
                                                                        class="text-danger">*</span></label>
                                                                <input class="form-control" type="password"
                                                                       id="password"
                                                                       name="password" value="<?php echo e(old('password')); ?>"
                                                                       required=""
                                                                       placeholder="<?php echo app('translator')->get('view_pages.enter'); ?> <?php echo app('translator')->get('view_pages.password'); ?>">
                                                                <span
                                                                    class="text-danger"><?php echo e($errors->first('password')); ?></span>
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-4 float-left mb-md-3">
                                                            <div class="form-group">
                                                                <label
                                                                    for="password_confrim"><?php echo app('translator')->get('view_pages.confirm_password'); ?>
                                                                    <span class="text-danger">*</span></label>
                                                                <input class="form-control" type="password"
                                                                       id="password_confirmation"
                                                                       name="password_confirmation"
                                                                       value="<?php echo e(old('password_confirmation')); ?>"
                                                                       required=""
                                                                       placeholder="<?php echo app('translator')->get('view_pages.enter'); ?> <?php echo app('translator')->get('view_pages.password_confirmation'); ?>">
                                                                <span
                                                                    class="text-danger"><?php echo e($errors->first('password')); ?></span>
                                                            </div>
                                                        </div>

                                                        

                                                        <div class="col-sm-6 float-left mb-md-3">
                                                            <div class="form-group">
                                                                <label for="admin_id"><?php echo app('translator')->get('view_pages.select_area'); ?>
                                                                    <span
                                                                        class="text-danger">*</span></label>
                                                                <select name="service_location_id"
                                                                        id="service_location_id" class="form-control"
                                                                        readonly>
                                                                    
                                                                    
                                                                    <option
                                                                        value="<?php echo e($area->id); ?>" <?php echo e(old('service_location_id') == $area->id ? 'selected' : ''); ?>><?php echo e($area->name); ?></option>
                                                                    
                                                                </select>
                                                            </div>
                                                        </div>

                                                        

                                                        <div class="col-sm-6 float-left mb-md-3">
                                                            <div class="form-group">
                                                                <label
                                                                    for="no_of_vehicles"><?php echo app('translator')->get('view_pages.no_of_vehicles'); ?>
                                                                    <span class="text-danger">*</span></label>
                                                                <input class="form-control" type="number" min="1"
                                                                       id="no_of_vehicles" name="no_of_vehicles"
                                                                       value="<?php echo e(old('no_of_vehicles')); ?>" required=""
                                                                       placeholder="<?php echo app('translator')->get('view_pages.enter'); ?> <?php echo app('translator')->get('view_pages.no_of_vehicles'); ?>">
                                                                <span
                                                                    class="text-danger"><?php echo e($errors->first('no_of_vehicles')); ?></span>
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-6 float-left mb-md-3">
                                                            <div class="form-group">
                                                                <label for="tax_number"><?php echo app('translator')->get('view_pages.tax_number'); ?>
                                                                    <span
                                                                        class="text-danger">*</span></label>
                                                                <input class="form-control" type="text" id="tax_number"
                                                                       name="tax_number" value="<?php echo e(old('tax_number')); ?>"
                                                                       required=""
                                                                       placeholder="<?php echo app('translator')->get('view_pages.enter'); ?> <?php echo app('translator')->get('view_pages.tax_number'); ?>">
                                                                <span
                                                                    class="text-danger"><?php echo e($errors->first('tax_number')); ?></span>
                                                            </div>
                                                        </div>

                                                        
                                                    </div>
                                                </div>

                                                <div class="tab-pane" id="contact-person-details">
                                                    <div class="row">
                                                        <div class="col-sm-6 float-left mb-md-3">
                                                            <div class="form-group">
                                                                <label for="name"><?php echo app('translator')->get('view_pages.name'); ?> <span
                                                                        class="text-danger">*</span></label>
                                                                <input class="form-control" type="text" id="name"
                                                                       name="name" value="<?php echo e(old('name')); ?>" required=""
                                                                       placeholder="<?php echo app('translator')->get('view_pages.enter'); ?> <?php echo app('translator')->get('view_pages.name'); ?>">
                                                                <span
                                                                    class="text-danger"><?php echo e($errors->first('name')); ?></span>
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-6 float-left mb-md-3">
                                                            <div class="form-group">
                                                                <label for="surname"><?php echo app('translator')->get('view_pages.surname'); ?> <span
                                                                        class="text-danger">*</span></label>
                                                                <input class="form-control" type="text" id="surname"
                                                                       name="surname" value="<?php echo e(old('surname')); ?>"
                                                                       required=""
                                                                       placeholder="<?php echo app('translator')->get('view_pages.enter'); ?> <?php echo app('translator')->get('view_pages.surname'); ?>">
                                                                <span
                                                                    class="text-danger"><?php echo e($errors->first('surname')); ?></span>
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-6 float-left mb-md-3">
                                                            <div class="form-group">
                                                                <label for="mobile"><?php echo app('translator')->get('view_pages.mobile'); ?><span
                                                                        class="text-danger">*</span></label>
                                                                <input class="form-control" type="text" id="mobile"
                                                                       name="mobile" value="<?php echo e(old('mobile')); ?>"
                                                                       required=""
                                                                       placeholder="9521832670">
                                                                <span
                                                                    class="text-danger"><?php echo e($errors->first('mobile')); ?></span>
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-6 float-left mb-md-3">
                                                            <div class="form-group">
                                                                <label for="phone"><?php echo app('translator')->get('view_pages.phone'); ?></label>
                                                                <input class="form-control" type="text" id="phone"
                                                                       name="phone" value="<?php echo e(old('phone')); ?>"
                                                                       placeholder="15218326703">
                                                                <span
                                                                    class="text-danger"><?php echo e($errors->first('phone')); ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="tab-pane" id="bank-detail">
                                                    <div class="row">
                                                        <div class="col-sm-6 float-left mb-md-3">
                                                            <div class="form-group">
                                                                <label for="ifsc"><?php echo app('translator')->get('view_pages.ifsc'); ?> <span
                                                                        class="text-danger">*</span></label>
                                                                <input class="form-control" type="text" id="ifsc"
                                                                       name="ifsc" value="<?php echo e(old('ifsc')); ?>" required
                                                                       placeholder="<?php echo app('translator')->get('view_pages.enter'); ?> <?php echo app('translator')->get('view_pages.ifsc'); ?>">
                                                                <span
                                                                    class="text-danger ifsc_err"><?php echo e($errors->first('ifsc')); ?></span>
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-6 float-left mb-md-3">
                                                            <div class="form-group">
                                                                <label
                                                                    for="bank_name"><?php echo app('translator')->get('view_pages.bank_name'); ?></label>
                                                                <input class="form-control" type="text"
                                                                       id="bank_name" name="bank_name"
                                                                       value="<?php echo e(old('bank_name')); ?>"
                                                                       placeholder="<?php echo app('translator')->get('view_pages.enter'); ?> <?php echo app('translator')->get('view_pages.bank_name'); ?>">
                                                                <span
                                                                    class="text-danger"><?php echo e($errors->first('bank_name')); ?></span>
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-6 float-left mb-md-3">
                                                            <div class="form-group">
                                                                <label
                                                                    for="account_no"><?php echo app('translator')->get('view_pages.account_no'); ?></label>
                                                                <input class="form-control" type="text" id="account_no"
                                                                       name="account_no" value="<?php echo e(old('account_no')); ?>"
                                                                       placeholder="<?php echo app('translator')->get('view_pages.enter'); ?> <?php echo app('translator')->get('view_pages.account_no'); ?>">
                                                                <span
                                                                    class="text-danger"><?php echo e($errors->first('account_no')); ?></span>
                                                            </div>
                                                        </div>

                                                        
                                                    </div>
                                                </div>

                                                <div class="tab-pane" id="documents">
                                                    <div class="row">
                                                        <?php $__currentLoopData = $needed_document; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <input type="hidden" name="needed_document[]"
                                                                   value="<?php echo e($item->id); ?>">

                                                            <div class="col-sm-12 pb-3">
                                                                <div class="col-sm-6  float-left mb-md-3">
                                                                    <div class="form-group">
                                                                        <label for="name"><?php echo app('translator')->get('view_pages.name'); ?> <span
                                                                                class="text-danger">*</span></label>
                                                                        <input class="form-control" type="text"
                                                                               name="doc_name" value="<?php echo e($item->name); ?>"
                                                                               placeholder="<?php echo app('translator')->get('view_pages.document_name'); ?>"
                                                                               readonly>
                                                                    </div>
                                                                </div>

                                                                <?php if($item->has_expiry_date): ?>
                                                                    <div class="col-sm-6 float-left mb-md-3">
                                                                        <div class="form-group">
                                                                            <label
                                                                                for="expiry_date"><?php echo app('translator')->get('view_pages.expiry_date'); ?>
                                                                                <span
                                                                                    class="text-danger">*</span></label>
                                                                            <div id="datepicker"
                                                                                 class="date-pick input-group date date-custom"
                                                                                 data-date-format="yyyy-mm-dd">
                                                                                <input alt="" name="expiry_date[]"
                                                                                       placeholder="yyyy-mm-dd"
                                                                                       type="text" class="form-control"
                                                                                       value="<?php echo e(old('expiry_date.'.$key)); ?>"
                                                                                       autocomplete="off">
                                                                                <span class="input-group-addon"><i
                                                                                        class="fa fa-calendar"></i></span>
                                                                            </div>
                                                                            <span
                                                                                class="text-danger"><?php echo e($errors->first('expiry_date.'.$key)); ?></span>
                                                                        </div>
                                                                    </div>
                                                                <?php endif; ?>

                                                                <div class="col-sm-6 float-left mb-md-3">
                                                                    <div class="form-group profile-img">
                                                                        <label><?php echo e(trans('view_pages.document')); ?> <span
                                                                                class="text-danger">*</span></label>
                                                                        <div class="col-12" style="display: inline;">
                                                                            <div
                                                                                class="col-md-12 float-left input-group p-0">
    <span class="input-group-btn">
        <span class="btn btn-default btn-file">
            Browse… <input type="file" class="imgInp" name="document_<?php echo e($item->id); ?>" required>
        </span>
    </span>
                                                                                <input type="text" class="form-control"
                                                                                       readonly>
                                                                            </div>
                                                                            <div class="col-md-12 float-left p-0">
                                                                                <img class='img-upload' width="100px"
                                                                                     class="rounded avatar-lg"/>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                
                                                            </div>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                        

                                                        <div class="col-12 btn-group mt-3">
                                                            <ul class="admin-add-btn">

                                                                <button type="submit"
                                                                        class="btn btn-primary mr-1 waves-effect waves-light"><?php echo e(trans('view_pages.create')); ?></button>

                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <ul
                                                class="pager wizard twitter-bs-wizard-pager-link">
                                                <li class="previous"><a href="#"><?php echo app('translator')->get('view_pages.previous'); ?></a></li>
                                                <li class="next"><a href="#"><?php echo app('translator')->get('view_pages.next'); ?></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- twitter-bootstrap-wizard js -->
    <script src="<?php echo e(asset('taxi/assets/libs/twitter-bootstrap-wizard/jquery.bootstrap.wizard.min.js')); ?>"></script>

    <script src="<?php echo e(asset('taxi/assets/libs/twitter-bootstrap-wizard/prettify.js')); ?>"></script>

    <!-- form wizard init -->
    <script src="<?php echo e(asset('taxi/assets/js/form-wizard.init.js')); ?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
    <script>
        $(document).ready(function () {
            $(document).on('change', '.btn-file :file', function () {
                var input = $(this),
                    label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
                input.trigger('fileselect', [label]);
            });

            $('.btn-file :file').on('fileselect', function (event, label) {

                var input = $(this).parents('.input-group').find(':text'),
                    log = label;

                if (input.length) {
                    input.val(log);
                } else {
                    if (log) alert(log);
                }

            });

            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $(input).closest('div').parent().find('.img-upload').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }

            $(".imgInp").change(function () {
                readURL(this);
            });
        });

        var err = false;

        $(".date-pick").datepicker({
            autoclose: true,
            todayHighlight: true,
            format: 'yyyy-mm-dd',
            startDate: '0'
        });

        $(document).on('blur keypress', '#iban', function (e) {
            var iban = $(this).val();

            if (e.type == 'keypress') {
                $('.iban_err').text('');
            } else {
                $.ajax({
                    url: "<?php echo e(url('api/v1/iban-validation')); ?>",
                    data: {
                        iban: iban
                    },
                    method: 'post',
                    success: function (response) {
                        console.log(response);
                        if (response.success == false) {
                            $('.iban_err').text('Provide valid IBAN');
                            $("#bank_name").val('');
                            $("#bic").val('');
                            err = true;
                            return false;
                        } else {
                            var bic = response.data.bank_code.bic;
                            var bank_name = response.data.bank_code.bank_name;
                            err = false;
                            $('.iban_err').text('');
                            $("#bank_name").val(bank_name);
                            $("#bic").val(bic);
                        }
                    }
                });
            }
        });

        $('form').on('submit', function (event) {
            event.preventDefault();
            if (err) {
                $('.iban_err').text('Provide valid IBAN');
                return false;
            } else {
                $('.iban_err').text('');
                this.submit();
            }
        });

    </script>
    <script
        src="https://maps.google.com/maps/api/js?key=<?php echo e(get_settings('google_map_key')); ?>&libraries=drawing,geometry,places"></script>

    <script>
        // let autocomplete;

        // const componentForm = {
        // street_number: "short_name",
        // route: "long_name",
        // locality: "long_name",
        // postal_code: "short_name",
        // };

        // function initMap() {
        // var input = document.getElementById('address');

        // autocomplete = new google.maps.places.Autocomplete(input);

        // // autocomplete.setComponentRestrictions({'country': ['de']});
        // autocomplete.setFields(["address_component"]);
        // autocomplete.addListener("place_changed", fillInAddress);
        // }

        // function fillInAddress() {
        // const place = autocomplete.getPlace();

        // for (const component in componentForm) {
        // document.getElementById(component).value = "";
        // document.getElementById(component).readOnly = false;
        // }

        // for (const component of place.address_components) {
        // let addressType = component.types[0];

        // if (componentForm[addressType]) {
        // let val = component[componentForm[addressType]];
        // document.getElementById(addressType).value = val;
        // document.getElementById(addressType).readOnly = true;
        // }
        // }
        // }

        function initialize() {
            var input = document.getElementById('address');
            var autocomplete = new google.maps.places.Autocomplete(input);
            google.maps.event.addListener(autocomplete, 'place_changed', function () {
                var place = autocomplete.getPlace();
                document.getElementById('address_lat').value = place.geometry.location.lat();
                document.getElementById('address_lng').value = place.geometry.location.lng();


            });

        }

        google.maps.event.addDomListener(window, 'load', initialize);

    </script>
    <!-- <script src="https://maps.googleapis.com/maps/api/js?key=REMOVED_KEY_7&libraries=places&callback=initMap" async defer></script> -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\taxi\resources\views/admin/owners/create.blade.php ENDPATH**/ ?>