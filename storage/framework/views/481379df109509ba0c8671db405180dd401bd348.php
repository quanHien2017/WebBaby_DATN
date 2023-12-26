<?php
  $params['status'] = App\Consts::POST_STATUS['active'];
  $params['block_code'] = 'video';
  $video = App\Http\Services\PageBuilderService::getBlockContent($params)->get();

  $params['status'] = 'active';
  $params['news_position'] = '1';
  $params['limit'] = '5';
  $items = App\Http\Services\ContentService::getCmsMedia($params)
  ->get();
?>
<?php if(isset($video)): ?>
    <?php if(count($video) > 0): ?>
        <?php $__currentLoopData = $video; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vd): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($vd->parent_id == ''): ?>
            <section class="container12 home16">
                <div class="wrap">
                    <div class="">
                        <div class="home16__row1 home__title">
                            <span class="home_h2"><span><?php echo e($vd->title); ?></span></span>
                        </div>
                        <div class="home16__row2 d_flex">
                            <?php if(count($items) > 0): ?>
                            <div class="home16__row2__col home16__row2__col--v1">
                                <ul class="d_flex ">
                                    <li class="d_flex">
                                        <div class="thumb">
                                            <a href="/chi-tiet-thu-vien/<?php echo e($items[0]->url_part); ?>.html" title="<?php echo e($items[0]->title); ?>"><img data-lazyloaded="1" width="600" height="319" data-src="<?php echo e($items[0]->image); ?>" class="attachment-medium size-medium wp-post-image" alt="<?php echo e($items[0]->title); ?>" decoding="async" />
                                            </a>
                                        </div>
                                        <div class="text">
                                            <h3 class="text__title"><a href="/chi-tiet-thu-vien/<?php echo e($items[0]->url_part); ?>.html"><?php echo e($items[0]->title); ?></a></h3>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <?php 
                                unset($items[0]);
                            ?>
                            <div class="home16__row2__col home16__row2__col--v2">
                                <ul class="d_flex ">
                                    <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="d_flex">
                                        <div class="thumb">
                                            <a href="/chi-tiet-thu-vien/<?php echo e($item->url_part); ?>.html" title="<?php echo e($item->title); ?>"><img data-lazyloaded="1" width="150" height="150" data-src="<?php echo e($item->image); ?>" class="attachment-thumb-150x150 size-thumb-150x150 wp-post-image" alt="<?php echo e($item->title); ?>" decoding="async" />
                                            </a>
                                        </div>
                                        <div class="text">
                                            <h3 class="text__title"><a href="/chi-tiet-thu-vien/<?php echo e($item->url_part); ?>.html"><?php echo e($item->title); ?></a></h3>
                                        </div>
                                    </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </section>
            <?php endif; ?>    
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
<?php endif; ?> <?php /**PATH E:\xampp7428\htdocs\shopquanao\resources\views/frontend/element/video.blade.php ENDPATH**/ ?>