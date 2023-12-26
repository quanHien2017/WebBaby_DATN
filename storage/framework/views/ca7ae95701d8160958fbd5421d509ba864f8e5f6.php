<?php
  $params['status'] = App\Consts::POST_STATUS['active'];
  $params['block_code'] = 'doctor';
  $doctor = App\Http\Services\PageBuilderService::getBlockContent($params)->get();

  $paramDT['status'] = App\Consts::POST_STATUS['active'];
  $paramDT['position'] = '1';
  $list = App\Http\Services\ContentService::getCmsProfile($paramDT)->get();
?>
<?php if(isset($doctor)): ?>
    <?php if(count($doctor) > 0): ?>
        <?php $__currentLoopData = $doctor; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <section class="container12 home14" style="display: none1;">
                <div class="wrap">
                    <div class="">
                        <div class="home14__row1 home__title">
                            <span class="home_h2"><span><?php echo e($dt->title); ?></span></span>
                        </div>
                        <div class="home14__row2">
                            <div class="owl_ul owl-carousel owl-theme owl__v1 home14__row2__owl home14__row2__owl--v1">
                                <?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="owl_ul_li item">
                                    <div class="thumb">
                                    	<img width="350" height="370" class="owl-lazy wp-post-image" alt="<?php echo e($item->title); ?>" decoding="async" data-src="<?php echo e($item->image); ?>" src="<?php echo e($item->image); ?>" 
                                        />
                                    </div>
                                    <div class="text">
                                        <div class="text__h4"><?php echo e($item->trinhdo); ?></div>
                                        <h3 class="text__title"><a href="/chi-tiet-bac-si/<?php echo e($item->url_part); ?>.html"><?php echo e($item->title); ?></a></h3>
                                        <div class="text__h5"><?php echo e($item->chucvu); ?></div>
                                        <div class="text__p">
                                            <?php echo $item->content; ?>

                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                            <div class="owl_ul owl-carousel owl-theme owl__v1 home14__row2__owl home14__row2__owl--v2">
                                <?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="owl_ul_li item">
                                    <div class="thumb">
                                        <img width="300" height="300" class="owl-lazy wp-post-image" alt="<?php echo e($item2->title); ?>" decoding="async" data-src="<?php echo e($item2->image); ?>" src="<?php echo e($item->image); ?>"
                                        />
                                    </div>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
<?php endif; ?> <?php /**PATH E:\xampp7428\htdocs\shopquanao\resources\views/frontend/element/doingubacsi.blade.php ENDPATH**/ ?>