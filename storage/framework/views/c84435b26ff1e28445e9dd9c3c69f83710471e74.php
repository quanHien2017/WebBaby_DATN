<?php
	$params['status'] = 'active';
	$params['news_position'] = '4';
  	$taxonomy = App\Http\Services\ContentService::getCmsTaxonomy($params)
  	->get();

	$params['status'] = 'active';
	$params['news_position'] = '1';
  	$newslide = App\Http\Services\ContentService::getCmsPost($params)
  	->get();
?>
<?php if(isset($taxonomy)): ?>
	<?php if(count($taxonomy) > 0): ?>
		<?php $__currentLoopData = $taxonomy; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $taxonomy): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<section class="aside">
			<div class="aside__header">
				<h2 class="aside__title"><?php echo e($taxonomy->title); ?></h2>
			</div>
			<div class="gallery-slider slider">
					<div class="gallery-slider__prev slider__prev">
					<i class="fa fa-angle-left"></i>
				</div>
				<div class="gallery-slider__next slider__next">
					<i class="fa fa-angle-right"></i>
				</div>
				<div class="gallery-slider__container swiper-container">
					<div class="swiper-wrapper home-slider-image">
						<?php if(count($newslide) > 0): ?>
							<?php $__currentLoopData = $newslide; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rows): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<?php if($rows->taxonomy_id == $taxonomy->id): ?>
								<div class="swiper-slide">
									<a class="gallery-slider__frame" href="<?php echo e($rows->image); ?>" data-fancybox="fallery">
										<img src="<?php echo e($rows->image); ?>" onerror="this.src='public/themes/frontend/yenbinh/themes/chuyennt/images/nopic.jpg'" alt="<?php echo e($rows->title); ?>" /></a>
									<a href="/chi-tiet/<?php echo e($rows->url_part); ?>.html" title="<?php echo e($rows->title); ?>"><?php echo e($rows->title); ?></a>
								</div>
								<?php endif; ?>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</section>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	<?php endif; ?>
<?php endif; ?>
<?php /**PATH E:\xampp7428\htdocs\phongkham\resources\views/frontend/element/thuvienanh.blade.php ENDPATH**/ ?>