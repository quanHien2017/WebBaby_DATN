<?php
  $params['status'] = App\Consts::POST_STATUS['active'];
  $params['block_code'] = 'hot-news';
  $hot_news = App\Http\Services\PageBuilderService::getBlockContent($params)->get();

  $params['status'] = 'active';
  $params['news_position'] = '1';
  $items = App\Http\Services\ContentService::getCmsPost($params)->limit(5)
  ->get();

?>
<?php if(isset($hot_news)): ?>
    <?php if(count($hot_news) > 0): ?>
        <?php $__currentLoopData = $hot_news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hot): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($hot->parent_id == ''): ?>
                <section class="container12 home17">
                    <div class="wrap">
                        <div class="">
                            <div class="home17__row1 home__title">
                                <span class="home_h2"><span><?php echo e($hot->title); ?></span></span>
                            </div>
                            <div class="home17__row2 d_flex">
                                <?php if(count($items) > 0): ?>
                                <div class="home17__row2__col home17__row2__col--v1 query_loop_ul_v2">
                                    <ul class="d_flex ">
                                        <li class="d_flex">
                                            <div class="thumb">
                                                <a href="/chi-tiet/<?php echo e($items[0]->url_part); ?>.html" title="<?php echo e($items[0]->title); ?>"><img data-lazyloaded="1" 
                                                    width="600" height="338" data-src="<?php echo e($items[0]->image); ?>"
                                                    alt="<?php echo e($items[0]->title); ?>" decoding="async" />
                                                </a>
                                            </div>
                                            <div class="text">
                                                <h3 class="text__title"><a href="/chi-tiet/<?php echo e($items[0]->url_part); ?>.html">
                                                    <?php
                                                        $total = 45;
                                                        $count = strlen($items[0]->title);
                                                        $title = $items[0]->title;
                                                        $nbsp = "&nbsp;";
                                                        if($total > $count){
                                                            $tong = ($total - $count);
                                                            $result = str_repeat($nbsp,$tong);
                                                            $title .= $result;
                                                        }
                                                    ?>
                                                    <?php echo $title; ?>

                                                </a></h3>
                                                <div class="text__info d_flex"><span><i class="svg__fa-calendar-alt"></i> <?php echo e(date('d/m/Y', strtotime($items[0]->created_at))); ?></span>
                                                </div>
                                                <p><span><?php echo e($items[0]->brief); ?></span>
                                                </p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <?php 
                                    unset($items[0]);
                                ?>

                                <div class="home17__row2__col home17__row2__col--v2 query_loop_ul_v2">
                                    <ul class="d_flex ">
                                        <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li class="d_flex">
                                            <div class="thumb">
                                                <a href="/chi-tiet/<?php echo e($item->url_part); ?>.html" title="<?php echo e($item->title); ?>"><img data-lazyloaded="1"
                                                    width="300" height="300" data-src="<?php echo e($item->image); ?>" class="attachment-thumbnail size-thumbnail wp-post-image" alt="<?php echo e($item->title); ?>"
                                                    decoding="async" />
                                                </a>
                                            </div>
                                            <div class="text">
                                                <h3 class="text__title"><a href="/chi-tiet/<?php echo e($item->url_part); ?>.html"><?php echo e($item->title); ?></a></h3>
                                                <div class="text__info d_flex"><span><i class="svg__fa-calendar-alt"></i> <?php echo e(date('d/m/Y', strtotime($item->created_at))); ?></span>
                                                </div>
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
<?php endif; ?> <?php /**PATH E:\xampp7428\htdocs\shopquanao\resources\views/frontend/element/tinnoibat.blade.php ENDPATH**/ ?>