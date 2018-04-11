$('body').click(function(event){
	
	
	if ( event.target.id == 'settings_tab'){
		$("#owl-demo-featured_projects_settings").owlCarousel({
			navigation: true,
			navigationText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
			pagination: false,
			autoPlay: false,
			slideSpeed: 300,
			paginationSpeed: 400,
			items : 1, //10 items above 1000px browser width
			itemsTablet: [767,1], //2 items between 600 and 0
			itemsMobile : false // itemsMobile disabled - inherit from itemsTablet option
		});
	} 		
	if ( event.target.id == 'settings2_tab'){
		$("#owl-demo-featured_projects_settings2").owlCarousel({
			navigation: true,
			navigationText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
			pagination: false,
			autoPlay: false,
			slideSpeed: 300,
			paginationSpeed: 400,
			items : 1, //10 items above 1000px browser width
			itemsTablet: [767,1], //2 items between 600 and 0
			itemsMobile : false // itemsMobile disabled - inherit from itemsTablet option
		});
	}
	if ( event.target.id == 'settings3_tab'){
		$("#owl-demo-featured_projects_settings3").owlCarousel({
			navigation: true,
			navigationText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
			pagination: false,
			autoPlay: false,
			slideSpeed: 300,
			paginationSpeed: 400,
			items : 1, //10 items above 1000px browser width
			itemsTablet: [767,1], //2 items between 600 and 0
			itemsMobile : false // itemsMobile disabled - inherit from itemsTablet option
		});
	}
	if ( event.target.id == 'profile_tab'){
		$("#owl-demo-featured_projects_profile").owlCarousel({
			navigation: true,
			navigationText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
			pagination: false,
			autoPlay: false,
			slideSpeed: 300,
			paginationSpeed: 400,
			items : 1, //10 items above 1000px browser width
			itemsTablet: [767,1], //2 items between 600 and 0
			itemsMobile : false // itemsMobile disabled - inherit from itemsTablet option
		});
	}
	if ( event.target.id == 'messages_tab'){
		$("#owl-demo-featured_projects_messages").owlCarousel({
			navigation: true,
			navigationText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
			pagination: false,
			autoPlay: false,
			slideSpeed: 300,
			paginationSpeed: 400,
			items : 1, //10 items above 1000px browser width
			itemsTablet: [767,1], //2 items between 600 and 0
			itemsMobile : false // itemsMobile disabled - inherit from itemsTablet option
		});
	}

	$('.featured_projects_item').owlCarousel({
		navigation: true,
		navigationText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
		pagination: false,
		autoPlay: false,
		slideSpeed: 300,
		paginationSpeed: 400,
		items : 3,
		itemsDesktop: [1200,3],
		itemsDesktopSmall: [992,3],
		itemsTablet: [768,2],
		itemsMobile : [767,1]
	});
});





