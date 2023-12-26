<!DOCTYPE html>
<html lang="vi">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>

	<?php
	$page_title = $detail->title;
	$title = $detail->title;
	$image = $detail->image != '' ? $detail->image : null;
	$seo_title = $title;
	$seo_keyword = $title;
	$seo_description = $detail->brief;
	$seo_image = $image ?? null;

	$url_category = '/'.$detail->taxonomy.'/'.$detail->taxonomy_url_part.'.html';

	?>

	<title><?php echo e($page_title); ?></title>
	<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1" />
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="robots" content="index, follow" />
	<meta http-equiv="Content-Language" content="vi" />
	<meta name="copyright" content="Copyright" />
	<meta name="description" content="<?php echo e($seo_description); ?>" />
	<meta name="keywords" content="<?php echo e($seo_keyword); ?>" />
	<meta name="DC.title" content="<?php echo e($seo_title); ?>" />
	<meta property="og:type" name="ogtype" content="Website" />
	<meta property="og:title" name="ogtitle" content="<?php echo e($seo_title); ?>" />
	<meta property="og:description" name="ogdescription" content="<?php echo e($seo_description); ?>" />
	<meta property="og:image" name="ogimage" content="<?php echo e($seo_image); ?>" />
	<meta property="og:sitename" content="<?php echo e(Request::fullUrl()); ?>" />
	<link rel="canonical" href="<?php echo e(Request::fullUrl()); ?>" />
	<link rel="shortcut icon" type="image/png" href="<?php echo e($web_information->image->favicon ?? ''); ?>" />

	<?php echo $__env->make('frontend.panels.styles', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</head>
<body class="">

	<div class="page">

	<?php echo $__env->make('frontend.element.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

		<div class="page__content">
			<div class="container">
				<nav class="main-nav">
					<div class="main-nav__list">
						<a class="main-nav__item active" href="/<?php echo e($detail->taxonomy); ?>/<?php echo e($detail->taxonomy_url_part); ?>.html"><?php echo e($detail->taxonomy_title); ?></a>
					</div>
					<div class="main-nav__dropdown"></div>
					<div class="main-nav__toggle"><span>...</span><i class="fa fa-angle-down ml-2"></i></div>
				</nav>	
				<div class="row gutter-20">
					<div class="col-lg-9 mb-20">
						<article class="post mb-20">
							<h1 class="post-title"><?php echo e($detail->title); ?></h1>
							<div class="post-info">
								<div class="mr-3"><i class="fa fa-calendar mr-1"></i> <?php echo e(date('d/m/Y', strtotime($detail->created_at))); ?> &nbsp;&nbsp;|&nbsp;&nbsp; <i class="fa fa-eye mr-1"></i> <?php echo e($detail->number_view); ?></div>
							</div>
							<div class="post-body media">
								<div class="post-aside">
									<div class="post-aside__item">
										<a class="post-aside__comment" href="#comments">Bình Luận</a>
									</div>
									<div class="post-aside__item">
										<a class="post-aside__btn" href="/" title="Trang chủ"><i class="fa fa-home"></i></a>
									</div>
									<div class="post-aside__item">
										<a class="post-aside__btn" target="_blank" href="https://www.facebook.com" rel="nofollow"><i class="fa fa-facebook"></i></a>
									</div>
								</div>
								<div class="media-body" style="overflow: hidden">
									<div class="post-content">
										<?= $detail->content ?>
										
										<style type="text/css">
											iframe{
												width: 100%;
											}
										</style>
										<?= $detail->iframe_video ?>

										<?php if(count($list_image) > 0): ?>
											<?php echo $__env->make('frontend.panels.styles-image-detail', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
											<hr>
											<div class='row'>
												<div class='col-md-12'>
													<div id='mygallery__2078' class='shortcode_article_gallery2078 owl-carousel'>
														<?php $__currentLoopData = $list_image; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
														<div class='item slider'>
															<a href='<?php echo e($image->link_image); ?>' data-toggle='lightbox' data-gallery='gallery-2078' >
																<img src='<?php echo e($image->link_image); ?>' title='Nhấn để phóng to' style='object-fit: cover;height:500px!important' >
															</a>
														</div>
														<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
													</div>
													<a class='mygallery__prev' onclick="prev_OWL1679762638('mygallery__2078');"></a>
													<a class='mygallery__next' onclick="next_OWL1679762638('mygallery__2078');"></a>
												</div>
											</div>
										<?php endif; ?>
									</div>
									<?php if(count($list_document) > 0): ?>
									<div class="post-files mt-3">
										<h4>File đính kèm:</h4>
											<?php $__currentLoopData = $list_document; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $document): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<?php
												$file = $document->link_file != '' ? $document->link_file : null;
												$tenfile = explode('/',$file);
												$tenf = array_pop($tenfile);
											?>
												<p>
													<i class="fa fa-file mr-2"></i><a href="javascript:;" onclick="countdownload('<?php echo e($detail->id); ?>','<?php echo e($document->id); ?>')"><?php echo e($tenf); ?></a>
												</p>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									</div>
									<script>
						                function countdownload(id,id_document) {
						                    var f = "?id="+ id + "&id_document=" + id_document;
						                    var _url = "/countdownload" + f;
						                    $.ajax({
						                        url: _url,
						                        data: f,
						                        cache: false,
						                        context: document.body,
						                        success: function(data) {
						                            window.location.href = data;
						                        }
						                    });
						                }
						            </script>
									<?php endif; ?>


								</div>
							</div>
							<div class="post-footer">
								<div class="fb-like" id="fb-like-2211" data-href="https://chuyennguyentrai.edu.vn/nhung-buoc-chuan-bi-cuoi-cung-cho-cnt-s-day-ngay-hoi-chuyen-nguyen-trai-2023-tin2211" data-width="" data-layout="standard" data-action="like" data-size="small" data-show-faces="false" data-share="true"></div>					       
								<div class="button_like_over" data-id="2211"></div>
							</div>
							<div class="post-tags"></div>
						</article>
						<div class="facebook-comments">
							<a id="comments"></a>
							<div class="fb-comments" data-href="https://chuyennguyentrai.edu.vn/nhung-buoc-chuan-bi-cuoi-cung-cho-cnt-s-day-ngay-hoi-chuyen-nguyen-trai-2023-tin2211" data-width="100%" data-numposts="5"></div>
						</div>

						<hr class="my-20">

						<?php if(count($posts) > 0): ?>
							<section class="section section-2">
								<h2 class="section-2__title">
									Các bài cùng chuyên mục
								</h2>
								<div class="row gutter-16">	
									<?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<div class="col-6 col-md-4 mb-3">
											<div class="news-5">
												<a class="news-5__frame" href="/chi-tiet/<?php echo e($item->url_part); ?>.html" title="<?php echo e($item->title); ?>"><img src="<?php echo e($item->image); ?>" onerror="this.src='/public/themes/frontend/yenbinh/themes/chuyennt/images/nopic.jpg'" alt="<?php echo e($item->title); ?>" /></a>
												<h3 class="news-5__title">
													<a href="/chi-tiet/<?php echo e($item->url_part); ?>.html" title="<?php echo e($item->title); ?>"><?php echo e($item->title); ?></a>
												</h3>
											</div>
										</div>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>												
								</div>
							</section>
						<?php endif; ?>
					</div>

					<div class="col-lg-3 mb-20">

						<?php echo $__env->make('frontend.element.nightmode', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

						<?php echo $__env->make('frontend.element.thuvienanh', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

						<?php echo $__env->make('frontend.element.thuvienvideo', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

						

						<?php echo $__env->make('frontend.element.truycap', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

						<?php echo $__env->make('frontend.element.facebook', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
						
					</div>
				</div>
		</div>	

		<?php echo $__env->make('frontend.element.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>	

	</div>

<?php echo $__env->make('frontend.element.scrolltop', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>	

</body>

</html>
<?php /**PATH E:\xampp7428\htdocs\yenbinh\resources\views/frontend/pages/post/detail.blade.php ENDPATH**/ ?>