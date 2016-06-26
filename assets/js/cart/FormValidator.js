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
		console.log('addValidationListeners');
	}


	/** addValidationListeners
	 *	Adds validation listeners to text inputs and submit button.
	 */
	// FormValidator.addValidationListeners = function() {
	// 	// check if validation is ok on submit
	// 	$("#" + formId).submit(function(){
	// 		validateRequiredFields();
	// 		validateCases();
	// 		if(validated) {
	// 			return true;

	// 		} else {
	// 			FormValidator.animateValidationErrors();
	// 			return false;
	// 		}
	// 	});
	//}
