<?php
	$params['status'] = 'active';
	$params['news_position'] = '5';
  	$taxonomy = App\Http\Services\ContentService::getCmsTaxonomy($params)
  	->get();

	$params['status'] = 'active';
	$params['news_position'] = '1';
  	$thuvien = App\Http\Services\ContentService::getCmsPost($params)
  	->get();
?>
<?php if(isset($taxonomy)): ?>
	<?php if(count($taxonomy) > 0): ?>
		<?php $__currentLoopData = $taxonomy; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $taxonomy): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<?php if($taxonomy->taxonomy == 'media'): ?>
			<section class="aside">
				<div class="aside__header">
					<h2 class="aside__title"><?php echo e($taxonomy->title); ?></h2>
				</div>
				<div class="video-lib">
					<div class="video-lib__body">
						<?php if(count($thuvien) > 0): ?>
							<?php $__currentLoopData = $thuvien; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rows): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<?php if($rows->taxonomy_id == $taxonomy->id): ?>
								<div class="video-lib__item">
									<a href="/chi-tiet/<?php echo e($rows->url_part); ?>.html"><?php echo e($rows->title); ?></a>
								</div>
								<?php endif; ?>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						<?php endif; ?>	
					</div>
				</div>
			</section>
			<?php elseif($taxonomy->taxonomy == 'tai-lieu'): ?>
			<section class="aside">
				<div class="aside__header">
					<h2 class="aside__title"><?php echo e($taxonomy->title); ?></h2>
				</div>
				<ul class="as-doc">
					<?php if(count($thuvien) > 0): ?>
						<?php $__currentLoopData = $thuvien; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rows): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<?php if($rows->taxonomy_id == $taxonomy->id): ?>
							<li class="as-doc__item">
								<i class="fa fa-file-word-o"></i>
								<a class="as-doc__link" href="/chi-tiet/<?php echo e($rows->url_part); ?>.html" title="<?php echo e($rows->title); ?>"><?php echo e($rows->title); ?></a>
							</li>
							<?php endif; ?>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					<?php endif; ?>
				</ul>
			</section>
			<?php else: ?>
			<section class="aside">
				<div class="aside__header">
					<h2 class="aside__title"><?php echo e($taxonomy->title); ?></h2>
				</div>
				<ul class="as-doc">
					<?php if(count($thuvien) > 0): ?>
						<?php $__currentLoopData = $thuvien; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rows): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<?php if($rows->taxonomy_id == $taxonomy->id): ?>
							<li>
								<a class="as-doc__link" href="/chi-tiet/<?php echo e($rows->url_part); ?>.html" title="<?php echo e($rows->title); ?>"><?php echo e($rows->title); ?></a>
							</li>
							<?php endif; ?>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					<?php endif; ?>
				</ul>
			</section>
			<?php endif; ?>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	<?php endif; ?>
<?php endif; ?>		<?php /**PATH E:\xampp7428\htdocs\phongkham\resources\views/frontend/element/thuvienvideo.blade.php ENDPATH**/ ?>