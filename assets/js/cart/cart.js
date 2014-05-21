/** CartJS class
 *	TODO: add CartJS prefixes to all methods
 */
var CartJS = function(){
};

// static variable
CartJS.cartId;

/** init
 *	Reads config and adds listeners to buttons.
 *
 *	@param config is an object {cartId: "id of element which displays cart content", ...}.
 */

CartJS.init = function(config) {
	CartJS.cartId = config.cartId;

	$(document).ready(function() {
		addListeners();
	});
}

var addListeners = function() {
	console.log('adding onclick listeners');
	$('.orderButton').click(function() {
		addToCart($(this).attr('id'));
	});
	addCartListeners();
}

var addCartListeners = function() {
	$('button.removeItem').click(function() {
		removeItem($(this).attr('id'));
	});
}

var addToCart = function(id) {
	console.log('adding to cart product with id='+id);
	$.ajax({
		url: SITE_URL+ 'cartcontroller/add/'+id,
		success: function(response) {
			console.log('ajax response: ' + response);
			CartJS.updateCart();
		}
	});
}

var removeItem = function(id) {
	console.log('removing item');
	$.ajax({
		url: SITE_URL + 'cartcontroller/remove/'+id,
		success: function(response) {
			console.log('success! Ajax response: ' + response);
			CartJS.updateCart();
		}
	});
}

/** updateCart
 *	Reloads elements with id=this.cartId 
 */
CartJS.updateCart = function() {
	console.log('updating cart');
	$('#'+CartJS.cartId).load(document.URL + ' #'+CartJS.cartId, addCartListeners); // since DOM is reloaded, listeners should be readded 
}
