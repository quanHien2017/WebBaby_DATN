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

	<link rel="stylesheet" href="<?php echo e(asset('themes/frontend/phongkham/bacsi_chitiet.css')); ?>" />

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
	            		<span class="breadcrumb_last" aria-current="page"><?php echo e($taxonomy->title); ?></span> »
	            		<span class="breadcrumb_last" aria-current="page"><?php echo e($detail->title); ?></span>
	            	</span>
	            </p>
	         </div>
	         <div id="primary" class="sec32_col1">
	         	<div class="entry-doctor d_flex">
	         		<?php if($detail->image): ?>
				    <div class="thumb">
					   	<span>
					   		<img data-lazyloaded="1" src="<?php echo e($detail->image); ?>" width="350" height="370" data-src="<?php echo e($detail->image); ?>" class="attachment-full size-full wp-post-image entered litespeed-loaded" alt="<?php echo e($detail->title); ?>" decoding="async" data-ll-status="loaded">
					   	</span>
				   	</div>
				   	<?php endif; ?>
				   <div class="text">

				      <?php if($detail->trinhdo): ?><div class="text__h4"><?php echo e($detail->trinhdo); ?></div><?php endif; ?>
				      <?php if($detail->title): ?><h1 class="text__h1"><?php echo e($detail->title); ?></h1><?php endif; ?>
				      <?php if($detail->chucvu): ?><div class="text__h5"><?php echo e($detail->chucvu); ?></div><?php endif; ?>
				      <?php if($taxonomy->title): ?><div class="text__tax"><span><?php echo e($taxonomy->title); ?></span></div><?php endif; ?>
				      <div class="text__phone d_flex">
				      	 <?php if($detail->email): ?>
				         	<div class="text__phone__1"><a href="mailto:<?php echo e($detail->email); ?>"><small>Email:</small> <br class="d_mb"> <small><?php echo e($detail->email); ?></small></a></div>
				         <?php endif; ?>
				         <?php if($detail->sdt): ?>
				         	<div class="text__phone__2"><a href="tel:<?php echo e($detail->email); ?>"><small>Liên hệ:</small> <br class="d_mb"> <small><?php echo e($detail->sdt); ?></small></a></div>
				         <?php endif; ?>
				      </div>
				   </div>
				</div>
				<?php if($detail->content): ?>
				<div class="entry-content">
					<?php echo $detail->content; ?>

				</div>
	            <?php endif; ?>

				<?php if(count($posts) > 0): ?>
				<div class="entry-related">
				    <div class="entry-related__title h_4"><span>Xem thêm bác sĩ</span></div>

				    <div class="owl-carousel owl-theme owl__v1">
				   		<?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<div class="item">
						   <div class="thumb">
						   	<a href="/chi-tiet-bac-si/<?php echo e($item->url_part); ?>.html" title="<?php echo e($item->title); ?>">
						   		<img data-lazyloaded="1" src="<?php echo e($item->image); ?>" width="350" height="370" data-src="<?php echo e($item->image); ?>" class="attachment-full size-full wp-post-image entered litespeed-loaded" alt="<?php echo e($item->title); ?>" decoding="async" data-ll-status="loaded" />
						   	</a>
						   </div>
						   <div class="text">
						   		<div class="text__h4"><?php echo e($item->trinhdo); ?></div>
						   		<h3 class="text__title"><a href="/chi-tiet-bac-si/<?php echo e($item->url_part); ?>.html"><?php echo e($item->title); ?></a></h3>
						   		<div class="text__h5"></div>
						   </div>
						</div>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
<?php /**PATH E:\xampp7428\htdocs\phongkham\resources\views/frontend/pages/post/detail_doctor.blade.php ENDPATH**/ ?>