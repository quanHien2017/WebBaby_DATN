<?php
  $params['status'] = App\Consts::POST_STATUS['active'];
  $params['block_code'] = 'footer';
  $params['order_by'] = ['iorder' => 'ASC'];
  $footer = App\Http\Services\PageBuilderService::getBlockContent($params)->get();
?>
<?php if(isset($footer)): ?>
    <?php if(count($footer) > 0): ?>
        <footer id="footer" class="footer" role="navigation">
            <div id="footer_bvtc">
                <section class="container12 foot1" id="">
                    <div class="wrap">
                        <div class="d_flex">
                            <?php $__currentLoopData = $footer; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $foot): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($foot->parent_id != ''): ?>
                                <div class="foot1__col foot1__col--v1">
                                    <div class="h_4"><b><?php echo e($foot->title); ?></b>
                                    </div>
                                    <?php echo $foot->content; ?>

                                </div>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            <div class="foot1__col foot1__col--v1">
                                <hr class="foot1__hr">
                                <div class="h_4"><b>Liên kết mạng xã hội</b>
                                </div>
                                <ul class="foot1__col__social">
                                    <li><a target="_blank" rel="nofollow, noopener" href="<?php echo e($web_information->social->facebook ?? ''); ?>" title="facebook"><i class="svg_fff_svg__fa-facebook"></i></a>
                                    </li>
                                    <li><a target="_blank" rel="nofollow, noopener" href="<?php echo e($web_information->social->youtube ?? ''); ?>" title="youtube"><i class="svg_fff_svg__fa-youtube"></i></a>
                                    </li>
                                    <li><a target="_blank" rel="nofollow, noopener" href="<?php echo e($web_information->social->zalo ?? ''); ?>" title="zalo"><i class="svg_fff_svg__fa-zalo1"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="foot1__copyright">
                        <p><?php echo e($web_information->information->copyright ?? ''); ?></p>
                    </div>
                </section>
            </div>
        </footer>
        <?php endif; ?>
<?php endif; ?>

<div class="foot_cta_col2">
    <ul class="d_flex">
        <li class="_li1 d_pc"><small class="_a foot_cta_call"><i  class="svg__fa-ambulance svg__fa-foot_cta_svg_1"></i> <span><?php echo e($web_information->information->hotline); ?></span></small>
        </li>
        <li class="_li2 d_mb"><a class="_a foot_cta_call" href="tel: <?php echo e(str_replace(array('(',')','+'),'', $web_information->information->hotline)); ?>"><i  class="svg__fa-ambulance svg__fa-foot_cta_svg_1"></i> <span> <?php echo e($web_information->information->hotline); ?></span></a>
        </li>
        <li class="_li3"><a class="_a foot_cta_register" href="javascript:void(0);" id="mpopupLink2"><i class="svg__fa-ambulance svg__fa-foot_cta_svg_5"></i> <span>Đặt lịch khám</span></a>
        </li>
    </ul>
</div>
<style>
    .bonus {
    	position: fixed;
    	bottom: 15%;
    	z-index: 999;
    	right: 10px;
    }
    .bonus .hotline {
    	margin-bottom: 5px;
    }
    .bonus .hotline a {
    	background: url(/templates/e4cms/images/icon/icon_phone.svg)no-repeat;
    	height: 50px;
    	background-position: center;
    	background-size: cover;
    	width: 50px;
    	display: block;
    	margin: auto;
    }
    .bonus .form a {
    	background: url(http://quatangcamxuc.vn/image/icon_form.svg)no-repeat;
    	background-position: center;
    	background-size: cover;
    }
    .bonus .zalo a {
    	background: url(http://quatangcamxuc.vn/templates/e4cms/images/icon/icon_zalo.svg)no-repeat;
    	background-position: center;
    	background-size: cover;
    	}
    .bonus .messenger a {
    	background: url(http://quatangcamxuc.vn/templates/e4cms/images/icon/icon_messenger.svg)no-repeat;
    	background-position: center;
    	background-size: cover;
    }	
</style>
<div class="bonus" aria-hidden="false">
    <div class="hotline messenger"> <a target="_blank" href="<?php echo e($web_information->social->messenger ?? ''); ?>" class="hotline_qc">&nbsp;</a></div>
    <div class="hotline zalo"> <a target="_blank" href="<?php echo e($web_information->social->zalo ?? ''); ?>" class="hotline_qc">&nbsp;</a></div>
</div>
<script>
    // Select modal
    var mpopup = document.getElementById('mpopupBox');

    // Select trigger link
    var mpLink = document.getElementById("mpopupLink");

    var mpLink2 = document.getElementById("mpopupLink2");

    // Select close action element
    var close = document.getElementsByClassName("close")[0];

    // Open modal once the link is clicked
    mpLink.onclick = function() {
        mpopup.style.display = "block";
    };

    mpLink2.onclick = function() {
        mpopup.style.display = "block";
    };

    // Close modal once close element is clicked
    close.onclick = function() {
        mpopup.style.display = "none";
    };

    // Close modal when user clicks outside of the modal box
    window.onclick = function(event) {
        if (event.target == mpopup) {
            mpopup.style.display = "none";
        }
    };
</script><?php /**PATH /home/ntdconyj0yk6/phongkham.nvoting.com/resources/views/frontend/element/footer.blade.php ENDPATH**/ ?>