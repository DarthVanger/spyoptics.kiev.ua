
	/** addAddToCartListener
	 *	Adds "add to cart listener" to sunglasses container DOM element @param sunglasses.
	 */
	 var addCartListener = function(sunglasses) {
		console.log("debug", "addAddCartListener(): adding tap listener to " + sunglasses);
		$(sunglasses).on("tap", function() {
            if(!isInCart(sunglasses)) {
                console.log("debug", "sunglasses image tapped, calling add to cart, sunglass = " + this);
                classThis.addToCart(sunglasses);
                classThis.markAsAddedToCart(sunglasses);
            } else {
				console.log("debug", "sunglasses tapped, calling remove from cart, sunglasses.id = " + sunglasses.id);
				classThis.removeFromCart(sunglasses);
				classThis.removeAddedToCartMark(sunglasses);
            }
		});
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
