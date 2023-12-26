<?php
    $params['status'] = 'active';
    $params['taxonomy'] = 'dich-vu';
    $dsdichvu = App\Http\Services\ContentService::getCmsTaxonomy($params)->get();
?>
<div class="wprm-wrapper d_mb" role="navigation">
    <div class="wprm-overlay"></div>
    <div id="wprmenu_bar" class="wprmenu_bar bodyslide left widget-menu-left wpr-logo-left">
        <div class="hamburger hamburger--slider">
        	<span class="hamburger-box">
        		<span class="hamburger-inner"></span>
        	</span>
        </div>
        <div class="wprm_logo">
            <a href="/">
            	<img data-lazyloaded="1"
                width="302" height="62" data-src="<?php echo e($web_information->image->logo_header ?? ''); ?>" alt="PHÒNG KHÁM BỆNH VIỆN ĐẠI HỌC Y HÀ NỘI">
            </a>
        </div>
        <div class="wprm_search">
            <i id="wprm_search_icon" class="svg__fa">
            	<img data-lazyloaded="1" width="16" height="16" data-src="/public/themes/frontend/phongkham/img/svg_fff_svg__fa-search.svg" alt="svg__fa-">
            </i>
            <div class="wprm_search_form">
                <form action="/">
                    <input type="text" placeholder="Tìm kiếm..." name="s" value="">
                    <button type="submit" value="search">
                    	<i class="svg__fa">
                    		<img data-lazyloaded="1" width="16" height="16" data-src="/public/themes/frontend/phongkham/img/svg_fff_svg__fa-search.svg" alt="svg__fa-">
                    	</i>
                    </button>
                </form>
            </div>
        </div>
    </div>
    <?php if(isset($menu)): ?>
    <div id="mg-wprm-wrap" class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left default">
        <ul id="wprmenu_menu_ul" class="menu">
            <?php
              $main_menu = $menu->first(function ($item, $key) {
                  return $item->menu_type == 'header' && ($item->parent_id == null || $item->parent_id == 0);
              });
              
              $content = '';
              //cấp 1
              foreach ($menu as $key => $item) {

                  $url = $title = '';
                  
                  if ($item->parent_id == $main_menu->id) {
                      $title = isset($item->json_params->title->{$locale}) && $item->json_params->title->{$locale} != '' ? $item->json_params->title->{$locale} : $item->name;
                      $url = $item->url_link;
                      $target = $item->json_params->target;
                      $active = $url == url()->current() ? 'current' : '';
                      
                      //cấp 2
                      if ($item->sub > 0) {

                         $content .= '<li id="menu-item-151155" class="menu-item menu-item-has-children"><a target="'.$target.'" href="' . $url . '" aria-current="page">' . $title . '</a>';

                          $content .= '<ul class="sub-menu">';
                          foreach ($menu as $item_sub) {
                              $url = $title = '';
                              if ($item_sub->parent_id == $item->id) {
                                  $title = isset($item_sub->json_params->title->{$locale}) && $item_sub->json_params->title->{$locale} != '' ? $item_sub->json_params->title->{$locale} : $item_sub->name;
                                  $url = $item_sub->url_link;
                                  $target = $item_sub->json_params->target;
                                  $content .= '<li id="menu-item-164365" class="menu-item"><a target="'.$target.'" href="' . $url . '">'.$title.'</a>';
                                  $content .= '</li>';
                              }
                          }
                          $content .= '</ul>';
                      } else {
                        $content .= '<li id="menu-item-151155" class="menu-item"><a target="'.$target.'" href="' . $url . '" aria-current="page">' . $title . '</a>';
                      } 
                      $content .= '</li>';
                  }
              }
              $content.= "<li id='menu-item-188098' class='menu-item--dat-lich menu-item'><a href='javascript:void(0);' id='mpopupLink'>Đặt lịch khám</a></li>";
              echo $content;
            ?>
        </ul>
    </div>
    <?php endif; ?>