//--DOCUMENT READY FUNCTION BEGIN
$(document).ready(function() {

	//============== ANH VUONG===================
	/*
	$('#owl-demo-related_news .new-img').ready(function() {
		$('#owl-demo-related_news .new-img').each(function() {
			var $img = $(this).find('img');
			var w = $img.width();
			var h = $img.height();

			if (w > h) {

				$img.attr('style', 'left: 50% !important; margin-left: ' + w / -2 + 'px !important');

				$img.css({
					'top': '0',
				});
			} else {
				$img.attr('style', 'top: 50% !important; margin-top: ' + h / -2 + 'px !important; height: auto !important');
				$img.css({
					'left': '0',
					'width': '100%',
				});
			}
		});
	});
	*/
	$('.click_box').on('click', function(e){
		e.preventDefault();
		var $this = $(this);
		$this.parents('.box_widget').find('.open_box').stop().slideToggle();
		return false;
	});
	$('#back-top a').click(function () {
		$('body,html').animate({
			scrollTop: 0
		}, 800);
		return false;
	});


	//tooltip
	$('[data-toggle="tooltip"]').tooltip(); 

	//Home slide
	$("#owl-demo-slide").owlCarousel({
		pagination: false,
		navigation: true,
		navigationText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
		autoPlay: false,
		slideSpeed: 300,
		paginationSpeed: 400,
		singleItem: true
	});
	
	/*
	$("#owl-demo-new-news").owlCarousel({
		pagination: false,
		navigation: false,
		autoPlay: 6000,
		slideSpeed: 300,
		paginationSpeed: 400,
		items : 2, //10 items above 1000px browser width
		itemsDesktop : [1200,2], //5 items between 1000px and 901px
		itemsDesktopSmall : [991,1], // betweem 900px and 601px
		itemsTablet: [767,2], //2 items between 600 and 0
		itemsMobile : [480,1] // itemsMobile disabled - inherit from itemsTablet option
	});
	*/

	/*
	$("#owl-demo-jobs").owlCarousel({
		pagination: false,
		navigation: false,
		autoPlay: 6000,
		slideSpeed: 300,
		paginationSpeed: 400,
		items : 1, //10 items above 1000px browser width
		itemsDesktop : [1200,1], //5 items between 1000px and 901px
		itemsDesktopSmall : [991,1], // betweem 900px and 601px
		itemsTablet: [767,1], //2 items between 600 and 0
		itemsMobile : false // itemsMobile disabled - inherit from itemsTablet option
	});
	*/
	
	
	
	
	
	

	/*
	$("#owl-demo-people-say").owlCarousel({
		pagination: true,
		paginationNumbers: false,
		autoPlay: 6000,
		slideSpeed: 300,
		paginationSpeed: 400,
		items : 2, //10 items above 1000px browser width
		itemsDesktop : [1200,2], //5 items between 1000px and 901px
		itemsDesktopSmall : [991,2], // betweem 900px and 601px
		itemsTablet: [767,2], //2 items between 600 and 0
		itemsMobile : [640,1] // itemsMobile disabled - inherit from itemsTablet option
	});
	*/
	/*

	$("#owl-demo-activities").owlCarousel({
		pagination: true,
		paginationNumbers: false,
		autoPlay: 6000,
		slideSpeed: 300,
		paginationSpeed: 400,
		items : 3, //10 items above 1000px browser width
		itemsDesktop : [1200,3], //5 items between 1000px and 901px
		itemsDesktopSmall : [991,2], // betweem 900px and 601px
		itemsTablet: [767,2], //2 items between 600 and 0
		itemsMobile : [640,1] // itemsMobile disabled - inherit from itemsTablet option
	});
*/
	
	
	

	$("#owl-demo-featured_projects").owlCarousel({
		navigation: true,
		navigationText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
		pagination: false,
		autoPlay: false,
		slideSpeed: 300,
		paginationSpeed: 400,
		items : 1, //10 items above 1000px browser width
		itemsDesktop : [1200,1], //5 items between 1000px and 901px
		itemsDesktopSmall : [991,1], // betweem 900px and 601px
		itemsTablet: [767,1], //2 items between 600 and 0
		itemsMobile : false // itemsMobile disabled - inherit from itemsTablet option
	});
	
	/*
	$("#owl-demo-featured-products").owlCarousel({
		navigation: true,
		navigationText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
		pagination: false,
		autoPlay: false,
		slideSpeed: 300,
		paginationSpeed: 400,
		items : 3, //10 items above 1000px browser width
		itemsDesktop : [1200,3], //5 items between 1000px and 901px
		itemsDesktopSmall : [991,2], // betweem 900px and 601px
		itemsTablet: [767,1], //2 items between 600 and 0
		itemsMobile : false // itemsMobile disabled - inherit from itemsTablet option
	});
	*/

	/*
	$("#owl-demo-related_news").owlCarousel({
		navigation: false,
		pagination: false,
		autoPlay: false,
		slideSpeed: 300,
		paginationSpeed: 400,
		items : 3, //10 items above 1000px browser width
		itemsDesktop : [1200,3], //5 items between 1000px and 901px
		itemsDesktopSmall : [991,2], // betweem 900px and 601px
		itemsTablet: [767,2], //2 items between 600 and 0
		itemsMobile : [480,1] // itemsMobile disabled - inherit from itemsTablet option
	});
	*/
	
	$("#owl-demo-related-products").owlCarousel({
		navigation: true,
		navigationText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
		pagination: false,
		autoPlay: false,
		slideSpeed: 300,
		paginationSpeed: 400,
		items : 4, //10 items above 1000px browser width
		itemsDesktop : [1200,4], //5 items between 1000px and 901px
		itemsDesktopSmall : [991,2], // betweem 900px and 601px
		itemsTablet: [767,1], //2 items between 600 and 0
		itemsMobile : false // itemsMobile disabled - inherit from itemsTablet option
	});
	
	/*
	$("#owl-demo-brand").owlCarousel({
		navigation: true,
		navigationText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
		pagination: false,
		items : 5, //10 items above 1000px browser width
		itemsDesktop : [1200,5], //5 items between 1000px and 901px
		itemsDesktopSmall : [991,3], // betweem 900px and 601px
		itemsTablet: [767,2], //2 items between 600 and 0
		itemsMobile : [480,1] // itemsMobile disabled - inherit from itemsTablet option
	});
	*/
	
	//404 page
	if ($(window).width() < 767) {
		$(".big-row-eq-height").removeClass("row-eq-height");
	}
	else{
		$(".big-row-eq-height").addClass("row-eq-height");
	}

	//Contact page notification
	setTimeout(function(){
		var url = window.location.href;

		if(url.indexOf("contact_error_notification") > -1) {

		}
		else
		{			
			if(url.indexOf("contact_posted=true") > -1) {

				$(".notification_contact").fadeIn(400).delay(3000).fadeOut();
				$(".overlayopacity").fadeIn(400).delay(3000).fadeOut();
				disableScroll();
				setTimeout(function(){
					enableScroll();
				}, 3000);
			}
		}

	}, 1000);



	//============== product img thumbnail ==================
	if ($(window).width() > 767) {      
		$("#image").elevateZoom({
			zoomType : "inner",
			cursor: "crosshair"
		});//-- end. elevateZoom
	}//-- end. windown > 767

	
	/*
	//============== product img popup ==================
	$('.popup-gallery').magnificPopup({
		delegate: 'a',
		type: 'image',
		tLoading: 'Loading image #%curr%...',
		mainClass: 'mfp-img-mobile',
		gallery: {
			enabled: true,
			navigateByImgClick: true,
			preload: [0, 1] // Will preload 0 - before current, and 1 after the current image
		},
		image: {
			tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
			titleSrc: function(item) {
				return item.el.attr('title');
			}
		}
	});
	*/

	//============== product img slide ==================
	$(".thumbnails-carousel").slick({
		slidesToShow: 5,
		slidesToScroll: 1,
		dots: false,
		centerMode: false,
		focusOnSelect: true,
		vertical: true,
		verticalSwiping: true,

	});


});
//--DOCUMENT READY FUNCTION END






