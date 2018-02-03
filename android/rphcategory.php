 <?php include('database.php');
 $getfilter = mysql_real_escape_string($_GET['filter']);
                $listquery = mysql_query("SELECT * FROM tbl_foodoffered WHERE mycaterer_id = '".intval($_GET['id'])."' AND food_category = '$getfilter' order by food_offered") or die (mysql_error());
                if(mysql_num_rows($listquery)>0){
                while($listrow = mysql_fetch_array($listquery)){?>
               
    <tr style="border:1px;" onclick='addtomenulist("<?php echo $listrow['food_offered']?>")'>
        <td><p><i class="fa fa-cutlery" style="color:green;"></i><?php echo $listrow['food_offered'];?></p><hr></td>
    </tr>
                <?php }}else {
                  include('database.php');  
                    $listquery2 = mysql_query("SELECT * FROM tbl_foodoffered WHERE mycaterer_id = '".intval($_GET['id'])."' order by food_offered") or die (mysql_error());
                    while($row = mysql_fetch_array($listquery2)){
                        ?>
                        <tr style="border:1px;" onclick='addtomenulist("<?php echo $row['food_offered']?>")'>
                         <td><p><i class="fa fa-cutlery" style="color:green;"></i><?php echo $row['food_offered'];?></p><hr></td>
    </tr>
                        <?php 
                    }
                } ?>