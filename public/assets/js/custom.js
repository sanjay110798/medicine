/* Sticky header Js */
/* Banner Slider Js */
$('.banner_slider').slick({
		
	dots: false,
	arrows: false,
	autoplay: true,
	autoplaySpeed: 2000,
	responsive: [
		 
	 {
      breakpoint: 991,
      settings: {
       
        slidesToShow: 1
      }
    },
    {
      breakpoint: 768,
      settings: {
       
        slidesToShow: 1
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1
      }
    }
  ]
	
});

/* Product Slider Js */
$('.product_slider').slick({
	dots: false,
	infinite: false,
	speed: 300,
	slidesToShow: 5,
	slidesToScroll: 5,
	arrows: false,
	autoplay: true,
	responsive: [
		{
		  breakpoint: 1024,
		  settings: {
			slidesToShow: 3,
			slidesToScroll: 3,
			infinite: true,
			dots: false
		  }
		},
		{
		  breakpoint: 767,
		  settings: {
			slidesToShow: 2,
			slidesToScroll: 1
		  }
		},
		{
		  breakpoint: 480,
		  settings: {
			slidesToShow: 2,
			slidesToScroll: 1
		  }
		}
	]
});

/* Brand Slider Js */
$('.brand_slider').slick({
	dots: false,
	infinite: false,
	speed: 300,
	slidesToShow: 7,
	slidesToScroll: 7,
	arrows: false,
	autoplay: true,
	centerPadding: '40px',
	responsive: [
		{
		  breakpoint: 1024,
		  settings: {
			slidesToShow: 3,
			slidesToScroll: 3,
			infinite: true,
			dots: false
		  }
		},
		{
		  breakpoint: 600,
		  settings: {
			slidesToShow: 2,
			slidesToScroll: 2
		  }
		},
		{
		  breakpoint: 480,
		  settings: {
			slidesToShow: 1,
			slidesToScroll: 1
		  }
		}
	]
});


$(window).scroll(function(){
	if ($(window).scrollTop() >= 120) {
	   $('.header_sec').addClass('sticky');
	   $('body').addClass('add');
	}
	else {
	   $('.header_sec').removeClass('sticky');
	   $('body').removeClass('add');
	}
});
/* Sticky header Js */


/* Zoom in Js */ 
$(window).scroll(function(){
	var scroll = $ (window).scrollTop();
	$('.for_dog').css({
	
		'background-size' : (90 + scroll/10) + "%"
	
	});
});
/* Zoom in Js */ 




/* On scroll Js */
AOS.init();

/* On scroll Js */
