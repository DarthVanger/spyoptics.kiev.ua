/**
 *	Swipe left to see order form, swipe right to go back to sunglasses page.
 *	*** Scrolling through pages ***
 *	There are only two pages: "sunglasses" and "order". So each of "swipeleft" and "swiperight" is responsible only for one page.
 *	When "swipeleft" is detected, program should scroll pages to "order" page. If user is not already on "order" page, animation of page scrolling is launched. 
 *	When "swiperight" is detected, program should scroll pages to "sunglasses" page. If user is not already on "sunglasses page, animation of page scrolling is luanched.
 *
 */

	 /** addPageScrollListeners
	  *	 Adds swipe listeners to "sunglasses" and "order" pages to scroll between them.
	  */
	 this.addPageScrollListeners = function() {
	 	console.log("debug", "adding page scroll listeners");
		$(this.sunglassesPage).on("swipeleft", classThis.scrollToOrderPage);
		$(this.orderPage).on("swiperight", classThis.scrollToSunglassesPage);
	 };

	/** scrollToOrderPage
	 *	Scrolls sunglasses page out, and scrolls order page in (if not already on order page).
	 *
	 *
	 *	Scrolling (animation) mechanism:
	 *	OrderPage's display is set to "inline-block", it appears off the screen, to the right of the current page.
	 *	Then current page's margin is animated to "-50%" (which is 100% of screen width, because pages container has width=200%),
	 *	so the order page shows up on the screen from the right.
	 *	When previous page is totally off the screen, it's display is set to "none".
	 *	Scrolling is over, order page is now the current page.
	 *
	 *	@return void
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
				// debug // classThis.cartJS.updateCart();
			});
		}
	 };

	/** scrollToSunglassesPage
	 *	Scrolls order page out, and scrolls sunglasses page in.
	 *
	 *	Scrolling (animation) mechanism:
	 *	Sunglasses page is located to the left of order page, off the screen.
	 *	It has display="none" and marginLeft = "-50%" (which is 100% of screen width, because pages container width = 200% of screen).
	 *	First, it's display property is set to "inline-block".
	 *	Then it's marginLeft is animated to "0". This pushes "order" page to the right, beyond the screen.
	 *	Now only "sunglasses" page is seen. "Order" page's display is set to "none".
	 *
	 *	@return void
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
