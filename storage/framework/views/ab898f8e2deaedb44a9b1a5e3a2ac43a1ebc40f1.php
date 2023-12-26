

<?php $__env->startSection('title'); ?>
  <?php echo e($module_name); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <?php echo e($module_name); ?>

      <a class="btn btn-sm btn-warning pull-right" href="<?php echo e(route(Request::segment(2) . '.create')); ?>"><i
          class="fa fa-plus"></i> <?php echo app('translator')->get('Add'); ?></a>
    </h1>
  </section>

  <!-- Main content -->
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
    <?php
    $array_location = APP\Consts::POST_POSITION_TAXONMY;
    ?>
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title"><?php echo app('translator')->get('Create form'); ?></h3>
      </div>
      <!-- /.box-header -->
      <!-- form start -->
      <form role="form" action="<?php echo e(route(Request::segment(2) . '.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div class="box-body">
          <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active">
                <a href="#tab_1" data-toggle="tab">
                  <h5>Thông tin chính <span class="text-danger">*</span></h5>
                </a>
              </li>

              <button type="submit" class="btn btn-primary btn-sm pull-right">
                <i class="fa fa-floppy-o"></i>
                <?php echo app('translator')->get('Save'); ?>
              </button>
            </ul>

            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
                <div class="row">
                  <div class="col-md-6">

                    <div class="form-group">
                      <label><?php echo app('translator')->get('Taxonomy'); ?> <small class="text-red">*</small></label>
                      <select name="taxonomy" id="taxonomy" class="form-control select2" required>
                        <option value=""><?php echo app('translator')->get('Please select'); ?></option>
                        <?php $__currentLoopData = $taxonomys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <option value="<?php echo e($value->id); ?>" >
                            <?php echo e($value->title); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label><?php echo app('translator')->get('Họ tên'); ?> <small class="text-red">*</small></label>
                      <input type="text" class="form-control" name="title" value="<?php echo e(old('title')); ?>" required>
                    </div>

                    
                    <div class="form-group">
                      <div class="row">
                        <div class="col-md-4">
                        <label><?php echo app('translator')->get('Năm sinh'); ?></label>
                        <input type="number" class="form-control" name="namsinh" placeholder="<?php echo app('translator')->get('Năm sinh'); ?>"
                          value="<?php echo e(old('namsinh')); ?>">
                        </div>
                         <div class="col-md-4">
                          <label><?php echo app('translator')->get('SĐT'); ?></label>
                          <input type="text" class="form-control" name="sdt" placeholder="<?php echo app('translator')->get('Số điện thoại'); ?>"
                          value="<?php echo e(old('sdt')); ?>">
                        </div>
                         <div class="col-md-4">
                          <label><?php echo app('translator')->get('Email'); ?></label>
                          <input type="email" class="form-control" name="email" placeholder="<?php echo app('translator')->get('email'); ?>"
                          value="<?php echo e(old('email')); ?>">
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="row">
                        <div class="col-md-6">
                        <label><?php echo app('translator')->get('Trình độ'); ?></label>
                        <input type="text" class="form-control" name="trinhdo" placeholder="<?php echo app('translator')->get('Trình độ'); ?>"
                          value="<?php echo e(old('trinhdo')); ?>">
                        </div>
                         <div class="col-md-6">
                          <label><?php echo app('translator')->get('Chức vụ'); ?></label>
                          <input type="text" class="form-control" name="chucvu" placeholder="<?php echo app('translator')->get('Chức vụ'); ?>"
                          value="<?php echo e(old('chucvu')); ?>">
                        </div>
                      </div>
                    </div>
                    
            			</div>

                  <div class="col-md-6">
                    
                    
                    <div class="form-group">
                      <label><?php echo app('translator')->get('Status'); ?></label>
                      <div class="form-control">
                        <label>
                          <input type="radio" name="status" value="active" checked="">
                          <small><?php echo app('translator')->get('active'); ?></small>
                        </label>
                        <label>
                          <input type="radio" name="status" value="deactive" class="ml-15">
                          <small><?php echo app('translator')->get('deactive'); ?></small>
                        </label>
                      </div>
                    </div>

                    <div class="form-group">
                      <label><?php echo app('translator')->get('Order'); ?></label>
                      <input type="number" class="form-control" name="iorder" placeholder="<?php echo app('translator')->get('iorder'); ?>"
                        value="<?php echo e(old('iorder')); ?>">
                    </div>
                    <div class="form-group">
                      <div class="row">
                        <div class="col-md-12">
                          
                          <label><?php echo app('translator')->get('Image'); ?></label>
                          <div class="input-group">
                          <span class="input-group-btn">
                            <a data-input="image" onclick="openPopupImg('image')" data-preview="image-holder" class="btn btn-primary lfm"
                            data-type="cms-image">
                            <i class="fa fa-picture-o"></i> <?php echo app('translator')->get('choose'); ?>
                            </a>
                          </span>
                          <input id="image" class="form-control" type="text" name="image"
                            placeholder="<?php echo app('translator')->get('image_link'); ?>..." value="<?php echo e(old('image')); ?>">
                          </div>
                          <div id="image-holder" style="margin-top:15px;max-height:100px;">
                          <?php if(old('image') != ''): ?>
                          <img id="view_image" style="height: 5rem;" src="<?php echo e(old('image')); ?>">
                          <?php else: ?>
                          <img id="view_image" style="height: 5rem;" src="">
                          <?php endif; ?>
                          </div>
                          
                        </div>

                        

                        
                      </div>
                    </div>
					
					

                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label><?php echo app('translator')->get('Description'); ?></label>
                      <textarea name="brief" class="form-control" rows="5"><?php echo e(old('brief')); ?></textarea>
                    </div>
                  </div>
                  

                </div>

              </div>

            </div><!-- /.tab-content -->
          </div><!-- nav-tabs-custom -->

        </div>
        <!-- /.box-body -->

        <div class="box-footer">
          <a class="btn btn-success btn-sm" href="<?php echo e(route(Request::segment(2) . '.index')); ?>">
            <i class="fa fa-bars"></i> <?php echo app('translator')->get('List'); ?>
          </a>
          <button type="submit" class="btn btn-primary pull-right btn-sm"><i class="fa fa-floppy-o"></i>
            <?php echo app('translator')->get('Save'); ?></button>
        </div>
      </form>
    </div>
  </section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
  <script>
    CKEDITOR.replace('content_vi', ck_options);

    $(document).ready(function() {
      var taxonomys = <?php echo json_encode($taxonomys ?? null, 15, 512) ?>;

      // Change to filter type by name taxonomy
      $(document).on('change', '#taxonomy', function() {
        let _value = $(this).val();
        let _html = $('#parent_id');
        let _list = taxonomys.filter(function(e, i) {
          return ((e.parent_id == 0 || e.parent_id == null) && e.taxonomy == _value);
        });
        let _content = '<option value="">== <?php echo app('translator')->get('ROOT'); ?> ==</option>';
        if (_list) {
          _list.forEach(element => {
            _content += '<option value="' + element.id + '"> ' + element.title + ' </option>';
            let _child = taxonomys.filter(function(e, i) {
              return ((e.parent_id == element.id) && e.taxonomy == _value);
            });
            if (_child) {
              _child.forEach(element => {
                _content += '<option value="' + element.id + '">- - ' + element.title + ' </option>';
              });
            }
          });
          _html.html(_content);
          $('#parent_id').select2();
        }
      });

    });
  </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp7428\htdocs\yenbinh\resources\views/admin/pages/cms_profile/create.blade.php ENDPATH**/ ?>