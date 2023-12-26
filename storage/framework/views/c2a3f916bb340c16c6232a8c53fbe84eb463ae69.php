<!-- Mobile Sidebar -->
    <div id="main-menu" class="mobile-sidebar no-scrollbar mfp-hide">
       <div class="sidebar-menu no-scrollbar ">
          <ul class="nav nav-sidebar  nav-vertical nav-uppercase">
             <div id="mega-menu-wrap"
                class="ot-vm-click">
                <div id="mega-menu-title">
                   <i class="icon-menu"></i> Danh mục sản phẩm                
                </div>
                <?php
                     $array_categorymb = array();
                     foreach ($taxonomy_sanpham as $categorymb) {
                        if ($categorymb->parent_id != '') {
                           $array_categorymb[$categorymb->parent_id] = $categorymb->parent_id;
                        }
                     }
                  ?>

                  <ul id="mega_menu" class="sf-menu sf-vertical">
                     <?php foreach($taxonomy_sanpham as $taxonomymb){
                        if(in_array($taxonomymb->id,$array_categorymb)) {
                     ?>
                        <li class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-has-children">
                           <a href="/<?php echo e($taxonomymb->taxonomy); ?>/<?php echo e($taxonomymb->url_part); ?>.html"><?php echo e($taxonomymb->title); ?></a>
                              <ul class="sub-menu">
                                 <?php
                                 foreach($taxonomy_sanpham as $sub_taxonomymb){ 
                                    if($sub_taxonomymb->parent_id == $taxonomymb->id){
                                 ?>
                                       <li class="menu-item menu-item-type-taxonomy menu-item-object-product_cat "><a href="/<?php echo e($sub_taxonomymb->taxonomy); ?>/<?php echo e($sub_taxonomymb->url_part); ?>.html"><?php echo e($sub_taxonomymb->title); ?></a></li>
                                    <?php } } ?>
                              </ul>
                        </li>
                     <?php } else { ?>
                        <?php if($taxonomymb->parent_id == '') { ?>
                        <li class="menu-item menu-item-type-taxonomy menu-item-object-product_cat"><a href="/<?php echo e($taxonomymb->taxonomy); ?>/<?php echo e($taxonomymb->url_part); ?>.html"><?php echo e($taxonomymb->title); ?></a></li>
                     <?php } } } ?>
                   </ul>
             </div>
          </ul>
       </div>
       <!-- inner -->
    </div><?php /**PATH C:\xampp\htdocs\shopquanao\resources\views/frontend/element/menu_mobile.blade.php ENDPATH**/ ?>