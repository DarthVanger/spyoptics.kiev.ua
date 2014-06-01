/** CartJS class (static only)
 *	
 *	Adds listeners to cart buttons (e.g. "add to cart"), connecting button click events with CartController via Ajax.
 *
 */
var CartJS = function(){};

	/* static variables */

		// id of DOM element, which displays cart content. It will be reloaded after adding/removing products.
		CartJS.cartId; 
		// class name of buttons, which are responsible for adding product to cart
		CartJS.addItemButtonClass;
		// class name of buttons, which are responsible for removing product from the cart
		CartJS.removeItemButtonClass;

	/* static methods */

		/** init
		 *	Reads config and adds listeners to buttons.
		 *
		 *	@param config is an object {cartId: "id of element which displays cart content", ...}.
		 */
		CartJS.init = function(config) {
			CartJS.cartId = config.cartId;
			CartJS.addItemButtonClass = config.addItemButtonClass;
			CartJS.removeItemButtonClass = config.removeItemButtonClass;

			console.log("debug", "initiating CartJS");
			console.log("debug", "cartId: " + CartJS.cartId);
			console.log("debug", "addItemButtonClass: " + CartJS.addItemButtonClass);
			console.log("debug", "removeItemButtonClass: " + CartJS.removeItemButtonClass);

			$(document).ready(function() {
				CartJS.addListeners();
			});
		}

		/** addListeners
		 *	Adds click listeners to buttons responsive for adding and removing items from the cart.
		 */
		CartJS.addListeners = function() {
			console.log("debug", "CartJS: adding onclick listeners");
			// listeners for adding items
			$('.' + CartJS.addItemButtonClass).click(function() {
				CartJS.addItem($(this).attr('id'));
			});

			CartJS.addItemRemovalListeners();
		}

		/** addItemRemovalListeners
		 *	Adds click listeners to button responsive for removing items from the cart.
		 *	It is made as separate method for readding this listeners when the cart is reloaded.
		 */
		CartJS.addItemRemovalListeners = function() {
			// listeners for removing items
			$('.' + CartJS.removeItemButtonClass).click(function() {
				CartJS.removeItem($(this).attr('id'));
			});
		}

		/** addItem
		 *	Calls CartController::add() via Ajax and updates cart on success.
		 *
		 * 	@param id id of product to be added to the cart
		 */
		CartJS.addItem = function(id) {
			console.log('adding to cart product with id='+id);
			$.ajax({
				url: SITE_URL + 'cartcontroller/add/'+id,
				success: function(response) {
					console.log('ajax response: ' + response);
					CartJS.updateCart();
				}
			});
		}

		/** removeItem
		 *	Calls CartController::remove() via Ajax and updates cart on success.
		 *
		 *	@param id id of product to be removed from the cart.
		 */
		CartJS.removeItem = function(id) {
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
		 *	Reloads element with id = CartJS.cartId 
		 */
		CartJS.updateCart = function() {
			$('#'+CartJS.cartId).load(document.URL + ' #'+CartJS.cartId, CartJS.addItemRemovalListeners); // since DOM is reloaded, listeners should be readded 
		}

/* END CartJS class */
