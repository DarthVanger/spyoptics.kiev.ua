/** GoogleAnalyticsAPI class UNDER DEVELOPMENT
 * 
 *  This class is used to communicate with Google Analytics API.
 *  Sends notification to google analytics about custom events.
 *  Events are like: product sold, etc. 
 */ 

var GoogleAnalyticsAPI = function() {

  /** placeOrder
   *  Places order to google analytics using ecommerce plugin API
   *
   *  @param cartItems array of JSON items that were purchased
   *  @param totalPrice total price of order
   *
   *  @return void
   */
  this.placeOrder = function(cartItems, totalPrice) {
    console.log('debug', 'GoogleAnalyticsAPI::placeOrder() called');

    // require ecommerce plugin
    ga('require', 'ecommerce', 'ecommerce.js');

    // orders database is not yet developed,
    // so setting just random id, for google analytics to work
    var transactionId = Math.floor((Math.random() * 10000) + 1);

    var transactionData = {
      'id': transactionId,
      'affiliation': 'Spy Optic Kiev',
      'revenue': totalPrice
    };
    console.log('debug', 'GoogleAnalyticsAPI: transaction data: ' + JSON.stringify(transactionData));
    ga('ecommerce:addTransaction', transactionData)

    for(i=0; i<cartItems.length; i++) { 
      var item = cartItems[i];
      var itemData = {
        'id': transactionId,
        'productId': item.id,
        'name': item.model + ' ' + item.color,
        'price': item.price
      };
      console.log('debug', 'GoogleAnalyticsAPI: item data: ' + JSON.stringify(itemData));
     ga('ecommerce:addItem', itemData);
    }

    ga('ecommerce:send');
  }
}
