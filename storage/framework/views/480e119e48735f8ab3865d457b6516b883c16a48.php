<?php
	$params['status'] = 'active';
	$params['news_position'] = '1';
  	$taxonomy = App\Http\Services\ContentService::getCmsTaxonomy($params)
  	->get();

	$params['status'] = 'active';
	$params['news_position'] = '1';
  	$onerow = App\Http\Services\ContentService::getCmsPost($params)
  	->get();

?>
<?php if(isset($taxonomy)): ?>
	<?php if(count($taxonomy) > 0): ?>
		<?php $__currentLoopData = $taxonomy; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $taxonomy): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<?php
			$i = 0;
		?>
		<section class="section mb-4">
			<div class="section__header">
				<h2 class="section__title"><a href="/<?php echo e($taxonomy->taxonomy); ?>/<?php echo e($taxonomy->url_part); ?>.html" title="<?php echo e($taxonomy->title); ?>"><?php echo e($taxonomy->title); ?></a></h2>
			</div>
			<?php if(count($onerow) > 0): ?>
				<div class="row gutter-20">
					<div class="col-md-9 mobile-mb-4">
						<?php $__currentLoopData = $onerow; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $rows): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<?php if($rows->taxonomy_id == $taxonomy->id): ?>
							<?php
								if($i==0){
								$i++;
							?>
							<div class="news-4 media">
								<a class="news-4__frame" href="/chi-tiet/<?php echo e($rows->url_part); ?>.html" title="<?php echo e($rows->title); ?>">
									<img src="<?php echo e($rows->image); ?>" onerror="this.src='public/themes/frontend/yenbinh/themes/chuyennt/images/nopic.jpg'" alt="<?php echo e($rows->title); ?>" />
								</a>
								<div class="media-body">
									<h2 class="news-4__title">
										<a href="/chi-tiet/<?php echo e($rows->url_part); ?>.html" title="<?php echo e($rows->title); ?>"><?php echo e($rows->title); ?></a>
									</h2>
									<div class="news-4__info"><i class="fa fa-calendar mr-1"></i> 
										
										<?php echo e(date('d/m/Y', strtotime($rows->created_at))); ?>

										 &nbsp;&nbsp;|&nbsp;&nbsp; <i class="fa fa-eye mr-1"></i> <?php echo e($rows->number_view); ?>

									</div>
									<div class="news-4__desc"> <?php echo e($rows->brief); ?> </div>
									<div class="d-flex mt-1">
										<a class="news-4__btn" href="/chi-tiet/<?php echo e($rows->url_part); ?>.html" title="<?php echo e($rows->title); ?>"><span>Xem tiếp</span><i class="fa fa-angle-double-right ml-2"></i></a>
									</div>
								</div>
							</div>
							<?php 
								}
							?>
							<?php endif; ?>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</div>
																					
					<div class="col-md-3">
						<ul class="news-list">
							<?php $__currentLoopData = $onerow; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<?php if($row->taxonomy_id == $taxonomy->id): ?>
								<?php
									$i++;
									if($i>2){
								?>
									<li class="news-list__item">
										<h3 class="news-list__title">
											<a href="/chi-tiet/<?php echo e($row->url_part); ?>.html" title="<?php echo e($row->title); ?>"><?php echo e($row->title); ?></a>
										</h3>
										<div class="news-list__info"><i class="fa fa-calendar mr-1"></i> 
											
											<?php echo e(date('d/m/Y', strtotime($row->created_at))); ?>

											 &nbsp;&nbsp;|&nbsp;&nbsp; <i class="fa fa-eye mr-1"></i> <?php echo e($row->number_view); ?></div>
									</li>
								<?php 
									}
								?>
								<?php endif; ?>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>				
						</ul>
					</div>
				</div>
			<?php endif; ?>
		</section>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	<?php endif; ?>
<?php endif; ?><?php /**PATH E:\xampp7428\htdocs\yenbinh\resources\views/frontend/element/onerow_new.blade.php ENDPATH**/ ?>