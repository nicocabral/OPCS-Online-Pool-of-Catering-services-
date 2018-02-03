<!-- Sweet Alert -->
        <link href="../../../assets/plugins/bootstrap-sweetalert/sweet-alert.css" rel="stylesheet" type="text/css">
<?php 
session_start();

	if(!empty($_FILES)){
		include('../includes/mysql.php');
		//image
                                $image = addslashes(file_get_contents($_FILES['file']['tmp_name']));
                                $image_name = addslashes($_FILES['file']['name']);
                                $image_size = getimagesize($_FILES['file']['tmp_name']);
 								move_uploaded_file($_FILES["file"]["tmp_name"], "../upload/" . $_FILES["file"]["name"]);
                 $location = "upload/" . $_FILES["file"]["name"];
				 $getSid = intval($_SESSION['id']);
			$uploadquery = mysql_query("INSERT INTO tbl_pgallery VALUES(NULL,'$getSid','$location','','',curdate(),'Foods')") or die (mysql_error());
			if($uploadquery == true)
		echo '<script>swal("Success","Upload successfully","success")</script>';
		else 
		echo mysql_error();
		}

?>
<!-- Sweet-Alert  -->
       <script src="../../../assets/plugins/bootstrap-sweetalert/sweet-alert.min.js"></script>