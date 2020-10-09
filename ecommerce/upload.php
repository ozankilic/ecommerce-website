<?php
	try{
	if ($_FILES["file"]["type"] == "image/gif" || $_FILES["file"]["type"] == "image/jpeg" || $_FILES["file"]["type"] == "image/pjpeg" || $_FILES["file"]["type"] == "image/png") 
		{
	    move_uploaded_file($_FILES['file']['tmp_name'], 'images/shop/' . $_FILES['file']['name']);
		$resim='images/shop/'.$_FILES["file"]["name"];
		echo $resim;
		}
		else{
		throw new Exception('Hata');
		}
      	}
		catch(Exception $e)
		{echo 'Hata';}
?>