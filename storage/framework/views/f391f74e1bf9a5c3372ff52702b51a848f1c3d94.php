<?php $__env->startSection('header'); ?>
  <?php echo $__env->make('site.layout.inner-header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('inner-page'); ?>
inner-page
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<!-- End Main Navbar -->
		<!-- Header -->
		<header id="header" class="header header-min">
			<div class="container">
				<div class="row">
					<div class="col-lg-12" data-aos="fade-up"> 
						<div class="header-box"> 
							<h1 class="title"><?php echo e($data['about']->title); ?></h1>
						</div> 
					</div> 
				</div>
			</div>
		</header>
        <!-- End Header -->
        
		<!-- section -->
		<section >
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-lg-9" data-aos="fade-up">
						<div class="text-center mb-5" data-aos="fade-up">
							<img src="<?php echo e(URL::to('/')); ?>/uploads/<?php echo e($data['about']->photo); ?>" alt="main-logo" class="img-fluid">
						</div>
						<div class="section-title text-left"> 
							<h2 class="text-bold"><?php echo e($data['about']->title); ?></h2>
							<p class="text-justify">
                                <?php echo $data['about']->details ?? ''; ?>   
                            </p>
						</div>
					</div>
				</div>
			</div>
		</section>  
        <!-- End section --> 
        <?php if(false): ?>
		<!-- section teamwork -->
		<section class="bg-light">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-lg-12" data-aos="fade-up"> 
						<div class="section-title"> 
							<p >فريق العمل</p>
							<h2 class="text-bold">ويشمل فريق من الكفاءات و الخبرات في مجالاتهم</h2>
						</div>
					</div>
				</div>
				<div class="row justify-content-center">
					<div class="col-lg-3 col-md-4 col-sm-6" data-aos="fade-up"> 
						<div class="teamwork-box"> 
							<div class="pic">
								<img src="assets/img/user.png" alt="user">
							</div>
							<div class="content"> 
								<h2 class="name">محمد احمد سعيد</h2>
								<p class="job">CEO</p>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-4 col-sm-6" data-aos="fade-up"> 
						<div class="teamwork-box"> 
							<div class="pic">
								<img src="assets/img/user.png" alt="user">
							</div>
							<div class="content"> 
								<h2 class="name">محمد احمد سعيد</h2>
								<p class="job">CEO</p>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-4 col-sm-6" data-aos="fade-up"> 
						<div class="teamwork-box"> 
							<div class="pic">
								<img src="assets/img/user.png" alt="user">
							</div>
							<div class="content"> 
								<h2 class="name">محمد احمد سعيد</h2>
								<p class="job">CEO</p>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-4 col-sm-6" data-aos="fade-up"> 
						<div class="teamwork-box"> 
							<div class="pic">
								<img src="assets/img/user.png" alt="user">
							</div>
							<div class="content"> 
								<h2 class="name">محمد احمد سعيد</h2>
								<p class="job">CEO</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>  
		<!-- End teamwork section --> 
		<!-- partner-section" -->
		<section class="new-project" >
			<div class="container">  
				<div class="row">
					<div class="col-lg-12"> 
						<div class="new-project-box">
							<div class="content">
								<h2 class="title" data-aos="fade-up">هل لديك مشروع تحتاج !تحتاج</h2>
								<p class="desc" data-aos="fade-up">شاهد بعض أعمالنا الحديثة شاهد بعض أعمالنا الحديثة</p>
								<p class="desc" data-aos="fade-up">شاهد بعض أعمالنا الحديثة شاهد بعض أعمالنا الحديثة</p> 
								<a href="#subscribe" data-aos="fade-up" class="btn btn-scroll"> تواصل معنا </a>
							</div>
							<img src="assets/img/comp.png" alt="comp" data-aos="fade-up">
						</div>
					</div> 
				</div> 
			</div>
		</section>
        <!-- End partner-section -->  
        <?php endif; ?>
        <?php $__env->stopSection(); ?>
<?php echo $__env->make('site.layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\tejartek\resources\views/site/about.blade.php ENDPATH**/ ?>