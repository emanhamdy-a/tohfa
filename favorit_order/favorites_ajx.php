<?php
include("../includes/function.php"); 
$usertyp=user_type();

?>
<?php  ////catName and ctid is used if there is no sub category to fill sub select
if(isset($_GET['catName']) && $_GET['catName'] != ""){$catName_vl = $_GET['catName'];}else{$catName_vl=' ';}
if(isset($_GET['ctid']) && $_GET['ctid'] != ""){$ctid_vl = $_GET['ctid'];}else{$ctid_vl='0';}
if(isset($_GET['inptvl']) && $_GET['inptvl'] != ""){$inptvl = $_GET['inptvl'];}else{$inptvl=' ';}

if(isset($_GET['inptid']) && $_GET['inptid'] != ""){$inptid = $_GET['inptid'];}else{$inptid='mjhgd';}
if(isset($_GET['selectct'])) {$order=$_GET['selectct'];}else{$order='all';}//'desc';
if(isset($_GET['selectvw'])) {$nu_view=$_GET['selectvw'];}else{$nu_view=6;};//'desc';
if(isset($_GET['pgntn_nu']) && $_GET['pgntn_nu'] !=''){$pgntn_nu=$_GET['pgntn_nu'];}else{$pgntn_nu= 0;}//'desc';

