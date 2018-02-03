<?php 

$getcatId = intval($_GET['catId']);
$getOname = mysql_real_escape_string(trim($_GET['ordername']));
$getPrice = intval($_GET['orderprice']);
$getQty = intval($_GET['orderQty']);
$getCustname = mysql_real_escape_string(trim($_GET['customerName']));
$getCustno = mysql_real_escape_string(trim($_GET['customerNo']));
$getCustadd = mysql_real_escape_string(trim($_GET['customerAddress']));
$getMsg = mysql_real_escape_string(trim($_GET['customerMsg']));
$getDatep = stripslashes($_GET['orderDate']);
$getTimep = mysql_real_escape_string(trim($_GET['orderTime']));
$getOp = mysql_real_escape_string(trim($_GET['orderType']));

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
			include('../includes/connection.php');
			$query = "INSERT INTO tbl_orders VALUES(NULL,'$getcatId','$getOname','$getPrice','$getQty','$getCustname','$getCustno','$getCustadd','$getMsg','$getDatep','$getOp','New',NULL,'$getTimep')";
			$res = mysql_query($query) or die (mysql_error());
			if($res == true){
				echo 'Order send successfully. Thanks for visiting our site.We will contact you for confirmation Thank you!';
				}
				else {
					echo mysql_error();
					}
			
			}

?>