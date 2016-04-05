<link href="<?=CSS?>admin/pages/upload-people-photos.css" rel="stylesheet" type="text/css" />

<h2>Upload people photos</h2>

<!--
<br />
----------------- log ------------------<br />
<?php var_dump($message); ?> <br /> 
----------------------------------------
<br />
-->

<form method="post" action="<?=site_url()?>/admin/savePeoplePhoto" enctype="multipart/form-data">
    <br />
	<input  type="file" name="userfile" /> <br />
	<br />
	<input class="button2" type="submit" value="submit" />
</form>
