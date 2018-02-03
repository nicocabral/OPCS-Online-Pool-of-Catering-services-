<?php session_start();
include('../includes/mysql.php');
$getfo = mysql_real_escape_string($_POST['fo']);
$getfc = mysql_real_escape_string($_POST['fc']);
//image
                                $image = addslashes(file_get_contents($_FILES['file']['tmp_name']));
                                $image_name = addslashes($_FILES['file']['name']);
                                $image_size = getimagesize($_FILES['file']['tmp_name']);
						//
 								 move_uploaded_file($_FILES["file"]["tmp_name"], "../images/" . $_FILES["file"]["name"]);
                                $location = "images/" . $_FILES["file"]["name"];
if(empty($getfo)){
	echo 'Please enter food name';
}
else if(empty($getfc)){
	echo 'Please enter food category';
}else {
	$query = mysql_query("INSERT INTO tbl_foodoffered VALUES(NULL,'$getfo','$getfc','$location','".$_SESSION['id']."')") or die (mysql_error());
}?>