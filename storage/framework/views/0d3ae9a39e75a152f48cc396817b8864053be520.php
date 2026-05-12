<?php $__env->startSection('title', 'Users'); ?>

<?php $__env->startSection('content'); ?>
<style>
#map {
    height: 300px;
    width: 100%;
    padding: 10px;
}

th {
    text-align: center;
}

td {
    text-align: center;
}

.highlight {
    color: red;
    font-weight: 800;
    font-size: large;
}
</style>
<!-- Start Page content -->
<section class="content">
    <div class="row">
        <div class="col-12">

            <a href="<?php echo e(url('requests')); ?>">
                <button class="btn btn-danger btn-sm pull-right mb-3" type="submit">
                    <i class="mdi mdi-keyboard-backspace mr-2"></i>
                    <?php echo app('translator')->get('view_pages.back'); ?>
                </button>
            </a>

            <div class="box">

                <div class="box-header bb-2 border-primary">
                    <h3 class="box-title"><?php echo app('translator')->get('view_pages.map_views'); ?></h3>
                </div>

                <div class="box-body">
                    <div id="map"></div>
                </div>
            </div>

            <div class="box">

                <div class="box-header bb-2 border-primary">
                    <h3 class="box-title"><?php echo app('translator')->get('view_pages.trip_location'); ?></h3>
                </div>

                <div class="box-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th><?php echo app('translator')->get('view_pages.pick_location'); ?></th>
                                <th><?php echo app('translator')->get('view_pages.drop_location'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?php echo e($item->requestPlace->pick_address); ?></td>
                                <td><?php echo e($item->requestPlace->drop_address); ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="box">
                <div class="box-header bb-2 border-primary">
                    <h3 class="box-title"><?php echo app('translator')->get('view_pages.request'); ?></h3>
                </div>

                <div class="box-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th><?php echo app('translator')->get('view_pages.zone'); ?></th>
                                <th><?php echo app('translator')->get('view_pages.type'); ?></th>
                                <th><?php echo app('translator')->get('view_pages.trip_time'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?php echo e($item->zoneType->zone->name); ?></td>
                                <td><?php echo e($item->zoneType->vehicleType->name); ?></td>
                                <td><?php echo e($item->trip_start_time); ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="box">
                <div class="box-header bb-2 border-primary">
                    <h3 class="box-title"><?php echo app('translator')->get('view_pages.user_details'); ?></h3>
                </div>

                <div class="box-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th><?php echo app('translator')->get('view_pages.name'); ?></th>
                                <th><?php echo app('translator')->get('view_pages.email'); ?></th>
                                <th><?php echo app('translator')->get('view_pages.mobile'); ?></th>
                                <th><?php echo app('translator')->get('view_pages.rating'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <?php if($item->userDetail()->exists()): ?>
                                <td><?php echo e($item->userDetail->name); ?></td>
                                <td><?php echo e($item->userDetail->email); ?></td>
                                <td><?php echo e($item->userDetail->mobile); ?></td>
                                <td><?php echo e($item->requestRating()->where('user_rating',1)->pluck('rating')->first()); ?></td>
                                <?php else: ?>
                                 <td><?php echo e($item->adHocuserDetail->name); ?></td>
                                <td><?php echo e($item->adHocuserDetail->email); ?></td>
                                <td><?php echo e($item->adHocuserDetail->mobile); ?></td>
                                <td><?php echo e($item->requestRating()->where('user_rating',1)->pluck('rating')->first()); ?></td>
                                <?php endif; ?>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="box">
                <div class="box-header bb-2 border-primary">
                    <h3 class="box-title"><?php echo app('translator')->get('view_pages.driver_details'); ?></h3>
                </div>

                <div class="box-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th><?php echo app('translator')->get('view_pages.name'); ?></th>
                                <th><?php echo app('translator')->get('view_pages.email'); ?></th>
                                <th><?php echo app('translator')->get('view_pages.mobile'); ?></th>
                                <th><?php echo app('translator')->get('view_pages.rating'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?php echo e($item->driverDetail->name); ?></td>
                                <td><?php echo e($item->driverDetail->email); ?></td>
                                <td><?php echo e($item->driverDetail->mobile); ?></td>
                                <td><?php echo e($item->requestRating()->where('driver_rating',1)->pluck('rating')->first()); ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <?php if($item->requestBill): ?>
            <div class="box">
                <div class="box-header bb-2 border-primary">
                    <h3 class="box-title"><?php echo app('translator')->get('view_pages.bill_details'); ?></h3>
                </div>

                <div class="box-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th><?php echo app('translator')->get('view_pages.col_title'); ?></th>
                                <th><?php echo app('translator')->get('view_pages.description'); ?></th>
                                <th><?php echo app('translator')->get('view_pages.price'); ?></th>
                            </tr>
                        </thead>
<?php if($item->is_bid_ride == false): ?>

                        <?php
                        $requestBill = collect($item->requestBill->toArray());
                        $bill =
                        $requestBill->only(['base_price','distance_price','time_price','waiting_charge','cancellation_fee','service_tax','promo_discount','total_amount','admin_commision','driver_commision']);
                        $bill->all();

                        $bill = $bill->toArray();
                        ?>

                        <tbody>
                            <?php $__currentLoopData = $bill; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="<?php echo e($key == 'total_amount' ? 'highlight' : ''); ?>">
                                <td><?php echo e(__('view_pages.'.$key)); ?></td>

                                <td>
                                    <?php if($key == 'distance_price'): ?>
                                    <?php echo e($item->total_distance .' '. $item->request_unit); ?> *
                                    <?php echo e($item->currency .' '. $item->requestBill->price_per_distance.' / '.$item->request_unit); ?>

                                    <?php elseif($key == 'time_price'): ?>
                                    <?php echo e($item->total_time.' Mins'); ?> *
                                    <?php echo e($item->currency .' '. $item->requestBill->price_per_time.' / Mins'); ?>

                                    <?php elseif($key == 'base_price'): ?>
                                    <?php echo e('For first ' . $item->requestBill->base_distance .' '. $item->request_unit); ?>

                                    <?php else: ?>
                                    -
                                    <?php endif; ?>
                                </td>

                                <td><?php echo e($value); ?></td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </tbody>

<?php else: ?>
                        <?php
                        $requestBill = collect($item->requestBill->toArray());
                        $bill =
                        $requestBill->only(['service_tax','promo_discount','total_amount','admin_commision','driver_commision']);
                        $bill->all();

                        $bill = $bill->toArray();
                        ?>

                        <tbody>
                            <?php $__currentLoopData = $bill; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="<?php echo e($key == 'total_amount' ? 'highlight' : ''); ?>">
                                <td><?php echo e(__('view_pages.'.$key)); ?></td>


                                <td><?php echo e($value); ?></td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </tbody>

<?php endif; ?>
                    </table>
                </div>
            </div>
            <?php endif; ?>

        </div>
    </div>
</section>

<script type="text/javascript"
    src="https://maps.google.com/maps/api/js?key=<?php echo e(get_settings('google_map_key')); ?>&sensor=false&libraries=places"></script>

<script type="text/javascript">
var area1, area2, icon1, icon2;

area1 = "<?php echo e($item->pick_address); ?>";
area2 = "<?php echo e($item->drop_address); ?>";
icon1 = "<?php echo e(url('map/start_pin_flag.png')); ?>";
icon2 = "<?php echo e(url('map/end_pin_flag.png')); ?>";

var locations = [
    [area1, "<?php echo e($item->pick_lat); ?>", "<?php echo e($item->pick_lng); ?>", icon1],
    [area2, "<?php echo e($item->drop_lat == null ? $item->pick_lat : $item->drop_lat); ?>",
        "<?php echo e($item->drop_lng == null ? $item->pick_lng : $item->drop_lng); ?>", icon2
    ],
];

var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 10,
    center: new google.maps.LatLng(locations[1][1], locations[1][2]),
    mapTypeId: google.maps.MapTypeId.ROADMAP
});

<?php if($item->request_path != null): ?>
var flightPlanCoordinates = [ < ? php echo $item - > request_path ? > ];

flightPlanCoordinates = flightPlanCoordinates[0];

var flightPath = new google.maps.Polyline({
    path: flightPlanCoordinates,
    geodesic: true,
    strokeColor: '#FF0000',
    strokeOpacity: 4.0,
    strokeWeight: 5
});

flightPath.setMap(map);
<?php endif; ?>

// map new
var infowindow = new google.maps.InfoWindow();
var marker, i;
var markers = new Array();
for (i = 0; i < locations.length; i++) {
    marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
        icon: locations[i][3],
        map: map
    });
    markers.push(marker);
    google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
            infowindow.setContent(locations[i][0]);
            infowindow.open(map, marker);
        }
    })(marker, i));
}
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\taxi\resources\views/admin/request/requestview.blade.php ENDPATH**/ ?>