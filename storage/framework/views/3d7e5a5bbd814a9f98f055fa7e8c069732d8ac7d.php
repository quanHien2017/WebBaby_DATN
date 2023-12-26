              
<?php if($paginator->hasPages()): ?>
<div class="entry-pagination">
  <div class="pagenavi">
    
    <?php if($paginator->onFirstPage()): ?>
    
    <?php else: ?>
    <a class="prev page-numbers" href="<?php echo e($paginator->previousPageUrl()); ?>">«</a>
    <?php endif; ?>

    
    <?php $__currentLoopData = $elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      
      <?php if(is_string($element)): ?>
        <span class="page-numbers dots"><?php echo e($element); ?></span>
      <?php endif; ?>

      
      <?php if(is_array($element)): ?>
        <?php $__currentLoopData = $element; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php if($page == $paginator->currentPage()): ?>
            <span aria-current="page" class="page-numbers current"><?php echo e($page); ?></span>
          <?php else: ?>
          <a class="page-numbers" href="<?php echo e($url); ?>"><?php echo e($page); ?></a>
            </li>
          <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    
    <?php if($paginator->hasMorePages()): ?>
      <a class="next page-numbers" href="<?php echo e($paginator->nextPageUrl()); ?>">»</a>
    <?php else: ?>
      
    <?php endif; ?>
  </div>
</div> 
<?php endif; ?>
<?php /**PATH /home/ntdconyj0yk6/phongkham.nvoting.com/resources/views/frontend/pagination/newdefault.blade.php ENDPATH**/ ?>