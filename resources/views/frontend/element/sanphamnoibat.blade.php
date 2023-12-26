@php
  $paramsdm['status'] = App\Consts::POST_STATUS['active'];
  $paramsdm['news_position'] = '1';
  $paramsdm['is_featured'] = 'active';
  $paramsdm['taxonomy'] = 'san-pham';
  $danhmuc = App\Http\Services\ContentService::getCmsTaxonomy($paramsdm)->get();
  
  $paramsdmcon['status'] = App\Consts::POST_STATUS['active'];
  $paramsdmcon['news_position'] = '1';
  $paramsdmcon['taxonomy'] = 'san-pham';
  $danhmuccon = App\Http\Services\ContentService::getCmsTaxonomy($paramsdmcon)->get();

  $params['status'] = '1';
  $sanphamnoibat = App\Http\Services\ContentService::getProducts($params)->get();
@endphp
@isset($danhmuc)
   @foreach($danhmuc as $dm)
   <div class="row row-small catelogy"  id="row-273211993">
    <div class="col small-12 large-12"  >
       <div class="col-inner">
          <div class="clearfix vi-header">
             <h3 class="vi-left-title pull-left"><a href="/san-pham/{{ $dm->url_part }}.html">{{ $dm->title }}</a>
             </h3>
             <p>
               @foreach($danhmuccon as $dmc)
                  @if($dmc->parent_id == $dm->id)
                   	<span class="span-inline">
                   		<a href="/san-pham/{{ $dmc->url_part }}.html">{{ $dmc->title }}</a> |
                   	</span>
                  @endif
               @endforeach
             </p>
          </div>
          @isset($sanphamnoibat)
          <div class="row large-columns-4 medium-columns- small-columns-2 row-small has-shadow row-box-shadow-1 row-box-shadow-2-hover slider row-slider slider-nav-circle slider-nav-push"  data-flickity-options='{"imagesLoaded": true, "groupCells": "100%", "dragThreshold" : 5, "cellAlign": "left","wrapAround": true,"prevNextButtons": true,"percentPosition": true,"pageDots": false, "rightToLeft": false, "autoPlay" : 3000}'>
            @foreach($sanphamnoibat as $spnb)
               @php
                  $hienthi = trim($spnb->hienthi,';');
                  $vitrihienthi = explode(';',$hienthi);       
               @endphp
               @if(in_array('0',$vitrihienthi))
                   <div class="col" >
                      <div class="col-inner">
                         <div class="badge-container absolute left top z-1"></div>
                         <div class="product-small box has-hover box-normal box-text-bottom">
                            <div class="box-image" >
                               <div class="image-zoom" >
                                 <a href="/chi-tiet-sp/{{ $spnb->alias }}.html">
                                    <img width="300" height="300" src="{{ $spnb->image }}" data-src="{{ $spnb->image }}" class="lazy-load attachment-medium size-medium" alt="" sizes="(max-width: 300px) 100vw, 300px" />									
                                 </a>
                               </div>
                               {{-- <div class="image-tools top right show-on-hover">
                               </div>
                               <div class="image-tools grid-tools text-center hide-for-small bottom hover-slide-in show-on-hover">
                                  <a class="quick-view" data-prod="15491" href="#quick-view">XEM NHANH</a>
                               </div> --}}
                            </div>
                            <!-- box-image -->
                            <div class="box-text text-center" >
                               <div class="title-wrapper">
                                  <p class="name product-title"><a href="/chi-tiet-sp/{{ $spnb->alias }}.html">{{ $spnb->title }}</a></p>
                               </div>
                               <div class="price-wrapper">
                                  <span class="price"><span class="woocommerce-Price-amount amount">{{ number_format($spnb->giakm ? $spnb->giakm : $spnb->gia) }}<span class="woocommerce-Price-currencySymbol">&#8363;</span></span></span>
                               </div>
                               <div class="add-to-cart-button"><a href="/chi-tiet-sp/{{ $spnb->alias }}.html" rel="nofollow" class=" add_to_cart_button product_type_variable button primary is-gloss mb-0 is-small">Xem sản phẩm</a></div>
                            </div>
                            <!-- box-text -->
                         </div>
                         <!-- box -->
                      </div>
                      <!-- .col-inner -->
                   </div>
                  @endif
                @endforeach
             </div>
          @endisset
       </div>
    </div>
    <style scope="scope">
    </style>
   </div>
   @endforeach
@endisset