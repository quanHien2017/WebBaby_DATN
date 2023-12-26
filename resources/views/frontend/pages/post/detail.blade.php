<!DOCTYPE html>
<html lang="vi">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>

	@php
	$page_title = $detail->title;
	$title = $detail->title;
	$image = $detail->image != '' ? $detail->image : null;
	$seo_title = $title;
	$seo_keyword = $title;
	$seo_description = $detail->brief;
	$seo_image = $image ?? null;

	$url_category = '/'.$detail->taxonomy.'/'.$detail->taxonomy_url_part.'.html';

	@endphp

	<title>{{ $page_title }}</title>
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
	<meta property="og:description" name="ogdescription" content="{{ $seo_description }}" />
	<meta property="og:image" name="ogimage" content="{{ $seo_image }}" />
	<meta property="og:sitename" content="{{ Request::fullUrl() }}" />
	<link rel="canonical" href="{{ Request::fullUrl() }}" />
	<link rel="shortcut icon" type="image/png" href="{{ $web_information->image->favicon ?? '' }}" />

	@include('frontend.panels.styles')
    
 </head>
 <body data-rsssl=1 class="archive tax-product_cat term-quan-ao-be-trai term-37 ot-vertical-menu woocommerce woocommerce-page woocommerce-no-js lightbox nav-dropdown-has-arrow">
    <a class="skip-link screen-reader-text" href="#main">Skip to content</a>
    <div id="wrapper">

      @include('frontend.element.header')

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
                        @foreach($posts_sp as $item)
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
            <style type="text/css">
	          	h5.post-title, .from_the_blog_excerpt {
				   overflow: hidden;
				   display: -webkit-box;
				   -webkit-line-clamp: 2;
				           line-clamp: 2; 
				   -webkit-box-orient: vertical;
				}
	          </style>
            <div class="large-9 col medium-col-first">
                <article id="post-15714" class="post-15714 post type-post status-publish format-standard has-post-thumbnail hentry category-tin-tuc tag-dam-voan-cho-be-gai tag-dam-voan-cho-be-gai-dep-nhat tag-top-3-mau-dam-voan-cho-be-gai-top-3-mau-dam-voan-cho-be-gai-dep-nhat">
                	<div class="article-inner ">
						<header class="entry-header">
							<div class="entry-header-text entry-header-text-top text-left">
								<h6 class="entry-category is-xsmall">
									<a href="/{{ $taxonomy->taxonomy }}/{{ $taxonomy->url_part }}.html" rel="category tag">{{ $taxonomy->title }}</a>
								</h6>
								<h1 class="entry-title">{{ $detail->title }}</h1>
								<div class="entry-divider is-divider small"></div>
								<div class="entry-meta uppercase is-xsmall">
									<span class="posted-on">Ngày cập nhật  
										<a href="#" rel="bookmark">
											<time class="entry-date published">{{ date('d/m/Y', strtotime($detail->created_at)) }} </time>
											<time class="updated">{{ date('d/m/Y', strtotime($detail->created_at)) }} </time></a>
									</span>
									<span class="byline"> bởi <span class="meta-author vcard"><a class="url fn n" href="#">{{ $detail->fullname }}</a></span>
									</span>	
								</div>
							</div>
						</header>
						<style type="text/css">
							figure {
								text-align: center;
							}
						</style>
						<div class="entry-content single-page">
							{!! $detail->content !!}
						</div>
					</div>
                </article>
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
