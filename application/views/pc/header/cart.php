<!-- header/cart view
 -
 -	 This view is absolutely positioned cart in the top right corner of the page.
 -	 It is a part of the page header.
 -
-->

<?php if(!isset($hideHeaderCart) || !$hideHeaderCart): ?>
    <!-- CartAjax sources -->
    <!-- depends on jquery (assuming it was already included) -->
        <script src="<?=JS?>cart/CartAjax.js" type="text/javascript"></script> 
        <script>
            $(document).ready(function() {
                var cartAjax = new CartAjax();
                cartAjax.initListeners({
                    cartId: "cartContentAndSummary",
                    addItemButtonClass: "orderButton",
                    removeItemButtonClass: "removeItem"
                });
            });
        </script>
    <!-- END CartAjax sources -->

    <!-- cart is absolutely positioned block -->
    <div id="cart" class="cart">
            <div id="cartContentAndSummary"> 
                <?php if(!empty($cart['content'])): ?>
                    <div id="cartContent">
                        <?php foreach($cart['content'] as $item):?>
                            <div class="item">
                                <div class="imgContainer">
                                    <img src="<?=IMG?><?=$item['thumbnail_img_path']?>" class="sunglasses" />
                                    <a href="javascript: void(0)" class="removeItem" id="<?=$item['id']?>"><img src="<?=IMG?>removeItemH20.png" /></a>
                                    <div class="price"><?=$item['price']?></div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="summary">
                        &Sigma; = <?=$cart['totalPrice']?> грн
                    </div>
                <?php endif; ?>
            </div>

        <a href="<?=site_url('/shop/order')?>">
          <div class="makeOrder">
            оформить <br />
            заказ
          </div>
          <div id="cartImgContainer" >
            <img class="cart" src="<?=IMG?>cart1_blue.png" />
            <img class="cartHover" src="<?=IMG?>cart1_red.png" />
          </div>
        </a>
    </div>
<?php endif; ?>
