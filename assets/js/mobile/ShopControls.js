/** ShopControls class
 *	
 *	Provides controls for mobile "shop" page: swipes and touches to navigate and add sunglasses to cart.
 *
 ***** Controls ******
 *	Tap sunglasses image to add it to cart, tap again to remove from cart.
 *************************************
 *
 ***** Program logic scheme ******
 *
 *	*** Adding/removing sunglasses ***
 *	When sunglasses container div is tapped, CartJS.addToCart(id) is called (which adds sunglasses to cart via ajax), the "isInCartMark" image is shown, "add to cart" listener is removed, "remove from cart" listener is added. So when tapped again, "remove from cart" will be called, "isInCartMark" image hidden, "remove from cart" listener removed, "add to cart" listener added back.
 *
 ********************************
 *
 */

function ShopControls() {

	// storing pointer to class' "this" to be able to pass it to function called by events
	var classThis = this;

	// CartAjax class instance
	var cartAjax = null;

	// page that is currently being displayed to user
	var currentPage = null;

	// time of page scrolling animation in miliseconds
	var SCROLL_TIME = 500;
	// time of sunglasses flipping when tapped
	var FLIP_TIME = 200;

	// array of DOM sunglasses img containers
	var sunglasses = null;

	/** init
	 *	Initiates the controls and class variables: gets DOM elements, adds listeners.
	 */
	 this.init = function() {
		cartAjax = new CartAjax();
		cartAjax.setCartId("cart-view");
		sunglasses = document.getElementsByClassName("sunglassesImgContainer");

		//this.addDebugButtons();
		this.addCartListeners();
	 };

	 /** addCartListeners
	  *	 Adds touch listeners to sunglasses pictures which mark them as ordered.
	  */
	 this.addCartListeners = function() {
	 	console.log("debug", "adding cart listeners");
		
		for(i=0; i<sunglasses.length; i++) {
			if( isInCart(sunglasses[i]) ) {
				// debug // console.log("debug", "addCartListeners(): adding removeFromCart Listener to sunglasses.id = " + this.sunglasses[i].id);
				addRemoveFromCartListener(sunglasses[i]);	
			} else {
				addAddToCartListener(sunglasses[i]);
			}
		}
	 };


	/** removeFromCart
	 *	Adds @param sunglasses to cart using cartAjax	
	 *
	 *	@return void
	 */
	 this.removeFromCart = function(sunglasses) {
		console.log("debug", "removeFromCart(): removing sunglasses.id = " + sunglasses.id + "from cart");
		cartAjax.removeItem(sunglasses.id);
	 };

	/** markAsAddedToCart
	 *  Makes "inCartMark" image visible, changes "add to cart" listener to "remove from cart" listener.	
	 *	
	 *	@param sunglasses sunglasses to mark.
	 *
	 *	@return void
	 */
	 this.markAsAddedToCart = function(sunglasses) {
		console.log("debug", "marking " + sunglasses + "as added to cart");
		$(sunglasses).flip({
			direction: "tb",
			speed: FLIP_TIME,
			onEnd: function() {
				var inCartMark = sunglasses.getElementsByClassName("isInCartMark")[0];
				// make the mark visible
				inCartMark.style.display = "inline-block";

				// removing "add to cart" listener from sunglasses and adding "remove from cart" listener
				console.log("markAsAddedToCart(): unbinding tap listener from sunglasses.id = " + sunglasses.id);
				$(sunglasses).unbind("tap");
				addRemoveFromCartListener(sunglasses);
				
				console.log("debug", "marked as added to cart sunglasses  = " + sunglasses);
			}
		});
	 };



	 /** removeAddedToCartMark
	  *	 Hides "isInCartMark" image, and changes "remove from cart" listener to "add to cart" listener.
	  *
	  *	 @param sunglasses sunglasses container div of sunglasses that are in cart.
	  *
	  *	 @return void.
	  */
	 this.removeAddedToCartMark = function(sunglasses) {
		console.log("debug", "removing added to cart mark from " + sunglasses);
		$(sunglasses).flip({
			direction: "bt",
			speed: FLIP_TIME,
			onEnd: function() {
				var inCartImg = sunglasses.getElementsByClassName("isInCartMark")[0];
				// hide isInCart mark
				inCartImg.style.display = "none";

				// remove "remove from cart" listener and add "add to cart" listener to sunglasses
				console.log("removeAddedToCartMark(): unbinding tap listener from sunglasses.id = " + sunglasses.id);
				$(sunglasses).unbind("tap");
				addAddToCartListener(sunglasses);
				
				console.log("debug", "removed \"added to cart\" mark from sunglasses = " + sunglasses);
			}
		});
	 };

	/*** private methods ***/

	 /** isInCart
	  *	
	  *	 Checks if @param sunglasses is in cart.
	  *	 This is done by checking if "isInCartMark" is visible (if its display is set to none or not).
	  *
	  *	 @param sunglasses sunglasses to check if it is in the cart.
	  *
	  *	 @return true if @param sunglasses is in cart, false if not in cart.
	  */
	  var isInCart = function(sunglasses) {
		var isInCartMark = sunglasses.getElementsByClassName("isInCartMark")[0];
		console.log("debug", "isInCart(): isInCartMark = " + isInCartMark);
		if ( $(isInCartMark).css("display") == "none" ) {
			return false;
		} else {
			return true;
		}
	  };

	/** addAddToCartListener
	 *	Adds "add to cart listener" to sunglasses container DOM element @param sunglasses.
	 */
	 var addAddToCartListener = function(sunglasses) {
		console.log("debug", "addAddToCartListeners(): adding tap listener to " + sunglasses);
		$(sunglasses).on("tap", function() {
			console.log("debug", "sunglasses image tapped, calling add to cart, sunglass = " + this);
			classThis.addToCart(sunglasses);
			classThis.markAsAddedToCart(sunglasses);
		});
	 }
	
	 /** addRemoveListener
	  *  Adds a listener to remove @param itemToRemove, when @param button is tapped.
	  *	
	  *	 @param button a DOM element, which is gonna become a "remove item" button.
	  *  @param itemToRemove sunglasses container div with id="sunglasses['id']", which will be passed to removeFromCart().
	  *
	  *	 @return void
	  *	 @access private
	  */
	 var addRemoveFromCartListener = function(sunglasses) {
		console.log("debug", "addRemoveListener(): adding remove listener to sunglasses.id = " + sunglasses.id);
		$(sunglasses).on("tap", function() {
				console.log("debug", "sunglasses tapped, calling remove from cart, sunglasses.id = " + sunglasses.id);
				classThis.removeFromCart(sunglasses);
				classThis.removeAddedToCartMark(sunglasses);
		});
		// debugging
		//$(button).trigger("tap");
	 }

	/** addToCart
	 *	Adds @param sunglasses to cart using cartAjax	
	 *	
	 *	@return void
	 */
	 this.addToCart = function(sunglasses) {
		console.log("debug", "adding " + sunglasses + " with id = " + sunglasses.id + " to cart");
		cartAjax.addItem(sunglasses.id);
	 }
	/** addDebugButtons
	 *	Method for debugging. Adds debug buttons to page, which fire swipe/touch events for testing.
	 */
	var addDebugButtons = function() {
		var swipeRightButton = document.createElement("button");
		swipeRightButton.innerHTML = "swipeRight";
		swipeRightButton.style.position = "absolute";
		swipeRightButton.style.top = 0;
		swipeRightButton.style.left = 0;
		swipeRightButton.onclick = function() {
			console.log("debug", "triggering swipe right on " + classThis.orderPage);
			$(classThis.orderPage).trigger("swiperight");
		}
		orderPage.appendChild(swipeRightButton);

		var swipeLeftButton = document.createElement("button");
		swipeLeftButton.innerHTML = "swipeLeft";
		swipeLeftButton.style.position = "absolute";
		swipeLeftButton.style.top = 0;
		swipeLeftButton.style.left = "100px";
		swipeLeftButton.onclick = function() {
			console.log("debug", "triggering swipe left on " + classThis.sunglassesPage);
			$(classThis.sunglassesPage).trigger("swipeleft");
		}
		sunglassesPage.appendChild(swipeLeftButton);

		var tapSunglassesButton = document.createElement("button");
		tapSunglassesButton.innerHTML = "tapSunglasses";
		tapSunglassesButton.style.position = "absolute";
		tapSunglassesButton.style.top = "50px";
		tapSunglassesButton.style.left = "0px";

		var tapIsInCartImage = document.createElement("button");
		tapIsInCartImage.innerHTML = "tapIsInCartImage";
		tapIsInCartImage.style.position = "absolute";
		tapIsInCartImage.style.top = "100px";
		tapIsInCartImage.style.left = "0px";

		tapSunglassesButton.onclick = function() {
			console.log("debug", "triggering tap on sunglasses on " + classThis.sunglasses[0]);
			$(classThis.sunglasses[0]).trigger("tap");
		}
		tapIsInCartImage.onclick = function() {
			var isInCartImage = classThis.sunglasses[0].getElementsByClassName("isInCartMark")[0];
			console.log("debug", "triggering tap on isInCartImage on " + isInCartImage); 
			$(isInCartImage).trigger("tap");
	
		}
		sunglassesPage.appendChild(tapSunglassesButton);
		sunglassesPage.appendChild(tapIsInCartImage);

		var updateCartButton = document.createElement("button");
		updateCartButton.innerHTML = "updateCartButton";
		updateCartButton.style.position = "absolute";
		updateCartButton.style.top = "100px";
		updateCartButton.style.left = "100px";
		updateCartButton.onclick = function() {
			console.log("debug", "triggering update cart");
			cartAjax.updateCart();
		}
		orderPage.appendChild(updateCartButton);
	};
}
