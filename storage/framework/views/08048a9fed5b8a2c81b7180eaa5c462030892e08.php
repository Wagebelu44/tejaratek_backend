<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">

    <!-- begin::Head -->
    <head>
        <meta charset="utf-8" />
        <title>تجارتك ~ لوحة التحكم</title>
        <meta name="description" content="Latest updates and statistic charts">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
        <script src="/admin/assets/vendors/base/jquery-1.11.0.min.js"></script>
        <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />

    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.min.css" rel="stylesheet"/>

    <link rel="stylesheet" href="/admin/assets/select_with_ajax/css/ajax-bootstrap-select.css">
    <link rel="stylesheet" href="/admin/assets/app/fancybox.min.css">
    
        <!--begin::Web font -->

        
        <!--end::Web font -->
        <!--begin::Page Vendors Styles -->
            <link href="/admin/assets/vendors/custom/fullcalendar/fullcalendar.bundle.rtl.css" rel="stylesheet" type="text/css" />
            <link href="/admin/assets/vendors/base/vendors.bundle.rtl.css" rel="stylesheet" type="text/css" />
            <link href="/admin/assets/demo/demo6/base/style.bundle.rtl.css" rel="stylesheet" type="text/css" />
            <script>
                window.dir = 'rtl';
                window.locale='ar';
            </script>
            <link href="/admin/assets/vendors/custom/fullcalendar/fullcalendar.bundle.rtl.css" rel="stylesheet" type="text/css" />
            <link href="/admin/assets/vendors/base/vendors.bundle.rtl.css" rel="stylesheet" type="text/css" />
            <link href="/admin/assets/demo/demo6/base/style.bundle.rtl.css" rel="stylesheet" type="text/css" />
        <!--end::Page Vendors Styles -->
        <!--begin::Base Styles -->
        <!--end::Base Styles -->
        <link rel="shortcut icon" href="/admin/assets/demo/demo6/media/img/logo/favicon.png" />

        <link href="/admin/assets/app/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />
        <link href="/admin/assets/app/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
        <link href="/admin/assets/app/bootstrap-datepicker.standalone.min.css" rel="stylesheet" type="text/css" />
          <link href="/admin/assets/app/bootstrap-datepicker3.standalone.min.css" rel="stylesheet" type="text/css" />
          <link href="/admin/assets/app/select2-bootstrap4.min.css" rel="stylesheet" type="text/css" />
          <link href="/admin/assets/app/bootstrap4-modal-fullscreen.min.css" rel="stylesheet" type="text/css" />
         <link href="/admin/assets/demo/demo6/select2.min.css" rel="stylesheet" type="text/css" />
         <link href="/admin/assets/app/multi-select.css" rel="stylesheet" type="text/css" />
         <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css">
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput-typeahead.css">
         
         <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

         
         <link href="/admin/assets/app/style.css" rel="stylesheet" type="text/css" />
         <link href="/admin/assets/app/styleFont.css" rel="stylesheet" type="text/css" />


         <style>
