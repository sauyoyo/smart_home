window.dqdt = window.dqdt || {};
dqdt.init = function () {
	dqdt.showPopup();
	dqdt.hidePopup();	
};

$(document).on('click','.overlay, .close-popup, .btn-continue, .fancybox-close', function() {   
	dqdt.hidePopup('.dqdt-popup'); 	
	setTimeout(function(){
		$('.loading').removeClass('loaded-content');
	},500);
	return false;
})

$(window).on("load resize scroll",function(e){
	if($(window).width()<1025){
		$('.product-box .add_to_cart').text('Mua ngay');
		$('a.btn.btn-style.quick-view').css('display','none');
	}
});

$(document).on('touchstart', function ( e){
	// Đối tượng container chứa popup
	var container = $("#exCollapsingNavbar2");
	var container2 = $("i.fa.fa-align-left");

	// Nếu click bên ngoài đối tượng container thì ẩn nó đi
	if (!container.is(e.target) && container.has(e.target).length === 0){
		if (!container2.is(e.target) && container2.has(e.target).length === 0){
			$('nav#exCollapsingNavbar2').hide();
		}
	}
});


$('.hidden-lg-up.menu-mobile').click(function(e){
	$('nav#exCollapsingNavbar2').slideToggle( "fast", function() {
		// Animation complete.
	});
})
function quantityChange(change) {
	var quantity = parseInt($('.product__quantity input').val());
	if(change == 'down') {
		quantity = quantity - 1;
	} else {
		quantity = quantity + 1;
	}
	if(quantity < 1) quantity = 1;
	$('.product__quantity input').val(quantity);
}
/********************************************************
# SHOW NOITICE
********************************************************/
function awe_showNoitice(selector) {
	$(selector).animate({right: '0'}, 500);
	setTimeout(function() {
		$(selector).animate({right: '-300px'}, 500);
	}, 3500);
}  window.awe_showNoitice=awe_showNoitice;

/********************************************************
# SHOW LOADING
********************************************************/
function awe_showLoading(selector) {
	var loading = $('.loader').html();
	$(selector).addClass("loading").append(loading); 
}  window.awe_showLoading=awe_showLoading;

/********************************************************
# HIDE LOADING
********************************************************/
function awe_hideLoading(selector) {
	$(selector).removeClass("loading"); 
	$(selector + ' .loading-icon').remove();
}  window.awe_hideLoading=awe_hideLoading;

/********************************************************
# SHOW POPUP
********************************************************/
function awe_showPopup(selector) {
	$(selector).addClass('active');
}  window.awe_showPopup=awe_showPopup;

/********************************************************
# HIDE POPUP
********************************************************/
function awe_hidePopup(selector) {
	$(selector).removeClass('active');
}  window.awe_hidePopup=awe_hidePopup;

/********************************************************
# CONVERT VIETNAMESE
********************************************************/
function awe_convertVietnamese(str) { 
	str= str.toLowerCase();
	str= str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g,"a"); 
	str= str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g,"e"); 
	str= str.replace(/ì|í|ị|ỉ|ĩ/g,"i"); 
	str= str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g,"o"); 
	str= str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g,"u"); 
	str= str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g,"y"); 
	str= str.replace(/đ/g,"d"); 
	str= str.replace(/!|@|%|\^|\*|\(|\)|\+|\=|\<|\>|\?|\/|,|\.|\:|\;|\'| |\"|\&|\#|\[|\]|~|$|_/g,"-");
	str= str.replace(/-+-/g,"-");
	str= str.replace(/^\-+|\-+$/g,""); 
	return str; 
} window.awe_convertVietnamese=awe_convertVietnamese;


/********************************************************
# SHOW NOITICE
********************************************************/
dqdt.showNoitice = function (selector) {   
	$(selector).animate({right: '0'}, 500);
	setTimeout(function() {
		$(selector).animate({right: '-300px'}, 500);
	}, 3500);
};

/********************************************************
# SHOW LOADING
********************************************************/
dqdt.showLoading = function (selector) {    
	var loading = $('.loader').html();
	$(selector).addClass("loading").append(loading);  
}

/********************************************************
# HIDE LOADING
********************************************************/
dqdt.hideLoading = function (selector) {  
	$(selector).removeClass("loading"); 
	$(selector + ' .loading-icon').remove();
}


/********************************************************
# SHOW POPUP
********************************************************/
dqdt.showPopup = function (selector) {
	$(selector).addClass('active');
};

/********************************************************
# HIDE POPUP
********************************************************/
dqdt.hidePopup = function (selector) {
	$(selector).removeClass('active');
}

/************************************************/