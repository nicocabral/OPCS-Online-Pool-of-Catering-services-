<?php 
if(isset($_POST['saveOrder'])){
include('../includes/connection.php');
$getcatId = intval($_POST['catId']);
$getOname = mysql_real_escape_string(trim($_POST['ordername']));
$getPrice = intval($_POST['orderprice']);
$getQty = intval($_POST['orderQty']);
$getCustname = mysql_real_escape_string(trim($_POST['customerName']));
$getCustno = mysql_real_escape_string(trim($_POST['customerNo']));
$getCustadd = mysql_real_escape_string(trim($_POST['customerAddress']));
$getMsg = mysql_real_escape_string(trim($_POST['customerMsg']));
$getDatep = stripslashes($_POST['orderDate']);
$getTimep = mysql_real_escape_string(trim($_POST['orderTime']));
$getOp = mysql_real_escape_string(trim($_POST['orderType']));
	
	if (empty($getQty)){
		echo 'Please enter order qty';
		}
	else if (empty($getCustname)){
		echo 'Please enter your valid name';
		}
	else if (empty($getCustno)){
		echo 'Please enter your valid contact no';
		}
	else if (empty($getCustadd)){
		echo 'Please enter your valid address';
		}
	else if (empty($getDatep)){
		echo 'Please enter a valid date';
		}
	else if (empty($getTimep)){
		echo 'Please enter a valid time';
		}
	else if (empty($getOp)){
		echo 'Please select order payment';
		}
		else {
			$query = "INSERT INTO tbl_orders VALUES(NULL,'$getcatId','$getOname','$getPrice','$getQty','$getCustname','$getCustno','$getCustadd','$getMsg','$getDatep','$getOp','New',NULL,'$getTimep')";
			$res = mysql_query($query) or die (mysql_error());
			if($res == true){
				echo 'Order send successfully. Thanks for visiting our site.We will contact you for confirmation Thank you!';
				}
				else {
					echo mysql_error();
					}
			
			}
}
	
?>