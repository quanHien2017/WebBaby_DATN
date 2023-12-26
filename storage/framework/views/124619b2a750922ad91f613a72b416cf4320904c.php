<!DOCTYPE html>
<html lang="vi">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>

    <title></title>
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1" />
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="robots" content="index, follow" />
    <meta http-equiv="Content-Language" content="vi" />
    <meta name="copyright" content="Copyright" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="DC.title" content="" />
    <meta property="og:type" name="ogtype" content="Website" />
    <meta property="og:title" name="ogtitle" content="" />
    <meta property="og:description" name="ogdescription" content="" />
    <meta property="og:image" name="ogimage" content="" />
    <meta property="og:sitename" content="<?php echo e(Request::fullUrl()); ?>" />
    <link rel="canonical" href="<?php echo e(Request::fullUrl()); ?>" />
    <link rel="shortcut icon" type="image/png" href="<?php echo e($web_information->image->favicon ?? ''); ?>" />

    <?php echo $__env->make('frontend.panels.styles', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</head>
<body class="">

    <div class="page">

    <?php echo $__env->make('frontend.element.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>  

    

        <div class="page__content">
            <div class="container">
                 
                <div class="row gutter-20">
                    <div class="col-lg-9 mb-20">
                        <?php if(count($posts) > 0): ?>
                        <section class="section pt-0">
                            <div class="list-2">
                                <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="list-2__item">
                                    <div class="news-4 media">
                                        <a class="news-4__frame" href="/chi-tiet/<?php echo e($item->url_part); ?>.html" title="<?php echo e($item->title); ?>"><img src="<?php echo e($item->image); ?>" onerror="this.src='/public/themes/frontend/yenbinh/themes/chuyennt/images/nopic.jpg'" alt="<?php echo e($item->title); ?>" /></a>
                                        <div class="media-body">
                                            <h2 class="news-4__title">
                                                <a href="/chi-tiet/<?php echo e($item->url_part); ?>.html" title="<?php echo e($item->title); ?>"><?php echo e($item->title); ?></a>
                                            </h2>
                                            <div class="news-4__info"><i class="fa fa-calendar mr-1"></i> <?php echo e(date('d/m/Y', strtotime($item->created_at))); ?> &nbsp;&nbsp;|&nbsp;&nbsp; <i class="fa fa-eye mr-1"></i> <?php echo e($item->number_view); ?></div>
                                            <div class="news-4__desc"><?php echo e($item->title); ?></div>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </section>  

                        <?php echo e($posts->withQueryString()->links('frontend.pagination.default')); ?>

                        <?php else: ?>

                        <section class="section pt-0">
                            Không tìm thấy tin tức theo tiêu chí tìm kiếm
                        </section>

                        <?php endif; ?>
                    </div>

                    <div class="col-lg-3 mb-20">

                        <?php echo $__env->make('frontend.element.nightmode', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                        <?php echo $__env->make('frontend.element.tintucdocnhieu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                        <?php echo $__env->make('frontend.element.truycap', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                        <?php echo $__env->make('frontend.element.facebook', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        
                    </div>
                </div>
        </div>  

        <?php echo $__env->make('frontend.element.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 

    </div>

<?php echo $__env->make('frontend.element.scrolltop', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>  

</body>

</html>
<?php /**PATH E:\xampp7428\htdocs\yenbinh\resources\views/frontend/pages/post/default.blade.php ENDPATH**/ ?>