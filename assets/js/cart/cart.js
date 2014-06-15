/** CartJS class
 *	
 *	Adds listeners to cart buttons (e.g. "add to cart"), connecting button click events with CartController via Ajax.
 *
 */
var CartJS = function() {

		// keeping track of class' this pointer to pass it to events
		var classThis = this;

		// id of DOM element, which displays cart content. It will be reloaded after adding/removing products.
		this.cartId; 
		// class name of buttons, which are responsible for adding product to cart
		this.addItemButtonClass;
		// class name of buttons, which are responsible for removing product from the cart
		this.removeItemButtonClass;


		/** init
		 *	Reads config and adds listeners to buttons.
		 *
		 *	@param config is an object {cartId: "id of element which displays cart content", ...}.
		 */
		this.init = function(config) {
			this.cartId = config.cartId;
			this.addItemButtonClass = config.addItemButtonClass;
			this.removeItemButtonClass = config.removeItemButtonClass;

			console.log("debug", "initiating CartJS");
			console.log("debug", "cartId: " + this.cartId);
			console.log("debug", "addItemButtonClass: " + this.addItemButtonClass);
			console.log("debug", "removeItemButtonClass: " + this.removeItemButtonClass);

			this.addListeners();
		}

		/** addListeners
		 *	Adds click listeners to buttons responsive for adding and removing items from the cart.
		 */
		this.addListeners = function() {
			console.log("debug", "CartJS: adding onclick listeners");
			// listeners for adding items
			$('.' + this.addItemButtonClass).click(function() {
				classThis.addItem($(this).attr('id'));
			});

			this.addItemRemovalListeners();
		}

		/** addItemRemovalListeners
		 *	Adds click listeners to button responsive for removing items from the cart.
		 *	It is made as separate method for readding this listeners when the cart is reloaded.
		 */
		this.addItemRemovalListeners = function() {
			console.log("debug", "adding item removal listeners");
			$('.' + classThis.removeItemButtonClass).click(function() {
				classThis.removeItem($(this).attr('id'));
			});
		}

		/** addItem
		 *	Calls CartController::add() via Ajax and updates cart on success.
		 *
		 * 	@param id id of product to be added to the cart
		 */
		this.addItem = function(id) {
			console.log('adding to cart product with id='+id);
			$.ajax({
				url: SITE_URL + 'cartcontroller/add/'+id,
				success: function(response) {
					console.log('ajax response: ' + response);
					classThis.updateCart();
				}
			});
		}

		/** removeItem
		 *	Calls CartController::remove() via Ajax and updates cart on success.
		 *
		 *	@param id id of product to be removed from the cart.
		 */
		this.removeItem = function(id) {
			console.log('CartJS: removing item');
			$.ajax({
				url: SITE_URL + 'cartcontroller/remove/'+id,
				success: function(response) {
					console.log('success! Ajax response: ' + response);
					classThis.updateCart();
				}
			});
		}

		/** updateCart
		 *	Reloads element with id = this.cartId 
		 */
		this.updateCart = function() {
			console.log("debug", "CartJS: updating cart, this.cartId = " + this.cartId);
			$('#' + this.cartId).load(document.URL + ' #' + classThis.cartId, classThis.addItemRemovalListeners); // since DOM is reloaded, listeners should be readded 
		}
} /* END CartJS class */
