/** FormValidator class
 *
 *	Adds interactive form validation to #orderForm of cart/order view.
 *
 *	Disables form submitting, if 'phone' field is empty or contains no digits.
 *	Draws warning sign if 'phone' field has not standard amount of digits.
 *	Draws "ok" sign if 'phone' field is ok.
 *
 */

var FormValidator = function(){};

	/* Ids of html elements for validation */
	var formId = "orderForm";
	var phoneInputId = "phoneInput";
	var phoneValidationMessageDivId = "phoneValidation";

	/* validation result signs/phares/pictures */
	var validated = false;
	var phoneEmpty = "Пожалуйста, укажите номер телефона.";
	var noDigits = "В номере телефона нет цифр. Пожалуйста, исправте номер телефона.";
	var phoneOk = "<img src=\"" + IMG + "validated5.png\" class=\"validation\" />";
	var phoneWarning = "<img title=\"Проверьте, пожалуйста, номер телефона. Возможно Вы пропустили цифру.\" src=\""+IMG+"warningIcon.png\" class=\"validation\" /> Перепроверьте, пожалуйста, номер телефона. Возможно, Вы пропустили цифру.";

	/* validation regular expressions */

	// checks if phone has 10 digits, allowing spaces, - and + signs, parentheses.
	var phoneWarningRegex = /^(\+\d{2})?(-?\(?\)?\s?\d){10}$/; 

	// checks if phone contains at least one digit
	var phoneContainsDigitsRegex = /^.*\d+.*$/; 

	/* methods */

	/** init
	 *	Adds validation listeners to text inputs and submit button.
	 */
	FormValidator.init = function() {
		FormValidator.addValidationListeners();
	}


	/** addValidationListeners
	 *	Adds validation listeners to text inputs and submit button.
	 */
	FormValidator.addValidationListeners = function() {
		// check entered phone on blur
		$("#" + phoneInputId).blur(function() {
			FormValidator.validatePhone();
		});

		// check if validation is ok on submit
		$("#" + formId).submit(function(){
			if(validated) {
				return true;
			} else {
				FormValidator.animateValidationErrors();
				return false;
			}
		});
	}

	/** validatePhone
	 *	Checks if phone is valid and displays ok/wrong messages.
	 */
	 FormValidator.validatePhone = function() {
		var userPhone = $("#" + phoneInputId).val();
		$phoneValidation = $("#phoneValidation");
		if(userPhone=="") {
			console.log("debug", "phone empty");
			$phoneValidation.css({opacity: 0});		
			$phoneValidation.html(phoneEmpty);
			$phoneValidation.animate({opacity: 1});
			validated = false;
		} else if(!phoneContainsDigitsRegex.test(userPhone)) {
			console.log("debug", "phone contains no digits");
			$phoneValidation.css({opacity: 0});		
			$phoneValidation.html(noDigits);
			$phoneValidation.animate({opacity: 1});
			validated = false;
		} else if(!phoneWarningRegex.test(userPhone)) {
			console.log("debug", "phone warning");
			$phoneValidation.css({opacity: 0, color: "black"});		
			$phoneValidation.html(phoneWarning);
			$phoneValidation.animate({opacity: 1});
			validated = true;
		} else {
			console.log("debug", "phone ok");
			$phoneValidation.css({opacity: 0});		
			$phoneValidation.html(phoneOk);
			$phoneValidation.animate({opacity: 1});
			validated = true;
		}
	}

	/** animateValidationErros
	 *	Animates validation errors in order to catch user's eye on them.
	 */
	 FormValidator.animateValidationErrors = function() {
		var times = 3;
		var speed = 200;
		function validationNotPassedAnimation() {
			$phoneValidation.animate({color: "black", marginLeft: "5px"}, speed/2, function() {
				$(this).animate({color: "black", marginLeft: "-5px"}, speed/2);
			});
			times--;
			if(times===0) {
				clearInterval(loop);
				setTimeout(function() {$phoneValidation.animate({color: "red", marginLeft: 0}, speed/2);}, speed);
			}
		}

		$phoneValidation = $("#" + phoneValidationMessageDivId);
		if($phoneValidation.html() == "" || $phoneValidation.html() == "&nbsp;") {
			$phoneValidation.html(phoneEmpty);
		}
		var loop = setInterval(validationNotPassedAnimation, speed);
	}
