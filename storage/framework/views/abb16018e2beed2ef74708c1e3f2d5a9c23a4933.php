<div class="msg_history">
          <div class="card-header profile" style=" box-shadow: none !important; background:none">
        <div class="chat-user-info d-flex align-items-center">
            <div class="chat-user-info-img">
                <img class="avatar-img" src="<?php echo e($user_data->profile_picture); ?>"  alt="Image Description">
            </div>
            <div class="chat-user-info-content">
                <h5 class="mb-0 text-capitalize"> 
                    <?php echo e($user_data->name); ?></h5>
                <span dir="ltr"><?php echo e($user_data->mobile); ?></span>
            </div>
        </div> 
    </div>
    <div class="incoming_msg_data"> 
        <?php $__currentLoopData = $get_messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php 
            $startDate = strtotime($value->created_at); 
            $current_date = time(); 
            $secs = $current_date - $startDate; 
            $days = $secs / 86400; 
            $minutes = $secs/60;  
            $hours = $secs / 3600;  
            if($days >= 1)
            {
                $time = intval($days)." days ago";
                if(intval($days) <= 1)
                {
                    $time = intval($days)." day ago";
                } 
            }
            else{
              if($hours >= 1){
                $time = intval($hours)." hours ago";
                if(intval($hours) <= 1)
                {
                    $time = intval($hours)." hour ago";
                } 
                
              }
              else{
                if($minutes >= 1){
                    $time = intval($minutes)." Minutes ago";
                    if(intval($minutes) <= 1)
                {
                    $time = intval($minutes)." Minute ago";
                } 
                
              }
              else{
                $time = "Just Now";
              }
              }
            } 
            ?>
        <?php if($value->from_id == $user_data->id): ?>
        <?php if($key == count($get_messages)-1): ?>
        <div class="incoming_msg" id="last_message">
        <?php else: ?>
        <div class="incoming_msg" >
        <?php endif; ?>
        
              <div class="incoming_msg_img"> <img src="<?php echo e($user_data->profile_picture); ?>" alt="sunil" style="width: 50px; aspect-ratio: 1; border-radius: 50%;"> </div>
              <div class="received_msg">
                <div class="received_withd_msg">
                  <p><?php echo e($value->message); ?></p>
                  <span class="time_date"> <?php echo e($time); ?></span></div>
              </div>
            </div>
        <?php else: ?>
        <?php if($key == count($get_messages)-1): ?>
        <div class="outgoing_msg" id="last_message">
        <?php else: ?>
        <div class="outgoing_msg">
        <?php endif; ?> 
              <div class="sent_msg">
              <p><?php echo e($value->message); ?></p>
                <span class="time_date"> <?php echo e($time); ?></span> </div>
            </div> 
        <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
         
          
          </div>
          <form id="SendMsg" method="post" enctype='multipart/form-data'>
          <div class="quill-custom_">
                <label for="msg" class="layer-msg">

                </label>
                <input type="hidden" name="message" value="" id="message">
                <textarea class="form-control pr--180" id="msg" rows="1" name="reply" style="height: 100px;display:none;"></textarea>
                <div class="emojionearea form-control pr--180" role="application"><div class="emojionearea-editor" contenteditable="true" placeholder="" tabindex="0" dir="ltr" spellcheck="false" autocomplete="off" autocorrect="off" autocapitalize="off"></div></div>
        
          <div class="upload__box">
            <div class="upload__img-wrap">
             
            
            </div>
           
            <?php echo csrf_field(); ?>
            <input type="hidden" name="chat_id" value="<?php echo e($get_chat_details->id); ?>">
            <input type="hidden" name="from_id" value="<?php echo e(Auth::user()->id); ?>">
            <input type="hidden" name="to_id" value="<?php echo e($user_data->id); ?>">
                  
                    <div id="file-upload-filename" class="upload__file-wrap"></div>
                    <!-- <div class="upload-btn-grp">
                        <label class="m-0">
                            <img src="https://stackfood-admin.6amtech.com/public/assets/admin/img/gallery.png" alt="" id="images_icon">
                            <input type="file" id="upload_input_images" name="images[]" class="d-none upload_input_images" data-max_length="2" accept="image/*" multiple="" onchange="handleFileUpload()">
                        </label>
                        
                        <label class="m-0 emoji-icon-hidden">
                            <img src="https://stackfood-admin.6amtech.com/public/assets/admin/img/emoji.png" alt="">
                        </label>
                    </div> -->
                </div>
                <button type="submit" class="btn btn-primary btn--primary con-reply-btn">Send
                </button>

        </div>
          </div>
          </form></div> <?php /**PATH C:\laragon\www\taxi\resources\views/admin/master/chat_messages.blade.php ENDPATH**/ ?>