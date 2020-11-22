<?php $__env->startSection('title'); ?>
   <?php echo e(__('site.control_panel')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-content'); ?>
<!-- <div class="m-subheader-search">
		<span class="m-subheader-search__desc">
		<div class="mr-auto">
</div>
</span>
					</div> -->
					<div class="m-subheader ">
						<div class="d-flex align-items-center">
							<div class="mr-auto">

								<ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
									<li class="m-nav__item m-nav__item--home">
										<a href="#" class="m-nav__link m-nav__link--icon">
											<i class="m-nav__link-icon la la-home"></i>
										</a>
									</li>
									<li class="m-nav__item">
										<a href="/dashboard" class="m-nav__link">
											<span class="m-nav__link-text"><?php echo e(__('text.home')); ?></span>
										</a>
									</li>

									<li class="m-nav__separator">-</li>
									<li class="m-nav__item">
										<a href="/dashboard/profile" class="m-nav__link">
											<span class="m-nav__link-text"><?php echo e(__('text.profile')); ?></span>
										</a>
									</li>
								</ul>
							</div>

	<div>

</div>
</div>
</div>

<div class="m-grid__item m-grid__item--fluid m-wrapper">
<!-- BEGIN: Subheader -->
<!-- END: Subheader -->
<div class="m-content">
<div class="row">
<div class="col-lg-12">
<!--begin::Portlet-->
<div class="m-portlet m-portlet--mobile" id="m_blockui_2_portlet">
	<div class="m-portlet__head">
<div class="m-portlet__head-caption">
<div class="m-portlet__head-title">
<h3 class="m-portlet__head-text">
    <?php echo e(__('text.profile')); ?>

</h3>
</div>
</div>
</div>
	<div class="m-portlet__body">
    <form class="profileForm" id="profileForm" action="" method="post">
                <?php echo csrf_field(); ?>
                    <div class="form-group m-form__group row">
                        <div class="col-md-12 mb-4">
                            <label><?php echo e(__('text.username')); ?> <span class="required">*</span></label>
                            <div class="form-valid">
                                <input type="text" disabled value="<?php echo e(\Auth::user()->username); ?>" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12 mb-4">
                            <label> <?php echo e(__('text.email')); ?><span class="required">*</span></label>
                            <div class="form-valid">
                                <input type="email" disabled  value="<?php echo e(Auth::user()->email); ?>" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12 mb-4">
                             <label><?php echo e(__('text.password')); ?> <span class="required"></span></label>
                            <div class="form-valid">
                                <input type="password" name="password" value="" class="form-control password">
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn_save_page"><?php echo e(__('text.save')); ?></button>
                </div>
            </form>
	</div>
</div>
</div>
</div>
</div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<script>
            $('#profileForm').on('submit', function(e){
            e.preventDefault();
            var formData = new FormData(this);
                $.ajax({
                    url: '/admin/password',
                    dataType:'json',
                    type: 'POST',
                    cache:false,
					contentType: false,
					processData: false,
                    data: formData,
                    success: function (data) {
                        if (data["status"] == true) {
                            swal({
                                title: "",
                                text: data["data"],
                                type: "success",
                                showCancelButton: false,
                                confirmButtonColor: "#DD6B55",
                                confirmButtonText: "<?php echo e(__('text.ok')); ?>",
                                cancelButtonText: "<?php echo e(__('text.cancel')); ?>",
                                closeOnConfirm: true,
                                closeOnCancel: true
                            });

                                $('.password').val('');
                        }else {
                            if(data['data_validator']!=null){
                                var dt = '<ul>';
                                 $.each(data["data_validator"], function (key, value) {
                                     dt = dt + '<li>' + value + '</li>';
                                 })
                                 dt =dt+ '</ul>';
                             swal({
                                 title: "",
                                 text: data["data"],
                                 type: "error",
                                 html:dt,
                                 showCancelButton: false,
                                 confirmButtonColor: "#DD6B55",
                                 confirmButtonText: "<?php echo e(__('text.ok')); ?>",
                                 cancelButtonText: "<?php echo e(__('text.cancel')); ?>",
                                 closeOnConfirm: true,
                                 closeOnCancel: true
                             });



                     }else{

                         swal({
                             title: "",
                             text: data["data"],
                             type: "error",
                             showCancelButton: false,
                             confirmButtonColor: "#DD6B55",
                             confirmButtonText: "<?php echo e(__('text.ok')); ?>",
                             cancelButtonText: "<?php echo e(__('text.cancel')); ?>",
                             closeOnConfirm: true,
                             closeOnCancel: true
                         });


                     }
                        }
                    },
                });
            });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.master_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\tejartek\resources\views/admin/dashboard/profile.blade.php ENDPATH**/ ?>