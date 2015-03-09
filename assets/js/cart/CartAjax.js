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
		var self = this;

        // number of items in the cart
        var itemCount = 0;

		// id of DOM element, which displays cart content. It will be reloaded after adding/removing products.
		var cartId; 
		// class name of buttons, which are responsible for adding product to cart
		var addItemButtonClass;
		// class name of buttons, which are responsible for removing product from the cart
		var removeItemButtonClass;

        /** construct */
        $.ajax({
            url: SITE_URL + 'cartcontroller/getItemCount',
            success: function(response) {
                itemCount = response.itemCount;
                self.updateDiscounts(); // There may be a discount for next purchase, so update the prices for all products.
            }
        });

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
			console.log('adding to cart product with id='+id);
			$.ajax({
				url: SITE_URL + 'cartcontroller/add/'+id,
				success: function(response) {
                    itemCount++;
                    self.updateDiscounts(); // There may be a discount for next purchase, so update the prices for all products.
					self.updateCart();
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
                    itemCount--;
                    self.updateDiscounts(); // There may be a discount for next purchase, so update the prices for all products.
					self.updateCart();
				}
			});
		}

		/** updateCart
		 *	Reloads element with id = cartId 
		 */
		this.updateCart = function() {
			//console.log("debug", "CartAjax: updating cart, cartId = " + cartId);
			$('#' + cartId).load(document.URL + ' #' + cartId, addItemRemovalListeners); // since DOM is reloaded, listeners should be readded 
		};

        /**
         * Update the discounts, depending on products in the cart.
         */
        this.updateDiscounts = function() {
            console.log('updating discounts');
            var productPrice = $('#sunglass-price').attr('data-price');
            $('.discount').each(function() {
                var $this = $(this);
                var discount = calculateDiscount(productPrice);
                $this.html('&mdash; ' + discount + ' грн')
            });
        };

		/***********************/
		/*** private methods ***/
		/***********************/

        var calculateDiscount = function(productPrice) {
            console.log('pr price = ' + productPrice);
            console.log('it count = ' + itemCount);

            var discount;
            if (itemCount < 0) {
                discount = 0;
            } else {
                switch (itemCount) {
                    case 0:
                        discount = 0;
                        break;
                    case 1:
                        discount = 0.15 * productPrice;
                        break;
                    case 2:
                        discount = 0.20 * productPrice;
                        break;
                    case 3:
                        discount = 0.23 * productPrice;
                        break;
                    case 4:
                        discount = 0.25 * productPrice;
                        break;
                    default:
                        discount = 0.3 * productPrice;
                        break;
                }
            }

            return Math.ceil(discount);
        }

		/** addListeners
		 *	Adds click listeners to buttons responsive for adding and removing items from the cart.
		 */
		var addListeners = function() {
			console.log("debug", "CartAjax: adding onclick listeners");
			// listeners for adding items
			$('.' + addItemButtonClass).click(function() {
				self.addItem($(this).attr('id'));
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
				self.removeItem($(this).attr('id'));
			});
		}
}
