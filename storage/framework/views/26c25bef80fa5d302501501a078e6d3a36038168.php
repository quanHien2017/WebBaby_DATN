<?php
	$params['status'] = 'active';
	$params['order_by'] = 'created_at';
	$items_left = App\Http\Services\ContentService::getCmsPost($params)->limit(6)
	->get();
?>
<?php if(isset($items_left)): ?>
    <?php if(count($items_left) > 0): ?>
		<div class="widget widget_sidebar-- widget_news widget_archives">
		   <div class="widget__title">
		      <span>Tin tức mới</span>
		      <hr>
		   </div>
		   <style type="text/css">
		   	article .text_excerpt{
		   		display: -webkit-box;
			    -webkit-box-orient: vertical;
			    -webkit-line-clamp: 3;
			    overflow: hidden;
			    max-height: calc(3*1.7*15px + 0px);
		   	}
		   </style>
		   <div class="widget__container">
		      <ul class="d_flex">
		      	<?php $__currentLoopData = $items_left; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		         <li class="d_flex">
		            <article>
		               <div class="thumb"><a href="/chi-tiet/<?php echo e($item->url_part); ?>.html" title="<?php echo e($item->title); ?>"><img data-lazyloaded="1" src="<?php echo e($item->image); ?>" width="150" height="150" data-src="<?php echo e($item->image); ?>" class="attachment-thumb-150x150 size-thumb-150x150 wp-post-image entered litespeed-loaded" alt="<?php echo e($item->title); ?>" decoding="async" data-ll-status="loaded"></a></div>
		               <div class="text">
		                  <h3 class="text__title"><a href="/chi-tiet/<?php echo e($item->url_part); ?>.html"><?php echo e($item->title); ?></a></h3>
		               </div>
		               <div class="text_excerpt"><?php echo e($item->brief); ?></div>
		            </article>
		         </li>
		        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		      </ul>
		   </div>
		</div>
	<?php endif; ?>
<?php endif; ?> <?php /**PATH /home/ntdconyj0yk6/phongkham.nvoting.com/resources/views/frontend/element/tintucmoi_left.blade.php ENDPATH**/ ?>