	/** PageSlidingEffect class
	 *	Adds page sliding animation instead of usual page scrolling. 
	 *
	 */
	function PageSlidingEffect() {
			
	}
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
			pagesClass = config.pagesClass;
		} else {
			pagesClass = 'page';
		}

		console.log('debug', 'PageSlidingEffect initiation');
		addScrollListeners();

		pages = $('.'+pagesClass);
		numberOfPages = pages.length;
		currentPageNumber = 0;
		changeLayout();

		hideAllPages();
		showPage($(pages[currentPageNumber]));
	}
	/* properties are specified in init() method */
	var numberOfPages;
	var pages;
	var currentPageNumber;

	/* functions implementation */
	function addScrollListeners() {
		console.log('debug', 'adding scroll listeners');
		addMousewheelListeners();
		//addSwipeListeners();
	}

	function addMousewheelListeners() {
		console.log('debug', 'adding mouswheel listeners');
		$("body").on("mousewheel", function (e) {
			if (e.deltaY <= 0) { // if scrolling down
				scrollPagesDown();
			} else if (e.deltaY > 0 && $(this).scrollTop() <= 0) { // if scrolling up
				scrollPagesUp();
			}
		});
	}
	function addSwipeListeners() {
		$("body").on("swipeup", function() {
			scrollPagesDown();
		});
		$("body").on("swipedown", function() {
			scrollPagesUp();
		});
	}

	function removeScrollListeners() {
		removeMousewheelListeners();
		//removeSwipeListeners();
	}

	function removeMousewheelListeners() {
		console.log('debug', 'removing mouswheel listeners');
		$("body").unmousewheel();
	}
	
	function removeSwipeListeners() {
		$("body").unbind("swipeup");
		$("body").unbind("swipedown");
	}

	function scrollPagesDown() {
		if(currentPageNumber<numberOfPages-1) { // if not on the last page
			removeScrollListeners(); // remove listeners untill the process of sliding is over.
			var $currentPage = $(pages[currentPageNumber]);
			var $lowerPage = $(pages[currentPageNumber+1]);
			showPage($lowerPage);
			$currentPage.animate({
				marginTop: '-' + $currentPage.css('height')
			}, 500, function() {
				hidePage($currentPage);
				addScrollListeners();
			});
			currentPageNumber++;
			console.log('debug', 'Scrolling down, currentPageNumber='+currentPageNumber);
		} else {
			console.log('debug', 'debug', 'Can\'t scroll below the last page');
		}
	}

	function scrollPagesUp() {
		if(currentPageNumber>0) { // if not on the first page
			removeScrollListeners(); // remove listeners untill the process of sliding is over.
			var $upperPage = $(pages[currentPageNumber-1]);
			var $currentPage = $(pages[currentPageNumber]);
			showPage($upperPage);
			$upperPage.animate({
				marginTop: '0'
			}, 500, function() {
				hidePage($currentPage);
				addScrollListeners();	
			});
			currentPageNumber--;
			console.log('debug', 'Scrolling down, currentPageNumber='+currentPageNumber);
		} else {
			console.log('debug', 'Can\'t scroll above the first page');
		}
	}

	function hideAllPages() {
		for(i=0; i<pages.length; i++) {
			if(i!=currentPageNumber) {
				$page = $(pages[i]);
				$page.css({display: 'none'});
			}
		}
	}

	function hidePage($page) {
		$page.css({display: "none"});
	}
	
	function showPage($page) {
		$page.css({display: "block"});
	}

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

