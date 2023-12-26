<?php
  $params['status'] = App\Consts::POST_STATUS['active'];
  $params['block_code'] = 'header';
  
  $header = App\Http\Services\PageBuilderService::getBlockContent($params)->get();
?>
<?php if(isset($header)): ?>
    <?php if(count($header) > 0): ?>
        <?php $__currentLoopData = $header; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $head): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <header id="header" class="header">
            <section class="container12 head1 d_pc">
                <div class="wrap">
                    <div class="d_flex">
                        <div class="head1__col1 d_pc">
                            <span class="span_1"><i></i><b>Cấp cứu:</b> <small> <?php echo e($web_information->information->capcuu); ?></small></span>
                            <span class="spacer"></span>
                            <span class="span_1"><i></i><b>Tổng đài:</b> <small> <?php echo e($web_information->information->hotline); ?></small></span>
                            <span class="spacer"></span>
                            <span class="span_1"><b><i></i>Trực sản (24/24):</b> <small> <?php echo e($web_information->information->trucsan); ?></small></span>
                            <span class="spacer"></span>
                            <span class="span_1"><b><i></i>Hotline khoa Nhi:</b> <small> <?php echo e($web_information->information->hotline_khoanhi); ?></small></span>
                        </div>
                        <div class="head1__col1 d_mb">
                            <span class="span_1"><i></i><b>Cấp cứu:</b> <a href="tel: <?php echo e(str_replace(array('(',')','+'),'', $web_information->information->capcuu)); ?>"> <?php echo e($web_information->information->capcuu); ?></a></span>
                            <span class="spacer"></span>
                            <span class="span_1"><i></i><b>Tổng đài:</b> <a href="tel: <?php echo e(str_replace(array('(',')','+'),'', $web_information->information->hotline)); ?>"> <?php echo e($web_information->information->hotline); ?></a></span>
                            <span class="spacer"></span>
                            <span class="span_1"><b><i></i>Trực sản (24/24):</b> <a href="tel: <?php echo e(str_replace(array('(',')','+'),'', $web_information->information->trucsan)); ?>"> <?php echo e($web_information->information->trucsan); ?></a></span>
                            <span class="spacer"></span>
                            <span class="span_1"><b><i></i>Hotline khoa Nhi:</b> <a href="tel: <?php echo e(str_replace(array('(',')','+'),'', $web_information->information->hotline_khoanhi)); ?>"> <?php echo e($web_information->information->hotline_khoanhi); ?></a></span>
                        </div>
                        <div class="head1__col2">
                        </div>
                    </div>
                </div>
            </section>
            <section class="container12 head2 d_pc">
                <div class="wrap">
                    <div class="d_flex">
                        <div class="head2__col1">
                            <h1 class="head2__col1__h1">
                            	<a href="/">
                            		<img data-lazyloaded="1" width="300" style="max-height: 80px;" data-src="<?php echo e($web_information->image->logo_header ?? ''); ?>" alt="Phòng khám">
                            	</a>
                            </h1>
                        </div>
                        <style type="text/css">
                            p span strong {
                                font-size: 22px;
                            }
                        </style>
                        <div class="head2__col2"><?php echo $head->content; ?></div>
                        <div class="head2__col3">
                            <form action="<?php echo e(route('frontend.cms.post_category_search')); ?>" method="get" class="d_flex">
                                <input type="text" name="keyword" id="keyword" placeholder="Tìm kiếm" autocomplete="off" aria-label="Tìm kiếm">
                                <button type="submit" value="Tìm kiếm">
                                    <i class="svg__fa">
                                        <img data-lazyloaded="1" width="16" height="16" data-src="/public/themes/frontend/phongkham/img/svg__fa-search.svg" alt="svg__fa-">
                                    </i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
            <section class="container12 head3 d_pc">
                <div class="wrap">
                    <div class="" role="navigation">
                        <div class="main-menu-top"></div>
                    </div>
                </div>
            </section>
        </header>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
<?php endif; ?><?php /**PATH /home/ntdconyj0yk6/phongkham.nvoting.com/resources/views/frontend/element/header.blade.php ENDPATH**/ ?>