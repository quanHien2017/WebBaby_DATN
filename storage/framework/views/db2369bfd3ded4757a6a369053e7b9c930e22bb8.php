<?php
  $params['status'] = App\Consts::POST_STATUS['active'];
  $params['news_position'] = '1';
  $params['is_featured'] = 'deactive';
  $params['taxonomy'] = 'san-pham';
  $danhmucnoibat = App\Http\Services\ContentService::getCmsTaxonomy($params)->get();
?>
<?php if(isset($danhmucnoibat)): ?>
<div class="row row-small"  id="row-68276556">
   <?php $__currentLoopData = $danhmucnoibat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="col medium-4 small-12 large-4"  >
       <div class="col-inner"  >
          <div class="banner has-hover bg-zoom hide-for-small" id="banner-<?php echo e($k); ?>">
             <div class="banner-inner fill">
                <div class="banner-bg fill" >
                   <div class="bg fill bg-fill "></div>
                   <div class="overlay"></div>
                </div>
                <div class="banner-layers container">
                   <a class="fill" href="/san-pham/<?php echo e($item->url_part); ?>.html">
                      <div class="fill banner-link"></div>
                   </a>
                   <div id="text-box-120640501" class="text-box banner-layer x50 md-x50 lg-x50 y50 md-y50 lg-y50 res-text">
                      <div class="text dark">
                         <div class="text-inner text-center">
                            <h3><span style="font-size: 130%;"><?php echo e($item->title); ?></span></h3>
                         </div>
                      </div>
                      <!-- text-box-inner -->
                      <style scope="scope">
                         #text-box-120640501 {
                         width: 60%;
                         }
                         #text-box-120640501 .text {
                         font-size: 100%;
                         }
                      </style>
                   </div>
                </div>
             </div>
             <style scope="scope">
                #banner-<?php echo e($k); ?> {
                padding-top: 64%;
                }
                #banner-<?php echo e($k); ?> .bg.bg-fill {
                background-image: url(<?php echo e($item->json_params->image); ?>);
                }
                #banner-<?php echo e($k); ?> .overlay {
                background-color: rgba(0,0,0,.5);
                }
             </style>
          </div>
       </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <style scope="scope">
    </style>
 </div>
<?php endif; ?><?php /**PATH E:\xampp7428\htdocs\shopquanao\resources\views/frontend/element/danhmucnoibat.blade.php ENDPATH**/ ?>