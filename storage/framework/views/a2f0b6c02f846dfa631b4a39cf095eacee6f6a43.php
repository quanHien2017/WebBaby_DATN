<?php
  $params['status'] = App\Consts::POST_STATUS['active'];
  $params['block_code'] = 'slide';
  $slide = App\Http\Services\PageBuilderService::getBlockContent($params)->get();
?>
<?php if(isset($slide)): ?>
<div class="row row-small"  id="row-1060465406">
 <div class="col hide-for-small medium-3 small-12 large-3"  >
    <div class="col-inner"></div>
 </div>
 <div class="col medium-9 small-12 large-9"  >
    <div class="col-inner"  >
       <div class="gap-element clearfix" style="display:block; height:auto; padding-top:10px"></div>
       <div class="slider-wrapper relative" id="slider-1296881392" >
          <div class="slider slider-nav-dots-simple slider-nav-simple slider-nav-large slider-nav-light slider-style-normal"
             data-flickity-options='{
             "cellAlign": "center",
             "imagesLoaded": true,
             "lazyLoad": 1,
             "freeScroll": false,
             "wrapAround": true,
             "autoPlay": 3000,
             "pauseAutoPlayOnHover" : true,
             "prevNextButtons": true,
             "contain" : true,
             "adaptiveHeight" : true,
             "dragThreshold" : 10,
             "percentPosition": true,
             "pageDots": false,
             "rightToLeft": false,
             "draggable": true,
             "selectedAttraction": 0.1,
             "parallax" : 0,
             "friction": 0.6        }'
             >
              <?php $__currentLoopData = $slide; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php if($item->parent_id != ''): ?>
                   <div class="img has-hover x md-x lg-x y md-y lg-y" id="image_1395749462">
                      <a class="" href="<?php echo e($item->url_link); ?>" target="_self" >
                         <div class="img-inner image-cover dark" style="padding-top:39.5%;">
                            <img width="820" height="492" src="<?php echo e($item->image); ?>" data-src="<?php echo e($item->image); ?>" class="lazy-load attachment-original size-original" alt="<?php echo e($item->title); ?>" sizes="(max-width: 820px) 100vw, 820px" />						
                         </div>
                      </a>
                      <style scope="scope">
                         #image_1395749462 {
                         width: 100%;
                         }
                      </style>
                   </div>
                  <?php endif; ?>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>   
          </div>
          <div class="loading-spin dark large centered"></div>
          <style scope="scope">
          </style>
       </div>
       <!-- .ux-slider-wrapper -->
    </div>
 </div>
 <style scope="scope">
 </style>
</div>
<?php endif; ?> <?php /**PATH E:\xampp7428\htdocs\shopquanao\resources\views/frontend/element/slide.blade.php ENDPATH**/ ?>