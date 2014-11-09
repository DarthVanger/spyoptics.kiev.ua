/** CartAjax class
 *	
 *	Connects add/remove item buttons with server's CartController via ajax.
 *	Also can add listeners to buttons to give them add/remove from cart functionality, and update cart DOM element.
 *
 *	******** Interface *******
 *	void initListeners(config);
 *	void addItem(id);
 *	void removeItem(id);
 *	void updateCart();
 *	**************************
 *
 */
var CartAjax = function(config) {
		
		// keeping track of class' this pointer to pass it to events
		var classThis = this;

		// id of DOM element, which displays cart content. It will be reloaded after adding/removing products.
		var cartId; 
		// class name of buttons, which are responsible for adding product to cart
		var addItemButtonClass;
		// class name of buttons, which are responsible for removing product from the cart
		var removeItemButtonClass;

		/*** getters/setters ***/

		this.setCartId = function(p_cartId) {
			cartId = p_cartId;
		}

		/*** methods ***/

		/** initListeners
		 *	Reads config and adds listeners to buttons.
		 *
		 *	@param config is an object {cartId: "id of element which displays cart content", ...}.
		 */
		this.initListeners = function(config) {
			cartId = config.cartId;
			addItemButtonClass = config.addItemButtonClass;
			removeItemButtonClass = config.removeItemButtonClass;

			console.log("debug", "initiating CartAjax");
			console.log("debug", "cartId: " + cartId);
			console.log("debug", "addItemButtonClass: " + addItemButtonClass);
			console.log("debug", "removeItemButtonClass: " + removeItemButtonClass);

			addListeners();
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
			console.log('CartAjax: removing item');
			$.ajax({
				url: SITE_URL + 'cartcontroller/remove/'+id,
				success: function(response) {
					console.log('success! Ajax response: ' + response);
					classThis.updateCart();
				}
			});
		}

		/** updateCart
		 *	Reloads element with id = cartId 
		 */
		this.updateCart = function() {
			console.log("debug", "CartAjax: updating cart, cartId = " + cartId);
			$('#' + cartId).load(document.URL + ' #' + cartId, addItemRemovalListeners); // since DOM is reloaded, listeners should be readded 
		}

		/***********************/
		/*** private methods ***/
		/***********************/

		/** addListeners
		 *	Adds click listeners to buttons responsive for adding and removing items from the cart.
		 */
		var addListeners = function() {
			console.log("debug", "CartAjax: adding onclick listeners");
			// listeners for adding items
			$('.' + addItemButtonClass).click(function() {
				classThis.addItem($(this).attr('id'));
			});

			addItemRemovalListeners();
		}

		/** addItemRemovalListeners
		 *	Adds click listeners to button responsive for removing items from the cart.
		 *	It is made as separate method for readding this listeners when the cart is reloaded.
		 */
		var addItemRemovalListeners = function() {
			console.log("debug", "adding item removal listeners");
			$('.' + removeItemButtonClass).click(function() {
				classThis.removeItem($(this).attr('id'));
			});
		}
}
