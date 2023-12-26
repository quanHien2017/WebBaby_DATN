

<?php $__env->startSection('title'); ?>
<?php echo e($module_name); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content-header'); ?>
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    <?php echo e($module_name); ?>

  </h1>
  <ol class="breadcrumb">
    <li>
      <a href="/">
        <i class="fa fa-dashboard"></i> Home
      </a>
    </li>
    <li class="active"><?php echo e($module_name); ?></li>
  </ol>
</section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<section class="content">
  <?php if(session('errorMessage')): ?>
  <div class="alert alert-warning alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <?php echo e(session('errorMessage')); ?>

  </div>
  <?php endif; ?>
  <?php if(session('successMessage')): ?>
  <div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <?php echo e(session('successMessage')); ?>

  </div>
  <?php endif; ?>

  <?php if($errors->any()): ?>
  <div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <p><?php echo e($error); ?></p>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

  </div>
  <?php endif; ?>
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header ">
					<script type="text/javascript" src="themes/admin/js/highcharts.js"></script>
					<script>
						$(function () {
							var arr1 = [];
							var arr2 = [];
							var arr3 = [];
							var arr4 = [];
						<?php
						$today = date('Y-m-d');
						for($i=0;$i<31;$i++){
							// Trừ đi 10 ngày
							$ngaytt = strtotime(date("Y-m-d", strtotime($today)) . -$i." day");
							$ngaytt = strftime("%d/%m/%Y", $ngaytt);?>
							arr1.push("<?php echo $ngaytt;?>");
							var key1 =0;
								var key2 =0;
								var key3=0;
							<?php
								
							foreach($rows as $show){
								if($ngaytt == date("d/m/Y",$show->ngay)){
									
								?>	
								key1=<?php echo $show->mobile;?>;
								key2=<?php echo $show->web;?>;
								key3=<?php echo $show->toantrang;?>;
							<?php	
								}
							}
							?>
								arr2.push(key1);
								arr3.push(key2);
								arr4.push(key3);
							
							<?php
						}
							?>
							
							//alert(arr1);
							arr2 = arr2.reverse();
							arr3 = arr3.reverse();
							arr4 = arr4.reverse();
							Highcharts.chart('chart1', {
								
								title: {
									text: 'Thống kê lượt truy cập',
								},
								xAxis: {
									categories: arr1.reverse()
								},
								yAxis: {
									title: {
										text: 'Views'
									},
									plotLines: [{
										value: 0,
										width: 1,
										color: '#f5a208'
									}]
								},
								tooltip: {
									valueSuffix: 'views'
								},
								
								series: [{
									name: 'mobile',
									data: arr2,
									color: "#1e8be9"
								},{
									name: 'web',
									data: arr3,
									color: "#d23636"
								}
								,{
									name: 'toàn trang',
									data: arr4,
									color: "#f5a208"
								}
								
								]
							});
						});
							
					</script>
			
					<div id="chart1" style="min-width: 310px; height: 400px; margin: 0 auto"></div> 		

				</div>
			</div>
		</div>
		
		<div class="col-xs-6">
			<div class="box">
				<nav id="topview" class="navbar navbar-static-top text-center" role="navigation" style="    background-color: #00a65a;">
					<span class="btn hidden-xs hidden-sm" style="margin-top:4px;color: white;font-size: 20px;"><i class="fa fa-user"> Admin đang online</i></span>
				</nav>
				<div class="tab-content">
							
					<div class="box-body table-responsive">
						<table class="table table-bordered table-hover">
							<thead>
								
								<tr>
									<th width="" class="">Họ tên</th>
									<th width="" class="text-center">Thời gian</th>
								</tr>
							</thead>
							<tbody>
								<?php $__currentLoopData = $adminOnlines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $adonline): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<tr>
									<td width="" class=""><?php echo e($adonline->name); ?></td>
									<td width="" class="text-center"><?php echo e(date('H:i d/m/Y',strtotime( $adonline->login_at))); ?></td>
								</tr>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</tbody>
						</table>
					
					</div>
				</div>		
			</div>
		</div>
		<div class="col-xs-6">
			<div class="box">
				<nav id="topview" class="navbar navbar-static-top text-center" role="navigation" style="    background-color: #00a65a;">
					<!-- Sidebar toggle button-->
					<span class="btn hidden-xs hidden-sm" style="margin-top:4px;color: white;font-size: 20px;"><i class="fa fa-comment"> Bình luận</i></span>
				</nav>
				<div class="tab-content">
							
					<div class="box-body table-responsive">
						<table class="table table-bordered table-hover">
							<thead>
								<tr>
									<th width="" class="">Số bình luận đang chờ</th>
									<th width="" class="text-center"><?php echo $tongsobinhluan['cho'] ?></th>
								</tr>
								<tr>
									<th width="" class="">Số bình luận đã duyệt</th>
									<th width="" class="text-center"><?php  echo $tongsobinhluan['duyet'] ?></th>
								</tr>
								<tr>
									<th width="" class="">Số bình luận bị gỡ</th>
									<th width="" class="text-center"><?php  echo $tongsobinhluan['go'] ?></th>
								</tr>
								<tr>
									<th width="" class="">Tổng số bình luận</th>
									<th width="" class="text-center"><?php  echo $tongsobinhluan['tong']; ?></th>
								</tr>
							</thead>
						</table>
					
					</div>
				</div>		
			</div>
		</div>
	</div>

</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ntdconyj0yk6/phongkham.nvoting.com/resources/views/admin/pages/home/index.blade.php ENDPATH**/ ?>