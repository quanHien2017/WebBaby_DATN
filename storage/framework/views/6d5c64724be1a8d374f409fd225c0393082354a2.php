<!DOCTYPE html>
<html lang="vi">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>

    <?php
        $page_title = $keyword;
    ?>

    <title>Tìm kiếm <?php echo e($page_title); ?></title>
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1" />
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="robots" content="index, follow" />
    <meta http-equiv="Content-Language" content="vi" />
    <meta name="copyright" content="Copyright" />
    <meta property="og:sitename" content="<?php echo e(Request::fullUrl()); ?>" />
    <link rel="canonical" href="<?php echo e(Request::fullUrl()); ?>" />
    <link rel="shortcut icon" type="image/png" href="<?php echo e($web_information->image->favicon ?? ''); ?>" />

    <?php echo $__env->make('frontend.panels.styles', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</head>
<body class="archive category category-24 cbp-spmenu-push cbp-spmenu-widget-push">

    <?php echo $__env->make('frontend.element.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make('frontend.element.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <section class="container12 sec32">
       <div class="wrap">
          <div class="d_flex">
             <div class="sec32_row0">
                <p class="entry-breadcrumb yoast_breadcrumb">
                    <span>
                        <span>
                            <a href="/">Trang chủ</a>
                        </span> » 
                        <span class="breadcrumb_last" aria-current="page">Bạn đã tìm "<?php echo e($keyword); ?>"</span>
                    </span>
                </p>
             </div>
             <div id="primary" class="sec32_col1">
                <?php if(count($posts) > 0): ?>
                <div class="entry-loop">
                   <ul class="d_flex">
                        <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <li class="d_flex">
                             <div class="thumb">
                                <a href="/chi-tiet/<?php echo e($item->url_part); ?>.html" title="<?php echo e($item->title); ?>">
                                    <img data-lazyloaded="1" width="480" height="270" src="<?php echo e($item->image); ?>" class="attachment-thumb-480x270 size-thumb-480x270 wp-post-image entered litespeed-loaded" alt="<?php echo e($item->title); ?>" decoding="async" data-ll-status="loaded">
                                </a>
                             </div>
                             <div class="text">
                                <h2 class="text__title">
                                    <a href="/chi-tiet/<?php echo e($item->url_part); ?>.html"><?php echo e($item->title); ?></a>
                                </h2>
                                <div class="text__info d_flex">
                                    <span class="">
                                        <span>
                                            <i class="svg__fa-calendar-alt"></i> <?php echo e(date('d/m/Y', strtotime($item->created_at))); ?>

                                        </span>
                                    </span>
                                </div>
                                <p><span><?php echo e($item->brief); ?></span></p>
                             </div>
                          </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                   </ul>
                </div>
                <?php echo e($posts->withQueryString()->links('frontend.pagination.newdefault')); ?>

                <?php endif; ?>
             </div>
             <div id="secondary" class="sec32_col2">

                <?php echo $__env->make('frontend.element.cauhoi_left', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <?php echo $__env->make('frontend.element.tintucmoi_left', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

             </div>
          </div>
       </div>
    </section>

    <?php echo $__env->make('frontend.element.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make('frontend.panels.scrolltop', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make('frontend.panels.scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</body>
</html>
<?php /**PATH E:\xampp7428\htdocs\phongkham\resources\views/frontend/pages/post/default.blade.php ENDPATH**/ ?>