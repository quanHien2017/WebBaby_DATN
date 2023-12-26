
<script src="<?php echo e(asset('/themes/admin/js/custom.js')); ?>"></script>

<script src="<?php echo e(asset('/themes/admin/editor/ckeditor/build/ckeditor.js')); ?>"></script>
<script src="<?php echo e(asset('/themes/admin/editor/ckfinder/ckfinder.js')); ?>"></script>

<!-- Bootstrap 3.3.7 -->
<script src="<?php echo e(asset('/themes/admin/js/bootstrap.min.js')); ?>"></script>
<!-- SlimScroll -->
<script src="<?php echo e(asset('/themes/admin/plugins/slimScroll/jquery.slimscroll.min.js')); ?>"></script>
<!-- Select2 -->
<script src="<?php echo e(asset('/themes/admin/plugins/select2/select2.full.min.js')); ?>"></script>
<!-- DatePicker -->
<script src="<?php echo e(asset('/themes/admin/plugins/datepicker/bootstrap-datepicker.js')); ?>"></script>
<script src="<?php echo e(asset('/themes/admin/plugins/timepicker/bootstrap-timepicker.min.js')); ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo e(asset('/themes/admin/js/app.min.js')); ?>"></script>

<script>
  $(".select2").select2();

  $('.datepicker').datepicker({
    autoclose: true,
    todayHighlight: true,
    format: 'dd/mm/yyyy',
    language: 'vn'
  });

  //Timepicker
  $(".timepicker").timepicker({
    showInputs: false
  });

  $('.lfm').filemanager('other', {
    prefix: route_prefix
  });

  const filterArray = (array, fields, value) => {
    fields = Array.isArray(fields) ? fields : [fields];
    return array.filter((item) => fields.some((field) => item[field] === value));
  };
</script>
<?php /**PATH /home/ntdconyj0yk6/phongkham.nvoting.com/resources/views/admin/panels/scripts.blade.php ENDPATH**/ ?>