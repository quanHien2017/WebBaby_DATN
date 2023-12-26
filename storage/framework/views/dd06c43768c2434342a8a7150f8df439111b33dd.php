<?php
	$params['status'] = 'active';
	$params['news_position'] = '2';
  	$twonewhot = App\Http\Services\ContentService::getCmsPost($params)
  	->get();

  	$class = '';
?>
<?php if(count($twonewhot) > 0 ): ?>
<div class="row gutter-16 pb-1">
	<?php $__currentLoopData = $twonewhot; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<?php 
		if($key == 0){
			$class = 'col-sm-8';
		}else{
			$class = 'col-sm-4';
		}
	?>
	<div class="<?php echo e($class); ?> mb-3">
		<div class="news-2">
			<a class="news-2__frame" href="/chi-tiet/<?php echo e($row->url_part); ?>.html" title="<?php echo e($row->title); ?>"><img src="<?php echo e($row->image); ?>" onerror="this.src='public/themes/frontend/yenbinh/themes/chuyennt/images/nopic.jpg'" alt="<?php echo e($row->title); ?>" /></a>
			<div class="news-2__body">
				<h3 class="news-2__title">
					<a href="/chi-tiet/<?php echo e($row->url_part); ?>.html" title="<?php echo e($row->title); ?>"><?php echo e($row->title); ?></a>
				</h3>
			</div>
		</div>
	</div>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php endif; ?><?php /**PATH E:\xampp7428\htdocs\yenbinh\resources\views/frontend/element/two_newhot.blade.php ENDPATH**/ ?>