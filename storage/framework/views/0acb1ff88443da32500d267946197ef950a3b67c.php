<?php
  $params['status'] = App\Consts::POST_STATUS['active'];
  $params['block_code'] = 'service';
  $dichvu = App\Http\Services\PageBuilderService::getBlockContent($params)->get();

  $params['status'] = App\Consts::POST_STATUS['active'];
  $params['news_position'] = '1';
  $params['taxonomy'] = 'dich-vu';
  $listdv = App\Http\Services\ContentService::getCmsTaxonomy($params)->get();
?>
<?php if(isset($dichvu)): ?>
    <?php if(count($dichvu) > 0): ?>
        <?php $__currentLoopData = $dichvu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dv): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <section class="container12 home13">
                <div class="wrap">
                    <div class="">
                        <div class="home13__row1 home__title">
                            <div class="home_h2"><span><?php echo e($dv->title); ?></span>
                            </div>
                        </div>
                        <div class="home13__row2">
                            <div class="owl-carousel owl-theme owl__v1">
                                <?php $__currentLoopData = $listdv; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="item">
                                    <div class="item__img">
                                        <a href="/chi-tiet-dich-vu/<?php echo e($item->url_part); ?>.html">
                                            <img data-lazyloaded="1" src="<?php echo e($item->json_params->image); ?>"
                                            width="373" height="538" data-src="<?php echo e($item->json_params->image); ?>" alt="Thai sản trọn gói">
                                        </a>
                                    </div>
                                    <i class="item__icon">
                                        <i class="svg__fa">
                                            <img data-lazyloaded="1" width="20" height="20" data-src="\public\themes\frontend\phongkham\img\svg_fff_svg__fa-stethoscope.svg" alt="svg__fa-">
                                        </i>
                                    </i>
                                    <h2 class="item__title">
                                        <a href="/chi-tiet-dich-vu/<?php echo e($item->url_part); ?>.html"><?php echo e($item->title); ?></a>
                                    </h2>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>    
    <?php endif; ?>
<?php endif; ?>     
<?php /**PATH E:\xampp7428\htdocs\phongkham\resources\views/frontend/element/dichvu.blade.php ENDPATH**/ ?>