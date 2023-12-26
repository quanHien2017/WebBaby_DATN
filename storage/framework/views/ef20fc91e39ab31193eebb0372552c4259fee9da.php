<!DOCTYPE html>
<html lang="vi">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>

	<?php
	$page_title = $taxonomy->title;
	$title = $taxonomy->title;
	$image = $taxonomy->image;
	$seo_title = $title;
	$seo_keyword = $title;
	$seo_description = $taxonomy->brief;
	$seo_image = $image ?? null;

	$url_category = '/'.$taxonomy->taxonomy.'/'.$taxonomy->url_part.'.html';

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
<body class="">

	<div class="page">

	<?php echo $__env->make('frontend.element.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

		<div class="page__content">
			<div class="container">
				<nav class="main-nav">
					<div class="main-nav__list">
						<a class="main-nav__item active" href="/<?php echo e($taxonomy->taxonomy); ?>/<?php echo e($taxonomy->url_part); ?>.html"><?php echo e($taxonomy->title); ?></a>
						<?php $__currentLoopData = $taxonomylist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $taxolist): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<?php if($taxolist->parent_id == $taxonomy->id): ?>
								<a class="main-nav__item" href="/<?php echo e($taxolist->taxonomy); ?>/<?php echo e($taxolist->url_part); ?>.html"><?php echo e($taxolist->title); ?></a>
							<?php endif; ?>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</div>
					<div class="main-nav__dropdown"></div>
					<div class="main-nav__toggle"><span>...</span><i class="fa fa-angle-down ml-2"></i></div>
				</nav>	
				<?php if(count($posts) > 0): ?>
				<section class="section mb-20">
					<div class="row gutter-16">
						<?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>					
						<div class="col-6 col-md-4 col-lg-3 mb-3">
							<div class="news-5">
								<a class="news-5__frame" href="/chi-tiet/<?php echo e($item->url_part); ?>.html" title="<?php echo e($item->title); ?>">
								<img src="<?php echo e($item->image); ?>" onerror="this.src='/public/themes/frontend/yenbinh/themes/chuyennt/images/nopic.jpg'" alt="<?php echo e($item->title); ?>" />
								</a>
								<h3 class="news-5__title text-dark mb-0">
									<a href="/chi-tiet/<?php echo e($item->url_part); ?>.html" title="<?php echo e($item->title); ?>"><?php echo e($item->title); ?></a>
								</h3>
								<div class="news-5__info">
									<?php echo e(date('d/m/Y', strtotime($item->created_at))); ?>

								</div>
							</div>
						</div>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</div>
				</section>
				<?php echo e($posts->withQueryString()->links('frontend.pagination.default')); ?>

				<?php endif; ?>
			</div>
		</div>	

		<?php echo $__env->make('frontend.element.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>	

	</div>

<?php echo $__env->make('frontend.element.scrolltop', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>	

</body>

</html>
<?php /**PATH E:\xampp7428\htdocs\yenbinh\resources\views/frontend/pages/post/category_media.blade.php ENDPATH**/ ?>