<!DOCTYPE html>
<html lang="vi" class="loading-site no-js">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
 <head>

    <?php
      $title = $detail->title ?? $detail->title;
      $brief = $detail->mota ?? null;
      $content = $detail->chitiet ?? null;
      $image = $detail->image != '' ? $detail->image : null;
      $image_thumb = $detail->image_thumb != '' ? $detail->image_thumb : null;
      $date = date('H:i d/m/Y', strtotime($detail->created_at));

      $url_taxonomy = route('frontend.cms.product_category', ['alias' => $detail->url_part]) . '.html';

      $title_taxonomy = $detail->taxonomy_title ?? $detail->taxonomy_title;

      $seo_title = $detail->meta_title ?? $title;
      $seo_keyword = $detail->meta_keyword ?? null;
      $seo_description = $detail->meta_description ?? $brief;
      $seo_image = $image ?? ($image_thumb ?? null);
    ?>
    <title><?php echo e($title); ?></title>
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1" />
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="robots" content="index, follow" />
    <meta http-equiv="Content-Language" content="vi" />
    <meta name="copyright" content="Copyright" />
    <meta name="description" content="<?php echo e($seo_description); ?>" />
    <meta name="keywords" content="<?php echo e($seo_keyword); ?>" />
    <meta name="DC.title" content="<?php echo e($seo_title); ?>" />
    <meta property="og:type" name="ogtype" content="Website" />
    <meta property="og:title" name="ogtitle" content="<?php echo e($seo_title); ?>" />
    <meta property="og:image" name="ogimage" content="<?php echo e($web_information->image->logo_header ?? ''); ?>" />
    <meta property="og:sitename" content="<?php echo e(Request::fullUrl()); ?>" />
    <link rel="canonical" href="<?php echo e(Request::fullUrl()); ?>" />
    <link rel="shortcut icon" type="image/png" href="<?php echo e($web_information->image->favicon ?? ''); ?>" />

    <?php echo $__env->make('frontend.panels.styles', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
 </head>
 <body data-rsssl=1 class="product-template-default single single-product postid-2228 ot-vertical-menu woocommerce woocommerce-page woocommerce-js lightbox nav-dropdown-has-arrow has-lightbox">
    <a class="skip-link screen-reader-text" href="#main">Skip to content</a>
    <div id="wrapper">

      <?php echo $__env->make('frontend.element.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

      <main id="main" class="">
         <div class="shop-container">
            <div class="container">
               <div class="woocommerce-notices-wrapper"></div>
            </div>
            <!-- /.container -->
            <div id="product-2228" class="product type-product post-2228 status-publish first instock product_cat-ao-thun-be-trai product_cat-quan-ao-be-trai product_cat-thoi-trang-tre-em product_tag-ao-thun-be-trai product_tag-at11 product_tag-quan-ao-be-trai-viet-nam has-post-thumbnail shipping-taxable purchasable product-type-variable">
               <div class="product-main">
                  <div class="row content-row row-divided row-large">
                     <div id="product-sidebar" class="col large-3 hide-for-medium shop-sidebar ">
                        <aside id="woocommerce_products-2" class="widget woocommerce widget_products">
                           <span class="widget-title shop-sidebar">Sản phẩm nổi bật</span>
                           <div class="is-divider small"></div>
                           <ul class="product_list_widget">
                              <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <?php
                                 $hienthi = trim($item->hienthi,';');
                                 $vitrihienthi = explode(';',$hienthi);       
                              ?>
                                 <?php if(in_array('1',$vitrihienthi)): ?>
                                    <li>
                                       <a href="/chi-tiet-sp/<?php echo e($item->alias); ?>.html">
                                          <img width="100" height="100" src="<?php echo e($item->image); ?>" class="attachment-woocommerce_gallery_thumbnail size-woocommerce_gallery_thumbnail" alt="<?php echo e($item->title); ?>" sizes="(max-width: 100px) 100vw, 100px" />     
                                          <span class="product-title"><?php echo e($item->title); ?></span>
                                       </a>
                                       <span class="woocommerce-Price-amount amount"><?php echo e(number_format($item->giakm ? $item->giakm : $item->gia)); ?><span class="woocommerce-Price-currencySymbol">&#8363;</span></span>
                                    </li>
                                 <?php endif; ?>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                           </ul>
                        </aside>
                        <?php
                           $params['status'] = 'active';
                           $params['order_by'] = 'created_at';
                           $items_left = App\Http\Services\ContentService::getCmsPost($params)->limit(6)
                           ->get();
                        ?>
                        <?php if(isset($items_left)): ?>
                        <aside id="flatsome_recent_posts-3" class="widget flatsome_recent_posts">
                           <span class="widget-title shop-sidebar">Bài viết mới nhất</span>
                           <div class="is-divider small"></div>
                           <ul>
                              <?php $__currentLoopData = $items_left; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <li class="recent-blog-posts-li">
                                 <div class="flex-row recent-blog-posts align-top pt-half pb-half">
                                    <div class="flex-col mr-half">
                                       <div class="badge post-date  badge-square">
                                          <div class="badge-inner bg-fill" style="background: url(<?php echo e($item->image); ?>); border:0;">
                                          </div>
                                       </div>
                                    </div>
                                    <div class="flex-col flex-grow">
                                       <a href="/chi-tiet/<?php echo e($item->url_part); ?>.html" title="<?php echo e($item->title); ?>"><?php echo e($item->title); ?></a>
                                    </div>
                                 </div>
                              </li>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                           </ul>
                        </aside>
                        <?php endif; ?>
                     </div>
                     <!-- col large-3 -->
                     <div class="col large-9">
                        <div class="row">
                           <?php if(isset($list_image)): ?>
                           <div class="large-6 col">
                              <div class="product-images relative mb-half has-hover woocommerce-product-gallery woocommerce-product-gallery--with-images woocommerce-product-gallery--columns-4 images" data-columns="4">
                                 <div class="badge-container is-larger absolute left top z-1"></div>
                                 <div class="image-tools absolute top show-on-hover right z-3">
                                 </div>
                                 <figure class="woocommerce-product-gallery__wrapper product-gallery-slider slider slider-nav-small mb-half"
                                    data-flickity-options='{
                                    "cellAlign": "center",
                                    "wrapAround": true,
                                    "autoPlay": false,
                                    "prevNextButtons":true,
                                    "adaptiveHeight": true,
                                    "imagesLoaded": true,
                                    "lazyLoad": 1,
                                    "dragThreshold" : 15,
                                    "pageDots": false,
                                    "rightToLeft": false       }'>
                                    <?php $__currentLoopData = $list_image; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div data-thumb="<?php echo e($item->link_image); ?>" class="woocommerce-product-gallery__image slide <?php if($loop->first): ?> first <?php endif; ?>">
                                       <a href="<?php echo e($item->link_image); ?>">
                                          <img width="600" height="600" src="<?php echo e($item->link_image); ?>" class="wp-post-image skip-lazy" alt="" title="<?php echo e($detail->title); ?>" data-caption="" data-src="<?php echo e($item->link_image); ?>" data-large_image="<?php echo e($item->link_image); ?>" data-large_image_width="960" data-large_image_height="960" sizes="(max-width: 600px) 100vw, 600px" />
                                       </a>
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                 </figure>
                                 <div class="image-tools absolute bottom left z-3">
                                    <a href="#product-zoom" class="zoom-button button is-outline circle icon tooltip hide-for-small" title="Zoom">
                                    <i class="icon-expand" ></i>    </a>
                                 </div>
                              </div>
                              <div class="product-thumbnails thumbnails slider-no-arrows slider row row-small row-slider slider-nav-small small-columns-4"
                                 data-flickity-options='{
                                 "cellAlign": "left",
                                 "wrapAround": false,
                                 "autoPlay": false,
                                 "prevNextButtons": true,
                                 "asNavFor": ".product-gallery-slider",
                                 "percentPosition": true,
                                 "imagesLoaded": true,
                                 "pageDots": false,
                                 "rightToLeft": false,
                                 "contain": true
                                 }'
                                 >
                                 <?php $__currentLoopData = $list_image; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                 <div class="col <?php if($loop->first): ?> first is-selected is-nav-selected <?php endif; ?> ">
                                    <a>
                                       <img src="<?php echo e($items->link_image); ?>" alt="" width="300" height="300" class="attachment-woocommerce_thumbnail" />        
                                    </a>
                                 </div>
                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              </div>

                           </div>
                           <?php endif; ?>
                           <div class="product-info summary entry-summary col col-fit product-summary form-flat">
                              <nav class="woocommerce-breadcrumb breadcrumbs"><a href="/">Trang chủ</a> <span class="divider">&#47;</span> <a href="/<?php echo e($taxonomy->taxonomy); ?>/<?php echo e($taxonomy->url_part); ?>.html"><?php echo e($taxonomy->title); ?></a></nav>
                              <h1 class="product-title product_title entry-title">
                                 <?php echo e($detail->title); ?>

                              </h1>
                              <div class="is-divider small"></div>
                              <div class="price-wrapper">
                                 <p class="price product-page-price price-on-sale">
                                    <?php if($detail->giakm != 0): ?>
                                    <del>
                                       <span class="woocommerce-Price-amount amount"><?php echo e(number_format($detail->gia)); ?><span class="woocommerce-Price-currencySymbol">₫</span></span>
                                    </del>
                                    <ins>
                                       <span class="woocommerce-Price-amount amount"><?php echo e(number_format($detail->giakm)); ?><span class="woocommerce-Price-currencySymbol">₫</span></span>
                                    </ins>
                                    <?php else: ?>
                                    <ins>
                                       <span class="woocommerce-Price-amount amount"><?php echo e(number_format($detail->gia)); ?><span class="woocommerce-Price-currencySymbol">₫</span></span>
                                    </ins>
                                    <?php endif; ?>
                                 </p>
                              </div>
                              <div class="product-short-description">
                                 <p><?php echo e($detail->mota); ?></p>
                              </div>
                              <div class="khuyen-mai">
                                 <h4>Giá sỉ: Liên hệ <?php echo e($web_information->information->hotline); ?></h4>
                              </div>

                              <div class="single_variation_wrap">
                                 <div class="woocommerce-variation single_variation"></div>
                                 <div class="woocommerce-variation-add-to-cart variations_button">
                                    <?php if($detail->soluongconlai > 0 && $detail->tinhtrang == 1): ?>
                                       <div class="quantity buttons_added">
                                          <input type="button" value="-" class="minus button is-form">      
                                          <label class="screen-reader-text"><?php echo e($detail->title); ?></label>
                                          <input
                                             type="number"
                                             id="quantity"
                                             class="input-text qty text"
                                             step="1"
                                             min="1"
                                             max="9999"
                                             name="quantity"
                                             value="1"
                                             title="SL"
                                             size="4"
                                             inputmode="numeric" />
                                          <input type="button" value="+" class="plus button is-form"> 
                                       </div>
                                       <input type="hidden" name="id_product" id="id_product" value="<?php echo e($detail->id); ?>">
                                       <button onclick="addCart()" type="button" class="single_add_to_cart_button button alt">Đặt hàng</button>
                                    <?php else: ?>
                                       <button href="#" class="single_add_to_cart_button button alt">Tạm hết hàng</button>
                                    <?php endif; ?>
                                 </div>
                              </div>
                              <script type="text/javascript">
                                 function addCart(){

                                    var quantity = document.getElementById('quantity').value;

                                    var id = document.getElementById('id_product').value;

                                    var f = "?quantity=" + quantity + "&id=" + id;
                                     
                                    var _url = "/add-to-cart" + f;

                                    jQuery.ajax({
                                       type: "GET",
                                       url: _url,
                                       data: f,
                                       cache: false,
                                       context: document.body,
                                       success: function(data) {
                                          if(data == 1){
                                             alert('Số lượng còn lại không đủ để đặt hàng! Vui lòng chọn số lượng thấp hơn !');
                                          }else{
                                             alert('Đặt hàng thành công');
                                          }
                                       }
                                    });
                                 }
                              </script>
                              <div class="row row-small">
                                 <div class="col medium-6 small-12 large-6"  >
                                    <div class="col-inner"  >
                                       <a rel="noopener noreferrer" href="<?php echo e($web_information->social->messenger); ?>" target="_blank" class="button primary expand" style="border-radius:6px;">
                                       <i class="icon-facebook" ></i>  
                                       <span>CHAT FACEBOOK</span>
                                       </a>
                                    </div>
                                 </div>
                                 <div class="col medium-6 small-12 large-6"  >
                                    <div class="col-inner"  >
                                       <a rel="noopener noreferrer" href="tel:<?php echo e($web_information->information->hotline); ?>" target="_blank" class="button success expand"  style="border-radius:6px;">
                                       <i class="icon-phone" ></i>  <span><?php echo e($web_information->information->hotline); ?></span>
                                       </a>
                                    </div>
                                 </div>
                                 <style scope="scope">
                                 </style>
                              </div>
                              <div class='clearfix'></div>
                                
                              <div class="product_meta">
                                 
                                 <span class="posted_in">Danh mục: <a href="/<?php echo e($taxonomy->taxonomy); ?>/<?php echo e($taxonomy->url_part); ?>.html" rel="tag"><?php echo e($taxonomy->title); ?></a></span>
                                 
                              </div>
                              
                           </div>

                        </div>
                        <!-- .row -->
                        <div class="product-footer">
                           <div class="woocommerce-tabs wc-tabs-wrapper container tabbed-content">
                              <ul class="tabs wc-tabs product-tabs small-nav-collapse nav nav-uppercase nav-line-grow nav-left" role="tablist">
                                 <li class="description_tab active" id="tab-title-description" role="tab" aria-controls="tab-description">
                                    <a href="#tab-description">Mô tả</a>
                                 </li>
                                 
                              </ul>
                              <div class="tab-panels">
                                 <div class="woocommerce-Tabs-panel woocommerce-Tabs-panel--description panel entry-content active" id="tab-description" role="tabpanel" aria-labelledby="tab-title-description">
                                    <?php echo $detail->chitiet; ?>


                                    

                                 </div>
                                 
                              </div>
                              <!-- .tab-panels -->
                           </div>
                           <!-- .tabbed-content -->
                           <?php if(isset($posts)): ?>
                           <div class="related related-products-wrapper product-section">
                              <h3 class="product-section-title container-width product-section-title-related pt-half pb-half uppercase">
                                 Sản phẩm tương tự    
                              </h3>
                              <div class="row large-columns-4 medium-columns- small-columns-2 row-small slider row-slider slider-nav-reveal slider-nav-push"  data-flickity-options='{"imagesLoaded": true, "groupCells": "100%", "dragThreshold" : 5, "cellAlign": "left","wrapAround": true,"prevNextButtons": true,"percentPosition": true,"pageDots": false, "rightToLeft": false, "autoPlay" : false}'>
                                 <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                 <div class="product-small col has-hover product type-product post-<?php echo e($item->id); ?> status-publish instock product_cat-do-bo-be-trai product_cat-quan-ao-be-trai product_cat-thoi-trang-tre-em product_tag-b09 product_tag-do-bo-be-trai product_tag-quan-ao-be-trai-viet-nam has-post-thumbnail shipping-taxable purchasable product-type-variable">
                                    <div class="col-inner">
                                       <div class="badge-container absolute left top z-1"></div>
                                       <div class="product-small box ">
                                          <div class="box-image">
                                             <div class="image-none">
                                                <a href="/chi-tiet-sp/<?php echo e($item->alias); ?>.html">
                                                   <img width="300" height="300" src="<?php echo e($item->image); ?>" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt=""sizes="(max-width: 300px) 100vw, 300px" />            
                                                </a>
                                             </div>
                                             
                                          </div>
                                          <!-- box-image -->
                                          <div class="box-text box-text-products text-center grid-style-2">
                                             <div class="title-wrapper">
                                                <p class="name product-title"><a href="/chi-tiet-sp/<?php echo e($item->alias); ?>.html"><?php echo e($item->title); ?></a></p>
                                             </div>
                                             <div class="price-wrapper">
                                                <span class="price"><span class="woocommerce-Price-amount amount"><?php echo e(number_format($item->giakm ? $item->giakm : $item->gia)); ?><span class="woocommerce-Price-currencySymbol">&#8363;</span></span></span>
                                             </div>
                                             <div class="add-to-cart-button"><a href="/chi-tiet-sp/<?php echo e($item->alias); ?>.html" rel="nofollow" data-product_id="<?php echo e($item->id); ?>" class=" add_to_cart_button product_type_variable button primary is-gloss mb-0 is-small">Xem sản phẩm</a></div>
                                          </div>
                                          <!-- box-text -->
                                       </div>
                                       <!-- box -->
                                    </div>
                                    <!-- .col-inner -->
                                 </div>
                                 <!-- col -->
                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              </div>
                           </div>
                           <?php endif; ?>
                        </div>
                     </div>
                     <!-- col large-9 -->
                  </div>
                  <!-- .row -->
               </div>
               <!-- .product-main -->
            </div>
         </div>
         <!-- shop container -->
      </main>

       <?php echo $__env->make('frontend.element.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    </div>

    <?php echo $__env->make('frontend.element.menu_mobile', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make('frontend.element.login_popup', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make('frontend.panels.stylefooter', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
 </body>
</html><?php /**PATH C:\xampp\htdocs\shopquanao\resources\views/frontend/pages/product/detail.blade.php ENDPATH**/ ?>