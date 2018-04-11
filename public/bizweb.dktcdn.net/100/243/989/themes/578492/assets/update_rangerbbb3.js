/***
### minhpq's customize scripts
### (S) phamminh239
### Last modified at June 27th 2017
***/


$(document).ready(function ($) {
	"use strict";
	awe_owl();
});

/********************************************************
# OWL CAROUSEL
********************************************************/
function awe_owl() { 
	setTimeout(function(){
		$('.owl-carousel').each( function(){
			var xxs_item = $(this).attr('data-xxs-items');
			var xs_item = $(this).attr('data-xs-items');
			var md_item = $(this).attr('data-md-items');
			var lg_item = $(this).attr('data-lg-items');
			var sm_item = $(this).attr('data-sm-items');	
			var margin	= $(this).attr('data-margin');
			var dot		= $(this).attr('data-dot');
			var loop	= $(this).attr('data-loop');
			var nav		= $(this).attr('data-nav');
			var auto_play = $(this).attr('data-auto-play');
			if (typeof margin !== typeof undefined && margin !== false) {    
			} else{
				margin = 30;
			}
			if (typeof xxs_item !== typeof undefined && xxs_item !== false) {    
			} else{
				xxs_item = 1;
			}
			if (typeof xs_item !== typeof undefined && xs_item !== false) {    
			} else{
				xs_item = 1;
			}
			if (typeof sm_item !== typeof undefined && sm_item !== false) {    

			} else{
				sm_item = 3;
			}	
			if (typeof md_item !== typeof undefined && md_item !== false) {    
			} else{
				md_item = 3;
			}
			if (typeof dot !== typeof undefined && dot !== true) {   
				dot= true;
			} else{
				dot = false;
			}
			if (typeof loop !== typeof undefined && loop !== true){
				loop = true;
			} else {
				loop = false;
			}
			if (typeof nav !== typeof undefined && nav !== true){
				nav = true;
			} else {
				nav = false;
			}
			if (typeof auto_play !== typeof undefined && auto_play !== true){
				auto_play = true;
			} else {
				auto_play = false;
			}
			$(this).owlCarousel({
				loop: loop,
				margin:Number(margin),
				responsiveClass:true,
				dots:dot,
				nav:nav,
				navText: ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
				responsive:{
					0:{
						items:Number(xxs_item)				
					},
					543:{
						items:Number(xs_item)				
					},
					768:{
						items:Number(sm_item)				
					},
					992:{
						items:Number(md_item)				
					},
					1200:{
						items:Number(lg_item)				
					}
				},
				autoplay: auto_play,
				autoPlayHoverPause: true
				
			})
		})
	},600);
} window.awe_owl=awe_owl;



/*** MENU ASIDE ***/
jQuery(function($) {
	"use strict";
	$(".sidebar-linklists").accordion({
		accordion:false,
		speed: 300,
		closedSign: '<i class="fa fa-angle-down" aria-hidden="true"></i>',
		openedSign: '<i class="fa fa-angle-up" aria-hidden="true"></i>'
	});
});
(function($){
	$.fn.extend({ 
		accordion: function(options) {  
			var defaults = {
				accordion: 'true',
				speed: 300,
				closedSign: '[-]',
				openedSign: '[+]'
			};  
			var opts = $.extend(defaults, options); 
			var $this = $(this);  
			$this.find("li").each(function() {
				if($(this).find("ul").size() != 0){
					$(this).find("a:first").after("<em>"+ opts.closedSign +"</em>");  
					if($(this).find("a:first").attr('href') == "#"){
						$(this).find("a:first").click(function(){return false;});
					}
				}
			}); 
			$this.find("li em").click(function() {
				if($(this).parent().find("ul").size() != 0){
					if(opts.accordion){
						//Do nothing when the list is open
						if(!$(this).parent().find("ul").is(':visible')){
							parents = $(this).parent().parents("ul");
							visible = $this.find("ul:visible");
							visible.each(function(visibleIndex){
								var close = true;
								parents.each(function(parentIndex){
									if(parents[parentIndex] == visible[visibleIndex]){
										close = false;
										return false;
									}
								});
								if(close){
									if($(this).parent().find("ul") != visible[visibleIndex]){
										$(visible[visibleIndex]).slideUp(opts.speed, function(){
											$(this).parent("li").find("em:first").html(opts.closedSign);
										});   
									}
								}
							});
						}
					}
					if($(this).parent().find("ul:first").is(":visible")){
						$(this).parent().find("ul:first").slideUp(opts.speed, function(){
							$(this).parent("li").find("em:first").delay(opts.speed).html(opts.closedSign);
						}); 
					}else{
						$(this).parent().find("ul:first").slideDown(opts.speed, function(){
							$(this).parent("li").find("em:first").delay(opts.speed).html(opts.openedSign);
						});
					}
				}
			});
		}
	});
})(jQuery);


/*** Thu gọn collection menu list ***/
$('.sidebar-menu-content .sidebar-linklists > ul').each(function(){
	var nc = $(this).find('.sidebar-menu-list').length;
	if (nc > 8){
		$('.sidebar-menu-list',this).eq(8).nextAll().hide().addClass('toggleable');
		$(this).append('<li class="more"><a><label>Xem thêm ... </label></a></li>');
	}
});
$('.sidebar-menu-content .sidebar-linklists > ul').on('click','.more', function(){
	if($(this).hasClass('less')){
		$(this).html('<a><label>Xem thêm ...</label></a>').removeClass('less');
	} else {
		$(this).html('<a><label>Thu gọn ... </label></a>').addClass('less');;
	}
	$(this).siblings('li.toggleable').slideToggle();
});
$(document).ready(function(){ 
	var ww = $(window).width();
	if (ww < 768 ){
		$('.widget-title').on('click', function(){
			$(this).next('.widget-menu').slideToggle('fast');
		});
	} else {
		$('.widget-menu').show();
	}
});