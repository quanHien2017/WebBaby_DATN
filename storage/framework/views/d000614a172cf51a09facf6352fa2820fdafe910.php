<?php
	$params['status'] = 'active';
	$params['news_position'] = '4';
  	$newhot = App\Http\Services\ContentService::getCmsPost($params)
  	->get();
?>
<header class="header">
	<div class="toppage">
		<div class="container">
			<div class="toppage__inner">
				<div class="toppage__text">
					<?php
					$date = getdate();
				    echo "Thứ ".$date['wday'].", ";
				    echo "ngày ".$date['mday']." ";
				    echo "tháng ".$date['mon']." ";
				    echo "năm ".$date['year'];
					?>
				</div>
				<nav class="h-social">
					<a class="h-social__item" target="_blank" title="Facebook of THCS Yên Bình - Thạch Thất " href="<?php echo e($web_information->social->facebook); ?>" rel="nofollow"><i class="fa fa-facebook"></i></a>
					<a class="h-social__item" target="_blank" href="https://mail.google.com/mail/?view=cm&fs=1&to=<?php echo e($web_information->information->email); ?>"><i class="fa fa-google-plus"></i></a>
					<a class="h-social__item" target="_blank" title="Youtube of" href="<?php echo e($web_information->social->youtube); ?>" rel="nofollow"><i class="fa fa-youtube"></i></a>
				</nav>
			</div>
		</div>
	</div>
	<div class="header__wrapper">
		<div class="container">
			<div class="header__inner">
				<a class="header__logo" href="/" title="<?php echo e($web_information->information->site_name); ?>">
					<img src="<?php echo e($web_information->image->logo_header_light ?? ''); ?>" onerror="this.src='public/themes/frontend/yenbinh/themes/chuyennt/images/nopic.jpg'" alt="<?php echo e($web_information->information->site_name); ?>" />
				</a>
				<div class="header__texts">
					<div class="header__text-1"><?php echo e($web_information->information->site_name); ?></div>
					<div class="header__text-2"><?php echo e($web_information->information->brief); ?></div>
				</div>
			</div>
		</div>
	</div>
	<nav class="navigation">
		<div class="navigation__wrapper">
			<div class="container">
				<div class="navigation__inner">
					<button class="navigation__btn btn btn-default js-navbar-open">
						<i class="fa fa-bars"></i>
					</button>
					<form class="search" action="tin-tuc" method="GET">
						<div class="input-group">
							<input class="form-control" type="text" name="keyword" id="keyword" placeholder="Tìm kiếm tin tức...." />
							<div class="input-group-append">
								<button class="input-group-text btn-submit-search">
									<i class="fa fa-search"></i>
								</button>
							</div>
						</div>
					</form>
					<section class="navbar js-navbar">
						<div class="navbar__backdrop js-navbar-close"></div>
						<div class="navbar__wrapper">
							
							<div class="navbar__body">
							<?php 
							$array_category = array();
							foreach ($taxonomy_all as $category) {
								if ($category->parent_id != '') {
									$array_category[$category->parent_id] = $category->parent_id;
								}
							} 
							?>
							<ul class="menu menu-root">
								<li class="menu-item">
									<a id="menu-item-1 menu-cat-id-" class="menu-link" title="Trang chủ" href="/">Trang chủ</a>
								</li>

								<?php foreach($taxonomy_all as $taxonomy){
								$hienthi = trim($taxonomy->hienthi,';');
								$vitrihienthi = explode(';',$hienthi); // chuyển về mảng
								if(in_array('0',$vitrihienthi)){
									if(in_array($taxonomy->id,$array_category)) {
								?>
									<li class="menu-item menu-item-group">
										<a class="menu-link" title="<?php echo e($taxonomy->title); ?>" href="/<?php echo e($taxonomy->taxonomy); ?>/<?php echo e($taxonomy->url_part); ?>.html" ><?php echo e($taxonomy->title); ?></a>	
										<span class="menu-toggle"><span><i class="fa fa-angle-right"></i></span></span>
										<ul class="menu menu-sub">
											<?php
											foreach($taxonomy_all as $sub_taxonomy){ 
												if($sub_taxonomy->parent_id == $taxonomy->id){
											?>
												<li class="menu-item menu-item-group">
													<a class="menu-link" title="<?php echo e($sub_taxonomy->title); ?>" href="/<?php echo e($sub_taxonomy->taxonomy); ?>/<?php echo e($sub_taxonomy->url_part); ?>.html"><?php echo e($sub_taxonomy->title); ?></a>

													<?php if ($sub_taxonomy->sub > 0) {  ?>
														<span class="menu-toggle"><span><i class="fa fa-angle-right"></i></span></span>
														<ul class="menu menu-sub menu-sub-2">
															<?php
															foreach($taxonomy_all as $sub_2_taxonomy){ 
																if($sub_2_taxonomy->parent_id == $sub_taxonomy->id){
															?>
																<li class="menu-item">
																	<a class="menu-link" href="/<?php echo e($sub_2_taxonomy->taxonomy); ?>/<?php echo e($sub_2_taxonomy->url_part); ?>.html"><?php echo e($sub_2_taxonomy->title); ?></a>
																</li>

															<?php } } ?>
														</ul>
													<?php } ?>
												</li>
											<?php } } ?>
										</ul>
									</li>	
								<?php } else { ?>

									<li class="menu-item">
										<a class="menu-link" title="<?php echo e($taxonomy->title); ?>" href="/<?php echo e($taxonomy->taxonomy); ?>/<?php echo e($taxonomy->url_part); ?>.html"><?php echo e($taxonomy->title); ?></a>
									</li>
								
								<?php } } } ?>

								</ul>
							</div>
						</div>
					</section>
				</div>
			</div>
		</div>
	</nav>
	<?php if(count($newhot) > 0): ?>
	<nav class="navigation" style="background-color:#ebebeb">
		<div class="navigation__wrapper">
			<div class="container">
				<style type="text/css">
					.Bg_title_Header {
					    width: 100%;
					    background: #ebebeb;
					    height: 20px;
					    float: left;
					    display: inline-table;
					    padding: 0px;
					}
					.header_marquee marquee div {
					    display: inline-flex;
					    height: 18px;
					}
					.Bg_title_Header a {
						cursor: pointer;
					    font-size: 15px;
					    color: #d61820;
					    display: inline-block;
					    margin: 0px;
					    padding: 0px;
					    line-height: 20px;
					    text-transform: uppercase;
					    font-style: italic;
					    font-weight: bold;
					}
					.Bg_title_Header i {
					    color: #f2b002;
					    font-size: 20px;
					    margin: 10px 0 0 10px;
					}
				</style>
				<div class="Bg_title_Header">
		            <marquee direction="">
		            	<?php $__currentLoopData = $newhot; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rows): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	                    <i class="fa fa-star-o" aria-hidden="true"></i>
	                    <a href="/chi-tiet/<?php echo e($rows->url_part); ?>.html"><?php echo e($rows->title); ?></a>
	                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		            </marquee>
			    </div>
			</div>
		</div>
	</nav>
	<?php endif; ?>
</header>

<?php /**PATH E:\xampp7428\htdocs\yenbinh\resources\views/frontend/element/header.blade.php ENDPATH**/ ?>