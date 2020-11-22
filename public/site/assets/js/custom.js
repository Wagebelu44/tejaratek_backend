/*--------------------------------------
	default Language	
	--------------------------------------

	$(document).ready(function() {
		var lang = navigator.language || navigator.userLanguage; 
		if(lang == "en-US"){
			$("html").attr("dir","ltr");
			$("#bs-dir").attr("href","assets/css/bootstrap.min.css");
		} else {
			$("#bs-dir").attr("href","assets/css/bootstrap-rtl.css");
		}
	}); 
	*/	
/*--------------------------------------
	Fixed Navbar Top
	--------------------------------------*/
	$(document).ready(function() {
		$(document).scroll(function () {
			var scroll = $(this).scrollTop(); 
			if (scroll >  150) {
				$(".navbar").addClass("fixed-top"); 
				$(".scroll-to-top").addClass("show");
			} else { 
				$(".navbar").removeClass("fixed-top"); 
				$(".scroll-to-top").removeClass("show"); 
			} 
		}); 
	}); 
 

/*--------------------------------------
	Scroll To Top
	--------------------------------------*/
	$(".scroll-to-top").click(function(){ 
		window.scrollTo({ top: 0, behavior: 'smooth' });
	});
	
/*--------------------------------------
	checkValidity
	--------------------------------------*/
	(function() {
		'use strict';
		window.addEventListener('load', function() {
		  // Fetch all the forms we want to apply custom Bootstrap validation styles to
		  var forms = document.getElementsByClassName('needs-validation');
		  // Loop over them and prevent submission
		  var validation = Array.prototype.filter.call(forms, function(form) {
			form.addEventListener('submit', function(event) {
			  if (form.checkValidity() === false) {
				event.preventDefault();
				event.stopPropagation();
			  }
			  form.classList.add('was-validated');
			}, false);
		  });
		}, false);
	  })();
	  
	/*--------------------------------------
		owlCarousel 
		--------------------------------------*/ 
		$('#owl-products').owlCarousel({
			rtl:true, 
			autoplay: true,
			margin:30,
			nav:false,
			dots:true,
			responsive:{
				0:{
					items:1
				},
				300:{
					items:1
				},
				600:{
					items:3
				},
				1000:{
					items:4
				}
			}
		});
		$('#owl-portfolio').owlCarousel({
			rtl:true, 
			autoplay: true,
			margin:30,
			nav:true,
			dots:true,
			responsive:{
				0:{
					items:1
				},
				300:{
					items:1
				},
				600:{
					items:2
				},
				1000:{
					items:3
				}
			}
		});
		$('#owl-partners').owlCarousel({
			rtl:true, 
			autoplay: true,
			margin:30,
			nav:false,
			dots:true,
			responsive:{
				0:{
					items:2
				},
				300:{
					items:2
				},
				600:{
					items:3
				},
				800:{
					items:6
				},
				1000:{
					items:8
				}
			}
		}); 
		
	/*--------------------------------------
		subscription 
		--------------------------------------*/ 
		$("a.btn-subscription").click(function(){
			var div = $(this).attr("href");
			$("html, body").animate({ scrollTop: $(div).offset().top - 100 }, 1000);
		});

		$(".main-navbar .nav-link, .footer .links .nav-link, .btn-scroll").click(function(){
			var div = $(this).attr("href");
			$(".main-navbar .nav-link").removeClass("active");
			$(this).addClass("active");
			$("html, body").animate({ scrollTop: $(div).offset().top - 100 }, 1000);
		});

	/*--------------------------------------
		AOS	 
		--------------------------------------*/
		AOS.init();

	/*--------------------------------------
		Counter	 
		--------------------------------------*/
		$('.count').counterUp({
			delay: 10,
			time: 1000
		});