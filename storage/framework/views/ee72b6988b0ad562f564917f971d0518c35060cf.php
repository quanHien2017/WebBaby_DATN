<?php if($paginator->hasPages()): ?>
<div class="container">
   <nav class="woocommerce-pagination">
      <ul class="page-numbers nav-pagination links text-center">
        <?php if($paginator->onFirstPage()): ?>
        
        <?php else: ?>
        <li><a class="prev page-number" href="<?php echo e($paginator->previousPageUrl()); ?>">
          <i class="icon-angle-left"></i></a></li>
        <?php endif; ?>

        <?php $__currentLoopData = $elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          
          <?php if(is_string($element)): ?>
            <li><span aria-current='page' class='page-number current'><?php echo e($element); ?></span></li>
          <?php endif; ?>

          
          <?php if(is_array($element)): ?>
            <?php $__currentLoopData = $element; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php if($page == $paginator->currentPage()): ?>
              <li><span aria-current='page' class='page-number current'><?php echo e($page); ?></span></li>
              <?php else: ?>
                <li><a class='page-number' href='<?php echo e($url); ?>'><?php echo e($page); ?></a></li>
              <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        
        <?php if($paginator->hasMorePages()): ?>
          <li><a class="next page-number" href="<?php echo e($paginator->nextPageUrl()); ?>"><i class="icon-angle-right"></i></a></li>
        <?php else: ?>
          
        <?php endif; ?>
      </ul>
   </nav>
</div>
<?php endif; ?>              

<?php /**PATH C:\xampp\htdocs\shopquanao\resources\views/frontend/pagination/newdefault.blade.php ENDPATH**/ ?>