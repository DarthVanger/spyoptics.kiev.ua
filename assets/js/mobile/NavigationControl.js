/** NavigationControl class UNDER DEVELOPMENT
 *
 *	Is responsive for navigation and controls by touches/swipes on mobile version of site.
 *
 */
var NavigationControl = {
	currentPage: null,
	scrollingEngine: null,
	/** init
	 *	Initiates touch controls by adding listeners.
	 */
	init: function() {
		console.log("debug", "Initiating NavigationControl");
		this.currentPage = document.getElementsByClassName("page")[0];
		this.scrollingEngine = new ScrollingEngine(this.currentPage);
		this.addListeners();
		this.addDebugButtons();
	},

	/** addDebugButtons
	 *	Method for debugging. Adds to buttons which fire swipe events onclick.
	 */
	addDebugButtons: function() {
		var swipeRightButton = document.createElement("button");
		swipeRightButton.innerHTML = "swipeRight";
		swipeRightButton.style.position = "absolute";
		swipeRightButton.style.top = 0;
		swipeRightButton.style.left = 0;
		swipeRightButton.onclick = function() {
			console.log("debug", "triggering swipe right");
			$(document.body).trigger("swiperight");
		}
		document.body.appendChild(swipeRightButton);
	},

	/** addListeners
	 *	Adds touch/swipe listeners.
	 */
	addListeners: function() {
		console.log("debug", "TouchControl: adding listeners");
		$(document.body).on("swiperight", function(event) {
			NavigationControl.bodySwipeHandler("swiperight");
		});
	},

	/** bodySwipeHandler
	 *	Handles swipe events on document.body
	 */
	bodySwipeHandler: function(swipeEvent) {
		if(swipeEvent == "swiperight") {
			this.currentPage = this.scrollingEngine.moveToPage("order", "right");
		}
	}
}

/** ScrollingEngine class
 *	Is responsive for page scrolling.
 */
function ScrollingEngine(currentPage) { 
	
	// HTML DOM element representing current page displayed on the screen
	this.currentPage = currentPage;

	// scroll time in miliseconds
	this.scrollTime = 500;

	/** moveToPage UNDER DEVELOPMENT
	 *	Scrolls to page named @param pageName
	 */
	this.moveToPage = function(pageName, navigationDirection) {
		var page = this.createPage(pageName);
		this.appendPageForScrolling(page, navigationDirection);
		this.scrollPages(navigationDirection);
		this.currentPage = page;
		return this.currentPage;
	},

	/** createPage UNDER DEVELOPMENT
	 *	Creates div element with contents of page named @param pageName from views/mobile/pages/ folder.
	 *
	 *	@param pageName name of the page to create
	 *
	 *	@return div element with content of page named @param pageName from views/mobile/pages/ folder.
	 */
	this.createPage = function(pageName) {
		var page = document.createElement("div");
		page.className = "page";

		var ajaxURL = null;
		if(pageName == "order") {
			ajaxURL = SITE_URL + "mobile/mobilepage/order";	
		} else {
			ajaxURL = SITE_URL + "mobile/mobilepage/getpage/" + pageName;
		}

		page.innerHTML = $.ajax({
			url: ajaxURL,
			async: false
		}).responseText;
		console.log("debug", "created page = " + page.innerHTML);
		return page;
	},

	this.appendPageForScrolling = function(page, navigationDirection) {
		document.getElementById("pageContainer").appendChild(page);
	},

	this.scrollPages = function(navigationDirection) {
		if(navigationDirection == "right") {
			$(this.currentPage).animate({
				marginLeft: "-50%"
			}, this.scrollTime, this.hideCurrentPage);
		}
	},

	this.hideCurrentPage = function() {
		// hideCurrentPage is called as a callback function by currentPage after animation, so here this = currentPage
		this.style.display = "none";
	}
}

function var_dump(obj) {
	for(var key in obj) {
		console.log(key);
	}
}
