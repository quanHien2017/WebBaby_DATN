<?php
  $params['status'] = App\Consts::POST_STATUS['active'];
  $params['block_code'] = 'slide';
  
  $slide = App\Http\Services\PageBuilderService::getBlockContent($params)->get();
?>
<?php if(isset($slide)): ?>
	<?php if(count($slide) > 0): ?>

	<style type="text/css">
		.sli img {
			height: 410px;
			object-fit: cover;
		}
		@media  only screen and (max-width: 768px) {
			.sli img {
				height: 210px;
			}
		}
	</style>
		<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
		  <ol class="carousel-indicators">
		  	<?php $__currentLoopData = $slide; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $item1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		  		<?php if($item1->parent_id != ''): ?>
		    	<li data-target="#carouselExampleIndicators" data-slide-to="<?php echo e($k); ?>" class="<?php if($k==0){ echo 'active'; } ?>"></li>
		    	<?php endif; ?>
		    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		  </ol>
		  <div class="carousel-inner">
		  	<?php $__currentLoopData = $slide; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		  		<?php if($item->parent_id != ''): ?>
			    <div class="carousel-item <?php if($key == 0){ echo 'active'; } ?> sli">
			      <img class="d-block w-100" src="<?php echo e($item->image); ?>" alt="<?php echo e($item->title); ?>">
			    </div>
			    <?php endif; ?>
		    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		  </div>
		  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
		    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
		    <span class="sr-only">Previous</span>
		  </a>
		  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
		    <span class="carousel-control-next-icon" aria-hidden="true"></span>
		    <span class="sr-only">Next</span>
		  </a>
		</div>
	<?php endif; ?>
<?php endif; ?>
<?php /**PATH E:\xampp7428\htdocs\phongkham\resources\views/frontend/element/slider.blade.php ENDPATH**/ ?>