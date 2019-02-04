http://spyoptics.kiev.ua is a simple, minimalistic e-shop, based on CodeIgniter (v2.1.4) php framework.

Installing
----------
You will need a server with:
- php (TODO: version?)
- mysql (TODO: version?)

There's no easy installation, but if you want to try using this code (not recommended :), you can find the file with database structure at application/config/dbInstallScript.sql.

Config
------
Installing or moving to another host you should change following config files:

1.  application/config/constants.php

    Change "URL" constant to the URL where the site is located.
    
2.  assets/js/config/constants.js

    Change "BASE_URL" constant to the URL where the site is located.
    
3.  application/config/database.php
 
    Change user, db name, pass, etc. for mysql.
    
Deploy
------
I use [git-ftp](https://github.com/git-ftp/git-ftp) to deploy.

This means there is a file with the last deployed commit on the server.

To see the last deployed version use:

```
git ftp show # downloads the file with the last deployed commit SHA1 from server, and shows it
```

When you do another commit, you can use `git-ftp` to easily upload via `ftp` only the files which were changed in this commit:

```
git commit -m 'my new commit'
git ftp push 
# 1 file to sync:
# [1 of 1] Buffered for upload 'index.html'.
# Uploading ...
# Last deployment changed to ded01b27e5c785fb251150805308d3d0f8117387.
```

Architecture
------------
The base is CodeIgniter (v2.1.4) php framework + MySql.  
There is also some JS scripts, but no framework is used (only `jQuery`).

### Mobile and Desktop version of the site
CodeIgniter (v2.1.4) helper method is used to determine user device (PC or mobile) and serve different pages to the user.

Pages for desktop are here:
```
/application/views/pc
```
Pages for mobile:
```
/application/views/mobile
```

Some mobile pages, like `application/views/mobile/pages/order.php` just load the `pc` page, since it has responsive design
```
<!-- mobile order page
 -	 Shows order form and cart contents
-->
<?php $this->load->view('pc/pages/order'); ?>
```

### Order processing
Orders are NOT saved anywhere, but only sent to an email... (hope is everything :)
