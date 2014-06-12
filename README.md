Description of the project
--------------------------

This project is a simple, minimalistic e-shop, based on CodeIgniter php framework.

Libraries and tools used in the project
---------------------------------------

CodeIgniter (http://ellislab.com/codeigniter): php framework implementing MVC pattern, providing libraries for Mysql use, etc.

FlexSlider (http://www.woothemes.com/flexslider/): javascript image slider.

jquery-mousewheel (https://github.com/brandonaaron/jquery-mousewheel): jquery plugin that adds mousewheel support. It is used to catch mousewheel actions and animate vertical page sliding instead of usual scrolling.

jquery.mobile.touch: official jquery library for touch events.

jquery.mobile.touch patch adding "swipeup" and "swipedown" events (http://developingwithstyle.blogspot.com/2010/11/jquery-mobile-swipe-up-down-left-right.html).

Config
------

Installing or moving to another host you should change following config files:
1) application/config/constants.php
Change "URL" constant to the URL where the site is located.
2) assets/js/config/constants.js
Change "BASE_URL" constant to the URL where the site is located.
3) application/config/database.php
Change user, db name, pass, etc. for mysql.

Installing
----------

Easy installing is not developed yet, but what you can try to do is:
1) Create database using script at application/config/dbInstallScript.sql.
2) Change the config files as described in "Config" section of this readme.
3) Copy folder with photos of sunglasses that you want to display on site to assets/img/.
Open application/models/imagedbprocessor.php, find "addToDbByImages" method, edit its config section (at the very beginning of the method): set name of the folder where you images are located, model name of sunglasses, price, css_class etc.
Then visit /index.php/imageDbProcessorController/addToDbByImages/. This will call the method you were editing and add all the images from folder you specified with prices, modelName, and other stuff you specified in model's method.

After this and some debugging :) you should see your photos shown by flexslider on the index page of the site.
