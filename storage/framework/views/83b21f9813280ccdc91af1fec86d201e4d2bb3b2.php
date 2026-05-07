
<?php


if(str_contains((string)request()->path(),'translations')){
  $main_menu = 'settings';
  $sub_menu = 'translations';
}
?>


<aside class="main-sidebar">
  <!-- sidebar-->
  <section class="sidebar">
    <!-- sidebar menu-->
    <ul class="sidebar-menu" data-widget="tree">
      <?php if(auth()->user()->can('access-dashboard')): ?>
      <li class="<?php echo e('dashboard' == $main_menu ? 'active' : ''); ?>">
        <a href="<?php echo e(url('/dashboard')); ?>">
          <i class="fa fa-tachometer"></i> <span><?php echo app('translator')->get('pages_names.dashboard'); ?></span>
        </a>
      </li>
      <?php endif; ?>

      <?php if(auth()->user()->can('access-dashboard') && env('APP_FOR')=='demo1'): ?>
      <li class="<?php echo e('admin_dashboard' == $main_menu ? 'active' : ''); ?>">
        <a href="<?php echo e(url('/admin_dashboard')); ?>">
          <i class="fa fa-tachometer"></i> <span><?php echo app('translator')->get('pages_names.admin-dashboard'); ?></span>
        </a>
      </li>
      <li class="<?php echo e('driver_profile_dashboard' == $main_menu ? 'active' : ''); ?>">
        <a href="<?php echo e(url('/driver_profile_dashboard')); ?>">
          <i class="fa fa-tachometer"></i> <span>Driver profile Dashboard</span>
        </a>
      </li>
      <?php endif; ?>

       <?php if(auth()->user()->can('view-settings')): ?>
      <li class="treeview <?php echo e('settings' == $main_menu ? 'active menu-open' : ''); ?>">
        <a href="javascript: void(0);">
          <i class="fa fa-cogs"></i>
          <span> <?php echo app('translator')->get('pages_names.settings'); ?> </span>
          <span class="pull-right-container">
            <i class="fa fa-angle-right pull-right"></i>
          </span>
        </a>

        <ul class="treeview-menu">
          <?php if(auth()->user()->can('get-all-roles')): ?>
          <li class="<?php echo e('roles' == $sub_menu ? 'active' : ''); ?>">
            <a href="<?php echo e(url('/roles')); ?>"><i class="fa fa-circle-thin"></i><?php echo app('translator')->get('pages_names.roles'); ?></a>
          </li>
          <?php endif; ?>
          <?php if(auth()->user()->can('view-system-settings')): ?>
          <li class="<?php echo e('system_settings' == $sub_menu ? 'active' : ''); ?>">
            <a href="<?php echo e(url('/system/settings')); ?>"><i class="fa fa-circle-thin"></i><?php echo app('translator')->get('pages_names.system_settings'); ?></a>
          </li>
          <?php endif; ?>
          <?php if(auth()->user()->can('view-translations')): ?>
          <li class="<?php echo e('translations' == $sub_menu ? 'active' : ''); ?>">
            <a href="<?php echo e(url('/translations')); ?>"><i class="fa fa-circle-thin"></i><?php echo app('translator')->get('pages_names.translations'); ?></a>
          </li>
          <?php endif; ?>
