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
	this.scrollTime = 500;
	
	/** init
	 *	Initiates the controls and class variables: gets DOM elements, adds listeners.
	 */
	 this.init = function() {
	 	this.sunglassesPage = document.getElementById("sunglasses-page");
		this.currentPage = this.sunglassesPage;
	 	this.orderPage = document.getElementById("order-page");
		this.addPageScrollListeners();
		this.addDebugButtons();
		//this.addSunglassesListeners();
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
		this.sunglassesPage.appendChild(swipeRightButton);

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
	};

	 /** addPageScrollListeners
	  *	 Adds swipe listeners to "sunglasses" and "order" pages to scroll between them.
	  */
	 this.addPageScrollListeners = function() {
	 	console.log("debug", "adding page scroll listeners");
		$(this.sunglassesPage).on("swipeleft", classThis.scrollToOrderPage);
		$(this.orderPage).on("swiperight", classThis.scrollToSunglassesPage);
	 };

	/** scrollToOrderPage
	 *	Scrolls sunglasses page out, and scrolls order page in.
	 */
	 this.scrollToOrderPage = function() {
	 	if(classThis.currentPage != classThis.orderPage) {
			console.log("debug", "scrolling to order page");
			$(classThis.sunglassesPage).animate({
				marginLeft: "-50%"
			}, classThis.scrollTime, function() {
				classThis.currentPage = classThis.orderPage;
			});
		}
	 };

	/** scrollToSunglassesPage
	 *	Scrolls order page out, and scrolls sunglasses page in.
	 */
	 this.scrollToSunglassesPage = function() {
	 	if(classThis.currentPage != classThis.sunglassesPage) {
			console.log("debug", "scrolling to sunglasses page");
			$(classThis.sunglassesPage).animate({
				marginLeft: 0
			}, classThis.scrollTime, function() {
				classThis.currentPage = classThis.sunglassesPage;
			});
		}
	 };
}