</div>
    <style type="text/css">
       .mpopup {
            display: none;
            position: fixed;
            z-index: 2;
            padding-top: 50px;
            padding-bottom: 30px;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0,0,0);
            background-color: rgba(0,0,0,0.4);
        }
        .modal-content {
            position: relative;
            background-color: #fff;
            margin: auto;
            padding: 0;
            width: 450px;
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
            -webkit-animation-name: animatetop;
            -webkit-animation-duration: 0.4s;
            animation-name: animatetop;
            animation-duration: 0.4s;
            border-radius: 0.3rem;
        }
        @media  screen and (max-width: 480px){
            .modal-content {
                width: auto;
            }
        }
        .modal-header {
            padding: 2px 12px;
            background-color: #ffffff;
            color: #333;
            border-bottom: 1px solid #e9ecef;
            border-top-left-radius: 0.3rem;
            border-top-right-radius: 0.3rem;
        }
        .modal-header h2{
            font-size: 1.25rem;
            margin-top: 14px;
            margin-bottom: 14px;
        }
        .modal-body {
            padding: 2px 12px;
        }
        .modal-footer {
            padding: 1rem;
            background-color: #ffffff;
            color: #333;
            border-top: 1px solid #e9ecef;
            border-bottom-left-radius: 0.3rem;
            border-bottom-right-radius: 0.3rem;
            text-align: right;
        }

        .close {
            color: #888;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }
        .close:hover, .close:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }

        /* add animation effects */
        @-webkit-keyframes animatetop {
            from {top:-300px; opacity:0}
            to {top:0; opacity:1}
        }

        @keyframes  animatetop {
            from {top:-300px; opacity:0}
            to {top:0; opacity:1}
        }

        .entry-loop__row {
            width: 100%;
            margin-top: 12px;
        }
        .form_register {
            background: #fff;
            padding: 0px 30px 1px 30px;
            border-radius: 30px;
        }
        h1 {
            font-size: 2rem;
        }
        .form_title span {
            display: block;
            font-size: 2rem;
            text-align: center;
            padding-bottom: 15px;
            color: #234a66;
            text-transform: uppercase;
            font-weight: 600;
        }
        form, input, button, label, textarea {
            border: 0;
            outline: none;
            font: inherit;
        }
        .form_register input[type=text] {
            width: 100%;
            border: 1px solid #e0e0e0;
            margin: 10px 0;
            padding: 15px 10px;
            border-radius: 7px;
            background: #fbfbfb;
        }
        .form_register input[type=email] {
            width: 100%;
            border: 1px solid #e0e0e0;
            margin: 10px 0;
            padding: 15px 10px;
            border-radius: 7px;
            background: #fbfbfb;
        }
        .form_register select{
            font-size: 1.03rem;
            width: 100%;
            border: 1px solid #e0e0e0;
            margin: 10px 0;
            padding: 15px 10px;
            border-radius: 7px;
            background: #fbfbfb;
        }
        .form_register textarea {
            width: 100%;
            border: 1px solid #e0e0e0;
            margin: 10px 0;
            padding: 15px 10px;
            border-radius: 7px;
            background: #fbfbfb;
        }
        .form_register button[type=submit] {
            display: block;
            margin: 20px auto;
            background-color: #234a66;
            color: #fff;
            padding: 15px 30px;
            border-radius: 22px;
            text-transform: uppercase;
        }
    </style>
    <div id="mpopupBox" class="mpopup">
        <!-- Modal content -->
        <div class="modal-content">

            <div class="entry-loop__row">
                <div class="form_register" style="padding:10px">
                    <span class="close">x</span>
                </div>
                <div class="form_register">
                    <div class="form_title">
                        <h1>
                            <span>Đặt lịch khám</span>
                        </h1>
                    </div>
                    <form method="POST" action="<?php echo e(route('frontend.contact.store')); ?>">
                        <?php echo csrf_field(); ?>
                        <input type="text" name="name" id="name" placeholder="Họ và tên (*)" aria-label="Họ và tên">
                        <input type="text" name="phone" id="phone" placeholder="Số điện thoại (*)" aria-label="Số điện thoại">
                        <select name="department_id" id="department_id" required>
                            <option value="">Vui lòng chọn dịch vụ khám</option>
                            <?php $__currentLoopData = $dsdichvu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($item->parent_id != ''): ?>
                                    <option value="<?php echo e($item->id); ?>"><?php echo e($item->title); ?></option>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <input type="email" name="email" id="email" placeholder="Email" aria-label="Email">
                        <textarea name="content" id="content" rows="5" cols="25" placeholder="Triệu chứng" aria-label="Triệu chứng"></textarea>
                        <button type="submit">
                            <span>Đặt lịch khám</span>
                        </button>
                        <input type="hidden" name="is_type" id="is_type" value="contact">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php /**PATH E:\xampp7428\htdocs\shopquanao\resources\views/frontend/element/menu.blade.php ENDPATH**/ ?>