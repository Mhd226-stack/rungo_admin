<?php $__env->startSection('title', 'Main page'); ?>

<?php $__env->startSection('content'); ?>


<style>
#map {
height: 400px;
width: 80%;
left: 10px;
}
html, body {
padding: 0;
margin: 0;
height: 100%;
}

#panel {
width: 200px;
font-family: Arial, sans-serif;
font-size: 13px;
float: right;
margin: 10px;
margin-top: 100px;
}

#delete-button, #add-button, #delete-all-button, #save-button {
margin-top: 5px;
}
#search-box {
background-color: #f7f7f7;
font-size: 15px;
font-weight: 300;
margin-top: 10px;
margin-bottom: 10px;
margin-left: 10px;
padding: 0 11px 0 13px;
text-overflow: ellipsis;
height: 25px;
width: 80%;
border: 1px solid #c7c7c7;
}
.map_icons{
font-size: 24px;
color: white;
padding: 10px;
background-color: #43439999;
margin: 5px;
}
</style>

<div class="content">
<div class="container-fluid">
<div class="row">
<div class="col-sm-12">
<div class="box">

<div class="box-header with-border">
<a href="<?php echo e(url('zone')); ?>">
<button class="btn btn-danger btn-sm pull-right" type="submit">
<i class="mdi mdi-keyboard-backspace mr-2"></i>
<?php echo app('translator')->get('view_pages.back'); ?>
</button>
</a>
</div>
<div class="col-sm-12">
    <form  method="post" class="form-horizontal" action="<?php echo e(url('zone/store')); ?>" enctype="multipart/form-data">
<?php echo e(csrf_field()); ?>

<input type="hidden" id="info" name="coordinates" value="">

<input type="hidden" id="city_polygon" name="city_polygon" value="<?php echo e(old('city_polygon')); ?>">

<div class="row">
<div class="col-sm-5">
<div class="form-group">
<label for="zone_admin" class=""><?php echo app('translator')->get('view_pages.select_area'); ?> <sup>*</sup></label>
<select name="admin_id" id="zone_admin" class="form-control" required>
<option value="" ><?php echo app('translator')->get('view_pages.select_area'); ?></option>
<?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<option value="<?php echo e($service->id); ?>"><?php echo e($service->name); ?></option>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</select>
</div>
</div>

<div class="col-sm-5">
<?php if(!auth()->user()->company_key): ?>
<?php endif; ?>

</div>

<div class="col-sm-5">
<div class="form-group">
<label> <?php echo app('translator')->get('view_pages.name'); ?> <sup>*</sup></label>
<input class="form-control" id="zone_name" type="text" name="zone_name" value="<?php echo e(old('zone_name')); ?>" placeholder="<?php echo app('translator')->get('view_pages.enter_name'); ?>" required>
<span class="text-danger"><?php echo e($errors->first('zone_name')); ?></span>
</div>
</div>

<div class="col-sm-5">
<div class="form-group">
<label for="zone_admin" class=""><?php echo app('translator')->get('view_pages.select_unit'); ?> <sup>*</sup></label>
<select name="unit" id="unit" class="form-control" required>
<option value="" selected disabled><?php echo app('translator')->get('view_pages.select_unit'); ?></option>
<option value="1"><?php echo app('translator')->get('view_pages.kilo_meter'); ?></option>
<option value="2"><?php echo app('translator')->get('view_pages.miles'); ?></option>
</select>

</div>
</div>
</div>






<div class="row" style="margin-top: 50px;">
<div class="col-sm-12">


</div>
    
<div class="col-sm-5">
<div class="row">
    <div class="col-sm-12">
        <h4>Instruction</h4>
        <p>Allow users to interact with the map by clicking to add points/dots to define the boundary of the business zone.</p>
        <p><i class="fa fa-hand-pointer-o map_icons"></i>Use this ‘Hand Tool’ to drag your map for select your location.</p>
        <p><i class="fa fa-plus-circle map_icons"></i>Use this ‘Shape Tool’ to point out the areas and connect the dots. Minimum 3 points/dots are required.</p>
    </div>
    <div class="col-sm-12">
   <div id="gifContainer">
    <img  src="<?php echo e(asset('map/zone_draw.gif')); ?>" alt="GIF" />
    </div> 
