<?php
  $params['status'] = App\Consts::POST_STATUS['active'];
  $params['block_code'] = 'introduce';
  $introduce = App\Http\Services\PageBuilderService::getBlockContent($params)->get();
?>
<?php if(isset($introduce)): ?>
    <?php if(count($introduce) > 0): ?>
        <?php $__currentLoopData = $introduce; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $intro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($intro->parent_id == ''): ?>
                <section id="int">
                    <div class="ctn">
                        <div class="home13__row1 home__title">
                            <div class="home_h2"><span><?php echo e($intro->title); ?></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="cmd5">
                                <div class="int_l">
                                    <?php if($intro->image): ?>
                                    <style type="text/css">
                                        @media  screen and (max-width: 1024px){
                                            div.cmd5{
                                                display: none;
                                            }
                                        }
                                    </style>
                                        <img src="<?php echo e($intro->image); ?>" alt="<?php echo e($intro->title); ?>">
                                    <?php else: ?>
                                        <style type="text/css">
                                            .int_l iframe {
                                                width: 100%;
                                                position: absolute;
                                                top: 0;
                                                left: 0;
                                                height: 97% !important;
                                            }
                                        </style>
                                        <?php echo $intro->link_iframe; ?>

                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="cmd7 int_r">
                                <?php $__currentLoopData = $introduce; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $intro_it): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($intro_it->parent_id != ''): ?>
                                    <div class="item relative">
                                        <h3><?php echo e($intro_it->brief); ?></h3>
                                        <p><?php echo $intro_it->content; ?></p>
                                    </div>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>
                </section>
            <?php endif; ?>    
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
<?php endif; ?>     <?php /**PATH E:\xampp7428\htdocs\shopquanao\resources\views/frontend/element/gioithieu.blade.php ENDPATH**/ ?>