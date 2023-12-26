<!DOCTYPE html>
<html lang="vi">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>

	<?php
	$page_title = $detail->title;
	$title = $detail->title;
	$image = $detail->image != '' ? $detail->image : null;
	$seo_title = $title;
	$seo_keyword = $title;
	$seo_description = $detail->brief;
	$seo_image = $image ?? null;

	$url_category = '/'.$detail->taxonomy.'/'.$detail->taxonomy_url_part.'.html';

	?>

	<title><?php echo e($page_title); ?></title>
	<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1" />
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="robots" content="index, follow" />
	<meta http-equiv="Content-Language" content="vi" />
	<meta name="copyright" content="Copyright" />
	<meta name="description" content="<?php echo e($seo_description); ?>" />
	<meta name="keywords" content="<?php echo e($seo_keyword); ?>" />
	<meta name="DC.title" content="<?php echo e($seo_title); ?>" />
	<meta property="og:type" name="ogtype" content="Website" />
	<meta property="og:title" name="ogtitle" content="<?php echo e($seo_title); ?>" />
	<meta property="og:description" name="ogdescription" content="<?php echo e($seo_description); ?>" />
	<meta property="og:image" name="ogimage" content="<?php echo e($seo_image); ?>" />
	<meta property="og:sitename" content="<?php echo e(Request::fullUrl()); ?>" />
	<link rel="canonical" href="<?php echo e(Request::fullUrl()); ?>" />
	<link rel="shortcut icon" type="image/png" href="<?php echo e($web_information->image->favicon ?? ''); ?>" />

	<?php echo $__env->make('frontend.panels.styles', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</head>
<body class="post-template-default single single-post single-format-standard cbp-spmenu-push cbp-spmenu-widget-push">

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
	            		<span>
	            			<a href="/<?php echo e($taxonomy->taxonomy); ?>/<?php echo e($taxonomy->url_part); ?>.html"><?php echo e($taxonomy->title); ?></a>
	            		</span> »
	            		<span class="breadcrumb_last" aria-current="page"><?php echo e($detail->title); ?></span>
	            	</span>
	            </p>
	         </div>
	         <div id="primary" class="sec32_col1">
	            <article>
				    <div class="entry-title">
				      <h1 class="entry-title__h1"><?php echo e($detail->title); ?></h1>
				    </div>
				    <div class="entry-post-info">
				   		<span><i class="svg__fa-calendar-alt"></i> Ngày cập nhật: <?php echo e(date('d/m/Y', strtotime($detail->created_at))); ?></span>
				   		<span><i class="svg__fa-user"></i> Tác giả: <?php echo e($detail->fullname); ?></span>
				   		<span><i class="svg__fa-eye"></i> <?php echo e($detail->number_view); ?> lượt xem</span>
				   	</div>
				    <div class="entry-content">
				     	<?php echo $detail->content; ?>

				    </div>
				</article>
				<?php if(count($posts) > 0): ?>
				<div class="entry-related__dich_vu">
				   <div class="entry-related__dich_vu__title h_4"><span>Tin tức liên quan</span></div>
				   <div id="metaslider-id-344604" style="max-width: 198px; margin: 0 auto;" class="ml-slider-3-29-1 metaslider metaslider-flex metaslider-344604 ml-slider single-footer-slider">
				      <div id="metaslider_container_344604">
				         <div id="metaslider_344604" class="flexslider">
				            <ul aria-live="polite" class="slides">
				            	<?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				                <li style="display: block; width: 100%;" class="slide-538432 ms-image">
				                   <a href="/chi-tiet/<?php echo e($item->url_part); ?>.html" target="_self" aria-label="navigation">
				                   	<img data-lazyloaded="1" style="height: 220px;width: 198px;object-fit: cover;" src="<?php echo e($item->image); ?>" data-src="<?php echo e($item->image); ?>" height="220" width="198" alt="<?php echo e($item->title); ?>" class="slider-344604 slide-538432 entered litespeed-loaded" title="<?php echo e($item->title); ?>" data-ll-status="loaded">
				                   </a>
				                    <div class="caption-wrap">
				                       <div class="caption"><?php echo e($item->title); ?></div>
				                    </div>
				                </li>
				                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				            </ul>
				         </div>
				      </div>
				   </div>
				</div>
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
<?php /**PATH /home/ntdconyj0yk6/phongkham.nvoting.com/resources/views/frontend/pages/post/detail.blade.php ENDPATH**/ ?>