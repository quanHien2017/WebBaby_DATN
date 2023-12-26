<!DOCTYPE html>
<html lang="vi" class="loading-site no-js">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
 <head>

    @php
    $seo_title = $seo_title ?? ($page->title ?? ($web_information->information->seo_title ?? ''));
    $seo_keyword = $seo_keyword ?? ($page->keyword ?? ($web_information->information->seo_keyword ?? ''));
    $seo_description = $seo_description ?? ($page->description ?? ($web_information->information->seo_description ?? ''));
	@endphp
	<title>{{ $seo_title ?? ($page->title ?? ($web_information->information->seo_title ?? '')) }}</title>
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
 <body data-rsssl=1 class="home page-template page-template-page-blank page-template-page-blank-php page page-id-4 ot-vertical-menu woocommerce-no-js lightbox nav-dropdown-has-arrow">
    <a class="skip-link screen-reader-text" href="#main">Skip to content</a>
    <div id="wrapper">

      @include('frontend.element.header')

       <main id="main" class="">
          <div id="content" role="main" class="content-area">

               @include('frontend.element.slide')

               @include('frontend.element.danhmucnoibat')
             
               @include('frontend.element.sanphamnoibat')
               
          </div>
       </main>

       @include('frontend.element.footer')

    </div>

    @include('frontend.element.menu_mobile')

    @include('frontend.element.login_popup')

    @include('frontend.panels.stylefooter')
    
 </body>
</html>