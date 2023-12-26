<?php
  $params['status'] = App\Consts::POST_STATUS['active'];
  $params['block_code'] = 'latest-news';
  $last_news = App\Http\Services\PageBuilderService::getBlockContent($params)->get();

  $params['status'] = 'active';
  $params['order_by'] = 'created_at';
  $params['limit'] = '10';
  $items_new = App\Http\Services\ContentService::getCmsPost($params)
  ->get();
?>
<?php if(isset($last_news)): ?>
    <?php if(count($last_news) > 0): ?>
        <?php $__currentLoopData = $last_news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $last): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($last->parent_id == ''): ?>
                <section class="container12 home18">
                    <div class="wrap">
                        <div class="">
                            <div class="home18__row1 home__title">
                                <span class="home_h2"><span><?php echo e($last->title); ?></span></span>
                            </div>
                            <div class="home18__row2 query_loop_ul_v2">
                                <div class="owl_ul owl-carousel owl-theme owl__v1">
                                    <?php if(count($items_new) > 0): ?>
                                        <?php $__currentLoopData = $items_new; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="owl_ul_li item">
                                            <article>
                                                <div class="thumb">
                                                    <a href="/chi-tiet/<?php echo e($item->url_part); ?>.html" title="<?php echo e($item->title); ?>"><img data-lazyloaded="1"
                                                        width="480" height="270" data-src="<?php echo e($item->image); ?>" class="attachment-thumb-480x270 size-thumb-480x270 wp-post-image" alt="<?php echo e($item->title); ?>"
                                                        decoding="async" />
                                                    </a>
                                                </div>
                                                <div class="text">
                                                    <h3 class="text__title"><a href="/chi-tiet/<?php echo e($item->url_part); ?>.html"><?php echo e($item->title); ?></a></h3>
                                                    <div class="text__info d_flex"><span><i class="svg__fa-calendar-alt"></i> <?php echo e(date('d/m/Y', strtotime($item->created_at))); ?></span>
                                                    </div>
                                                </div>
                                            </article>
                                        </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            <?php endif; ?>    
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
<?php endif; ?> <?php /**PATH E:\xampp7428\htdocs\shopquanao\resources\views/frontend/element/tintucmoinhat.blade.php ENDPATH**/ ?>