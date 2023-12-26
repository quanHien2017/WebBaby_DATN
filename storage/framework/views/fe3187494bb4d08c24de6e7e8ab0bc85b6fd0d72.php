<?php
	$params['status'] = 'active';
	$params['news_position'] = '3';
  	$slidenewhot = App\Http\Services\ContentService::getCmsPost($params)
  	->get();
?>
<?php if(count($slidenewhot) > 0 ): ?>
<section class="bg-danger p-3 mb-4">
	<div class="news-slider slider">
		<div class="news-slider__prev slider__prev">
			<i class="fa fa-angle-left"></i>
		</div>
		<div class="news-slider__next slider__next">
			<i class="fa fa-angle-right"></i>
		</div>
		<div class="news-slider__container swiper-container">
			<div class="swiper-wrapper">
				<?php $__currentLoopData = $slidenewhot; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<div class="swiper-slide">
					<div class="news-3">
						<a class="news-3__frame" href="/chi-tiet/<?php echo e($row->url_part); ?>.html" title="<?php echo e($row->title); ?>"><img src="<?php echo e($row->image); ?>" onerror="this.src='public/themes/frontend/yenbinh/themes/chuyennt/images/nopic.jpg'" alt="<?php echo e($row->title); ?>" /></a>
						<h3 class="news-3__title">
							<a href="/chi-tiet/<?php echo e($row->url_part); ?>.html" title="<?php echo e($row->title); ?>"><?php echo e($row->title); ?></a>
						</h3>
					</div>
				</div>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>			
			</div>
		</div>
	</div>
</section>
<?php endif; ?><?php /**PATH E:\xampp7428\htdocs\yenbinh\resources\views/frontend/element/slide_newhot.blade.php ENDPATH**/ ?>