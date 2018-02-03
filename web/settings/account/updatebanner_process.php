<?php 
session_start();
	if(!empty($_FILES)){
		include('includes/mysql.php');
		//image
                                $image = addslashes(file_get_contents($_FILES['file']['tmp_name']));
                                $image_name = addslashes($_FILES['file']['name']);
                                $image_size = getimagesize($_FILES['file']['tmp_name']);
 								move_uploaded_file($_FILES["file"]["tmp_name"], "avatar/" . $_FILES["file"]["name"]);
                 $location = "avatar/" . $_FILES["file"]["name"];
				 $getSid = intval($_SESSION['id']);
			$uploadquery = mysql_query("UPDATE tbl_catererinfo SET c_avatar='$location' WHERE cid = '".$_SESSION['id']."'") or die (mysql_error());
			if($uploadquery == true)
		{
			header("location:mwp");}
		else 
		echo mysql_error();
		}
		else {
			echo 'Please select profile photo';}

?>