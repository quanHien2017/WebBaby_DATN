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
<?php /**PATH E:\xampp7428\htdocs\yenbinh\resources\views/frontend/pages/post/category.blade.php ENDPATH**/ ?>