	/** PageSlidingEffect class
	 *	Adds page sliding animation instead of usual page scrolling. 
	 *
	 */
	function PageSlidingEffect() {
			
	}
	PageSlidingEffect.init = function() {

	}
	/* config */
	var numberOfPages = 2;

	/* code */
	var currentPageNumber = 1;

	$(document).ready(function() {
		//var deviceIsPowerful = checkDevicePerformance();
		addScrollListeners();
	});

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
		if(currentPageNumber<numberOfPages) { // if not on the last page
			removeScrollListeners(); // remove listeners untill the process of sliding is over.
			var $page = $('#page'+currentPageNumber);
			$page.animate({
				marginTop: '-' + $page.css('height')
			}, 500, addScrollListeners);
			currentPageNumber++;
			console.log('debug', 'Scrolling down, currentPageNumber='+currentPageNumber);
		} else {
			console.log('debug', 'debug', 'Can\'t scroll below the last page');
		}
	}

	function scrollPagesUp() {
		if(currentPageNumber>1) { // if not on the first page
			removeScrollListeners(); // remove listeners untill the process of sliding is over.
			var $page = $('#page'+(currentPageNumber-1));
			$page.animate({
					marginTop: '0'
			}, 500, addScrollListeners);
			currentPageNumber--;
			console.log('debug', 'Scrolling down, currentPageNumber='+currentPageNumber);
		} else {
			console.log('debug', 'Can\'t scroll above the first page');
		}
	}