//--WINDOW RESIZE FUNCTION BEGIN
$(window).resize(function() {


	/*
	//============== ANH VUONG===================
	$('#owl-demo-related_news .new-img').each(function() {
		var $img = $(this).find('img');
		var w = $img.width();
		var h = $img.height();

		if (w > h) {

			$img.attr('style', 'left: 50% !important; margin-left: ' + w / -2 + 'px !important');

			$img.css({
				'top': '0',
			});
		} else {
			$img.attr('style', 'top: 50% !important; margin-top: ' + h / -2 + 'px !important; height: auto !important');
			$img.css({
				'left': '0',
				'width': '100%',
			});
		}
	});
*/
	

	// 404 page
	if ($(window).width() < 767) {
		$(".big-row-eq-height").removeClass("row-eq-height");
	} else {

		$(".big-row-eq-height").addClass("row-eq-height");
	}

	//============== product img thumbnail ==================
	if ($(window).width() < 767) {      
		$('.zoomContainer').remove();
		$("#image").removeData('elevateZoom');	
	}
	//-- end. windown < 767


	$('.thumbnails a, .thumbnails-carousel a').click(function() {
		//if image different size > fit new zoomContainer size = image size
		$('.zoomContainer').remove();
		$("#image").removeData('elevateZoom');
		$("#image").attr('src', $(this).data('image'));
		$("#image").data('zoom-image', $(this).data('zoom-image'));
		if ($(window).width() > 767) {   
			$("#image").elevateZoom({
				zoomType : "inner",
				cursor: "crosshair"
			});//-- end. elevateZoom
		}
		// swap small img vs larger img to zoom
		var smallImage = $(this).attr('data-image');
		var largeImage = $(this).attr('data-zoom-image');
		var ez = $('#image').data('elevateZoom');
		$('#ex1').attr('href', largeImage);
		ez.swaptheimage(smallImage, largeImage);
		return false;
	});//-- end. click function



	//navagation
	//$('.dropdown-menu.multi-level').hide();
	// if ($(window).width() > 991) {
	// 	$('.childlink_a').click(function() {
	// 		document.location.href = $(this).attr('href');
	// 	});
	// }
	// else
	// {
	// 	$('.childlink_a').click(function(e) {
	// 		e.preventDefault();
	//     	e.stopPropagation();



	// 			var childlink_last = $(this).parent().find('.dropdown-menu.multi-level');

	// 			if( childlink_last.is(":visible"))
	// 			{
	// 				childlink_last.hide();
	// 				$('.dropdown-menu.multi-level').hide();
	// 			}
	// 			else
	// 			{	$('.dropdown-menu.multi-level').hide();
	// 				childlink_last.show();
	// 				childlink_last.find('a').click(function() {
	// 					document.location.href = $(this).attr('href');
	// 				});


	// 			}



	// 	});
	// }//End. navagation







});
//--WINDOW RESIZE FUNCTION END




