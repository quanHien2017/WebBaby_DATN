<!DOCTYPE html>
<html lang="vi" class="loading-site no-js">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
 <head>

    @php
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
    @endphp
    <title>{{ $title }}</title>
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1" />
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="robots" content="index, follow" />
    <meta http-equiv="Content-Language" content="vi" />
    <meta name="copyright" content="Copyright" />
    <meta name="description" content="{{ $seo_description }}" />
    <meta name="keywords" content="{{ $seo_keyword }}" />
    <meta name="DC.title" content="{{ $seo_title }}" />
    <meta property="og:type" name="ogtype" content="Website" />
    <meta property="og:title" name="ogtitle" content="{{ $seo_title }}" />
    <meta property="og:image" name="ogimage" content="{{ $web_information->image->logo_header ?? '' }}" />
    <meta property="og:sitename" content="{{ Request::fullUrl() }}" />
    <link rel="canonical" href="{{ Request::fullUrl() }}" />
    <link rel="shortcut icon" type="image/png" href="{{ $web_information->image->favicon ?? '' }}" />

    @include('frontend.panels.styles')
    
 </head>
 <body data-rsssl=1 class="product-template-default single single-product postid-2228 ot-vertical-menu woocommerce woocommerce-page woocommerce-js lightbox nav-dropdown-has-arrow has-lightbox">
    <a class="skip-link screen-reader-text" href="#main">Skip to content</a>
    <div id="wrapper">

      @include('frontend.element.header')

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
                              @foreach($posts as $item)
                              @php
                                 $hienthi = trim($item->hienthi,';');
                                 $vitrihienthi = explode(';',$hienthi);       
                              @endphp
                                 @if(in_array('1',$vitrihienthi))
                                    <li>
                                       <a href="/chi-tiet-sp/{{ $item->alias }}.html">
                                          <img width="100" height="100" src="{{ $item->image }}" class="attachment-woocommerce_gallery_thumbnail size-woocommerce_gallery_thumbnail" alt="{{ $item->title }}" sizes="(max-width: 100px) 100vw, 100px" />     
                                          <span class="product-title">{{ $item->title }}</span>
                                       </a>
                                       <span class="woocommerce-Price-amount amount">{{ number_format($item->giakm ? $item->giakm : $item->gia) }}<span class="woocommerce-Price-currencySymbol">&#8363;</span></span>
                                    </li>
                                 @endif
                              @endforeach
                           </ul>
                        </aside>
                        @php
                           $params['status'] = 'active';
                           $params['order_by'] = 'created_at';
                           $items_left = App\Http\Services\ContentService::getCmsPost($params)->limit(6)
                           ->get();
                        @endphp
                        @isset($items_left)
                        <aside id="flatsome_recent_posts-3" class="widget flatsome_recent_posts">
                           <span class="widget-title shop-sidebar">Bài viết mới nhất</span>
                           <div class="is-divider small"></div>
                           <ul>
                              @foreach($items_left as $item)
                              <li class="recent-blog-posts-li">
                                 <div class="flex-row recent-blog-posts align-top pt-half pb-half">
                                    <div class="flex-col mr-half">
                                       <div class="badge post-date  badge-square">
                                          <div class="badge-inner bg-fill" style="background: url({{ $item->image }}); border:0;">
                                          </div>
                                       </div>
                                    </div>
                                    <div class="flex-col flex-grow">
                                       <a href="/chi-tiet/{{ $item->url_part }}.html" title="{{ $item->title }}">{{ $item->title }}</a>
                                    </div>
                                 </div>
                              </li>
                              @endforeach
                           </ul>
                        </aside>
                        @endisset
                     </div>
                     <!-- col large-3 -->
                     <div class="col large-9">
                        <div class="row">
                           @isset($list_image)
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
                                    @foreach($list_image as $item)
                                    <div data-thumb="{{ $item->link_image }}" class="woocommerce-product-gallery__image slide @if ($loop->first) first @endif">
                                       <a href="{{ $item->link_image }}">
                                          <img width="600" height="600" src="{{ $item->link_image }}" class="wp-post-image skip-lazy" alt="" title="{{ $detail->title }}" data-caption="" data-src="{{ $item->link_image }}" data-large_image="{{ $item->link_image }}" data-large_image_width="960" data-large_image_height="960" sizes="(max-width: 600px) 100vw, 600px" />
                                       </a>
                                    </div>
                                    @endforeach
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
                                 @foreach($list_image as $k => $items)
                                 <div class="col @if ($loop->first) first is-selected is-nav-selected @endif ">
                                    <a>
                                       <img src="{{ $items->link_image }}" alt="" width="300" height="300" class="attachment-woocommerce_thumbnail" />        
                                    </a>
                                 </div>
                                 @endforeach
                              </div>

                           </div>
                           @endisset
                           <div class="product-info summary entry-summary col col-fit product-summary form-flat">
                              <nav class="woocommerce-breadcrumb breadcrumbs"><a href="/">Trang chủ</a> <span class="divider">&#47;</span> <a href="/{{ $taxonomy->taxonomy }}/{{ $taxonomy->url_part }}.html">{{ $taxonomy->title }}</a></nav>
                              <h1 class="product-title product_title entry-title">
                                 {{ $detail->title }}
                              </h1>
                              <div class="is-divider small"></div>
                              <div class="price-wrapper">
                                 <p class="price product-page-price price-on-sale">
                                    @if($detail->giakm != 0)
                                    <del>
                                       <span class="woocommerce-Price-amount amount">{{ number_format($detail->gia) }}<span class="woocommerce-Price-currencySymbol">₫</span></span>
                                    </del>
                                    <ins>
                                       <span class="woocommerce-Price-amount amount">{{ number_format($detail->giakm) }}<span class="woocommerce-Price-currencySymbol">₫</span></span>
                                    </ins>
                                    @else
                                    <ins>
                                       <span class="woocommerce-Price-amount amount">{{ number_format($detail->gia) }}<span class="woocommerce-Price-currencySymbol">₫</span></span>
                                    </ins>
                                    @endif
                                 </p>
                              </div>
                              <div class="product-short-description">
                                 <p>{{ $detail->mota }}</p>
                              </div>
                              <div class="khuyen-mai">
                                 <h4>Giá sỉ: Liên hệ {{ $web_information->information->hotline }}</h4>
                              </div>

                              <div class="single_variation_wrap">
                                 <div class="woocommerce-variation single_variation"></div>
                                 <div class="woocommerce-variation-add-to-cart variations_button">
                                    @if($detail->soluongconlai > 0 && $detail->tinhtrang == 1)
                                       <div class="quantity buttons_added">
                                          <input type="button" value="-" class="minus button is-form">      
                                          <label class="screen-reader-text">{{ $detail->title }}</label>
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
                                       <input type="hidden" name="id_product" id="id_product" value="{{ $detail->id }}">
                                       <button onclick="addCart()" type="button" class="single_add_to_cart_button button alt">Đặt hàng</button>
                                    @else
                                       <button href="#" class="single_add_to_cart_button button alt">Tạm hết hàng</button>
                                    @endif
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
                                       <a rel="noopener noreferrer" href="{{ $web_information->social->messenger }}" target="_blank" class="button primary expand" style="border-radius:6px;">
                                       <i class="icon-facebook" ></i>  
                                       <span>CHAT FACEBOOK</span>
                                       </a>
                                    </div>
                                 </div>
                                 <div class="col medium-6 small-12 large-6"  >
                                    <div class="col-inner"  >
                                       <a rel="noopener noreferrer" href="tel:{{ $web_information->information->hotline }}" target="_blank" class="button success expand"  style="border-radius:6px;">
                                       <i class="icon-phone" ></i>  <span>{{ $web_information->information->hotline }}</span>
                                       </a>
                                    </div>
                                 </div>
                                 <style scope="scope">
                                 </style>
                              </div>
                              <div class='clearfix'></div>
                              {{-- <a data-popup-open='muahangnhanh' href='#'>
                                 <div class='detailcall-1'>
                                    <h3>ĐẶT HÀNG NHANH</h3>
                                    <span>Giao hàng tận nơi miễn phí nội thành!</span>
                                 </div>
                              </a>
                              <div class='popup' data-popup='muahangnhanh'>
                                 <div class='popup-inner'>
                                    <div id='contact_form_pop'>
                                       <div class='form-title'>
                                          <h3>Đặt hàng nhanh</h3>
                                          <p>Giao hàng tân nơi, miễn phí giao hàng toàn quốc</p>
                                          <hr>
                                       </div>
                                       <div class='form-content'>
                                          <div class='cottrai'>
                                             <img src="https://thegioithoitrangbaby.vn/wp-content/uploads/2018/09/ao-thun-be-trai-Austin-AT11-thegioithoitrangbaby-a.jpg">
                                             <div class='title-wrapper'>Áo Thun Bé Trai Thời Trang AT11</div>
                                             <span class="woocommerce-Price-amount amount">149.000<span class="woocommerce-Price-currencySymbol">&#8363;</span></span>
                                             <p style='margin-top:10px; font-size:14px; color: black; padding: 0;'>Bạn vui lòng nhập đúng thông tin đặt hàng gồm: Họ tên, SĐT, Email, Địa chỉ để chúng tôi được phục vụ bạn tốt nhất !</p>
                                          </div>
                                          <div class='cotphai'>
                                             <div class='form-group'>
                                                <input type='text' class='form-control' placeholder='Họ tên:' name='name' required>
                                             </div>
                                             <div class='form-group'>
                                                <input type='text' class='form-control' placeholder='Số điện thoại:' name='sdt' required>
                                             </div>
                                             <div class='form-group'>
                                                <input type='email' class='form-control' placeholder='Email của bạn:' name='email' required>
                                             </div>
                                             <div class='form-group'>
                                                <input type='text' class='form-control' placeholder='Địa chỉ nhận hàng:' name='address' required>
                                             </div>
                                             <div class='form-group'>
                                                <input type='number' class='form-control' placeholder='Số lượng mua hàng' name='qty' value='1' required min='1'>
                                             </div>
                                             <div class='form-group'>
                                                <input type='text' class='form-control' disabled name='total' required>
                                             </div>
                                             <button type='submit' class='btn btn-default' name='submit'>ĐẶT HÀNG</button>
                                             <div class='web79loading' style='display:inline-block'></div>
                                          </div>
                                       </div>
                                    </div>
                                    <a class='popup-close' data-popup-close='muahangnhanh' href='#'>x</a>
                                 </div>
                              </div>
                              <script>var price = '149000';
                                 var from = 'Thế Giới Thời Trang Baby - Thiên Đường Quần Áo Trẻ Em Cao Cấp';
                                 var blog_url = 'https://thegioithoitrangbaby.vn';
                                 var to = 'giuselethien@gmail.com'; 
                              </script>   --}}  
                              <div class="product_meta">
                                 {{-- <span class="sku_wrapper">Mã: <span class="sku">AT11</span></span> --}}
                                 <span class="posted_in">Danh mục: <a href="/{{ $taxonomy->taxonomy }}/{{ $taxonomy->url_part }}.html" rel="tag">{{ $taxonomy->title }}</a></span>
                                 {{-- <span class="tagged_as">Từ khóa: <a href="https://thegioithoitrangbaby.vn/tu-khoa/ao-thun-be-trai/" rel="tag">áo thun bé trai</a>, <a href="https://thegioithoitrangbaby.vn/tu-khoa/at11/" rel="tag">AT11</a>, <a href="https://thegioithoitrangbaby.vn/tu-khoa/quan-ao-be-trai-viet-nam/" rel="tag">quần áo bé trai việt nam</a></span> --}}
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
                                 {{-- <li class="additional_information_tab " id="tab-title-additional_information" role="tab" aria-controls="tab-additional_information">
                                    <a href="#tab-additional_information">Thông tin bổ sung</a>
                                 </li> --}}
                              </ul>
                              <div class="tab-panels">
                                 <div class="woocommerce-Tabs-panel woocommerce-Tabs-panel--description panel entry-content active" id="tab-description" role="tabpanel" aria-labelledby="tab-title-description">
                                    {!! $detail->chitiet !!}

                                    {{-- <div id="wpdevar_comment_1" style="width:100%;text-align:left;">
                                       <span style="padding: 10px;font-size:16px;font-family:Arial,Helvetica Neue,Helvetica,sans-serif;color:#000000;">Facebook Comments</span>
                                       <div class="fb-comments" data-href="https://thegioithoitrangbaby.vn/san-pham/ao-thun-be-trai-thoi-trang-at11/" data-order-by="social" data-numposts="5" data-width="100%" style="display:block;"></div>
                                    </div>
                                    <style>#wpdevar_comment_1 span,#wpdevar_comment_1 iframe{width:100% !important;}</style>
                                    <br clear="both" /> --}}

                                 </div>
                                 {{-- <div class="woocommerce-Tabs-panel woocommerce-Tabs-panel--additional_information panel entry-content " id="tab-additional_information" role="tabpanel" aria-labelledby="tab-title-additional_information">
                                    <table class="woocommerce-product-attributes shop_attributes">
                                       <tr class="woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_can-nang">
                                          <th class="woocommerce-product-attributes-item__label">Cân Nặng</th>
                                          <td class="woocommerce-product-attributes-item__value">
                                             <p>10kg, 11kg, 12kg, 13kg, 14kg, 15kg, 16kg, 17kg, 18kg, 19kg, 20kg, 21kg, 22kg, 23kg, 24kg, 9kg</p>
                                          </td>
                                       </tr>
                                       <tr class="woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_mau-sac">
                                          <th class="woocommerce-product-attributes-item__label">Màu Sắc</th>
                                          <td class="woocommerce-product-attributes-item__value">
                                             <p>Xanh</p>
                                          </td>
                                       </tr>
                                    </table>
                                 </div> --}}
                              </div>
                              <!-- .tab-panels -->
                           </div>
                           <!-- .tabbed-content -->
                           @isset($posts)
                           <div class="related related-products-wrapper product-section">
                              <h3 class="product-section-title container-width product-section-title-related pt-half pb-half uppercase">
                                 Sản phẩm tương tự    
                              </h3>
                              <div class="row large-columns-4 medium-columns- small-columns-2 row-small slider row-slider slider-nav-reveal slider-nav-push"  data-flickity-options='{"imagesLoaded": true, "groupCells": "100%", "dragThreshold" : 5, "cellAlign": "left","wrapAround": true,"prevNextButtons": true,"percentPosition": true,"pageDots": false, "rightToLeft": false, "autoPlay" : false}'>
                                 @foreach($posts as $item)
                                 <div class="product-small col has-hover product type-product post-{{ $item->id }} status-publish instock product_cat-do-bo-be-trai product_cat-quan-ao-be-trai product_cat-thoi-trang-tre-em product_tag-b09 product_tag-do-bo-be-trai product_tag-quan-ao-be-trai-viet-nam has-post-thumbnail shipping-taxable purchasable product-type-variable">
                                    <div class="col-inner">
                                       <div class="badge-container absolute left top z-1"></div>
                                       <div class="product-small box ">
                                          <div class="box-image">
                                             <div class="image-none">
                                                <a href="/chi-tiet-sp/{{ $item->alias }}.html">
                                                   <img width="300" height="300" src="{{ $item->image }}" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt=""sizes="(max-width: 300px) 100vw, 300px" />            
                                                </a>
                                             </div>
                                             {{-- <div class="image-tools is-small top right show-on-hover">
                                             </div>
                                             <div class="image-tools is-small hide-for-small bottom left show-on-hover">
                                             </div>
                                             <div class="image-tools grid-tools text-center hide-for-small bottom hover-slide-in show-on-hover">
                                                <a class="quick-view" data-prod="{{ $item->id }}" href="#quick-view">XEM NHANH</a>       
                                             </div> --}}
                                          </div>
                                          <!-- box-image -->
                                          <div class="box-text box-text-products text-center grid-style-2">
                                             <div class="title-wrapper">
                                                <p class="name product-title"><a href="/chi-tiet-sp/{{ $item->alias }}.html">{{ $item->title }}</a></p>
                                             </div>
                                             <div class="price-wrapper">
                                                <span class="price"><span class="woocommerce-Price-amount amount">{{ number_format($item->giakm ? $item->giakm : $item->gia) }}<span class="woocommerce-Price-currencySymbol">&#8363;</span></span></span>
                                             </div>
                                             <div class="add-to-cart-button"><a href="/chi-tiet-sp/{{ $item->alias }}.html" rel="nofollow" data-product_id="{{ $item->id }}" class=" add_to_cart_button product_type_variable button primary is-gloss mb-0 is-small">Xem sản phẩm</a></div>
                                          </div>
                                          <!-- box-text -->
                                       </div>
                                       <!-- box -->
                                    </div>
                                    <!-- .col-inner -->
                                 </div>
                                 <!-- col -->
                                 @endforeach
                              </div>
                           </div>
                           @endisset
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

       @include('frontend.element.footer')

    </div>

    @include('frontend.element.menu_mobile')

    @include('frontend.element.login_popup')

    @include('frontend.panels.stylefooter')
    
 </body>
</html>