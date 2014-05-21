	$(document).ready(function() {
		var validated = false;
		phoneEmpty = "укажите телефон";
		phoneOk = "<img src=\"" + IMG + "validated5.png\" class=\"validation\" />";
		phoneWarning = "<img title=\"Проверьте, пожалуйста, номер телефона. Возможно Вы пропустили цифру.\" src=\""+IMG+"warningIcon.png\" class=\"validation\" />";

		$("#phoneInput").blur(function() {
			var $this = $(this);
			var userPhone = $this.val();
			$phoneValidation = $("#phoneValidation");
			// regex checks if phone has 10 digits, allowing spaces, - and + signs, parentheses.
			var warningRegex = /^(\+\d{2})?(-?\(?\)?\s?\d){10}$/; 
			if(userPhone=="") {
				$phoneValidation.css({opacity: 0});		
				$phoneValidation.html(phoneEmpty);
				$phoneValidation.animate({opacity: 1});
				validated = false;
			} else if(!warningRegex.test(userPhone)) {
				$phoneValidation.css({opacity: 0});		
				$phoneValidation.html(phoneWarning);
				$phoneValidation.animate({opacity: 1});
				validated = true;
				
			}
			else {
				$phoneValidation.css({opacity: 0});		
				$phoneValidation.html(phoneOk);
				$phoneValidation.animate({opacity: 1});
				validated = true;
			}
		});
		$("#orderForm").submit(function(){
			if(validated) {
				return true;
			} else {
				$this = $(this);
				$phoneValidation = $("#phoneValidation");
				$phoneValidation.html(phoneEmpty);
				var speed = 200;
				var loop = setInterval(anim, speed);
				var times = 3;
				function anim() {
					$phoneValidation.animate({color: "black", marginLeft: "5px"}, speed/2, function() {
						$(this).animate({color: "black", marginLeft: "-5px"}, speed/2);
					});
					times--;
					if(times===0) {
						clearInterval(loop);
						setTimeout(function() {$phoneValidation.animate({color: "red", marginLeft: 0}, speed/2);}, speed);
					}
				}
				return false;
			}
		});
	}); 
