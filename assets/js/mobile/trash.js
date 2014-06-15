
		// Find ids of sunglasses that are inside cart
		var cartDiv = document.getElementById("cart-view");
		var sunglassesInCartContainers = cartDiv.getElementsByClassName("imgContainer");
		for(i=0; i<sunglassesInCartContainers.length; i++) {
			this.sunglassesInCartIds.push( sunglassesInCartContainers[i] );
		}
		console.log("debug", "ShopControls::init: sunglassesInCartIds = " + this.sunglassesInCartIds);	
