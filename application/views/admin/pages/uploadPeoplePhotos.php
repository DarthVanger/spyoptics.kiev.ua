<link href="<?=CSS?>admin/pages/upload-people-photos.css" rel="stylesheet" type="text/css" />

<h2>Upload people photos</h2>

----------------- log ------------------<br />
<?php var_dump($message); ?> <br /> 
----------------------------------------
<br />
<form method="post" action="<?=site_url()?>/admin/savePeoplePhoto" enctype="multipart/form-data">
	<input  type="file" name="userfile" /> <br />
	<?php foreach($sunglasses as $sunglass): ?>
		<span class="sunglasses">
			<input type="radio" name="sunglassesId" value="<?=$sunglass['id']?>" />
			<img class="sunglasses" src="<?=IMG.$sunglass['thumbnail_img_path']?>" />
		</span>
	<?php endforeach; ?>
	<br />
	<input class="awesome button" type="submit" value="submit" />
</form>
