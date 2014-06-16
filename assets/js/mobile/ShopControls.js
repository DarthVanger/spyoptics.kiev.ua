/** ShopControls class UNDER DEVELOPMENT
 *	
 *	Provides controls for mobile "shop" page: swipes and touches to navigate and choose sunglasses.
 *
 ***** Controls description *****
 *	*** Adding/removing sunglasses
 *	Tap on sunglasses image to add to cart. After tapping, the "inCartMark" image will be shown over the sunglasses image.
 *	After this "addItem" tap listener is removed, and "removeItem" listener is added.
 *	So when you tap again, the sunglasses are removed from the cart, and "inCartMark" image is hidden.
 ********************************
 *
 */

function ShopControls() {

	// storing pointer to class' "this" to be able to pass it to function called by events
	var classThis = this;


	// CartJS class instance
	cartJS = null;

	// page that is currently being displayed to user
	this.currentPage = null;
	// div container of "sunglasses" page
	this.sunglassesPage = null;
	// div container of "order" page
	this.orderPage = null;

	// time of page scrolling animation in miliseconds
	this.SCROLL_TIME = 500;
	// time of sunglasses flipping when tapped
	this.FLIP_TIME = 300;

	// array of DOM sunglasses img containers
	this.sunglasses = null;

	/** init
	 *	Initiates the controls and class variables: gets DOM elements, adds listeners.
	 */
	 this.init = function() {
	 	this.sunglassesPage = document.getElementById("sunglasses-page");
		this.currentPage = this.sunglassesPage;
	 	this.orderPage = document.getElementById("order-page");
		this.orderPage.style.display = "none";
		this.cartJS = new CartJS();
		this.cartJS.cartId = "cart-view";
		this.sunglasses = document.getElementsByClassName("sunglassesImgContainer");

		this.addPageScrollListeners();
		this.addDebugButtons();
		this.addCartListeners();
	 };

	/** addDebugButtons
	 *	Method for debugging. Adds to buttons which fire swipe events onclick.
	 */
	this.addDebugButtons = function() {
		var swipeRightButton = document.createElement("button");
		swipeRightButton.innerHTML = "swipeRight";
		swipeRightButton.style.position = "absolute";
		swipeRightButton.style.top = 0;
		swipeRightButton.style.left = 0;
		swipeRightButton.onclick = function() {
			console.log("debug", "triggering swipe right on " + classThis.orderPage);
			$(classThis.orderPage).trigger("swiperight");
		}
		this.orderPage.appendChild(swipeRightButton);

		var swipeLeftButton = document.createElement("button");
		swipeLeftButton.innerHTML = "swipeLeft";
		swipeLeftButton.style.position = "absolute";
		swipeLeftButton.style.top = 0;
		swipeLeftButton.style.left = "100px";
		swipeLeftButton.onclick = function() {
			console.log("debug", "triggering swipe left on " + classThis.sunglassesPage);
			$(classThis.sunglassesPage).trigger("swipeleft");
		}
		this.sunglassesPage.appendChild(swipeLeftButton);

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
		this.sunglassesPage.appendChild(tapSunglassesButton);
		this.sunglassesPage.appendChild(tapIsInCartImage);

		var updateCartButton = document.createElement("button");
		updateCartButton.innerHTML = "updateCartButton";
		updateCartButton.style.position = "absolute";
		updateCartButton.style.top = "100px";
		updateCartButton.style.left = "100px";
		updateCartButton.onclick = function() {
			console.log("debug", "triggering update cart");
			classThis.cartJS.updateCart();
		}
		this.orderPage.appendChild(updateCartButton);
	};

	 /** addPageScrollListeners
	  *	 Adds swipe listeners to "sunglasses" and "order" pages to scroll between them.
	  */
	 this.addPageScrollListeners = function() {
	 	console.log("debug", "adding page scroll listeners");
		$(this.sunglassesPage).on("swipeleft", classThis.scrollToOrderPage);
		$(this.orderPage).on("swiperight", classThis.scrollToSunglassesPage);
	 };

	 /** addCartListeners
	  *	 Adds touch listeners to sunglasses pictures which mark them as ordered.
	  */
	 this.addCartListeners = function() {
	 	console.log("debug", "adding cart listeners");
		
		for(i=0; i<this.sunglasses.length; i++) {
			if( this.isInCart(this.sunglasses[i]) ) {
				// debug // console.log("debug", "addCartListeners(): adding removeFromCart Listener to sunglasses.id = " + this.sunglasses[i].id);
				this.addRemoveFromCartListener(this.sunglasses[i]);	
			} else {
				this.addAddToCartListener(this.sunglasses[i]);
			}
		}
	 };

	 /** isInCart
	  *	
	  *	 Checks if @param sunglasses is in cart.
	  *	 This is done by checking if "isInCartMark" is visible (if its display is set to none or not).
	  *
	  *	 @param sunglasses sunglasses to check if it is in the cart.
	  *
	  *	 @return true if @param sunglasses is in cart, false if not in cart.
	  */
	  this.isInCart = function(sunglasses) {
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
	 this.addAddToCartListener = function(sunglasses) {
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
	  */
	 this.addRemoveFromCartListener = function(sunglasses) {
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
	 *	
	 */
	 this.addToCart = function(sunglasses) {
		console.log("debug", "adding " + sunglasses + " with id = " + sunglasses.id + " to cart");
		this.cartJS.addItem(sunglasses.id);
	 }

	/** removeFromCart
	 *	
	 */
	 this.removeFromCart = function(sunglasses) {
		console.log("debug", "removeFromCart(): removing sunglasses.id = " + sunglasses.id + "from cart");
		this.cartJS.removeItem(sunglasses.id);
	 };

	/** markAsAddedToCart
	 *	Launches animation and makes "inCartMark" image visible, changes "add to cart" listener to "remove from cart" listener.	
	 *	
	 *	@param sunglasses sunglasses to mark.
	 *
	 *	@return void
	 */
	 this.markAsAddedToCart = function(sunglasses) {
		console.log("debug", "marking " + sunglasses + "as added to cart");
		$(sunglasses).flip({
			direction: "tb",
			speed: this.FLIP_TIME,
			onEnd: function() {
				var inCartMark = sunglasses.getElementsByClassName("isInCartMark")[0];
				// make the mark visible
				inCartMark.style.display = "inline-block";

				// removing "add to cart" listener from sunglasses and adding "remove from cart" listener
				console.log("markAsAddedToCart(): unbinding tap listener from sunglasses.id = " + sunglasses.id);
				$(sunglasses).unbind("tap");
				classThis.addRemoveFromCartListener(sunglasses);
				
				console.log("debug", "marked as added to cart sunglasses  = " + sunglasses);
			}
		});
	 };



	 /** removeAddedToCartMark
	  *
	  */
	 this.removeAddedToCartMark = function(sunglasses) {
		console.log("debug", "removing added to cart mark from " + sunglasses);
		$(sunglasses).flip({
			direction: "bt",
			speed: this.FLIP_TIME,
			onEnd: function() {
				var inCartImg = sunglasses.getElementsByClassName("isInCartMark")[0];
				// hide isInCart mark
				inCartImg.style.display = "none";

				// remove "remove from cart" listener and add "add to cart" listener to sunglasses
				console.log("removeAddedToCartMark(): unbinding tap listener from sunglasses.id = " + sunglasses.id);
				$(sunglasses).unbind("tap");
				classThis.addAddToCartListener(sunglasses);
				
				console.log("debug", "removed \"added to cart\" mark from sunglasses = " + sunglasses);
			}
		});
	 };

	/** scrollToOrderPage
	 *	Scrolls sunglasses page out, and scrolls order page in.
	 */
	 this.scrollToOrderPage = function() {
	 	if(classThis.currentPage != classThis.orderPage) {
			classThis.orderPage.style.display = "inline-block";
			console.log("debug", "scrolling to order page");
			$(classThis.sunglassesPage).animate({
				marginLeft: "-50%"
			}, classThis.SCROLL_TIME, function() {
				classThis.currentPage.style.display = "none";
				classThis.currentPage = classThis.orderPage;
				classThis.cartJS.updateCart();
			});
		}
	 };

	/** scrollToSunglassesPage
	 *	Scrolls order page out, and scrolls sunglasses page in.
	 */
	 this.scrollToSunglassesPage = function() {
	 	if(classThis.currentPage != classThis.sunglassesPage) {
			classThis.sunglassesPage.style.display = "inline-block";
			console.log("debug", "scrolling to sunglasses page");
			$(classThis.sunglassesPage).animate({
				marginLeft: 0
			}, classThis.scrollTime, function() {
				classThis.currentPage.style.display = "none";
				classThis.currentPage = classThis.sunglassesPage;
			});
		}
	 };
}
