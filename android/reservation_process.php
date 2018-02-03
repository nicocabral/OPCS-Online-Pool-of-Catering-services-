<?php 
    $message = array();
    include('database.php');
    $getCid = intval($_GET['cid']);
    $getCname = mysql_real_escape_string(trim($_GET['cname']));
    $getM = intval($_GET['m']);
    $getD = intval($_GET['d']);
    $getY = intval($_GET['y']);
    $getTh = intval($_GET['th']);
    $getMins = $_GET['mins'];
    $getType = mysql_real_escape_string($_GET['type']);
    $time = $getTh.':'.$getMins.''.$getType;
    $getAddress = mysql_real_escape_string($_GET['add']);
    $getEmail = mysql_real_escape_string($_GET['email']);
    $getNo = mysql_real_escape_string($_GET['no']);
    $getMsg = mysql_real_escape_string(trim($_GET['msg']));
    $getpno = intval($_GET['pno']);
    $getprice = intval($_GET['price']);
    $getoid = intval($_GET['oid']);
    if(empty($getCname)){
        echo 'Please enter reservation name';
    }
    else if(empty($getAddress)){
        echo 'Please enter a valid address';
    }
    else if(empty($getEmail)){
        echo 'Please enter your email';
    }
    else if(empty($getNo)){
        echo 'Please enter a valid contact';
    }
    else if(empty($getMsg)){
        echo 'Please leave us a message for instruction and others. Thank you';
    }
    else {
        $sql = "INSERT INTO tbl_reservation VALUES(NULL,'$getCid','$getCname','$getM','$getD','$getY','$time','$getAddress','$getEmail','$getNo','New','$getMsg','$getpno','$getpno','$getprice','$getoid')";
        $res = mysql_query($sql) or die (mysql_error()); 
        if($res == true){
            echo 'success';
        }else {
            echo  mysql_error();
        }
        }