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

			//console.log("debug", "initiating CartAjax");
			//console.log("debug", "cartId: " + cartId);
			//console.log("debug", "addItemButtonClass: " + addItemButtonClass);
			//console.log("debug", "removeItemButtonClass: " + removeItemButtonClass);

			addListeners();
		}

		/** addItem
		 *	Calls CartController::add() via Ajax and updates cart on success.
		 *
		 * 	@param id id of product to be added to the cart
		 */
		this.addItem = function(id) {
			//console.log('adding to cart product with id='+id);
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
					//console.log('success! Ajax response: ' + response);
					classThis.updateCart();
				}
			});
		}

		/** updateCart
		 *	Reloads element with id = cartId 
		 */
		this.updateCart = function() {
			//console.log("debug", "CartAjax: updating cart, cartId = " + cartId);
			$('#' + cartId).load(document.URL + ' #' + cartId, function(){
				addItemRemovalListeners();addCaseSelectionListeners()
			}); // since DOM is reloaded, listeners should be readded 
		}

		/***********************/
		/*** private methods ***/
		/***********************/


		var addListeners = function() {

			// listeners for adding items
			$('.' + addItemButtonClass).click(function() {
				classThis.addItem($(this).attr('id'));
			});


			addCaseSelectionListeners();
			addItemRemovalListeners();
		}


		/** addCaseSelectionListeners
		 *	Add events on images of cases, which adds price of case to particular sunglasses and changes total price of order
		 */

		var addCaseSelectionListeners = function() {
			//console.log("debug", "CartAjax: adding onclick listeners");

			$( '[id ^=input-200]' ).click(function() {
				var id = this.getAttribute('id').substr(-1);

			  	if (!$('#flag-'+id).prop('checked')) {
				  	$( '#case-price-value-id-'+id).text(' + 100 за кейс');
				  	priceToChange = $('#total-price').text();
				  	priceToChange = parseInt(priceToChange)+100;
				  	$('#total-price').text(priceToChange);
				  	$('#input-total-price').val(priceToChange);
				  	$('#flag-'+id).prop('checked', true);
			  	}
			});

			$("[id ^=input-free]" ).click(function() {
				var id = this.getAttribute('id').substr(-1);

				if ($('#flag-'+id).prop('checked')) {
				  	$( '#case-price-value-id-'+id).text('');
				  	priceToChange = $('#total-price').text();
				  	priceToChange = parseInt(priceToChange)-100;
				  	$('#total-price').text(priceToChange);
				  	$('#input-total-price').val(priceToChange);
				  	$('#flag-'+id).prop('checked',false);
			  	}
			});
		}

		/** addItemRemovalListeners
		 *	Adds click listeners to button responsive for removing items from the cart.
		 *	It is made as separate method for readding this listeners when the cart is reloaded.
		 */
		var addItemRemovalListeners = function() {
			//console.log("debug", "adding item removal listeners");
			$('.' + removeItemButtonClass).click(function() {
				classThis.removeItem($(this).attr('id'));
			});
		}
}