span.cart-count,
span.cart-count2 {
    position: absolute;
    top: 10px;
    width: 20px;
    height: 20px;
    text-align: center;
    background-color: #fff;
    border-radius: 30px;
    margin-right: -20px;
    color: #ed335a;
}
         </style>
          <?php echo $__env->yieldContent('css'); ?>

    </head>

    <!-- end::Head -->

    <!-- begin::Body -->
    <body class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-light m-aside-left--fixed m-aside-left--offcanvas m-aside-left--minimize m-brand--minimize m-footer--push m-aside--offcanvas-default">

        <!-- begin:: Page -->
        <div class="m-grid m-grid--hor m-grid--root m-page">

            <?php echo $__env->make('admin.layout.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <!-- begin::Body -->
			<div class="m-grid__item m-grid__item--fluid  m-grid m-grid--ver-desktop m-grid--desktop 	m-container m-container--responsive m-container--xxl m-page__container m-body">
                

            <!-- END: Left Aside -->

            <div class="m-grid__item m-grid__item--fluid m-wrapper">

               <!-- BEGIN: Subheader -->
               <?php echo $__env->yieldContent('page-title'); ?>

               <div class="container-fluid">
               <?php echo $__env->yieldContent('page-content'); ?>
               </div>
               <!-- END: Subheader -->
            </div>

         </div>

          <!-- end:: Body -->
        <!-- begin::Footer -->

        <!-- begin::Footer -->
			<footer class="m-grid__item m-footer " style="display: none;">
				<div class="m-container m-container--responsive m-container--xxl m-container--full-height m-page__container">
					<div class="m-footer__wrapper">
						<div class="m-stack m-stack--flex-tablet-and-mobile m-stack--ver m-stack--desktop">
							<div class="m-stack__item m-stack__item--left m-stack__item--middle m-stack__item--last">
								<span class="m-footer__copyright">

                                    <a href="javascript:void(0)" class="m-link"><?php echo e(__('text.hi5')); ?></a> &copy; <?=date('Y')?>
                                </span>

							</div>
							<div class="m-stack__item m-stack__item--right m-stack__item--middle m-stack__item--first">

							</div>
						</div>
					</div>
				</div>
			</footer>


            <!-- end::Footer -->


        </div>

        <!-- end:: Page -->

        <div id="m_scroll_top" class="m-scroll-top">
            <i class="la la-arrow-up"></i>
        </div>

            <div id="load">
                <img id="loading-image" src="/admin/assets/ajax-loader.gif" alt="Loading..."/>
            </div>


        <script src="/admin/assets/vendors/base/vendors.bundle.js" type="text/javascript"></script>
        <script src="/admin/assets/demo/demo6/base/scripts.bundle.js" type="text/javascript"></script>
        <!--end::Base Scripts -->
        <!--begin::Page Vendors Scripts -->
        <script src="/admin/assets/vendors/custom/jquery-ui/jquery-ui.bundle.js" type="text/javascript"></script>
        <!--end::Page Vendors Scripts -->
        <!--begin::Page Snippets -->

        <script src="/admin/assets/demo/demo6/blockui.js" type="text/javascript"></script>

        <script src="/admin/assets/app/js/dashboard.js" type="text/javascript"></script>
         <script src="/admin/assets/app/js/bootstrap-datepicker.min.js?v=0.0.1" type="text/javascript"></script>
         <script type="text/javascript" src="/admin/assets/app/ckeditors/ckeditor.js"></script>
       <script src="/admin/assets/demo/demo6/select2.js" type="text/javascript"></script>
       <script src="/admin/assets/app/js/jquery.multi-select.js" type="text/javascript"></script>
       <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>
       
       <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>

       <script src="/admin/assets/select_with_ajax/js/ajax-bootstrap-select.js"></script>
       <script src="/admin/assets/app/js/fancybox.min.js" type="text/javascript"></script>

       <script type="text/javascript">
        $('#datepicker').datepicker({
            weekStart: 1,
            daysOfWeekHighlighted: "6,0",
            autoclose: true,
            todayHighlight: true,
        });
        $('#datepicker').datepicker("setDate", new Date());
    </script>
       <?php echo $__env->yieldContent('js'); ?>
        <!--Start of Tawk.to Script-->
<script type="text/javascript">

$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
CKEDITOR.config.contentsLangDirection = window.dir;
$('.date-picker').datepicker({
            uiLibrary: 'bootstrap4',
            format: "yyyy-mm-dd",
            language:"ar",
            rtl:true
        });
 $(document).ready(function() {
    $(".select2").select2({
      theme: "bootstrap4",
      placeholder: "اختر",
      autoclose: true
     });

//  $('#example1').datepicker({
//      format: "dd-mm-yyyy",
//         autoclose: true,
//         language:"ar",
//         rtl:window.rtl
//     });

//     //Alternativ way
//     $('#example2').datepicker({
//         format: "dd-mm-yyyy",
//         autoclose: true,
//         language:"ar",
//         rtl:window.rtl
//     }).on('change', function(){
//         $('.datepicker').hide();
//     });


           $('.select2').select2({
                theme: 'bootstrap4',
                //containerCssClass: ':الكل:',
                placeholder: "اختر",
                allowClear: true
            });
        });

        $("#load").hide();
        $('#loading').hide();
</script>



<!--End of Tawk.to Script-->

        <!--end::Page Snippets -->
    </body>

    <!-- end::Body -->
</html>

<?php /**PATH E:\tejartek\resources\views/admin/layout/master_layout.blade.php ENDPATH**/ ?>