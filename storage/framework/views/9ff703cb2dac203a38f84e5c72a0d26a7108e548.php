<?php
  $params['status'] = App\Consts::POST_STATUS['active'];
  $params['block_code'] = 'slide';
  $slide = App\Http\Services\PageBuilderService::getBlockContent($params)->get();
?>
<?php if(isset($slide)): ?>
    <?php if(count($slide) > 0): ?>
        <section class="container1903 home12">
            <div class="wrap">
                <div class="">
                    <div class="d_pc">
                        <div id="metaslider-id-33899" style="max-width: 1920px; margin: 0 auto;" class="ml-slider-3-29-1 metaslider metaslider-flex metaslider-33899 ml-slider slide-home">
                            <div id="metaslider_container_33899">
                                <div id="metaslider_33899">
                                    <ul aria-live="polite" class="slides">
                                        <?php $__currentLoopData = $slide; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($item->parent_id != ''): ?>
                                            <li style="display: block; width: 100%;" class="slide-536686 ms-image">
                                                <a href="<?php echo e($item->url_link); ?>" target="_self" aria-label="navigation">
                                                	<img data-lazyloaded="1"
                                                    data-src="<?php echo e($item->image); ?>" height="500" width="1920" alt="<?php echo e($item->title); ?>" class="slider-33899 slide-536686" title="<?php echo e($item->title); ?>" />
                                                </a>
                                            </li>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </section>
    <?php endif; ?>
<?php endif; ?>        <?php /**PATH /home/ntdconyj0yk6/phongkham.nvoting.com/resources/views/frontend/element/slide.blade.php ENDPATH**/ ?>