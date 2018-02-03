<?php session_start();
include('../includes/mysql.php');
$getName = mysql_real_escape_string(trim($_POST['name_des']));
$getPrice =intval($_POST['name_price']);
	//image
                                $image = addslashes(file_get_contents($_FILES['file']['tmp_name']));
                                $image_name = addslashes($_FILES['file']['name']);
                                $image_size = getimagesize($_FILES['file']['tmp_name']);
 								move_uploaded_file($_FILES["file"]["tmp_name"], "../images/" . $_FILES["file"]["name"]);
                 $location = "images/" . $_FILES["file"]["name"];
if(empty($getName)){
	echo 'Please enter name/description';
	}
	else if(empty($getPrice)) {
		echo 'Please enter price';
		}
	else if(empty($image)) {
		echo 'Please enter image';
		}
		else {
				$query = mysql_query("SELECT * FROM tbl_adOn WHERE addOn_name = '$getName' AND addOn_catID = '".$_SESSION['id']."'")
				or die (mysql_error());
				if(mysql_num_rows($query)>0){
					echo 'Name/description is already save';
					}else {
						$querysql = mysql_query("INSERT INTO tbl_adOn VALUES(NULL,'$getName','$location','$getPrice','Available','".$_SESSION['id']."')") or die (mysql_error());
						if($querysql==true){
							echo 'Save successfully!';
							}
							else {
								echo mysql_error();
								}
						}
				}
	
?>