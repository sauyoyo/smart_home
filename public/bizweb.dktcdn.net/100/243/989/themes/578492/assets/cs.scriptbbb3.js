function qty(){	
	var val_qty = $('.cart-number').val();			
	return 1;
}
qty();
/**
 * Look under your chair! console.log FOR EVERYONE!
 *
 * @see http://paulirish.com/2009/log-a-lightweight-wrapper-for-consolelog/
 */
(function(b){function c(){}for(var d="assert,count,debug,dir,dirxml,error,exception,group,groupCollapsed,groupEnd,info,log,timeStamp,profile,profileEnd,time,timeEnd,trace,warn".split(","),a;a=d.pop();){b[a]=b[a]||c}})((function(){try
{console.log();return window.console;}catch(err){return window.console={};}})());



/**
 * Page-specific call-backs
 * Called after dom has loaded.
 */
var GLOBAL = {

	common : {
		init: function(){
			$('.add_to_cart').bind( 'click', addToCart );
		}
	},

	templateIndex : {
		init: function(){

		}
	},

	templateProduct : {
		init: function(){

		}
	},

	templateCart : {
		init: function(){

		}
	}

}
var UTIL = {

	fire : function(func,funcname, args){
		var namespace = GLOBAL;
		funcname = (funcname === undefined) ? 'init' : funcname;
		if (func !== '' && namespace[func] && typeof namespace[func][funcname] == 'function'){
			namespace[func][funcname](args);
		}
	},

	loadEvents : function(){
		var bodyId = document.body.id;

		// hit up common first.
		UTIL.fire('common');

		// do all the classes too.
		$.each(document.body.className.split(/\s+/),function(i,classnm){
			UTIL.fire(classnm);
			UTIL.fire(classnm,bodyId);
		});
	}

};
$(document).ready(UTIL.loadEvents);

/**
 * Popup notify add-to-cart
 */
function notifyProduct($info){
	var wait = setTimeout(function(){
		$.jGrowl($info,{
			life: 5000
		});	
	});
}


/**
 * Ajaxy add-to-cart
 */
function addToCart(e){
	if (typeof e !== 'undefined') e.preventDefault();
	var $this = $(this);
	var form = $this.parents('form');
	$.ajax({
		type: 'POST',
		url: '/cart/add.js',
		async: false,
		data: form.serialize(),
		dataType: 'json',
		error: addToCartFail,
		success: addToCartSuccess,
		cache: false
	});
}

function addToCartSuccess (jqXHR, textStatus, errorThrown){
	var link_img2 = Bizweb.resizeImage(jqXHR['image'], 'small');
	if(link_img2=="null" || link_img2 =='' || link_img2 == null){
		link_img2 = "//bizweb.dktcdn.net/thumb/small/assets/themes_support/noimage.gif";
	}
	if(window.theme_load == "icon"){
		dqdt.hideLoading('.btn-addToCart');
	} else{
		$('.loading').addClass('loaded-content');         
	}

	switch (window.addcart_susscess) {
		case ('popup'):    
			$('.addcart-popup').find('.product-name').html(jqXHR['title']);
			$('.addcart-popup').find('.variant-title').html(jqXHR['variant_title']);
			$('.addcart-popup').find('.product-image img').attr('src', link_img2);
			dqdt.showPopup('.addcart-popup');
			break;
		case ('text'):
			dqdt.hidePopup('.loading'); 
			dqdt.hideLoading('.btn-addToCart');
			break;
		case ('noitice'):          
			dqdt.hidePopup('.loading'); 
			dqdt.hideLoading('.btn-addToCart');
			$('.product-noitice.susscess').find('.product-name').html(jqXHR['title']);
			$('.product-noitice.susscess').find('.product-image img').attr('src', link_img2);
			dqdt.showNoitice('.product-noitice.susscess');
			break;
		default: 
			$('.addcart-popup').find('.product-name').html(jqXHR['title']);
			if (jqXHR['variant_title'] != 'Default Title'){
				$('.addcart-popup').find('.variant-title').html(jqXHR['variant_title']);
			}
			var product_qty = $('.product-template .product_quantity #qty').val();
			if (product_qty){
				$('.addcart-popup').find('.quantity').html('<span>Số lượng: </span> <b>'+ product_qty + '</b>');
			} else {
				$('.addcart-popup').find('.quantity').html('<span>Số lượng: </span> <b> 1 </b>');
			}
			$('.addcart-popup').find('.total-money').html('<span>Tổng tiền giỏ hàng: </span> <b>'+ Bizweb.formatMoney(jqXHR['price']*qty(),"{{amount_no_decimals_with_comma_separator}}₫"+'</b>' ));
			$('.addcart-popup').find('.product-image img').attr('src', link_img2);
			dqdt.showPopup('.addcart-popup');
	}
	$.ajax({
		type: 'GET',
		url: '/cart.js',
		async: false,
		cache: false,
		dataType: 'json',
		success: updateCartDesc
	});

	// Let's get the cart and show what's in it in the cart box.	
	Bizweb.getCart(function(cart) {
		Bizweb.updateCartFromForm(cart, '#cart-info-parent');   
	});
}

function addToCartFail(jqXHR, textStatus, errorThrown){
	var response = $.parseJSON(jqXHR.responseText);
	var $info = '<div class="error">'+ response.description +'</div>';
	notifyProduct($info);
}

$(document).on('click', ".remove-item-cart", function () {
	var variantId = $(this).attr('data-id');
	removeItemCart(variantId);
});
$(document).on('click', ".items-count", function () {
	$(this).parent().children('.items-count').prop('disabled', true);
	var thisBtn = $(this);
	var variantId = $(this).parent().find('.variantID').val();
	var qty =  $(this).parent().children('.number-sidebar').val();
	updateQuantity(qty, variantId);
});
$(document).on('change', ".number-sidebar", function () {
	var variantId = $(this).parent().children('.variantID').val();
	var qty =  $(this).val();
	updateQuantity(qty, variantId);
});

function updateQuantity (qty, variantId){
	var variantIdUpdate = variantId;
	$.ajax({
		type: "POST",
		url: "/cart/change.js",
		data: {"quantity": qty, "variantId": variantId},
		dataType: "json",
		success: function (cart, variantId) {
			Bizweb.onCartUpdateClick(cart, variantIdUpdate);
		},
		error: function (qty, variantId) {
			Bizweb.onError(qty, variantId)
		}
	})
}

function removeItemCart (variantId){
	var variantIdRemove = variantId;
	$.ajax({
		type: "POST",
		url: "/cart/change.js",
		data: {"quantity": 0, "variantId": variantId},
		dataType: "json",
		success: function (cart, variantId) {
			Bizweb.onCartRemoveClick(cart, variantIdRemove);
			$('.productid-'+variantIdRemove).remove();
			if($('.tbody-popup>div').length == '0' ){
				//$.fancybox.close();
			}
			if($('.list-item-cart>li').length == '0' ){
				$('.item_cart').html('<div class="no-item"><p>Không có sản phẩm nào trong giỏ hàng.</p></div>');
			}
			if($('#cart-total').text() == '0' ){
				$('.bg-cart-page').remove();
				$('.bg-cart-page-mobile').remove();
				jQuery('<div class="bg-cart-page" style="min-height: auto"><p>Không có sản phẩm nào trong giỏ hàng. Quay lại <a href="/">cửa hàng</a> để tiếp tục mua sắm.</p></div>').appendTo('.cart');
			}
		},
		error: function (variantId, r) {
			Bizweb.onError(variantId, r)
		}
	})
}