<?php
	$params['status'] = 'active';
	$params['news_position'] = '3';
  	$taxonomy = App\Http\Services\ContentService::getCmsTaxonomy($params)
  	->get();

	$params['status'] = 'active';
	$params['news_position'] = '1';
  	$threerow = App\Http\Services\ContentService::getCmsPost($params)
  	->get();
?>
<?php if(isset($taxonomy)): ?>
	<?php if(count($taxonomy) > 0): ?>
		<section class="section mb-4">
			<div class="overflow-hidden">
				<div class="row gutter-20">	
					<?php $__currentLoopData = $taxonomy; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $taxonomy): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<?php
						$i3 = 0;
					?>
					<div class="col-md-4 col-sm-6 border-right mobile-mb-4">
						<section class="section-2">
							<h2 class="section-2__title"><a href="/<?php echo e($taxonomy->taxonomy); ?>/<?php echo e($taxonomy->url_part); ?>.html" title="<?php echo e($taxonomy->title); ?>"><?php echo e($taxonomy->title); ?></a></h2>

							<?php if(count($threerow) > 0): ?>
								<?php $__currentLoopData = $threerow; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rows): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<?php if($rows->taxonomy_id == $taxonomy->id): ?>
									<?php
										if($i3==0){
										$i3++;
									?>
									<div class="news-5">
										<a class="news-5__frame" href="/chi-tiet/<?php echo e($rows->url_part); ?>.html" title="<?php echo e($rows->title); ?>"><img src="<?php echo e($rows->image); ?>" onerror="this.src='public/themes/frontend/yenbinh/themes/chuyennt/images/nopic.jpg'" alt="<?php echo e($rows->title); ?>" /></a>
										<h3 class="news-5__title">
											<a href="/chi-tiet/<?php echo e($rows->url_part); ?>.html" title="<?php echo e($rows->title); ?>"><?php echo e($rows->title); ?></a>
										</h3>
									</div>
									<?php 
										}
									?>
									<?php endif; ?>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>		
								<ul class="news-list pt-1 mt-2 border-top">
									<?php $__currentLoopData = $threerow; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<?php if($row->taxonomy_id == $taxonomy->id): ?>
										<?php
											$i3++;
											if($i3>2){
										?>
										<li class="news-list__item">
											<h3 class="news-list__title">
												<a href="/chi-tiet/<?php echo e($row->url_part); ?>.html" title="<?php echo e($row->title); ?>"><?php echo e($row->title); ?></a>
											</h3>
										</li>
										<?php 
											}
										?>
										<?php endif; ?>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</ul>
							<?php endif; ?>
						</section>
					</div>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</div>
			</div>
		</section>
	<?php endif; ?>
<?php endif; ?><?php /**PATH E:\xampp7428\htdocs\yenbinh\resources\views/frontend/element/threerow_new.blade.php ENDPATH**/ ?>