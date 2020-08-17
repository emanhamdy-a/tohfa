<?php include("../includes/function.php"); 
 $usertyp=user_type();
 if(check_login())
 {}else{header("location:../index.php");} 
?>
<?php
    $prdct_id=$_GET['pid'];//5;
    $user_id=user_id();
    $db=connect_to_database();
    $sql="SELECT `prdct_id`, `userid` FROM `favorit` WHERE prdct_id=$prdct_id AND userid=$user_id";
    $reslt=@mysqli_query($db,$sql);
    $nu_rw=@mysqli_num_rows($reslt);
    if($nu_rw < 1)
    {
      $query="INSERT INTO `favorit`(`prdct_id`, `userid`) VALUES ($prdct_id,$user_id)";
      $result=@mysqli_query($db,$query);
       echo"
       <div id='$prdct_id'class='ad_fvrt icon'style='cursor:pointer;color:darkorange;font-weight:1000;font-size:28px;'>
       <i class='icon_heart_alt'></i>
       </div>";
    }else{
      $query="DELETE FROM `favorit` WHERE prdct_id=$prdct_id AND userid = $user_id";
      $result=@mysqli_query($db,$query);
      echo"
      <div id='$prdct_id'class='ad_fvrt icon'style='cursor:pointer;font-weight:1000;font-size:28px;'>
      <i class='icon_heart_alt'></i>
      </div>";
    }
?>