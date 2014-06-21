/** ShopControls class
 *	
 *  Adds tap listeners to sunglasses img containers.
 *  Tap events will add/remove sunglasses from cart, as well as show/hide "is in cart" mark.
 *
 ****** Dependencies ******
 *  Depends on CartAjax class.
 **************************
 *
 */

function ShopControls() {

	// storing pointer to class' "this" to be able to pass it to function called by events
	var classThis = this;

	// CartAjax class instance
	var cartAjax = null;

	// array of DOM sunglasses img containers
	var sunglasses = null;

	/** init
	 *	Initiates the controls and class variables: gets DOM elements, adds listeners.
	 */
	 this.init = function() {
		cartAjax = new CartAjax();
		sunglasses = document.getElementsByClassName("sunglassesImgContainer");

		this.addCartListeners();
	 };

	 /** addCartListeners
      *  Adds tap listeners to sunglasses img containers.
      *  Tap adds sunglasses to cart, or removes it, if it's already in the cart.
      *
      *  @return void
	  */
	 this.addCartListeners = function() {
	 	console.log("debug", "adding cart listeners");
		
		for(i=0; i<sunglasses.length; i++) {
            console.log("debug", "addAddCartListeners(): adding tap listener to " + sunglasses[i]);
            $(sunglasses[i]).on("tap", function() {
                if(!isInCart(this)) { // if the sunglasses are not in the cart
                    console.log("debug", "sunglasses image tapped, calling add to cart, sunglass = " + this);
                    cartAjax.addItem(this.id);
                    classThis.markAsAddedToCart(this);
                } else { // if the sunglasses are in the cart
                    console.log("debug", "sunglasses tapped, calling remove from cart, sunglasses.id = " + this.id);
                    cartAjax.removeItem(this.id);
                    classThis.removeAddedToCartMark(this);
                }
            });
		}
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
        var inCartMark = sunglasses.getElementsByClassName("isInCartMark")[0];
        // make the mark visible
        inCartMark.style.display = "inline-block";
        
        console.log("debug", "marked as added to cart sunglasses  = " + sunglasses);
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
        var inCartImg = sunglasses.getElementsByClassName("isInCartMark")[0];
        // hide isInCart mark
        inCartImg.style.display = "none";
        
        console.log("debug", "removed \"added to cart\" mark from sunglasses = " + sunglasses);
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
            console.log("debug", "isInCart(): returning false");
			return false;
		} else {
            console.log("debug", "isInCart(): returning true");
			return true;
		}
	  };
}
