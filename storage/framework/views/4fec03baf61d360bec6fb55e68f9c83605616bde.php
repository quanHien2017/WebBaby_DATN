<?php
	$params['status'] = 'active';
	$params['order_by'] = 'number_view'; 
	$params['limit'] = '5'; 
  	$docnhieu = App\Http\Services\ContentService::getCmsPost($params)
  	->get();
?>
<?php if(isset($docnhieu)): ?>
	<?php if(count($docnhieu) > 0): ?>
	<section class="aside">
		<div class="aside__header">
			<h2 class="aside__title">Tin đọc nhiều</h2>
		</div>
		<div class="aside__body">
			<div class="list">
				<?php $__currentLoopData = $docnhieu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rows): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<div class="list__item">
					<div class="news media">
						<a class="news__frame" href="/chi-tiet/<?php echo e($rows->url_part); ?>.html" title="<?php echo e($rows->title); ?>"><img src="<?php echo e($rows->image); ?>" onerror="this.src='/public/themes/frontend/yenbinh/themes/chuyennt/images/nopic.jpg'" alt="<?php echo e($rows->title); ?>" /></a>
						<div class="media-body">
							<h3 class="news__title">
								<a href="/chi-tiet/<?php echo e($rows->url_part); ?>.html" title="<?php echo e($rows->title); ?>"><?php echo e($rows->title); ?></a>
							</h3>
							<div class="news__info"><i class="fa fa-eye mr-1"></i> <?php echo e($rows->number_view); ?></div>
						</div>
					</div>
				</div>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</div>
		</div>
	</section>
	<?php endif; ?>
<?php endif; ?><?php /**PATH E:\xampp7428\htdocs\yenbinh\resources\views/frontend/element/tintucdocnhieu.blade.php ENDPATH**/ ?>