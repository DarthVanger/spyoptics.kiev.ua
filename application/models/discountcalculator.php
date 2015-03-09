<?php

/** DiscountCalculator class
 *
 *	Class for calculating discounts
 *	
 *	@author DarthVanger
 */

class DiscountCalculator extends CI_Model {

	function __construct() {
		parent::__construct();
	}

    /**
     * @param Basket $basket Basket instance with items to calculate discount.
     * @return Basket $basket Basket with items having prices with discount applied.
     */
    public function applyDiscountsToBasket($basket) {
        $items = $basket->getItems();
        if (!empty($items)) {
            $items = $this->applyDiscountsToItems($items);
        }
        $basket->setItems($items);
        return $basket;
    }

    /**
     * @param array $items Array of cart items
     */
    public function applyDiscountsToItems($items) {
        if (empty($items)) return $items;

        $i = 1;
        foreach ($items as $item) {
            $discount = 0;
            switch ($i) { // The more products you have in the cart, the more discount you get
                // no discount for 1st product in the cart
                case 1:
                    $discount = 0;
                    break;
                // 15% discount for 2nd product in the cart
                case 2:
                    $discount = 0.15 * $item['price'];
                    break;
                // 20% discount for 3rd product the cart
                case 3:
                    $discount = 0.20 * $item['price'];
                    break;
                // and so on
                case 4:
                    $discount = 0.23 * $item['price'];
                    break;
                case 5:
                    $discount = 0.25 * $item['price'];
                    break;
                default:
                    $discount = 0.3 * $item['price'];
                    break;
            }
            $item['price'] = ceil($item['price'] - $discount);
            $itemsWithDiscount[] = $item;

            $i++;
        }

        return $itemsWithDiscount; 
    }

}
