<!DOCTYPE html>
<html lang="vi">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>

  <title>Giỏ hàng</title>
  <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1" />
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta name="robots" content="index, follow" />
  <meta http-equiv="Content-Language" content="vi" />
  <meta name="copyright" content="Copyright" />
  <meta property="og:type" name="ogtype" content="Website" />
  <meta property="og:sitename" content="<?php echo e(Request::fullUrl()); ?>" />
  <link rel="canonical" href="<?php echo e(Request::fullUrl()); ?>" />
  <link rel="shortcut icon" type="image/png" href="<?php echo e($web_information->image->favicon ?? ''); ?>" />

  <?php echo $__env->make('frontend.panels.styles', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

 </head>
 <body data-rsssl=1 class="page-template-default page page-id-21 ot-vertical-menu woocommerce-cart woocommerce-page woocommerce-js lightbox nav-dropdown-has-arrow">
    <a class="skip-link screen-reader-text" href="#main">Skip to content</a>
    <div id="wrapper">
      <?php echo $__env->make('frontend.element.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

      <main id="main" class="">
         <div id="content" class="content-area page-wrapper" role="main">
            <div class="row row-main">
               <div class="large-12 col">
                  <div class="col-inner">
                     <div class="woocommerce">
                        <div class="woocommerce-notices-wrapper"></div>

                        <?php if(session('cart')): ?>

                        <div class="woocommerce row row-large row-divided">
                           <div class="col large-7 pb-0 ">
                              <form class="woocommerce-cart-form" action="" method="post">
                                 <div class="cart-wrapper sm-touch-scroll">
                                    <table class="shop_table shop_table_responsive cart woocommerce-cart-form__contents" cellspacing="0">
                                       <thead>
                                          <tr>
                                             <th class="product-name" colspan="3">Sản phẩm</th>
                                             <th class="product-price">Giá</th>
                                             <th class="product-quantity">Số lượng</th>
                                             <th class="product-subtotal">Tổng</th>
                                          </tr>
                                       </thead>
                                       <tbody>
                                        <?php $total = 0 ?>
                                        <?php $__currentLoopData = session('cart'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                          $total += $details['price'] * $details['quantity'];
                                          $alias_detail = Str::slug($details['title']);
                                          $url_link = route('frontend.cms.product', ['alias_detail' => $alias_detail]).'.html' ;
                                        ?>
                                          <tr class="woocommerce-cart-form__cart-item cart_item" data-id="<?php echo e($id); ?>">
                                             <td class="product-remove">
                                                <a onclick="removecart(<?php echo e($id); ?>)" class="remove remove-from-cart" aria-label="Xóa sản phẩm này" style="cursor: pointer;">&times;</a>            
                                             </td>
                                             <td class="product-thumbnail">
                                                <a href="<?php echo e($url_link); ?>">
                                                  <img width="300" height="300" src="<?php echo e($details['image_thumb'] ?? $details['image']); ?>" data-src="<?php echo e($details['image_thumb'] ?? $details['image']); ?>" class="lazy-load attachment-woocommerce_thumbnail size-woocommerce_thumbnail" sizes="(max-width: 300px) 100vw, 300px" />
                                                </a>           
                                             </td>
                                             <td class="product-name" data-title="Sản phẩm">
                                                <a href="<?php echo e($url_link); ?>"><?php echo e($details['title']); ?></a>              
                                                <div class="show-for-small mobile-product-price">
                                                   <span class="woocommerce-Price-amount amount">
                                                    <?php echo e(isset($details['price']) && $details['price'] > 0 ? number_format($details['price']) : __('Contact')); ?>

                                                    <span class="woocommerce-Price-currencySymbol">&#8363;</span>
                                                 </span>             
                                                </div>
                                             </td>
                                             <td class="product-price" data-title="Giá">
                                                <span class="woocommerce-Price-amount amount">
                                                  <?php echo e(isset($details['price']) && $details['price'] > 0 ? number_format($details['price']) : __('Contact')); ?>

                                                  <span class="woocommerce-Price-currencySymbol">&#8363;</span></span>            
                                             </td>
                                             <td class="product-quantity" data-title="Số lượng">
                                                <div class="quantity buttons_added">
                                                   <input type="button" value="-" class="minus button is-form">   <label class="screen-reader-text"><?php echo e($details['title']); ?></label>
                                                   <input
                                                      type="number"
                                                      class="input-text qty text"
                                                      step="1"
                                                      min="1"
                                                      max="9999"
                                                      name="quantity"
                                                      id="quantity<?php echo e($id); ?>"
                                                      value="<?php echo e($details['quantity']); ?>"
                                                      title="SL"
                                                      size="4"
                                                      inputmode="numeric" onchange="updateCart(<?php echo e($id); ?>)" />
                                                   <input type="button" value="+" class="plus button is-form">  
                                                </div>
                                             </td>
                                             <td class="product-subtotal" data-title="Tổng">
                                                <span class="woocommerce-Price-amount amount"><?php echo e(number_format($details['price'] * $details['quantity'])); ?><span class="woocommerce-Price-currencySymbol">&#8363;</span></span>            
                                             </td>
                                          </tr>
                                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                          <tr>
                                             <td colspan="6" class="actions clear">
                                                <a href="<?php echo e(url()->current()); ?>" class="button primary mt-0 pull-left small" name="update_cart">Cập nhật giỏ hàng</button>
                                             </td>
                                          </tr>
                                       </tbody>
                                    </table>
                                 </div>
                              </form>
                           </div>
                           <div class="cart-collaterals large-5 col pb-0">
                              <div class="cart-sidebar col-inner has-border">
                                 <div class="cart_totals ">
                                    <table cellspacing="0">
                                       <thead>
                                          <tr>
                                             <th class="product-name" colspan="2" style="border-width:3px;">Cộng giỏ hàng</th>
                                          </tr>
                                       </thead>
                                    </table>
                                    <h2>Cộng giỏ hàng</h2>
                                    <table cellspacing="0" class="shop_table shop_table_responsive">
                                       <tr class="cart-subtotal">
                                          <th>Tạm tính</th>
                                          <td data-title="Tạm tính"><span class="woocommerce-Price-amount amount"><?php echo e(number_format($total)); ?><span class="woocommerce-Price-currencySymbol">&#8363;</span></span></td>
                                       </tr>
                                       <tr class="order-total">
                                          <th>Tổng</th>
                                          <td data-title="Tổng"><strong><span class="woocommerce-Price-amount amount"><?php echo e(number_format($total)); ?><span class="woocommerce-Price-currencySymbol">&#8363;</span></span></strong> </td>
                                       </tr>
                                    </table>
                                    <style>
                                       li {
                                          margin-left: 0 !important;
                                          list-style-type: none;
                                       }
                                    </style>
                                    <div class="woocommerce-checkout-payment">
                                        <form method="POST" action="/vnpay_payment"  > 
                                          <?php echo csrf_field(); ?>
                                          
                                          <style type="text/css">
                                             @media (min-width: 550px){
                                                p.form-row-first {
                                                    margin-right: 2%;
                                                }
                                             }
                                          </style>
                                          <h3>Thông tin thanh toán</h3>
                                          <p class="form-row form-row-wide validate-required" id="billing_first_name_field" data-priority="30">
                                             <label for="name" class="">Họ tên&nbsp;<abbr class="required" title="bắt buộc">*</abbr></label>
                                             <span class="woocommerce-input-wrapper">
                                                <input type="text" class="input-text " name="name" id="name" placeholder="" value="" autocomplete="given-name" required>
                                             </span>
                                          </p>
                                          <p class="form-row form-row-first validate-required" id="billing_first_name_field" data-priority="5">
                                             <label for="phone" class="">SĐT&nbsp;<abbr class="required" title="bắt buộc">*</abbr></label>
                                             <span class="woocommerce-input-wrapper">
                                                <input type="text" class="input-text " name="phone" id="phone" placeholder="" value="" autocomplete="given-name" required>
                                             </span>
                                          </p>
                                          <p class="form-row form-row-first validate-required" id="billing_first_name_field" data-priority="5">
                                             <label for="email" class="">Email</label>
                                             <span class="woocommerce-input-wrapper">
                                                <input type="text" class="input-text " name="email" id="email" placeholder="" value="" autocomplete="given-name">
                                             </span>
                                          </p>
                                          <p class="form-row notes" id="order_comments_field" data-priority="">
                                             <label for="address" class="">Địa chỉ&nbsp;<abbr class="required" title="bắt buộc">*</abbr>
                                             </label>
                                             <span class="woocommerce-input-wrapper">
                                                <textarea name="address" class="input-text " id="address" placeholder="Địa chỉ giao hàng" rows="2" cols="2" autocomplete="off"></textarea>
                                             </span>
                                          </p>
                                          <p class="form-row notes" id="order_comments_field" data-priority="">
                                             <label for="customer_note" class="">Ghi chú đơn hàng&nbsp;<span class="optional"></span>
                                             </label>
                                             <span class="woocommerce-input-wrapper">
                                                <textarea name="customer_note" class="input-text " id="customer_note" placeholder="Ghi chú về đơn hàng, ví dụ: thời gian hay chỉ dẫn địa điểm giao hàng chi tiết hơn." rows="2" cols="5"></textarea>
                                             </span>
                                          </p>
                                          
                                       
                                          <input type="hidden" name="madonhang" id="madonhang" value="<?php echo e(time()); ?>">
                                          <input type="hidden" name="tongtien" id="tongtien" value="<?php echo e($total); ?>">
                                          <button name="submit" value="submit" type="submit" class="checkout-button button alt wc-forward"> Thanh toán</button>
                                           <button name="redirect" id="redirect" type="submit" onclick="saveuser()" class="checkout-button button alt wc-forward"> Thanh toán qua VNPAY</button>
                                       </form>
                                    </div>
                                 </div>
                                 <div class="cart-sidebar-content relative"></div>
                              </div>
                           </div>
                        </div>

                        <?php else: ?>

                        <div class="woocommerce">
                          <div class="text-center pt pb">
                            <div class="woocommerce-notices-wrapper"></div>
                            <p class="cart-empty">Chưa có sản phẩm nào trong giỏ hàng.</p>
                          </div>
                        </div>

                        <?php endif; ?>
                        <div class="cart-footer-content after-cart-content relative"></div>
                     </div>
                  </div>
                  <script type="text/javascript">
                     function saveuser(){
                        var name = document.getElementById('name').value;
                        var phone = document.getElementById('phone').value;
                        var email = document.getElementById('email').value;
                        var address = document.getElementById('address').value;
                        var customer_note = document.getElementById('customer_note').value;
                        var f = "?name=" + name + "&phone=" + phone + "&email=" + email + "&address=" + address + "&customer_note=" + customer_note;
                        var _url = "/saveuser" + f;
                        jQuery.ajax({
                           type: "GET",
                           url: _url,
                           data: f,
                           cache: false,
                           context: document.body,
                           success: function(data) {

                           }
                        });
                     }

                     function removecart(id){
                        var f = "?id=" + id;
                        var _url = "/remove-from-cart" + f;
                        jQuery.ajax({
                           type: "GET",
                           url: _url,
                           data: f,
                           cache: false,
                           context: document.body,
                           success: function(data) {
                              window.location.reload();
                           }
                        });
                     }

                     function updateCart(id){
                        var quantity = document.getElementById('quantity'+ id ).value;
                          if (quantity * 1.0 < 1 ) {
                              document.getElementById('quantity'+ id ).value = 1;
                              return;
                          }
                          if (typeof quantity == "undefined") {
                             quantity = 1;
                          }
                        // var quantity = document.getElementById('quantity').value;
                        var f = "?quantity=" + quantity + "&id=" + id;
                        var _url = "/update-cart" + f;
                        jQuery.ajax({
                           type: "GET",
                           url: _url,
                           data: f,
                           cache: false,
                           context: document.body,
                           success: function(data) {
                              window.location.reload();
                           }
                        });
                     }
                  </script>
                  <!-- .col-inner -->
               </div>
               <!-- .large-12 -->
            </div>
            <!-- .row -->
         </div>
      </main>
      <!-- #main -->

       <?php echo $__env->make('frontend.element.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    </div>

    <?php echo $__env->make('frontend.element.menu_mobile', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make('frontend.element.login_popup', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make('frontend.panels.stylefooter', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
 </body>
</html>
<?php /**PATH E:\xamp74\htdocs\shopquanao\resources\views/frontend/pages/cart/index.blade.php ENDPATH**/ ?>