<!--          <?php if(auth()->user()->can('view-email-templates')): ?>
          <li class="<?php echo e('mail_templates' == $sub_menu ? 'active' : ''); ?>">
            <a href="<?php echo e(url('/mail_templates')); ?>"><i class="fa fa-circle-thin"></i><?php echo app('translator')->get('pages_names.mail_templates'); ?></a>
          </li>
          <?php endif; ?>  -->
        </ul>
      </li>
      <?php endif; ?>

      <?php if(auth()->user()->can('master-data')): ?>
      <li class="treeview <?php echo e('master' == $main_menu ? 'active menu-open' : ''); ?>">
        <a href="javascript: void(0);">
          <i class="fa fa-code-fork"></i>
          <span> <?php echo app('translator')->get('pages_names.master'); ?> </span>
          <span class="pull-right-container">
            <i class="fa fa-angle-right pull-right"></i>
          </span>
        </a>

        <ul class="treeview-menu">
          <?php if(auth()->user()->can('manage-carmake')): ?>
          <li class="<?php echo e('car_make' == $sub_menu ? 'active' : ''); ?>">
            <a href="<?php echo e(url('/carmake')); ?>"><i class="fa fa-circle-thin"></i><?php echo app('translator')->get('pages_names.vehicle_make'); ?></a>
          </li>
          <?php endif; ?>
          <?php if(auth()->user()->can('manage-carmodel')): ?>
          <li class="<?php echo e('car_model' == $sub_menu ? 'active' : ''); ?>">
            <a href="<?php echo e(url('/carmodel')); ?>"><i class="fa fa-circle-thin"></i><?php echo app('translator')->get('pages_names.vehicle_model'); ?></a>
          </li>
          <?php endif; ?>
          <?php if(auth()->user()->can('manage-country')): ?>
          <li class="<?php echo e('country' == $sub_menu ? 'active' : ''); ?>">
            <a href="<?php echo e(url('/country')); ?>"><i class="fa fa-circle-thin"></i><?php echo app('translator')->get('pages_names.country'); ?></a>
          </li>
          <?php endif; ?>
          <?php if(auth()->user()->can('manage-driver-needed-document')): ?>
          <li class="<?php echo e('needed_document' == $sub_menu ? 'active' : ''); ?>">
            <a href="<?php echo e(url('/needed_doc')); ?>"><i class="fa fa-circle-thin"></i><?php echo app('translator')->get('pages_names.needed_doc'); ?></a>
          </li>
          <?php endif; ?>
          <?php if(auth()->user()->can('manage-owner-needed-document')): ?>
          <li class="<?php echo e('owner_needed_document' == $sub_menu ? 'active' : ''); ?>">
            <a href="<?php echo e(url('/owner_needed_doc')); ?>"><i class="fa fa-circle-thin"></i><?php echo app('translator')->get('pages_names.owner_needed_doc'); ?></a>
          </li>
          <?php endif; ?>
          <?php if(auth()->user()->can('manage-fleet-needed-document')): ?>
          <li class="<?php echo e('fleet_needed_document' == $sub_menu ? 'active' : ''); ?>">
            <a href="<?php echo e(url('/fleet_needed_doc')); ?>"><i class="fa fa-circle-thin"></i><?php echo app('translator')->get('pages_names.fleet_needed_doc'); ?></a>
          </li>
          <?php endif; ?>
          <?php if(auth()->user()->can('package-type')): ?>
          <li class="<?php echo e('package_type' == $sub_menu ? 'active' : ''); ?>">
            <a href="<?php echo e(url('/package_type')); ?>"><i class="fa fa-circle-thin"></i><?php echo app('translator')->get('pages_names.package_type'); ?></a>
          </li>
          <?php endif; ?>
          <?php if(auth()->user()->can('banner_image')): ?>
          <li class="<?php echo e('banner_image' == $sub_menu ? 'active' : ''); ?>">
            <a href="<?php echo e(url('/banner_image')); ?>"><i class="fa fa-circle-thin"></i><?php echo app('translator')->get('pages_names.banner_image'); ?></a>
          </li>
          <?php endif; ?>
        </ul>
      </li>
      <?php endif; ?>

      <?php if(auth()->user()->can('service_location')): ?>
      <li class="<?php echo e('service_location' == $main_menu ? 'active' : ''); ?>">
        <a href="<?php echo e(url('/service_location')); ?>">
          <i class="fa fa-map-marker"></i> <span><?php echo app('translator')->get('pages_names.service_location'); ?></span>
        </a>
      </li>
      <?php endif; ?>

      <?php
        $areas = App\Models\Admin\ServiceLocation::companyKey()->active(true)->get();
      ?>

        <?php if(auth()->user()->can('manage-owner')): ?>
        <li class="treeview <?php echo e('manage_owners' == $main_menu ? 'active menu-open' : ''); ?>">
        <a href="javascript: void(0);">
          <i class="fa fa-code-fork"></i>
          <span> <?php echo app('translator')->get('pages_names.owners'); ?> </span>
          <span class="pull-right-container">
            <i class="fa fa-angle-right pull-right"></i>
          </span>
        </a>
         <ul class="treeview-menu">
         <?php $__currentLoopData = $areas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <li class="<?php echo e($sub_menu == $item->name ? 'active' : ''); ?>" data-id="<?php echo e($item->id); ?>">
            <a href="<?php echo e(url('/owners/by_area',$item->id)); ?>"><i class="fa fa-circle-thin"></i><?php echo e(ucfirst($item->name)); ?></a>
          </li>
           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
         </ul>

            </li>

            <?php endif; ?>

             <?php if(auth()->user()->can('manage-fleet')): ?>
            <li class="<?php echo e($main_menu == 'manage_fleet' ? 'active' : ''); ?>">
                <a href="<?php echo e(route('viewFleet')); ?>">
                    <i class="fa fa-bus"></i>
                    <span> <?php echo e(trans('pages_names.manage_fleet')); ?> </span>
                </a>
            </li>
            <?php endif; ?>