//navagation
// if ($(window).width() > 991) {
// 	$('.childlink_a').click(function() {
// 		document.location.href = $(this).attr('href');
// 	});
// }
// else
// {
// 	$('.childlink_a').click(function(e) {
// 		e.preventDefault();
//     	e.stopPropagation();



// 			var childlink_last = $(this).parent().find('.dropdown-menu.multi-level');

// 			if( childlink_last.is(":visible"))
// 			{
// 				childlink_last.hide();
// 				$('.dropdown-menu.multi-level').hide();
// 			}
// 			else
// 			{	$('.dropdown-menu.multi-level').hide();
// 				childlink_last.show();
// 				childlink_last.find('a').click(function() {
// 					document.location.href = $(this).attr('href');
// 				});


// 			}



// 	});
// }//End. navagation



$('.thumbnails a, .thumbnails-carousel a').click(function() {
	//if image different size > fit new zoomContainer size = image size
	$('.zoomContainer').remove();
	$("#image").removeData('elevateZoom');
	$("#image").attr('src', $(this).data('image'));
	$("#image").data('zoom-image', $(this).data('zoom-image'));
	if ($(window).width() > 767) {   
		$("#image").elevateZoom({
			zoomType : "inner",
			cursor: "crosshair"
		});//-- end. elevateZoom
	}
	// swap small img vs larger img to zoom
	var smallImage = $(this).attr('data-image');
	var largeImage = $(this).attr('data-zoom-image');
	var ez = $('#image').data('elevateZoom');
	$('#ex1').attr('href', largeImage);
	ez.swaptheimage(smallImage, largeImage);
	return false;
});//-- end. click function

// Cart btn click
$('#dLabel1').click(function() {
	document.location.href = $(this).attr('href');
});

//====================== disable Scroll & enable Scroll function =================


/* Fucntion get width browser */
function getWidthBrowser() {
	var myWidth;

	if( typeof( window.innerWidth ) == 'number' ) { 
		//Non-IE 
		myWidth = window.innerWidth;
		//myHeight = window.innerHeight; 
	} 
	else if( document.documentElement && ( document.documentElement.clientWidth || document.documentElement.clientHeight ) ) { 
		//IE 6+ in 'standards compliant mode' 
		myWidth = document.documentElement.clientWidth; 
		//myHeight = document.documentElement.clientHeight; 
	} 
	else if( document.body && ( document.body.clientWidth || document.body.clientHeight ) ) { 
		//IE 4 compatible 
		myWidth = document.body.clientWidth; 
		//myHeight = document.body.clientHeight; 
	}

	return myWidth;
}

var keys = {37: 1, 38: 1, 39: 1, 40: 1};

function preventDefault(e) {
	e = e || window.event;
	if (e.preventDefault)
		e.preventDefault();
	e.returnValue = false;  
}

function preventDefaultForScrollKeys(e) {
	if (keys[e.keyCode]) {
		preventDefault(e);
		return false;
	}
}

function disableScroll() {
	if (window.addEventListener) // older FF
		window.addEventListener('DOMMouseScroll', preventDefault, false);
	window.onwheel = preventDefault; // modern standard
	window.onmousewheel = document.onmousewheel = preventDefault; // older browsers, IE
	window.ontouchmove  = preventDefault; // mobile
	document.onkeydown  = preventDefaultForScrollKeys;
}

function enableScroll() {
	if (window.removeEventListener)
		window.removeEventListener('DOMMouseScroll', preventDefault, false);
	window.onmousewheel = document.onmousewheel = null; 
	window.onwheel = null; 
	window.ontouchmove = null;  
	document.onkeydown = null;  
}



$("#new-news-pre").click(function(){
	$("#owl-demo-new-news").trigger('owl.prev');
	return false;
});

$("#new-news-next").click(function(){
	$("#owl-demo-new-news").trigger('owl.next');
	return false;
});


$("#jobs-pre").click(function(){
	$("#owl-demo-jobs").trigger('owl.prev');
	return false;
});

$("#jobs-next").click(function(){
	$("#owl-demo-jobs").trigger('owl.next');
	return false;
});

/*
$("#related_news_pre").click(function(){
	$("#owl-demo-related_news").trigger('owl.prev');
	return false;
});

$("#related_news_next").click(function(){
	$("#owl-demo-related_news").trigger('owl.next');
	return false;
});
*/