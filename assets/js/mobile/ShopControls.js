/** ShopControls class
 *	
 *  Adds tap listeners to sunglasses img containers.
 *  Tap events will add/remove sunglasses from cart, as well as show/hide "is in cart" mark.
 *
 */

function ShopControls() {

	// storing pointer to class' "this" to be able to pass it to function called by events
	var classThis = this;

	// array of DOM sunglasses img containers
	var sunglasses = null;

	/** init
	 *	Initiates the controls and class variables: gets DOM elements, adds listeners.
	 */
	 this.init = function() {
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
                    classThis.addToCart(this);
                } else { // if the sunglasses are in the cart
                    console.log("debug", "sunglasses tapped, calling remove from cart, sunglasses.id = " + this.id);
                    classThis.removeFromCart(this);
                }
            });
		}
	 };

     /** addToCart
      *  Adds @param sunglasses to cart via ajax call to CartController.
      *  Also shows loading spinner while waiting for ajax.
      *
      *  @param sunglasses sunglasses img container with id of sunglasses it contains.
      *
      *  @return void
      */
      this.addToCart = function(sunglasses) {
        console.log('adding to cart product with id=' + sunglasses.id);

        var loadingIcon = sunglasses.getElementsByClassName('loadingIcon')[0];
        loadingIcon.style.display = 'inline-block';

        $.ajax({
            url: SITE_URL + 'cartcontroller/add/' + sunglasses.id,
            success: function(response) {
                console.log('ajax response: ' + response);
                loadingIcon.style.display = 'none';
                classThis.markAsAddedToCart(sunglasses);
            }
        });
      }

     /** removeFromCart
      *  Removes @param sunglasses from cart via ajax call to CartController.
      *  Also shows loading spinner while waiting for ajax.
      *
      *  @param sunglasses sunglasses img container with id of sunglasses it contains.
      *
      *  @return void
      */
      this.removeFromCart = function(sunglasses) {
        console.log('debug', 'removing from cart product with id =' + sunglasses.id);

        var loadingIcon = sunglasses.getElementsByClassName('loadingIcon')[0];
        loadingIcon.style.display = 'inline-block';

        $.ajax({
            url: SITE_URL + 'cartcontroller/remove/' + sunglasses.id,
            success: function(response) {
                console.log('ajax response: ' + response);
                loadingIcon.style.display = 'none';
                classThis.removeAddedToCartMark(sunglasses);
            }
        });
      }

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
