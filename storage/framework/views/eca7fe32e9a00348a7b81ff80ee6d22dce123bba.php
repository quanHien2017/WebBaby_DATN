<style type="text/css">
	.logoft{
	    display: inline-flex;
	}
	.logoft img{
		height: 150px;
	}
	@media  only screen and (max-width: 768px) {
		.logoft img {
		    height: 70px;
		}
		.footer__content{
			text-align: center;
		}
		.footer__content iframe{
			width:100%;
		}
	}
</style>
<footer class="footer">
	<div class="container">
		<div class="row gutter-20">	
		<div class="col-md-4 col-sm-6 border-right mobile-mb-4">
			<div class="footer__content">
				<div style="text-align: center;">
					<a class="logoft" href="/" title="<?php echo e($web_information->information->site_name); ?>">
						<img src="<?php echo e($web_information->image->logo_header_light ?? ''); ?>" onerror="this.src='public/themes/frontend/yenbinh/themes/chuyennt/images/nopic.jpg'" alt="<?php echo e($web_information->information->site_name); ?>" />
					</a>
				</div>
				
			</div>
		</div>

		<div class="col-md-4 col-sm-6 border-right mobile-mb-4">
			<div class="footer__content">
				<div><b><?php echo e($web_information->information->site_name); ?></b></div>
				<div ><?php echo e($web_information->information->brief); ?></div>
				<div>
					Địa chỉ: <?php echo e($web_information->information->address); ?> <br />
					Điện thoại : <?php echo e($web_information->information->phone); ?><br />
					Email: <a href="mailto:<?php echo e($web_information->information->email); ?>"><?php echo e($web_information->information->email); ?></a>
				</div>
			</div>
		</div>

		<div class="col-md-4 col-sm-6 border-right mobile-mb-4">
			<div class="footer__content">
				<div><b>BẢN ĐỒ</b></div>
				<?php echo $web_information->source_code->map ?>
			</div>
			
		</div>
	</div>
	<nav class="f-nav">
		<li class="f-nav__item"><a class="term-nav__link"  title="Trang chủ" href="/">Trang chủ</a></li>
		<?php foreach($taxonomy_all as $taxonomy){
			$hienthi = trim($taxonomy->hienthi,';');
			$vitrihienthi = explode(';',$hienthi); // chuyển về mảng
			if(in_array('2',$vitrihienthi)){
		?>
			<li class="f-nav__item"><a class="term-nav__link" title="<?php echo e($taxonomy->title); ?>" href="/<?php echo e($taxonomy->taxonomy); ?>/<?php echo e($taxonomy->url_part); ?>.html"><?php echo e($taxonomy->title); ?></a></li>
		<?php } } ?>
	</nav>
	<nav class="f-nav">
		<?php echo e($web_information->information->copyright); ?>

	</nav>
	</div>
</footer><?php /**PATH E:\xampp7428\htdocs\yenbinh\resources\views/frontend/element/footer.blade.php ENDPATH**/ ?>