</div>
</div>
</div>

<div class="col-sm-5" style="margin-top: 70px;">
<div class="row">
     <input name="search-box" id="search-box" class="form-control controls" type="text" placeholder="<?php echo app('translator')->get('view_pages.search'); ?>" />
<span class="text-danger"><?php echo e($errors->first('search-box')); ?></span>

<div id="map" class="col-sm-12" ></div>
</div>
</div>

<div id="" class="col-sm-2" style="margin-top: 70px;">
<ul style="list-style: none;">
<li>
<a id="select-button" href="javascript:void(0)" onclick="drawingManager.setDrawingMode(null)" class="btn-floating zone-add-btn btn-large waves-effect waves-light tooltipped" >
<i class="fa fa-hand-pointer-o map_icons"></i>
</a>
</li>

<li>
<a id="add-button" href="javascript:void(0)" onclick="drawingManager.setDrawingMode(google.maps.drawing.OverlayType.POLYGON)" class="btn-floating zone-add-btn btn-large waves-effect waves-light tooltipped" >
<i class="fa fa-plus-circle map_icons"></i>
</a>
</li>

<li>
<a id="delete-button" href="javascript:void(0)" onclick="deleteSelectedShape()" class="btn-floating zone-delete-btn btn-large waves-effect waves-light tooltipped" >
<i class="fa fa-times map_icons"></i>
</a>
</li>
<li>
<a id="delete-all-button" href="javascript:void(0)" onclick="clearMap()" class="btn-floating zone-delete-all-btn btn-large waves-effect waves-light tooltipped" >
<i class="fa fa-trash-o map_icons"></i>
</a>
</li>

</ul>
</div>



</div>
</div>
<div class="form-group text-right m-b-0"><br>
<button id="save-button" class="btn btn-primary btn-sm m-5 pull-right" type="submit">
<?php echo app('translator')->get('view_pages.save'); ?>
</button>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
</div>

<script src="https://maps.google.com/maps/api/js?key=<?php echo e(get_settings('google_map_key')); ?>&libraries=drawing,geometry,places"></script>

<script src="<?php echo e(asset('assets/js/polygon/main.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/polygon/nucleu.js')); ?>"></script>

<script type="text/javascript">

    $(document).ready(function() {
        var keyword = $('#city').val();

        if(keyword) getCoordsByKeyword(keyword);
    });

    $(document).on('change','#city',function(){
        var val = $(this).val();
        getCoordsByKeyword(val);
    });

    $(document).on('click','.searchCity',function(){
        var val = $('#city option:selected').val();
        if(val) getCoordsByKeyword(val);
    });

    $(document).on('keyup','.select2-search__field',function(){
        var val = $(this).val();

        if(val != '' && val.length > 2){
            $.ajax({
                url: '<?php echo e(route("getCityBySearch")); ?>',
                data: {search:val},
                method: 'get',
                success: function(results){
                    if(results.length > 0 ){
                        $('#city').html('');

                        results.forEach(city => {
                            $('#city').append('<option value="'+city[0]+'">'+city[0]+'</option>');
                        });
                    }
                }
            });
        }
    });

    function getCoordsByKeyword(keyword){
        // $('#loader').css('display','block');
        // $('#map').css('display','none');

        $.ajax({
            url: "<?php echo e(url('zone/coords/by_keyword')); ?>/"+keyword,
            data: '',
            method: 'get',
            success: function(results){
                if(results){
                    $('#city_polygon').val(results);

                    // setTimeout(function(){
                        // $('#loader').css('display','none');
                        // $('#map').css('display','block');
                    // }, 1000);
                    window.onload = initMap()
                }
            }
        });
    }
</script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\taxi\resources\views/admin/zone/create.blade.php ENDPATH**/ ?>