<?php if(auth()->user()->can('admin')): ?>
      <li class="<?php echo e('admin' == $main_menu ? 'active' : ''); ?>">
        <a href="<?php echo e(url('/admins')); ?>">
          <i class="fa fa-user-circle-o"></i> <span><?php echo app('translator')->get('pages_names.admins'); ?></span>
        </a>
      </li>
      <?php endif; ?>
      
         <?php if(auth()->user()->can('view-requests')): ?>
        <li class="treeview <?php echo e('trip-request' == $main_menu ? 'active menu-open' : ''); ?>">
          <a href="javascript: void(0);">
            <i class="fa fa-map"></i>
            <span> <?php echo app('translator')->get('pages_names.request'); ?> </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>

          <ul class="treeview-menu">
         <?php if(auth()->user()->can('view-rides')): ?>

            <li class="<?php echo e('request' == $sub_menu ? 'active' : ''); ?>">
              <a href="<?php echo e(url('/requests')); ?>">
                <i class="fa fa-circle-thin"></i> <span><?php echo app('translator')->get('pages_names.rides'); ?></span>
              </a>
            </li>
          <?php endif; ?>
         <?php if(auth()->user()->can('scheduled-rides')): ?>
            <li class="<?php echo e('scheduled-rides' == $sub_menu ? 'active' : ''); ?>">
              <a href="<?php echo e(url('/scheduled-rides')); ?>">
                <i class="fa fa-circle-thin"></i> <span><?php echo app('translator')->get('pages_names.scheduled_rides'); ?></span>
              </a>
            </li>
        <?php endif; ?>

         <?php if(auth()->user()->can('cancellation-rides')): ?>
            <li class="<?php echo e('cancellation-rides' == $sub_menu ? 'active' : ''); ?>">
              <a href="<?php echo e(url('/cancellation-rides')); ?>">
                <i class="fa fa-circle-thin"></i> <span><?php echo app('translator')->get('pages_names.cancellation_rides'); ?></span>
              </a>
            </li>
          <?php endif; ?>

          </ul>
        </li>
     <?php endif; ?>

      <?php if(auth()->user()->can('view-types')): ?>
      <li class="<?php echo e('types' == $main_menu ? 'active' : ''); ?>">
        <a href="<?php echo e(url('/types')); ?>">
          <i class="fa fa-taxi "></i> <span><?php echo app('translator')->get('pages_names.types'); ?></span>
        </a>
      </li>
      <?php endif; ?>

      <?php if(auth()->user()->can('map-menu')): ?>
      <li class="treeview <?php echo e('map' == $main_menu ? 'active menu-open' : ''); ?>">
        <a href="javascript: void(0);">
          <i class="fa fa-map"></i>
          <span> <?php echo app('translator')->get('pages_names.map'); ?> </span>
          <span class="pull-right-container">
            <i class="fa fa-angle-right pull-right"></i>
          </span>
        </a>

        <ul class="treeview-menu">
          <?php if(auth()->user()->can('view-zone')): ?>
          <li class="<?php echo e('zone' == $sub_menu ? 'active' : ''); ?>">
            <a href="<?php echo e(url('/zone')); ?>"><i class="fa fa-circle-thin"></i><?php echo app('translator')->get('pages_names.zone'); ?></a>
          </li>
          <?php endif; ?>
          <?php if(auth()->user()->can('list-airports')): ?>
          <li class="<?php echo e('airport' == $sub_menu ? 'active' : ''); ?>">
            <a href="<?php echo e(url('/airport')); ?>"><i class="fa fa-circle-thin"></i><?php echo app('translator')->get('pages_names.airport'); ?></a>
          </li>
          <?php endif; ?>
