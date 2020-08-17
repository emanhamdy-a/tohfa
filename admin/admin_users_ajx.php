<?php
include("../includes/function.php"); 
$usertyp=user_type();
if(check_login() && $usertyp =='admin')
{}else{header("location:../index.php");} 
?>
<?php  ////
if(isset($_GET['inptid']) && $_GET['inptid'] != ""){$inptid = $_GET['inptid'];}else{$inptid='';}
if(isset($_GET['srch_wrd']) && $_GET['srch_wrd'] != ""){$srch_wrd = $_GET['srch_wrd'];}else{$srch_wrd='0!>o';}
if(isset($_GET['selectct'])) {$order=$_GET['selectct'];}else{$order='all';}//'desc';
if(isset($_GET['selectvw'])) {$nu_view=$_GET['selectvw'];}else{$nu_view=10;};//'desc';
if(isset($_GET['pgntn_nu']) && $_GET['pgntn_nu'] !=''){$pgntn_nu=$_GET['pgntn_nu'];}else{$pgntn_nu= 0;}//'desc';


if($inptid == "show_users"){//////////view users data  ///////////////////////
 ////////////start third validation if 
  $db=connect_to_database();
  //select type of users
  //get num users to view them
  if($order=='all')
  { $query="SELECT * FROM users  LIMIT $pgntn_nu,$nu_view ";
    $qury="SELECT * FROM users";
    //select user by order and limit and user type
  }elseif($order !='all')
       { $query="SELECT * FROM users WHERE usr_typ= '$order' LIMIT $pgntn_nu,$nu_view " ; 
        $qury="SELECT * FROM users WHERE usr_typ= '$order'";
       }
        $result=@mysqli_query($db,$query); 
        $nu_rw=@mysqli_num_rows($result);
        $rslt=@mysqli_query($db,$qury); 
        $nu_row=@mysqli_num_rows($rslt);
      
        $_SESSION['show_area_store']=  $nu_row; 

        if(@mysqli_num_rows($result) > 0) 
        {  
          echo"<div class='row'style='border:solid px red;'>";
          
        ////
          for($div=1 ; $div <= $nu_rw ;$div ++) 
          {
              $row_data = mysqli_fetch_assoc($result);
              $user_id = $row_data['id']; 
              $user_pswrd = $row_data['pasword']; 
              $user_usrnm = $row_data['usernm']; 
              $user_fulnm = $row_data['fulnm']; 
              $user_phonnu = $row_data['phonnu']; 
              $user_email = $row_data['email'];         
              $user_cmpny = $row_data['companam'];         
              $user_adrs = $row_data['adrs'];         
              $user_typ = $row_data['usr_typ'];         
            echo "
                <tr class='count' style=''>
                    <input type='hidden'value='$user_id'>
                    <td ";
                      if($user_typ == 'seler' or $user_typ == 'dress_maker'){
                        echo"style='cursor:pointer;'class='edtusrdta_link'";
                        }
                        echo">$user_id "; 
                      if($user_typ == 'seler' or $user_typ == 'dress_maker'){
                          echo"<i style='color:red;' class='fa fa-pencil'>";
                        }
                          echo"</i>
                    </td>
                    <input type='hidden'value='$user_typ'>
                    <td>$user_usrnm</td>
                    <td>$user_fulnm</td>                        
                    <td>$user_email</td>
                    <td>$user_phonnu</td>
                    <td><span class='status text-success'>&bull;</span> $user_typ</td>
                    <td style='text-align:center;width:155px;padding:0px;'>
                        <a style='font-size:0px;height:0px;'>$user_id</a>
                        <a style='cursor:pointer;' class='viewlink'data-toggle='modal' data-target='#exampleModal2' data-toggle='tooltip'><i class='material-icons' data-toggle='tooltip' title='View'><img  src='img/icon/view.png' alt=''></i></a>
                        <a style='font-size:0px;height:0px;'>$user_id</a>
                        <a style='cursor:pointer;' class='edit_user' data-toggle='modal' data-target='#exampleModaedit'><i class='material-icons' data-toggle='tooltip' title='Edit'><img  src='img/icon/edit.png' alt=''></i></a>
                        <a style='font-size:0px;height:0px;'>$user_id</a>
                        <a style='cursor:pointer;' class='deletlink'  data-toggle='modal' data-target='#exampleModal' ><i class='material-icons' data-toggle='tooltip' title='Delete'><img  src='img/icon/delet.png' alt=''></i></a>
                    </td>
                    <td style='width:0px;padding:0px;'></td>
                </tr>
                ";}
    ////

            echo"</div>"; 
          
          echo"
                <div class='row m-0 mt-5 p-0 col-11'style='border:solid red 0px;position:absolute;'id=''>
                <div class='col-12 p-0 '>
                    <nav aria-label='navigation' style='position:relative;'>
                        <ul class=' pagination justify-content-end p-0 m-0'id='pagntn_area'style=''>";
                            $i=0;
                            for( $ii=0 ; $ii < $nu_row ; $ii+=$nu_view)
                            { 
                                $i+=1;
                                if($ii == $pgntn_nu)
                                {
                                    echo"<li class='page-item active'><button class='page-link pagenation' value='$ii'>0$i.</button></li>";//categories.php?select={$order}&nu={$ii}&cid={$cat_id}&select2={$nu_view}'>0$i.</a></li> ";
                                }
                                else
                                {
                                    echo"<li class='page-item '><button class='page-link pagenation' value='$ii'>0$i.</button></li>";//categories.php?select={$order}&nu={$ii}&cid={$cat_id}&select2={$nu_view}'>0$i.</a></li> ";
                                }
                            }

                  echo"</ul>
                    </nav>
                </div>
            </div>
              "; 
        }
        if(@mysqli_num_rows($result) < 1){echo"<div id='eror_msg'style='position:absolute;bottom:42px;margin:auto;' class='col-11 row mt-2 mr-0 ml-0  alert alert-danger'>You have no users here ...</div>";
        }                                  
    
 ////////////end third validation if 

 ////////////end 4th validation if     
}elseif($inptid == "deletuser"){//////////delete prdct////////////////////////////
 if($usertyp == 'admin'){
    $db = connect_to_database();
    $user=$_GET['uid']; 
   /**/ $result = @mysqli_query($db, "SELECT `id`,`image` from prdct WHERE `userid`=$user") ;  
    $num_row=@mysqli_num_rows($result);
    for($x=1 ; $x <= $num_row ;$x ++){
      $row = mysqli_fetch_assoc($result);
      $prdct_id = $row['id'];
      $img = $row['image'];
      $img ="../$img";
      unlink($img);
      $resolt = @mysqli_query($db, "SELECT `img` from prdct_imgs WHERE prdct_id=$prdct_id") ;  
      $nu_rw=@mysqli_num_rows($resolt);
      if(@mysqli_num_rows($resolt) > 0){  
        for($div=1 ; $div <= $nu_rw ;$div ++){
          $row_data = mysqli_fetch_assoc($resolt);
          $img_id = $row_data['img'];
          $img_id = "../$img_id";
          unlink($img_id);
          }
      }
    }
    $rslt = @mysqli_query($db, "SELECT `img` from orders WHERE `user_id`=$user") ;  
    $nm_rw=@mysqli_num_rows($rslt);
    for($i=1 ; $i <= $nm_rw ;$i ++){
      $row_dt = @mysqli_fetch_assoc($rslt);
      $imge = $row_dt['img'];
      $imge ="../$imge";
      unlink($imge);
    }
      
      $query="DELETE FROM `users` WHERE id=$user";
      $result=@mysqli_query($db,$query);/**/
 } 
}elseif($inptid == "show_result"){/////////echo show results///////////////////////
 ////////////start 5th validation if 
  $count=$_GET['show_result'];
  $count= intval($count) + intval($pgntn_nu);
  if($count > 0)
    {
      $pgntn_nu = intval($pgntn_nu) + 1;
    }else{ 
      $pgntn_nu = intval($pgntn_nu);
    }
    echo"Show " .  $pgntn_nu . " - " .  $count . " OF " . $_SESSION['show_area_store'] . " User";
    ////////////end 5th validation if 
}elseif($inptid == "search_for_user"){

  ////////////////search///////////////
  $db=connect_to_database();
  //select type of users

  if ($order=='all') {/////////search for user by name//////////
    $query="SELECT * FROM users WHERE (usernm LIKE '%$srch_wrd%' OR fulnm LIKE '%$srch_wrd%')  order by id asc LIMIT $pgntn_nu,$nu_view";  
    $qury ="SELECT * FROM users WHERE (usernm LIKE '%$srch_wrd%' OR fulnm LIKE '%$srch_wrd%')";
    //select user by order and limit and user type
  }elseif($order !='all'){
      $query="SELECT * FROM users WHERE usr_typ= '$order' AND (usernm LIKE '%$srch_wrd%' OR fulnm LIKE '%$srch_wrd%')  order by id asc LIMIT $pgntn_nu,$nu_view" ; 
      $qury ="SELECT * FROM users WHERE usr_typ= '$order' AND (usernm LIKE '%$srch_wrd%' OR fulnm LIKE '%$srch_wrd%')";
      }/**/
        $result=@mysqli_query($db,$query); 
        $nu_rw=@mysqli_num_rows($result);
        $rslt=@mysqli_query($db,$qury); 
        $nu_row=@mysqli_num_rows($rslt);
        $_SESSION['show_area_store']=  $nu_row; 

        if(@mysqli_num_rows($result) > 0) 
        {  
          echo"<div class='row'style='border: solid 0px black;'>";
          
        ////
          for($div=1 ; $div <= $nu_rw ;$div ++) 
          {
              $row_data = mysqli_fetch_assoc($result);
              $user_id = $row_data['id']; 
              $user_pswrd = $row_data['pasword']; 
              $user_usrnm = $row_data['usernm']; 
              $user_fulnm = $row_data['fulnm']; 
              $user_phonnu = $row_data['phonnu']; 
              $user_email = $row_data['email'];         
              $user_cmpny = $row_data['companam'];         
              $user_adrs = $row_data['adrs'];         
              $user_typ = $row_data['usr_typ'];         
            echo "
                <tr class='count' style=''>
                    <input type='hidden'value='$user_id'>
                    <td ";
                      if($user_typ == 'seler' or $user_typ == 'dress_maker'){
                        echo"style='cursor:pointer;'class='edtusrdta_link'";
                        }
                        echo">$user_id "; 
                      if($user_typ == 'seler' or $user_typ == 'dress_maker'){
                          echo"<i style='color:red;' class='fa fa-pencil'>";
                        }
                          echo"</i>
                    </td>
                    <input type='hidden'value='$user_typ'>
                    <td>$user_fulnm</td>                        
                    <td>$user_email</td>
                    <td>$user_phonnu</td>
                    <td><span class='status text-success'>&bull;</span> $user_typ</td>
                    <td style='text-align:center;width:155px;padding:0px;'>
                        <a style='font-size:0px;height:0px;'>$user_id</a>
                        <a style='cursor:pointer;' class='viewlink'data-toggle='modal' data-target='#exampleModal2' data-toggle='tooltip'><i class='material-icons' data-toggle='tooltip' title='View'><img  src='img/icon/view.png' alt=''></i></a>
                        <a style='font-size:0px;height:0px;'>$user_id</a>
                        <a style='cursor:pointer;' class='edit_user' data-toggle='modal' data-target='#exampleModaedit'><i class='material-icons' data-toggle='tooltip' title='Edit'><img  src='img/icon/edit.png' alt=''></i></a>
                        <a style='font-size:0px;height:0px;'>$user_id</a>
                        <a style='cursor:pointer;' class='deletlink'  data-toggle='modal' data-target='#exampleModal' ><i class='material-icons' data-toggle='tooltip' title='Delete'><img  src='img/icon/delet.png' alt=''></i></a>
                    </td>
                    <td style='width:0px;padding:0px;'></td>
                </tr>
                ";}
    ////

            echo"</div>"; 
          
          echo"
                <div class='row m-0 mt-5 p-0 col-11'style='border:solid red 0px;position:absolute;'id=''>
                <div class='col-12 p-0 '>
                    <nav aria-label='navigation' style='position:relative;'>
                        <ul class=' pagination justify-content-end p-0 m-0'id='pagntn_area'style=''>";
                            $i=0;
                            for( $ii=0 ; $ii < $nu_row ; $ii+=$nu_view)
                            { 
                                $i+=1;
                                if($ii == $pgntn_nu)
                                {
                                    echo"<li class='page-item active'><button class='page-link pagenation' value='$ii'>0$i.</button></li>";//categories.php?select={$order}&nu={$ii}&cid={$cat_id}&select2={$nu_view}'>0$i.</a></li> ";
                                }
                                else
                                {
                                    echo"<li class='page-item '><button class='page-link pagenation' value='$ii'>0$i.</button></li>";//categories.php?select={$order}&nu={$ii}&cid={$cat_id}&select2={$nu_view}'>0$i.</a></li> ";
                                }
                            }

                  echo"</ul>
                    </nav>
                </div>
            </div>
              "; 
        }
        if(@mysqli_num_rows($result) < 1){echo"<div id='eror_msg'style='position:absolute;bottom:42px; margin:auto;' class='col-11 row mt-2 mr-0 ml-0  alert alert-danger'>You Have No Users With this Name ...</div>";
        }         
  ////////////////search///////////////

}
?>