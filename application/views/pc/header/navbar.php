<!-- header/navbar view
 -
 -	 This view is a horizontal navigation bar.
 -	 It is a part of the page header.
 -
-->

<!-- 
 -   Shop is closing! So hiding the navbar, and saying
 -   "shop is closed" instead, on a red background :(
 -
 -   Code for the real header is below, commented out.
 - 
 -   @date 2019-02-03
 -   @author darthvanger@gmail.com
-->
<div id="topNavbar">
  <div id="topLine" style="background-color: red;"></div>
  <div style="text-align: center;text-transform: uppercase; height: 100%; font-size: 20px; line-height: 50px; width: 100%; font-weight: bold; color: white; background-color: white; background-color: red;">
    Заказы не принимаются! Магазин не функциклирует! Сорян :)
  </div>
</div>

<!-- 
 -   This is the real and working header, which is commented out due
 -   to shop closing :(
 -   The "shop is closed" text is shown instead - see code above.
 -   If you want to revive the shop, delete <div id="topNavbar"> above,
 -   and uncomment this one.
 -
 -   @date 2019-02-03
 -   @author darthvanger@gmail.com
-->
<!--
<div id="topNavbar">
    <div id="topLine"></div>
    <div class="navbar">
      <a href="<?=URL?>">Spyoptic</a>
      <a href="<?=URL?>shop/loadSimplePage/about-glasses">описание</a>
      <a href="<?=URL?>shop/order">заказать</a>
      <a href="<?=URL?>shop/loadSimplePage/delivery">доставка</a>
      <a href="<?=URL?>shop/loadSimplePage/contact">контакты</a>
      <a href="<?=URL?>blog">блог</a>
    </div>
</div>
-->
