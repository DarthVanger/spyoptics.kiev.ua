<script>

$(document).ready(function() {
	addListeners();
});

var addListeners = function() {
	console.log('adding onclick listeners');
	$('.orderButton').click(function() {
		addToCart($(this).attr('id'));
	});
	addCartListeners();
}

var addCartListeners = function() {
	$('button.removeItem').click(function() {
		removeItem($(this).attr('id'));
	});
}

var addToCart = function(id) {
	console.log('adding to cart product with id='+id);
	$.ajax({
		url: '<?=site_url()?>'+'/cartcontroller/add/'+id,
		success: function(response) {
			console.log('ajax response: ' + response);
			updateCartHeader();
		}
	});
}

var removeItem = function(id) {
	console.log('removing item');
	$.ajax({
		url: '<?=site_url()?>'+'/cartcontroller/remove/'+id,
		success: function(response) {
			console.log('success! Ajax response: ' + response);
			updateCartHeader();
		}
	});
}

var updateCartHeader = function() {
	console.log('updating cart header');
	$('#cartCount').load(document.URL + ' #cartCount');
	$('#cartContent').load(document.URL + ' #cartContent', addCartListeners); // since DOM is reloaded, listeners should be readded 
}
</script>
