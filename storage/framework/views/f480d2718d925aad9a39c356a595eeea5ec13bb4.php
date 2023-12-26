

<?php $__env->startSection('title'); ?>
  <?php echo e($module_name); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content-header'); ?>
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <?php echo e($module_name); ?>

      
          class="fa fa-plus"></i> <?php echo app('translator')->get('add_new'); ?></a>
    </h1>
  </section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

  <!-- Main content -->
  <section class="content">
    
    <div class="box box-default">

      <div class="box-header with-border">
        <h3 class="box-title"><?php echo app('translator')->get('search'); ?></h3>
        <div class="box-tools pull-right">
          <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
      </div>
      
        <div class="box-body">
          <div class="row">
            <div class="col-md-3">
              <div class="form-group">
                <input type="text" class="form-control" name="keyword" placeholder="<?php echo app('translator')->get('keyword_note'); ?>"
                  value="<?php echo e(isset($params['keyword']) ? $params['keyword'] : ''); ?>">
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-group">
                <select name="status" id="status" class="form-control select2" style="width: 100%;">
                  <option value=""><?php echo app('translator')->get('status'); ?></option>
                  <?php $__currentLoopData = App\Consts::ORDER_STATUS; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($key); ?>"
                      <?php echo e(isset($params['status']) && $key == $params['status'] ? 'selected' : ''); ?>>
                      <?php echo e(__($value)); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
              </div>
            </div>
            <div class="col-md-7">
              <div class="form-group">
                <button type="submit" class="btn btn-primary btn-sm"><?php echo app('translator')->get('search'); ?></button>
                
                  <?php echo app('translator')->get('reset'); ?>
                </a>
              </div>
            </div>
          </div>
        </div>
      
    </div>
    

    <div class="box">
      <div class="box-header">
        <h3 class="box-title"><?php echo app('translator')->get('list'); ?></h3>
      </div>
      <div class="box-body table-responsive">
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

        <?php if(count($rows) == 0): ?>
          <div class="alert alert-warning alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <?php echo app('translator')->get('not_found'); ?>
          </div>
        <?php else: ?>
          <table class="table table-hover table-bordered">
            <thead>
              <tr>
                <th><?php echo app('translator')->get('fullname'); ?></th>
                <th><?php echo app('translator')->get('email'); ?> / <?php echo app('translator')->get('phone'); ?></th>
                <th><?php echo app('translator')->get('Order service'); ?></th>
                <th>Ghi chú khách hàng</th>
                <th>Ghi chú Admin</th>
                <th><?php echo app('translator')->get('updated_at'); ?></th>
                <th><?php echo app('translator')->get('status'); ?></th>
                <th><?php echo app('translator')->get('action'); ?></th>
              </tr>
            </thead>
            <tbody>

              <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($row->parent_id == 0 || $row->parent_id == null): ?>
                  <form action="<?php echo e(route(Request::segment(1) . '.destroy', $row->id)); ?>" method="POST"
                    onsubmit="return confirm('<?php echo app('translator')->get('confirm_action'); ?>')">
                    <tr class="valign-middle">
                      <td>
                        <strong style="font-size: 14px;"><?php echo e($row->name); ?></strong>
                      </td>
                      <td>
                        <?php echo e($row->email); ?>

                        <br>
                        <?php echo e($row->phone); ?>

                      </td>
                      <td>
                        <a target="_blank" href="<?php echo e($row->post_link); ?>">
                          <?php echo e($row->post_name); ?>

                        </a>
                      </td>
                      <td>
                        <?php echo e(Str::limit($row->customer_note, 200)); ?>

                      </td>
                      <td>
                        <?php echo e(Str::limit($row->admin_note, 200)); ?>

                      </td>
                      <td>
                        <?php echo e($row->updated_at); ?>

                      </td>
                      <td>
                        <?php echo app('translator')->get($row->status); ?>
                      </td>
                      <td>
                        <a class="btn btn-sm btn-warning" data-toggle="tooltip" title="<?php echo app('translator')->get('view'); ?>"
                          data-original-title="<?php echo app('translator')->get('view'); ?>"
                          href="<?php echo e(route(Request::segment(1) . '.show', $row->id)); ?>">
                          <i class="fa fa-pencil-square-o"></i>
                        </a>
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button class="btn btn-sm btn-danger" type="submit" data-toggle="tooltip" title="<?php echo app('translator')->get('delete'); ?>"
                          data-original-title="<?php echo app('translator')->get('delete'); ?>">
                          <i class="fa fa-trash"></i>
                        </button>
                      </td>
                    </tr>
                  </form>
                <?php endif; ?>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
          </table>
        <?php endif; ?>
      </div>

      <div class="box-footer clearfix">
        <div class="row">
          <div class="col-sm-5">
            Tìm thấy <?php echo e($rows->total()); ?> kết quả
          </div>
          <div class="col-sm-7">
            
          </div>
        </div>
      </div>

    </div>
  </section>
<?php $__env->stopSection(); ?>
<?php /**PATH E:\xampp7428\htdocs\shopquanao\resources\views/admin/pages/orders/index.blade.php ENDPATH**/ ?>