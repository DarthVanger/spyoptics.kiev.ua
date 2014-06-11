/** PageSlidingEffect class
 *
 *	Adds page sliding animation instead of usual page scrolling. 
 *
 */
function PageSlidingEffect(){}

	// total number of pages to scroll
	var numberOfPages;
	// array of DOM objects, representing pages
	var pages;
	// array of DOM objects, representing buttons to navigate through pages 
	var navigationButtons;
	// number of page that is currently viewed
	var currentPageNumber;
	// className of buttons to navigate through pages
	var navigationButtonsClass;

	/** init
	 *	Changes css of divs with class="page", adds moushweel listeners, adds the sliding effect.
	 *
	 *	@param config - object with config options.
	 *	Example: config={pagesClass: 'pageForSliding'}. 
	 *	List of available options:
	 *		- pagesClass: name of class that is used to identify different fullscreen pages, to slide between them. Default: 'page';
	 */
	PageSlidingEffect.init = function(config) {
		if(typeof config !== 'undefined') {
			if(typeof config.pagesClass != 'undefined') {	
				pagesClass = config.pagesClass;
			} else { // default
				pagesClass = 'page';
			}
			if(typeof config.navigationButtonsClass!= 'undefined') {
				navigationButtonsClass = config.pagesClass;
			} else { // default
				navigationButtonsClass = 'pageSlidingButton';
			}
		} else { // defaults
			pagesClass = 'page';
			navigationButtonsClass = 'pageSlidingButton';
		}
		
		console.log('debug', 'PageSlidingEffect initiation');

		pages = $('.' + pagesClass);
		navigationButtons = $('.' + navigationButtonsClass);

		numberOfPages = pages.length;
		currentPageNumber = 0;
		changeLayout();

		hideAllPages();
		showPage($(pages[currentPageNumber]));

		addScrollListeners();
	}

	/** addScrollListeners
	 *	Adds mouswheel listeners.
	 *	Adding Swipe listeners is under development.	
	 */
	function addScrollListeners() {
		console.log('debug', 'adding scroll listeners');
		addMousewheelListeners();
		if(typeof navigationButtons != 'undefined') {
			addButtonListeners();
		} else {
			console.log("debug", "can't find navigation buttons with class='"+navigationButtonsClass+"'");
		}
		//addSwipeListeners();
	}

	/** addMousewheelListeners
	 *	Adds mousewheel listeners, which launch page scrolling animation.
	 */
	function addMousewheelListeners() {
		console.log('debug', 'adding mouswheel listeners');
		$("body").on("mousewheel", function (e) {
			if (e.deltaY <= 0) { // if scrolling down
				scrollPagesDownTo(currentPageNumber+1);
			} else if (e.deltaY > 0 && $(this).scrollTop() <= 0) { // if scrolling up
				scrollPagesUpTo(currentPageNumber-1);
			}
		});
	}

	/** addSwipeListeners (IS UNDER DEVELOPMENT)
	 *	Adds swipe listeners, which launch pages scrolling animation.
	 *	Uses jquery.mobile.touch with a little patch (see jquery/jquery.mobile.touch.patch.js for details)
	 */
	function addSwipeListeners() {
		$("body").on("swipeup", function() {
			scrollPagesDownTo(currentPageNumber+1);
		});
		$("body").on("swipedown", function() {
			scrollPagesUpTo(currentPageNumber-1);
		});
	}

	/** addButtonListeners
	 *	Adds listeners to buttons on left navigational bar.
	 */
	function addButtonListeners() {
		console.log("debug", "adding button listeners");
		for(i=0; i<navigationButtons.length; i++) {
			(function(i){ // anonymous function to use loop variable "i" by value, but no by reference
				navigationButtons[i].onclick = function() {
					moveToPage(i);
				}
			})(i);
		}
	}

	/** removeScrollListeners
	 *	Removes mousewheel and swipe listeners.
	 *	Is used to remove listeners while page scrolling is being animated.
	 *	Swipe listeners are under development.
	 */
	function removeScrollListeners() {
		removeMousewheelListeners();
		//removeSwipeListeners();
	}

	/** removeMouseweehlListeners
	 *	Removes mousewheel listeners
	 */
	function removeMousewheelListeners() {
		console.log('debug', 'removing mouswheel listeners');
		$("body").unmousewheel();
	}
	
	/** removeSwipeListeners
	 *	Removes swipe listeners.
	 */
	function removeSwipeListeners() {
		$("body").unbind("swipeup");
		$("body").unbind("swipedown");
	}

	/** moveToPage
	 *	Move to page @param pageNumber.
	 *	Calls scrollPagesUpTo() or scrollPagesDownTo() functions, in order to scroll the pages.
	 *
	 *	@return void
	 */
	function moveToPage(pageNumber) {
		console.log("debug", "moving to page #"+pageNumber);
		if(pageNumber==currentPageNumber) {
		} else if(pageNumber<currentPageNumber) {
			scrollPagesUpTo(pageNumber);
		} else if(pageNumber>currentPageNumber) {
			scrollPagesDownTo(pageNumber);
		}
	}

	/** scrollPagesDown
	 *	Animates pages divs, so it looks like pages are scrolling down.
	 */
	function scrollPagesDownTo(pageNumber) {
		if(currentPageNumber<numberOfPages-1) { // if not on the last page
			removeScrollListeners(); // remove listeners untill the process of sliding is over.
			var $currentPage = $(pages[currentPageNumber]);
			var $lowerPage = $(pages[pageNumber]);
			var pageHeight = $currentPage.css('height');

			// Lower page should have marginTop = 0, then it will be just below current page.
			// When current page will be moving up, because of negative marginTop, lower page will appear.
			$lowerPage.css({marginTop: 0});
			showPage($lowerPage);

			// Add "current" class to the button responsive for current page.
			$(navigationButtons[currentPageNumber]).attr("class", navigationButtonsClass);
			$(navigationButtons[pageNumber]).attr("class", navigationButtonsClass + " current");

			$currentPage.animate({
				marginTop: '-' + pageHeight 
			}, 500, function() {
				hidePage($currentPage);
				addScrollListeners();
			});
			currentPageNumber = pageNumber;
			console.log('debug', 'Scrolling down, currentPageNumber='+currentPageNumber);
		} else {
			console.log('debug', 'debug', 'Can\'t scroll below the last page');
		}
	}

	/** scrollPagesUp
	 *	Animates pages divs, so it looks like pages are scrolling up.
	 */
	function scrollPagesUpTo(pageNumber) {
		if(currentPageNumber>0) { // if not on the first page
			removeScrollListeners(); // remove listeners untill the process of sliding is over.
			var $upperPage = $(pages[pageNumber]);
			var $currentPage = $(pages[currentPageNumber]);
			var pageHeight = $currentPage.css('height');
			$upperPage.css({marginTop: '-' + pageHeight});
			showPage($upperPage);

			// Add "current" class to the button responsive for current page.
			$(navigationButtons[currentPageNumber]).attr("class", navigationButtonsClass);
			$(navigationButtons[pageNumber]).attr("class", navigationButtonsClass + " current");

			$upperPage.animate({
				marginTop: '0'
			}, 500, function() {
				hidePage($currentPage);
				addScrollListeners();	
			});
			currentPageNumber = pageNumber;
			console.log('debug', 'Scrolling up, currentPageNumber='+currentPageNumber);
		} else {
			console.log('debug', 'Can\'t scroll above the first page');
		}
	}

	/** hideAllPages
	 *	Sets display to none for all pages.
	 */
	function hideAllPages() {
		for(i=0; i<pages.length; i++) {
			if(i!=currentPageNumber) {
				$page = $(pages[i]);
				$page.css({display: 'none'});
			}
		}
	}

	/** hidePage
	 *	Sets display to none for page $page.
	 *
	 *	@param $page jquery object of page to hide.
	 */
	function hidePage($page) {
		$page.css({display: "none"});
	}
	
	/** showPage
	 *	Sets display to block for page $page.
	 *
	 *	@param $page jquery object of page to show.
	 */
	function showPage($page) {
		$page.css({display: "block"});
		lazyLoad($page);
	}
	
	/** lazyLoad
	 *	Images and videos that have "lazy-src" attribute instead of "src" on page @param $page, will be now loaded.
	 *	Replaces "lazy-src" attribute of all child elements of @param $page with "src" attribute.
	 *	This trick is used to make load only one page at a time, but not all at once.
	 *
	 *	Code src: http://stackoverflow.com/questions/5582739/lazy-loading-images
	 *
	 *	@param $page jquery object of html element that contains images/videos needed to be loaded.
	 *
	 *	@return void
	 */
	function lazyLoad($page) {
		$page.find('*[lazy-src]').each(function() {
			$(this).attr('src', $(this).attr('lazy-src'))
				.removeAttr('lazy-src');
		});
	}

	/** changeLayout
	 *	Changes layout so that all pages are 100% height in order to be able to scroll between them.
	 */
	function changeLayout() {
		// set all parents to height: 100%
		$(pages[0]).parents().css({
			height: "100%",
			overflow: "hidden",
		});

		for(i=0; i<pages.length; i++) {
			$page = $(pages[i]);
			$page.css({
				height: "100%",
				width: "100%",
				overflow: "hidden",
				zIndex: "-1"
			});
		}
	}