<!--           <?php if(auth()->user()->can('list-vehicle_fare')): ?>
          <li class="<?php echo e('vehicle_fare' == $sub_menu ? 'active' : ''); ?>">
            <a href="<?php echo e(url('vehicle_fare')); ?>"><i class="fa fa-circle-thin"></i><?php echo app('translator')->get('pages_names.vehicle_fare'); ?></a>
          </li>
          <?php endif; ?> -->
        </ul>
      </li>
      <?php endif; ?>
<!--       <?php if(auth()->user()->can('vehicle-fare')): ?>
         <li class="<?php echo e('vehicle-fare' == $main_menu ? 'active' : ''); ?>">
              <a href="<?php echo e(url('/vehicle_fare')); ?>"><i class="fa fa-money"></i><?php echo app('translator')->get('pages_names.set_price'); ?></a>
            </li>
        <?php endif; ?> -->
      <?php
        $zones = App\Models\Admin\Zone::companyKey()->active(true)->get();
      ?>

        <?php if(auth()->user()->can('vehicle-fare')): ?>
     <li class="treeview <?php echo e('vehicle-fare' == $main_menu ? 'active menu-open' : ''); ?>">
        <a href="javascript: void(0);">
          <i class="fa fa-money"></i>
          <span> <?php echo app('translator')->get('pages_names.set_price'); ?> </span>
          <span class="pull-right-container">
            <i class="fa fa-angle-right pull-right"></i>
          </span>
        </a>
         <ul class="treeview-menu">
         <?php $__currentLoopData = $zones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <li class="<?php echo e($sub_menu == $item->name ? 'active' : ''); ?>" data-id="<?php echo e($item->id); ?>">
            <a href="<?php echo e(url('/vehicle_fare/by_zone',$item->id)); ?>"><i class="fa fa-circle-thin"></i><?php echo e(ucfirst($item->name)); ?></a>
          </li>
           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
         </ul>
       </li>
      <?php endif; ?>

      <?php if(auth()->user()->can('drivers-menu')): ?>
              <?php if(auth()->user()->hasRole('owner')): ?>
                  <?php
                      $route = 'company/drivers';
                  ?>
              <?php else: ?>
                  <?php
                      $route = 'drivers';
                  ?>
      <?php endif; ?>


        <li class="treeview <?php echo e('drivers' == $main_menu ? 'active menu-open' : ''); ?>">
          <a href="javascript: void(0);">
            <i class="fa fa-users"></i>
            <span> <?php echo app('translator')->get('pages_names.drivers'); ?> </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>

          <ul class="treeview-menu">
            <?php if(auth()->user()->can('view-drivers')): ?>
            <li class="<?php echo e('driver_details' == $sub_menu ? 'active' : ''); ?>">
              <a href="<?php echo e(url($route)); ?>"><i class="fa fa-circle-thin"></i><?php echo app('translator')->get('pages_names.approved_drivers'); ?></a>
            </li>
            <?php endif; ?>

            <?php if(auth()->user()->can('view-approval-pending-drivers')): ?>
            <li class="<?php echo e('driver_approval_pending' == $sub_menu ? 'active' : ''); ?>">
              <a href="<?php echo e(url('/drivers/waiting-for-approval')); ?>"><i class="fa fa-circle-thin"></i><?php echo app('translator')->get('pages_names.pending_approvals'); ?></a>
            </li>
            <?php endif; ?>
            <?php if(auth()->user()->can('view-driver-ratings')): ?>
            <li class="<?php echo e('driver_ratings' == $sub_menu ? 'active' : ''); ?>">
              <a href="<?php echo e(url('/driver-ratings')); ?>"><i class="fa fa-circle-thin"></i><?php echo app('translator')->get('pages_names.driver_ratings'); ?></a>
            </li>
            <?php endif; ?>
            <?php if(auth()->user()->can('view-driver-withdrawal-requests')): ?>
            <li class="<?php echo e('withdrawal_requests' == $sub_menu ? 'active' : ''); ?>">
              <a href="<?php echo e(url('/withdrawal-requests-lists')); ?>"><i class="fa fa-circle-thin"></i><?php echo app('translator')->get('pages_names.withdrawal_requests'); ?></a>
            </li>
            <?php endif; ?>
            <?php if(auth()->user()->can('view-negative-balance-drivers')): ?>
            <li class="<?php echo e('negative_balance_drivers' == $sub_menu ? 'active' : ''); ?>">
              <a href="<?php echo e(url('withdrawal-requests-lists/negative_balance_drivers')); ?>"><i class="fa fa-circle-thin"></i><?php echo app('translator')->get('pages_names.negative_balance_drivers'); ?></a>
            </li>
            <?php endif; ?>
          </ul>

        </li>
        <?php endif; ?>
       <?php if(auth()->user()->can('fleet-drivers-menu')): ?>
              <?php if(auth()->user()->hasRole('owner')): ?>
                  <?php
                      $route = 'company/drivers';
                  ?>
              <?php else: ?>
                  <?php
                      $route = 'fleet-drivers';
                  ?>
              <?php endif; ?>


        <li class="treeview <?php echo e('fleet-drivers' == $main_menu ? 'active menu-open' : ''); ?>">
          <a href="javascript: void(0);">
            <i class="fa fa-users"></i>
            <span> <?php echo app('translator')->get('pages_names.fleet_drivers'); ?> </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>

          <ul class="treeview-menu">
            <?php if(auth()->user()->can('view-approved-fleet-drivers')): ?>
            <li class="<?php echo e('driver_details' == $sub_menu ? 'active' : ''); ?>">
              <a href="<?php echo e(url($route)); ?>"><i class="fa fa-circle-thin"></i><?php echo app('translator')->get('pages_names.approved_fleet_drivers'); ?></a>
            </li>
            <?php endif; ?>

            <?php if(auth()->user()->can('fleet-drivers-waiting-for-approval')): ?>
            <li class="<?php echo e('driver_approval_pending' == $sub_menu ? 'active' : ''); ?>">
              <a href="<?php echo e(url('/fleet-drivers/waiting-for-approval')); ?>"><i class="fa fa-circle-thin"></i><?php echo app('translator')->get('pages_names.approval_pending_approvals'); ?></a>
            </li>
            <?php endif; ?>
          </ul>

        </li>
      <?php endif; ?>
      <?php if(auth()->user()->can('user-menu')): ?>
      <li class="treeview <?php echo e('users' == $main_menu ? 'active menu-open' : ''); ?>">
        <a href="javascript: void(0);">
          <i class="fa fa-user"></i>
          <span> <?php echo app('translator')->get('pages_names.users'); ?> </span>
          <span class="pull-right-container">
            <i class="fa fa-angle-right pull-right"></i>
          </span>
        </a>

        <ul class="treeview-menu">
          <?php if(auth()->user()->can('view-users')): ?>
          <li class="<?php echo e('user_details' == $sub_menu ? 'active' : ''); ?>">
            <a href="<?php echo e(url('/users')); ?>"><i class="fa fa-circle-thin"></i><?php echo app('translator')->get('pages_names.user_details'); ?></a>
          </li>
          <?php endif; ?>
        </ul>
      </li>
      <?php endif; ?>

      <?php if(auth()->user()->can('view-sos')): ?>
      <li class="<?php echo e('emergency_number' == $main_menu ? 'active' : ''); ?>">
        <a href="<?php echo e(url('/sos')); ?>">
          <i class="fa fa-heartbeat"></i> <span><?php echo app('translator')->get('pages_names.emergency_number'); ?></span>
        </a>
      </li>
      <?php endif; ?>

       <?php if(auth()->user()->can('chat')): ?>
      <li class="<?php echo e('chat_module' == $main_menu ? 'active' : ''); ?>">
        <a href="<?php echo e(url('/chat')); ?>">
          <i class="fa fa-comment"></i> <span>Chat</span>
        </a>
      </li>

        <?php endif; ?>

      <?php if(auth()->user()->can('manage-promo')): ?>
      <li class="<?php echo e('manage-promo' == $main_menu ? 'active' : ''); ?>">
        <a href="<?php echo e(url('/promo')); ?>">
          <i class="fa fa-gift"></i> <span><?php echo app('translator')->get('pages_names.promo_codes'); ?></span>
        </a>
      </li>
      <?php endif; ?>

      <?php if(auth()->user()->can('notifications')): ?>
      <li class="treeview <?php echo e('notifications' == $main_menu ? 'active menu-open' : ''); ?>">
        <a href="javascript: void(0);">
          <i class="fa fa-paper-plane"></i>
          <span> <?php echo app('translator')->get('pages_names.notifications'); ?> </span>
          <span class="pull-right-container">
            <i class="fa fa-angle-right pull-right"></i>
          </span>
        </a>

        <ul class="treeview-menu">
          <?php if(auth()->user()->can('view-notifications')): ?>
          <li class="<?php echo e('push_notification' == $sub_menu ? 'active' : ''); ?>">
            <a href="<?php echo e(url('/notifications/push')); ?>"><i class="fa fa-circle-thin"></i><?php echo app('translator')->get('pages_names.push_notification'); ?></a>
          </li>
          <?php endif; ?>
        </ul>
      </li>
      <?php endif; ?>
      <?php if(auth()->user()->can('cancellation-reason')): ?>
      <li class="<?php echo e('cancellation-reason' == $main_menu ? 'active' : ''); ?>">
        <a href="<?php echo e(url('/cancellation')); ?>">
          <i class="fa fa-ban"></i> <span><?php echo app('translator')->get('pages_names.cancellation'); ?></span>
        </a>
      </li>
      <?php endif; ?>

     <?php if(auth()->user()->can('complaints')): ?>
      <li class="treeview <?php echo e('complaints' == $main_menu ? 'active menu-open' : ''); ?>">
        <a href="javascript: void(0);">
          <i class="fa fa-list-alt"></i>
          <span> <?php echo app('translator')->get('pages_names.complaints'); ?> </span>
          <span class="pull-right-container">
            <i class="fa fa-angle-right pull-right"></i>
          </span>
        </a>

        <ul class="treeview-menu">
          <?php if(auth()->user()->can('complaint-title')): ?>
          <li class="<?php echo e('complaint-title' == $sub_menu ? 'active' : ''); ?>">
            <a href="<?php echo e(url('/complaint/title')); ?>"><i class="fa fa-circle-thin"></i><?php echo app('translator')->get('pages_names.complaint_title'); ?></a>
          </li>
          <?php endif; ?>

          <?php if(auth()->user()->can('user-complaint')): ?>
          <li class="treeview <?php echo e('user-complaint' == $sub_menu ? 'active' : ''); ?>">
             <a href="javascript: void(0);">
                <i class="fa fa-circle-thin"></i>
                <span> <?php echo app('translator')->get('pages_names.user_complaints'); ?> </span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>

          
             <ul class="treeview-menu">
               <li class="<?php echo e('user-general-complaint' == $sub_menu ? 'active' : ''); ?>">
            <a href="<?php echo e(url('/complaint/users/general')); ?>"><?php echo app('translator')->get('pages_names.general_complaints'); ?></a></li>

               <li class="<?php echo e('user-request-complaint' == $sub_menu ? 'active' : ''); ?>">
            <a href="<?php echo e(url('/complaint/users/request')); ?>"><?php echo app('translator')->get('pages_names.request_complaints'); ?></a></li>
             </ul>
          </li>
          <?php endif; ?>

          <?php if(auth()->user()->can('driver-complaint')): ?>
          <li class="treeview <?php echo e('driver-complaint' == $sub_menu ? 'active' : ''); ?>">
             <a href="javascript: void(0);">
                <i class="fa fa-circle-thin"></i>
                <span> <?php echo app('translator')->get('pages_names.driver_complaints'); ?> </span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>
           

            <ul class="treeview-menu">
               <li class="<?php echo e('driver-general-complaint' == $sub_menu ? 'active' : ''); ?>">
            <a href="<?php echo e(url('/complaint/drivers/general')); ?>"><?php echo app('translator')->get('pages_names.general_complaints'); ?></a></li>

               <li class="<?php echo e('driver-request-complaint' == $sub_menu ? 'active' : ''); ?>">
            <a href="<?php echo e(url('/complaint/drivers/request')); ?>"><?php echo app('translator')->get('pages_names.request_complaints'); ?></a></li>
             </ul>
          </li>
          <?php endif; ?>

          <?php if(auth()->user()->can('owner-complaint')): ?>
          <li class="treeview <?php echo e('owner-complaint' == $sub_menu ? 'active' : ''); ?>">
             <a href="javascript: void(0);">
                <i class="fa fa-circle-thin"></i>
                <span> <?php echo app('translator')->get('pages_names.owner_complaints'); ?> </span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>

          
             <ul class="treeview-menu">
               <li class="<?php echo e('owner-general-complaint' == $sub_menu ? 'active' : ''); ?>">
            <a href="<?php echo e(url('/complaint/owner/general')); ?>"><?php echo app('translator')->get('pages_names.general_complaints'); ?></a></li>

               <li class="<?php echo e('owner-request-complaint' == $sub_menu ? 'active' : ''); ?>">
            <a href="<?php echo e(url('/complaint/owner/request')); ?>"><?php echo app('translator')->get('pages_names.request_complaints'); ?></a></li>
             </ul>
          </li>
          <?php endif; ?>


        </ul>
      </li>
      <?php endif; ?>

      <?php if(auth()->user()->can('reports')): ?>
      <li class="treeview <?php echo e('reports' == $main_menu ? 'active menu-open' : ''); ?>">
        <a href="javascript: void(0);">
          <i class="fa fa-file-pdf-o"></i>
          <span> <?php echo app('translator')->get('pages_names.reports'); ?> </span>
          <span class="pull-right-container">
            <i class="fa fa-angle-right pull-right"></i>
          </span>
        </a>

        <ul class="treeview-menu">
          <?php if(auth()->user()->can('user-report')): ?>
          <li class="<?php echo e('user_report' == $sub_menu ? 'active' : ''); ?>">
            <a href="<?php echo e(url('/reports/user')); ?>"><i class="fa fa-circle-thin"></i><?php echo app('translator')->get('pages_names.user_report'); ?></a>
          </li>
          <?php endif; ?>

          <?php if(auth()->user()->can('driver-report')): ?>
          <li class="<?php echo e('driver_report' == $sub_menu ? 'active' : ''); ?>">
            <a href="<?php echo e(url('/reports/driver')); ?>"><i class="fa fa-circle-thin"></i><?php echo app('translator')->get('pages_names.driver_report'); ?></a>
          </li>
          <?php endif; ?>
          <?php if(auth()->user()->can('driver-duties-report')): ?>
         <!--  <li class="<?php echo e('driver_duties_report' == $sub_menu ? 'active' : ''); ?>">
            <a href="<?php echo e(url('/reports/driver-duties')); ?>"><i class="fa fa-circle-thin"></i><?php echo app('translator')->get('pages_names.driver_duties_report'); ?></a>
          </li> -->
          <?php endif; ?>

          <?php if(auth()->user()->can('owner-report')): ?>
          <li class="<?php echo e('owner_report' == $sub_menu ? 'active' : ''); ?>">
            <a href="<?php echo e(url('/reports/owner')); ?>"><i class="fa fa-circle-thin"></i><?php echo app('translator')->get('pages_names.owner_report'); ?></a>
          </li>
          <?php endif; ?>

          <?php if(auth()->user()->can('finance-report')): ?>
          <li class="<?php echo e('finance_report' == $sub_menu ? 'active' : ''); ?>">
            <a href="<?php echo e(url('/reports/travel')); ?>"><i class="fa fa-circle-thin"></i><?php echo app('translator')->get('pages_names.finance_report'); ?></a>
          </li>
          <?php endif; ?>
        </ul>
      </li>
      <?php endif; ?>

      <?php if(auth()->user()->can('manage-map')): ?>
      <li class="treeview <?php echo e('manage-map' == $main_menu ? 'active menu-open' : ''); ?>">
        <a href="javascript: void(0);">
          <i class="fa fa-globe"></i>
          <span> <?php echo app('translator')->get('pages_names.manage-map'); ?> </span>
          <span class="pull-right-container">
            <i class="fa fa-angle-right pull-right"></i>
          </span>
        </a>

        <ul class="treeview-menu">
          <?php if(auth()->user()->can('heat-map')): ?>
          <li class="<?php echo e('heat_map' == $sub_menu ? 'active' : ''); ?>">
            <a href="<?php echo e(url('map/heatmap')); ?>"><i class="fa fa-circle-thin"></i><?php echo app('translator')->get('pages_names.heat_map'); ?></a>
          </li>
          <?php endif; ?>

          <?php if(auth()->user()->can('map-view')): ?>
          <li class="<?php echo e('map' == $sub_menu ? 'active' : ''); ?>">
            <a href="<?php echo e(route('mapView')); ?>"><i class="fa fa-circle-thin"></i><?php echo app('translator')->get('pages_names.map_view'); ?></a>
          </li>

         
          <?php endif; ?>
        </ul>
      </li>
      <?php endif; ?>
      <?php if(auth()->user()->can('manage-faq')): ?>
      <li class="<?php echo e('faq' == $main_menu ? 'active' : ''); ?>">
        <a href="<?php echo e(url('/faq')); ?>">
          <i class="fa fa-question-circle"></i> <span><?php echo app('translator')->get('pages_names.faq'); ?></span>
        </a>
      </li>
      <?php endif; ?>
      <?php if(auth()->user()->can('cms')): ?>
      
      <?php endif; ?>
      <!-- <?php if(auth()->user()->can('verify_purchasecode')): ?>
      <li class="<?php echo e('purchasecode' == $main_menu ? 'active' : ''); ?>">
        <a href="<?php echo e(url('/purchasecode')); ?>">
          <i class="fa fa-question-circle"></i> <span><?php echo app('translator')->get('pages_names.purchasecode'); ?></span>
        </a>
      </li>
      <?php endif; ?> -->

      <!--  <?php if(auth()->user()->can('view-companies')): ?>
          <li class="<?php echo e('company' == $main_menu ? 'active' : ''); ?>">
            <a href="<?php echo e(url('/company')); ?>">
              <i class="fa fa-building"></i> <span><?php echo app('translator')->get('pages_names.company'); ?></span>
            </a>
          </li>
        <?php endif; ?> -->


      <!--
          <?php if(access()->hasRole('super-admin')): ?>
          <li class="<?php echo e('project' == $main_menu ? 'active' : ''); ?>">
            <a href="<?php echo e(url('/project')); ?>">
              <i class="fa fa-file"></i> <span><?php echo app('translator')->get('pages_names.project'); ?></span>
            </a>
          </li>
          <?php endif; ?> -->
      <!--  <?php if(access()->hasRole('super-admin')): ?>
          <li class="<?php echo e('developer' == $main_menu ? 'active' : ''); ?>">
            <a href="<?php echo e(url('/developer')); ?>">
              <i class="fa fa-users"></i> <span><?php echo app('translator')->get('pages_names.developers'); ?></span>
            </a>
          </li>
          <?php endif; ?> -->


      <!--         <?php if(auth()->user()->can('view-builds')): ?>
          <li class="treeview <?php echo e('builds' == $main_menu ? 'active menu-open' : ''); ?>">
            <a href="javascript: void(0);">
              <i class="fa fa-share"></i>
              <span> Builds </span>
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
              </span>
            </a>

            <ul class="treeview-menu">
              <?php if(auth()->user()->can('view-builds')): ?>
                <li class="<?php echo e('list_builds' == $sub_menu ? 'active' : ''); ?>">
                    <a href="<?php echo e(url('builds/projects')); ?>"><i class="fa fa-list"></i> Build Lists</a>
                </li>
                <?php endif; ?>
              <?php if(auth()->user()->can('upload-builds')): ?>
                <li class="<?php echo e('upload_builds' == $sub_menu ? 'active' : ''); ?>">
                    <a href="<?php echo e(url('/builds/create')); ?>"><i class="fa fa-plus"></i>Upload Builds</a>
                </li>
                <?php endif; ?>

            </ul>
        </li>
        <?php endif; ?> -->
    </ul>
  </section>
</aside>
<?php /**PATH C:\laragon\www\taxi\resources\views/admin/layouts/navigation.blade.php ENDPATH**/ ?>