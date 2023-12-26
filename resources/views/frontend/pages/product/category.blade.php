<!DOCTYPE html>
<html lang="vi" class="loading-site no-js">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
 <head>

    @php
      $page_title = $taxonomy->title ?? ($page->title ?? $page->name);
      $title = $taxonomy->title ?? ($taxonomy->title ?? null);
      $image = $taxonomy->image ?? null;
      $seo_title = $taxonomy->meta_title ?? $title;
      $seo_keyword = $taxonomy->meta_keyword ?? null;
      $seo_description = $taxonomy->meta_description ?? null;
      $seo_image = $image ?? null;
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
 <body data-rsssl=1 class="archive tax-product_cat term-quan-ao-be-trai term-37 ot-vertical-menu woocommerce woocommerce-page woocommerce-no-js lightbox nav-dropdown-has-arrow">
    <a class="skip-link screen-reader-text" href="#main">Skip to content</a>
    <div id="wrapper">

      @include('frontend.element.header')

      <div class="shop-page-title category-page-title page-title ">
         <div class="page-title-inner flex-row  medium-flex-wrap container">
            <div class="flex-col flex-grow medium-text-center">
               <h1 class="shop-page-title is-xlarge">{{ $taxonomy->title }}</h1>
               <div class="is-small">
                  <nav class="woocommerce-breadcrumb breadcrumbs"><a href="/">Trang chủ</a> <span class="divider">&#47;</span> {{ $taxonomy->title }}</nav>
               </div>
               <div class="category-filtering category-filter-row show-for-medium">
                  <a href="#" data-open="#shop-sidebar" data-visible-after="true" data-pos="left" class="filter-button uppercase plain">
                  <i class="icon-menu"></i>
                  <strong>Lọc</strong>
                  </a>
                  <div class="inline-block">
                  </div>
               </div>
            </div>
            {{-- <div class="flex-col medium-text-center">
               <form class="woocommerce-ordering" method="get" action="san-pham">
                  <select name="orderby" class="orderby">
                     <option value="date">Mới nhất</option>
                     <option value="price">Thứ tự theo giá: thấp đến cao</option>
                     <option value="price-desc">Thứ tự theo giá: cao xuống thấp</option>
                  </select>
               </form>
            </div> --}}
         </div>
      </div>

      <main id="main" class="">
         <div class="row category-page-row">
            <div class="col large-3 hide-for-medium ">
               <div id="shop-sidebar" class="sidebar-inner col-inner">
                  <aside id="nav_menu-3" class="widget widget_nav_menu">
                     <span class="widget-title shop-sidebar">Danh mục sản phẩm</span>
                     <div class="is-divider small"></div>
                     <div class="menu-danh-muc-san-pham-container">
                        <ul id="menu-danh-muc-san-pham" class="menu">
                           @php
                              $array_category_sp = array();
                              foreach ($taxonomy_sanpham as $category_sp) {
                                 if ($category_sp->parent_id != '') {
                                    $array_category_sp[$category_sp->parent_id] = $category_sp->parent_id;
                                 }
                              }
                           @endphp
                           <?php foreach($taxonomy_sanpham as $taxonomy_sp){
                              if(in_array($taxonomy_sp->id,$array_category_sp)) {
                           ?>
                              <li class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-has-children">
                                 <a href="/{{ $taxonomy_sp->taxonomy }}/{{ $taxonomy_sp->url_part }}.html">{{ $taxonomy_sp->title }}</a>
                                    <ul class="sub-menu">
                                       <?php
                                       foreach($taxonomy_sanpham as $sub_taxonomy_sp){ 
                                          if($sub_taxonomy_sp->parent_id == $taxonomy_sp->id){
                                       ?>
                                             <li class="menu-item menu-item-type-taxonomy menu-item-object-product_cat "><a href="/{{ $sub_taxonomy_sp->taxonomy }}/{{ $sub_taxonomy_sp->url_part }}.html">{{ $sub_taxonomy_sp->title }}</a></li>
                                          <?php } } ?>
                                    </ul>
                              </li>
                           <?php } else { ?>
                              <?php if($taxonomy_sp->parent_id == '') { ?>
                              <li class="menu-item menu-item-type-taxonomy menu-item-object-product_cat"><a href="/{{ $taxonomy_sp->taxonomy }}/{{ $taxonomy_sp->url_part }}.html">{{ $taxonomy_sp->title }}</a></li>
                           <?php } } } ?>
                           
                        </ul>
                     </div>
                  </aside>
                  <aside id="woocommerce_products-3" class="widget woocommerce widget_products">
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
               </div>
               <!-- .sidebar-inner -->
            </div>
            <!-- #shop-sidebar -->
            <div class="col large-9">
               <div class="shop-container">
                  <div class="term-description">
                     {!! $taxonomy->content !!}
                  </div>
                  <div class="woocommerce-notices-wrapper"></div>
                  <div class="products row row-small large-columns-4 medium-columns-3 small-columns-2 has-shadow row-box-shadow-1 row-box-shadow-2-hover">
                     @foreach($posts as $items)
                        <div class="product-small col has-hover product type-product status-publish first instock has-post-thumbnail shipping-taxable purchasable product-type-variable">
                           <div class="col-inner">
                              <div class="badge-container absolute left top z-1"></div>
                              <div class="product-small box ">
                                 <div class="box-image">
                                    <div class="image-none">
                                       <a href="/chi-tiet-sp/{{ $items->alias }}.html">
                                       <img width="300" height="300" src="{{ $items->image }}" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="{{ $items->title }}" sizes="(max-width: 300px) 100vw, 300px" />          </a>
                                    </div>
                                    {{-- <div class="image-tools is-small top right show-on-hover">
                                    </div>
                                    <div class="image-tools is-small hide-for-small bottom left show-on-hover">
                                    </div>
                                    <div class="image-tools grid-tools text-center hide-for-small bottom hover-slide-in show-on-hover">
                                       <a class="quick-view" data-prod="15491" href="#quick-view">XEM NHANH</a>         
                                    </div> --}}
                                 </div>
                                 <!-- box-image -->
                                 <div class="box-text box-text-products text-center grid-style-2">
                                    <div class="title-wrapper">
                                       <p class="name product-title"><a href="/chi-tiet-sp/{{ $items->alias }}.html">{{ $items->title }}</a></p>
                                    </div>
                                    <div class="price-wrapper">
                                       <span class="price"><span class="woocommerce-Price-amount amount">{{ number_format($items->giakm ? $items->giakm : $items->gia) }}<span class="woocommerce-Price-currencySymbol">&#8363;</span></span></span>
                                    </div>
                                    <div class="add-to-cart-button"><a href="/chi-tiet-sp/{{ $items->alias }}.html" rel="nofollow" class=" add_to_cart_button product_type_variable button primary is-gloss mb-0 is-small">Xem sản phẩm</a></div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     @endforeach
                  </div>
                  <!-- row -->
                  {{ $posts->withQueryString()->links('frontend.pagination.newdefault') }}
               </div>
               <!-- shop container -->
            </div>
         </div>
      </main>

       @include('frontend.element.footer')

    </div>

    @include('frontend.element.menu_mobile')

    @include('frontend.element.login_popup')

    @include('frontend.panels.stylefooter')
    
 </body>
</html>