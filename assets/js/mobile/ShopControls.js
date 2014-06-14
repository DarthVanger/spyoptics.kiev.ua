/** ShopControls class UNDER DEVELOPMENT
 *	
 *	Provides controls for mobile "shop" page: swipes and touches to navigate and choose sunglasses.
 *
 */

function ShopControls() {

	// storing pointer to class' "this" to be able to pass it to function called by events
	var classThis = this;

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
		tapSunglassesButton.style.top = "100px";
		tapSunglassesButton.style.left = "0px";
		tapSunglassesButton.onclick = function() {
			console.log("debug", "triggering tap on sunglasses on " + classThis.sunglasses[0]);
			$(classThis.sunglasses[0]).trigger("tap");
		}
		this.sunglassesPage.appendChild(tapSunglassesButton);
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
			console.log("debug", "adding tap listener to " + this.sunglasses[i]);
			$(this.sunglasses[i]).on("tap", function() {
				classThis.addToCart(this);
				classThis.markAsAddedToCart(this);
			});
		}
	 };

	/** addToCart
	 *	
	 */
	 this.addToCart = function(sunglasses) {
		console.log("debug", "adding " + sunglasses + " to cart");
		//this.
	 }

	/** markAsAddedToCart
	 *	
	 */
	 this.markAsAddedToCart = function(sunglasses) {
		console.log("debug", "marking " + sunglasses + "as added to cart");
		$(sunglasses).flip({
			direction: "tb",
			speed: this.FLIP_TIME,
			onEnd: function() {
				sunglasses.getElementsByClassName("inCart")[0].style.display="block";
				console.log("debug", "ordered div = " + sunglasses.getElementsByClassName("inCart")[0]);
			}
		});

	 }

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