if($inptid == "show_favorts"){//////////////view user favorites///////////////
 ////////////start third validation if 
 if(check_login() && $usertyp =='byer' || $usertyp =='admin' )
 {}else{header("location:../index.php");}
  $db=connect_to_database();
  //get user id
  $user_id=user_id();
  //select prdct by order and limit and catnm
 if($order=='all')
  {  $query="SELECT * FROM prdct WHERE id = ANY (SELECT prdct_id FROM favorit WHERE userid = $user_id) LIMIT $pgntn_nu,$nu_view ";
     $qury="SELECT * FROM prdct WHERE id = ANY (SELECT prdct_id FROM favorit WHERE userid = $user_id)";
  }else{ $query="SELECT * FROM prdct WHERE id = ANY (SELECT prdct_id FROM favorit WHERE userid = $user_id) AND cat_id=$order LIMIT $pgntn_nu,$nu_view " ; 
         $qury ="SELECT * FROM prdct WHERE id = ANY (SELECT prdct_id FROM favorit WHERE userid = $user_id) AND cat_id=$order ";
      }
        $result=@mysqli_query($db,$query); 
        $nu_rw=@mysqli_num_rows($result);
        $rslt=@mysqli_query($db,$qury); 
        $nu_row=@mysqli_num_rows($rslt);
        $num_rows=@mysqli_num_rows($result);
        $_SESSION['show_area_fvrt']=  $nu_row;   

      if($num_rows > 0) 
      {  
        echo"<div class='row pb-2'style='border:solid 0px red;'id='prdct_cntnr'>";
        
        for($div=1 ; $div <= $nu_rw ;$div ++) 
          {///
              $row_data = mysqli_fetch_assoc($result);
              $prdct_id = $row_data['id']; 
             /* $cat_id = $row_data['cat_id']; 
              $dscrbtn  = $row_data['dscrptn'];         
              $sub_ct = $row_data['sub_cat']; */
              $user_id = $row_data['userid']; 
              $prdct_img = $row_data['image']; 
              $prdct_stoc = $row_data['stock']; 
              $prdct_pric = $row_data['pric']; 
              $prdct_nm = $row_data['prdctnm'];         
              echo"
                 <div class='col-md-4 col-lg-4 col-sm-6 count'>
                  <div class='product-item' >
                      <div class='pi-pic'style='border:1px lightgray solid;'>
                          <img src='$prdct_img' alt=''style='height:315px;'><span id='fvrt$prdct_id'>";
                           check_favorit($prdct_id);
                     echo"</span>
                          <ul>
                              <li class='quick-view'><a href='product.php?uid=$user_id&pid=$prdct_id'>+ تفاصيل المنتج</a></li>
                          </ul>
                      </div>

                      <div class='pi-text p-0' style='border:1px lightgray solid;border-top:0px;'>
                        <div class='product-price p-1'style='font-size:17px;color:gray;'>
                              Piece : $prdct_stoc
                          </div>
                          <a style='border-top:2px orange solid;margin:auto;'class='col-2'></a>
                          <a class='p-1'>
                              <h5 style='font-weight:700;'>$prdct_nm</h5>
                          </a>
                          <a style='border-top:2px orange solid;margin:auto;'class='col-2'></a>
                          <div class='product-price p-1'style='font-size:17px;color:gray;'>
                            £E : $prdct_pric
                          </div>
                      </div>

                    </div>
                  </div>
               ";
           }
         echo"</div>"; 
         echo"
              <div class='row m-0 mt-5 p-0 'style=''id=''>
              <div class='col-12 p-0 '>
                  <nav aria-label='navigation' style='position:relative;'>
                      <ul class='pgntn_pstn_abslt pagination justify-content-end p-0 m-0'id='pagntn_area'style=''>";
                          $i=0;
                          for( $ii=0 ; $ii < $nu_row ; $ii+=$nu_view)
                          { 
                              $i+=1;
                              if($ii == $pgntn_nu)
                              {
                                  echo"<li class='page-item active'><button class='page-link pagenation' id='btn_$ii' value='$ii'>0$i.</button></li>";//categories.php?select={$order}&nu={$ii}&cid={$cat_id}&select2={$nu_view}'>0$i.</a></li> ";
                              }
                              else
                              {
                                  echo"<li class='page-item '><button class='page-link pagenation' id='btn_$ii' value='$ii'>0$i.</button></li>";//categories.php?select={$order}&nu={$ii}&cid={$cat_id}&select2={$nu_view}'>0$i.</a></li> ";
                              }
                          }

                 echo"</ul>
                  </nav>
              </div>
          </div>
             "; 
      }elseif(@mysqli_num_rows($rslt) < 1){
        outputMessage("You Didnt Save Any product In Favorites, Start adding some",'danger');
      }

      if(@mysqli_num_rows($result) < 1){
          if($nu_row > 0){
            $nu_row = $nu_row - $nu_view;          
          }else{
            $nu_row = $nu_row;
          }
        echo"
        <div class='row m-0 mt-5 p-0 'style=''id=''>
        <div class='col-12 p-0 '>
            <nav aria-label='navigation' style='position:relative;'>
                <ul class='pgntn_pstn_abslt pagination justify-content-end p-0 m-0'id='pagntn_area'style=''>
                 <li class='page-item active'><button class='page-link pagenation' id='btn_' value='$nu_row'>01.</button></li>
                </ul>
            </nav>
        </div>
        </div>
       ";        
      }
                                  
  
 ////////////end third validation if 
}elseif($inptid == "fvrt_show_result"){/////echo show results/////////////////
  if(check_login() && $usertyp =='byer' || $usertyp =='admin' )
  {}else{header("location:../index.php");}
   $count=$_GET['show_result'];
 $count= intval($count) + intval($pgntn_nu);
 if($count > 0)
  {
   $pgntn_nu = intval($pgntn_nu) + 1;
  }
 else{ 
   $pgntn_nu = intval($pgntn_nu);
   }
  echo"Show " .  $pgntn_nu . " - " .  $count . " OF "  . $_SESSION['show_area_fvrt'] . " Product";
 ////////////end 5th validation if 
}elseif($inptid == "fvrt_icon"){////////////echo fvrt numbers/////////////////
  $db=connect_to_database();
  if(check_login()){$user_id=user_id();}else{$user_id= 000;}
  $qury ="SELECT * FROM prdct WHERE id = ANY (SELECT prdct_id FROM favorit WHERE userid = $user_id)";
  $rslt=@mysqli_query($db,$qury); 
  $nu_row=@mysqli_num_rows($rslt);
  echo $nu_row;
}elseif($inptid == "show_order"){///////////view user orders//////////////////
  if(check_login() && $usertyp =='byer' || $usertyp =='admin' )
  {}else{header("location:../index.php");}
    $db=connect_to_database();
   //get user id
    $user_id=user_id();
   //select prdct by order and limit and catnm
     $query="SELECT * FROM orders WHERE `user_id` = $user_id ORDER BY id desc LIMIT $pgntn_nu,$nu_view "; 
     $qury ="SELECT * FROM orders WHERE `user_id` = $user_id";
         $result=@mysqli_query($db,$query); 
         $nu_rw=@mysqli_num_rows($result);
         $rslt=@mysqli_query($db,$qury); 
         $nu_row=@mysqli_num_rows($rslt);
         $_SESSION['show_byer_order']=  $nu_row;                                                      
       if(@mysqli_num_rows($result) > 0) 
       {  
         echo"<div id='accordion'style='border:solid 0px red;'";
         
         for($div=1 ; $div <= $nu_rw ;$div ++) 
           {///
               $row_data = mysqli_fetch_assoc($result);
               $byer_id  = $row_data['user_id']; 
               $order_id  = $row_data['id']; 
               $detls     = $row_data['detls'];         
               $order_img = $row_data['img']; 
               $end_dat   = $row_data['end']; 
               $order_pric= $row_data['pric']; 
               $ordre_titl= $row_data['titl']; 
               $cty       = $row_data['cty_id']; 
               $gvrnts    = $row_data['gvrn_id']; /**/
                 echo"
                 <div class='card'>
                     <div class='card-header mb-0 slid count p-0' id='hedng_$div'>
                       <h5 class='m-0 p-2' style='height:65px;'>
                           <button class='col-12 btn btn-link text-right pr-2' data-toggle='collapse' data-target='#collps$div' aria-expanded='true' aria-controls='collps$div'>
                             <span style='color:#2E2E2E; float:left;' class='p-1'><span style=''>£E</span> :  $order_pric</span>   <span style='color:#2E2E2E; float:right;' class='p-1'>$ordre_titl <span style='' class='p-4'>+</span> </span>
                           </button>
                       </h5>
                     </div>
                     <div id='collps_$div' class='collapse"; if($div == 1){echo " show";} echo"' aria-labelledby='hedng_$div' data-parent='#accordion'>
                       <div class='card-body'  style='border:0px red solid;'>
                           <div class='product-content p-0 m-0'>
                               <div class='row m-0 p-0'>
                                   <div class='col-lg-5'>
                                       <img src='$order_img' alt='' style='max-height:550px;'>
                                   </div>
                                   <div class='col-lg-7 p-0 m-0 mt-5 text-right'>
                                       <h5>التفاصيل</h5>
                                       <p style='min-height:66px;'>$detls</p>
                                       <h5>تاريخ التسليم </h5>
                                       <p style='min-height:66px;'>بعد<span class='p-3 text-info'>$end_dat</span>يوم</p>
                                       <a href='responding.php?bid=$byer_id&oid=$order_id' class='mr-4'><button class='btn btn-info text-center pr-2'>مشاهدة العروض </button></a>
                                       <input type='hidden' value='$order_id'>
                                       <button id='' class='btn btn-danger text-center pr-2 delt_order'  data-toggle='modal' data-target='#delete_order'>حذف - </button>
                                   </div>
                               </div>
                           </div>
                       </div>
                     </div>
                 </div>
                     ";
            }
          echo"</div>"; 
          echo"
               <div class='row m-0 mt-5 p-0 'style=''id=''>
               <div class='col-12 p-0 '>
                   <nav aria-label='navigation' style='position:relative;'>
                       <ul class='pgntn_pstn_abslt pagination justify-content-end p-0 m-0'id='pagntn_area'style=''>";
                           $i=0;
                           for( $ii=0 ; $ii < $nu_row ; $ii+=$nu_view)
                           { 
                               $i+=1;
                               if($ii == $pgntn_nu)
                               {
                                   echo"<li class='page-item active'><button class='page-link pagenation' id='btn_$ii' value='$ii'>0$i.</button></li>";//categories.php?select={$order}&nu={$ii}&cid={$cat_id}&select2={$nu_view}'>0$i.</a></li> ";
                               }
                               else
                               {
                                   echo"<li class='page-item '><button class='page-link pagenation' id='btn_$ii' value='$ii'>0$i.</button></li>";//categories.php?select={$order}&nu={$ii}&cid={$cat_id}&select2={$nu_view}'>0$i.</a></li> ";
                               }
                           }
 
                  echo"</ul>
                   </nav>
               </div>
           </div>
              "; 
       }elseif(@mysqli_num_rows($rslt) < 1){
         outputMessage("You Have No product In Your Store, Start Adding Some ...",'danger');
       }
       if(@mysqli_num_rows($result) < 1){
         if($nu_row > 0){
           $nu_row = $nu_row - $nu_view;          
         }else{
           $nu_row = $nu_row;
         }
         echo"
         <div class='row m-0 mt-5 p-0 'style=''id=''>
         <div class='col-12 p-0 '>
             <nav aria-label='navigation' style='position:relative;'>
                 <ul class='pgntn_pstn_abslt pagination justify-content-end p-0 m-0'id='pagntn_area'style=''>
                  <li class='page-item active'><button class='page-link pagenation' id='btn_' value='$nu_row'>01.</button></li>
                 </ul>
             </nav>
         </div>
         </div>
        ";        
       }                                  
   
  ////////////end third validation if 
}elseif($inptid == "show_result"){//////////echo show results/////////////////
  ////////////start 5th validation if 
  $count=$_GET['show_result'];
  $count= intval($count) + intval($pgntn_nu);
  if($count > 0)
   {
    $pgntn_nu = intval($pgntn_nu) + 1;
   }
  else{ 
    $pgntn_nu = intval($pgntn_nu);
    }
   echo"Show " .  $pgntn_nu . " - " .  $count . " OF "  . $_SESSION['show_byer_order'] . " Order";
  ////////////end 5th validation if 
}elseif($inptid == "deletordr"){////////////delete ordr///////////////////////
  if(check_login() && $usertyp =='byer'){
    $usrid = user_id();
  }elseif($usertyp =='admin'){
    $usrid = $_GET['uid'];
  }else{header("location:../index.php");}
     $order_id=$_GET['pid'];
     $db = connect_to_database();
     $result = @mysqli_query($db, "SELECT `user_id` ,`img` from orders WHERE id=$order_id") ;  
     $row = mysqli_fetch_assoc($result);
     $owner_id = $row['user_id'];
     $img = $row['img'];
     $img ="../$img";
     
     if($owner_id == $usrid OR $usertyp == 'admin')
     {
     unlink($img);
     $db = connect_to_database();
     $query="DELETE FROM `orders` WHERE id=$order_id";echo"done";
     $result=@mysqli_query($db,$query);//echo $owner_id ."____" . $usrid . "___" . $order_id;
     }else{header("location:../index.php");}
  ////////////end 5th validation if 
}elseif(isset($_POST['2order_titl'])){//////addorder submit///////////////////

  if(check_login() && $usertyp =='byer')
  {}else{header("location:../index.php");}
    $date = date_create();
    $dat_now = date_timestamp_get($date);
    $image = '';
    if(isset($_FILES['2ordr_img']['name'])) {$imageName=$_FILES['2ordr_img']['name'];}else{$imageName='';}//'desc';
    if($imageName != ''){
      $imageName =  $_FILES['2ordr_img']['name'];
      $imageTmpName =  $_FILES['2ordr_img']['tmp_name'];
      $imageName =explode('.',$imageName) ;
      $imageName ='.' . $imageName[1];
      $path= rand(1, date_timestamp_get($date));      
      $pth= rand(9999, date_timestamp_get($date)); 
      $path = $path + $path;  
      $mypath = "../img/ordr_img/$path$imageName";
      move_uploaded_file($imageTmpName,$mypath);
      $image = "img/ordr_img/$path$imageName";
    }
    $gvrnts        = $_POST['2governts'];
    $ctys          = $_POST['2cities'];
    $order_titl    = $_POST['2order_titl'];
    $order_dat     = $_POST['2order_dat'];
    $order_dscrbtn = $_POST['2order_dscrbtn'];
    $pric          = $_POST['2pric'];
    $byer_id = user_id();
     //echo $image != '' && $ctys != '' && $byer_id != ''

     if($order_titl != '' && $order_dat !='' && $order_dscrbtn != '' && $pric != '' && $gvrnts != '' && $image != '' && $ctys != '' && $byer_id != '')
     {
       $db = connect_to_database(); 
       $query="INSERT INTO `orders`(`user_id`, `titl`, `gvrn_id`, `cty_id`, `img`, `pric`, `end`, `detls`,`ad_dat`)VALUES ($byer_id,'$order_titl',$gvrnts,$ctys,'$image',$pric,$order_dat,'$order_dscrbtn',$dat_now)";
       $result=@mysqli_query($db,$query);echo"done";
     }elseif($order_titl != '' && $order_dat !='' && $order_dscrbtn != '' && $pric != '' && $gvrnts != '' && $ctys != '' && $byer_id != '')
     {
       $db = connect_to_database(); 
       $query="INSERT INTO `orders`(`user_id`, `titl`, `gvrn_id`, `cty_id`, `pric`,`end`, `detls`,`ad_dat`)VALUES ($byer_id,'$order_titl',$gvrnts,$ctys,$pric,$order_dat,'$order_dscrbtn',$dat_now)";
       $result=@mysqli_query($db,$query);echo"done";
     }
}elseif($inptid == "sort_govrn"){ //////////echo sub ctys content/////////////
  $db = connect_to_database();   
  $result = @mysqli_query($db, "SELECT id,cty_nm from ctys WHERE parnt_id = $inptvl order by id asc ");
  $nmrw=@mysqli_num_rows($result);
  if($nmrw > 0){

    while($row = mysqli_fetch_array($result))
        {
          $catId = $row['id'];
          $catName = $row['cty_nm'];
          ECHO "<option  class='font' value='$catId'>$catName</option>";         
        }
  }else{
            ECHO "<option  class='font' id='$ctid_vl' value='$ctid_vl'>$catName_vl</option> ";        
        }


}
?>