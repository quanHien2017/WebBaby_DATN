<!DOCTYPE html>
<html lang="vi">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>

	<?php
	$page_title = $taxonomy->title;
	$title = $taxonomy->title;
	$image = $taxonomy->image;
	$seo_title = $title;
	$seo_keyword = $title;
	$seo_description = $taxonomy->brief;
	$seo_image = $image ?? null;

	$url_category = '/'.$taxonomy->taxonomy.'/'.$taxonomy->url_part.'.html';

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
						<a class="main-nav__item active" href="/<?php echo e($taxonomy->taxonomy); ?>/<?php echo e($taxonomy->url_part); ?>.html"><?php echo e($taxonomy->title); ?></a>
						<?php $__currentLoopData = $taxonomylist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $taxolist): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<?php if($taxolist->parent_id == $taxonomy->id): ?>
								<a class="main-nav__item" href="/<?php echo e($taxolist->taxonomy); ?>/<?php echo e($taxolist->url_part); ?>.html"><?php echo e($taxolist->title); ?></a>
							<?php endif; ?>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</div>
					<div class="main-nav__dropdown"></div>
					<div class="main-nav__toggle"><span>...</span><i class="fa fa-angle-down ml-2"></i></div>
				</nav>	
				<div class="row gutter-20">
					<div class="col-lg-9 mb-20">
						<?php if(count($postsnoibat) > 0): ?>
						<section class="section section-5">
							<h2 class="section-5__title">Tài liệu nổi bật</h2>
							<div class="section-5__body">
								<div class="list-3">
									<?php $__currentLoopData = $postsnoibat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<div class="list-3__item">
										<div class="doc media">
											<div class="doc__icon">
												<i class="fa fa-fw fa-file-pdf-o fa-3x"></i>
											</div>
											<div class="media-body">
												<h3 class="doc__title">
													<a href="/chi-tiet/<?php echo e($items->url_part); ?>.html" title="<?php echo e($items->title); ?>"><?php echo e($items->title); ?></a>
												</h3>
												<div class="doc__info"><i class="fa fa-eye mr-1"></i> <?php echo e($items->number_view); ?></div>
											</div>
										</div>
									</div>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>						
								</div>
							</div>
						</section>
						<?php endif; ?>

						<?php if(count($posts) > 0): ?>
						<?php
							$params['status'] = 'active';
				            $params['taxonomy'] = App\Consts::CATEGORY['tai-lieu'];
				            $params['order_by'] = ['id'=>'asc'];
						  	$taxolist = App\Http\Services\ContentService::getCmsTaxonomy($params)
						  	->get();
						?>
						<section class="section">
							<form class="bg-primary px-2 pt-2 mb-3">
								<div class="row gutter-8">
									<div class="col-lg-4 mb-2">
										<select class="custom-select border-0" id="taxolist" onchange="search_document()">
											
												<?php $__currentLoopData = $taxolist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $taxo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
													<option value="<?php echo e($taxo->id); ?>" <?php if($taxo->id == $taxonomy->id) { echo 'selected'; } ?> ><?php echo e($taxo->title); ?></option>
												<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	
										</select>
									</div>
									<div class="col-lg-4 mb-2">
										<select class="custom-select border-0" id="orderby" onchange="search_document()">
											<option value="">Sắp xếp theo</option>									
											<option value="created_at">Mới nhất</option>
											<option value="number_download">Tải nhiều nhất</option>
											<option value="number_view">Xem nhiều nhất</option>
										</select>
									</div>
									<div class="col-lg-4 mb-2">
										<div class="input-group">
											<input class="form-control border-0" type="text" id="keyword" placeholder="Từ khoá tìm kiếm" onchange="search_document()">
											
										</div>
									</div>
								</div>
							</form>
							<script type="text/javascript">

								function search_document() {
								    
									var keyword = $("#keyword").val();
									var orderby = $("#orderby").val();
									var taxolist = $("#taxolist").val();

								    var f = "?keyword=" + keyword.trim() + "&orderby=" + orderby + "&taxolist=" + taxolist;
								    
								    var _url = "/search_document" + f;

								    $.ajax({
								      type: "GET",
								      url: _url,
								      data: f,
								      cache: false,
								      context: document.body,
								      success: function(data) {
								        $("#list-document").html(data);
								      }
								    });
								}
							</script>
							<div class="list-2" id="list-document">
								<?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<div class="list-2__item">
									<div class="doc-2">
										<h3 class="doc-2__title">
											<a href="/chi-tiet/<?php echo e($item->url_part); ?>.html" title="<?php echo e($item->title); ?>"><?php echo e($item->title); ?></a>
										</h3>
										<div class="media">
											<a class="doc-2__frame" href="/chi-tiet/<?php echo e($item->url_part); ?>.html" title="<?php echo e($item->title); ?>">
											<img src="<?php echo e($item->image); ?>" onerror="this.src='/public/themes/frontend/yenbinh/themes/chuyennt/images/nopic.jpg'" alt="<?php echo e($item->title); ?>" /></a>
											<div class="media-body">
												<div class="doc-2__desc"><?php echo e($item->title); ?></div>
												<div class="doc-2__footer">
													<div class="doc-2__info">
														<!-- <span class="d-inline-block mr-3"><i class="fa fa-file-pdf-o mr-1"></i><span>70tr</span></span><span
															class="d-inline-block mr-3"><i class="fa fa-share-square-o mr-1"></i><span>ntt</span></span> -->
														<span
														class="d-inline-block mr-3"><i class="fa fa-calendar mr-1"></i><span><?php echo e(date('d/m/Y', strtotime($item->created_at))); ?></span></span>
														<span
														class="d-inline-block mr-3"><i class="fa fa-eye mr-1"></i><span><?php echo e($item->number_view); ?></span></span>
														<span
														class="d-inline-block"><i class="fa fa-cloud-download mr-1"></i><span><?php echo e($item->number_download); ?></span></span>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</div>
							
							<?php echo e($posts->withQueryString()->links('frontend.pagination.default')); ?>

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
<?php /**PATH E:\xampp7428\htdocs\yenbinh\resources\views/frontend/pages/post/category_document.blade.php ENDPATH**/ ?>