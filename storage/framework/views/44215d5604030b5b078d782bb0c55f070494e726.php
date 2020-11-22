<?php $__env->startSection('header'); ?>
  <?php echo $__env->make('site.layout.inner-header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('inner-page'); ?>
inner-page
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<!-- section -->
<section class="contact">
			<div class="container"> 
				<div class="row justify-content-center">
					<div class="col-lg-3 col-md-4">
						<div class="contact-box">
							<div class="contact-box-icon">
								<i class="fas fa-map-marker-alt"></i>
							</div>
							<div class="contact-box-content"> 
								<p class="description"><?php echo e($data['setting']->location); ?></p>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-4">
						<div class="contact-box">
							<div class="contact-box-icon">
								<i class="fas fa-phone"></i>
							</div>
							<div class="contact-box-content"> 
								<p class="description"><?php echo e($data['setting']->mobile); ?></p>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-4">
						<div class="contact-box">
							<div class="contact-box-icon">
								<i class="fa fa-envelope"></i>
							</div>
							<div class="contact-box-content"> 
								<p class="description"><?php echo e($data['setting']->email); ?></p>
							</div>
						</div>
					</div>
				</div>
					
				<div class="row justify-content-center">
					<div class="col-lg-9">
						<h4 class="py-4 text-center"><?php echo $data['contact']->details; ?></h4>
						<form class="form contact-form"  id="form_contact" method="POST" >
                            <?php echo csrf_field(); ?>
							<div class="form-group row">
								<div class="col-md-6 mb-md-0 mb-4">
									<label>الاسم الكامل ( ثلاثي )</label>
									<input type="text" class="form-control name" name="name" placeholder="الاسم بالكامل " required>
									<div class="invalid-feedback">الرجاء كتابة الاسم بالكامل</div>
								</div>
								<div class="col-md-6">
									<label>رقم الجوال</label>
									<input type="tel" pattern="[0-9]{10}" name="mobile" class="form-control mobile" placeholder="00996 55 111 222" required>
								<div class="invalid-feedback">الرجاء ادخال رقم الجوال</div> 
								</div>
							</div>
							<div class="form-group ">
								<label>البريد الالكتروني</label>
								<input type="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" class="form-control emai" placeholder="example@domain.com" required>
								<div class="invalid-feedback">الرجاء كتابة البريد الالكتروني بشكل صحيح</div>
							</div> 
							<div class="form-group">
								<label>محتوى الرسالة</label>
								<textarea rows="8" class="form-control details" name="details" placeholder="محتوى الرسالة ... " required></textarea>
								<div class="invalid-feedback">الرجاء كتابة محتوى الرسالة</div>
							</div>
							<div class="form-group text-center mt-5">
								<button type="submit" class="btn btn-primary px-5">ارسال</button>
							</div>
						</form>
					</div>
				</div>
			</div> 
		</section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<script>
$('#form_contact').on('submit', function(e){
  e.preventDefault();
  var formData = new FormData(this);
      
    $.ajax({
        url: "<?php echo e(URL::to('/')); ?>/contacts",
        type: "post",
        cache:false,
        contentType: false,
        processData: false,
        data: formData,
        success: function (data) {
            toastr.options = {
                    "closeButton": false,
                    "debug": false,
                    "newestOnTop": false,
                    "progressBar": false,
                    "positionClass": "toast-bottom-center",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                }
            if (data["status"] == true) {

              $('.contact-form .name').val('');
              $('.contact-form .email').val('');
              $('.contact-form .mobile').val('');
              $('.contact-form .details').val('');

              toastr["success"](data["data"])
            } else {
                toastr["error"](data["data"])
            }
        }
    });

});

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('site.layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\tejartek\resources\views/site/‏‏contact.blade.php ENDPATH**/ ?>