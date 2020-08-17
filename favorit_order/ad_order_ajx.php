<?php
include("../includes/function.php"); 
$usertyp=user_type();
?>
<?php  ////catName and ctid is used if there is no sub category to fill sub select
if(isset($_GET['catName']) && $_GET['catName'] != ""){$catName_vl = $_GET['catName'];}else{$catName_vl=' ';}
if(isset($_GET['ctid']) && $_GET['ctid'] != ""){$ctid_vl = $_GET['ctid'];}else{$ctid_vl='0';}
if(isset($_GET['inptid']) && $_GET['inptid'] != ""){$inptid = $_GET['inptid'];}else{$inptid='mjhgd';}
if(isset($_GET['inptvl']) && $_GET['inptvl'] != ""){$inptvl = $_GET['inptvl'];}else{$inptvl=' ';}
if(isset($_GET['uid']) && $_GET['uid'] != ""){$id_user = $_GET['uid'];}


if(isset($_GET['selectcty'])) {$sub_order=$_GET['selectcty'];}else{$sub_order='all';}//'desc';
if(isset($_GET['selectgvrn'])) {$order=$_GET['selectgvrn'];}else{$order='all';}//'desc';
if(isset($_GET['selectvw'])) {$nu_view=$_GET['selectvw'];}else{$nu_view=9;};//'desc';
if(isset($_GET['pgntn_nu']) && $_GET['pgntn_nu'] !=''){$pgntn_nu=$_GET['pgntn_nu'];}else{$pgntn_nu= 0;}//'desc';

if($inptid == "sort_gvrn"){ ////////////////echo sub ctys content///////////////
  $db = connect_to_database();   
  $result = @mysqli_query($db, "SELECT id,cty_nm from ctys WHERE parnt_id = $inptvl order by id asc ");
  $nmrw=@mysqli_num_rows($result);
  if($nmrw > 0){

          ECHO "<option  class='font' value='all'>All</option>"; 
    while($row = mysqli_fetch_array($result))
        {
          $catId = $row['id'];
          $catName = $row['cty_nm'];
          ECHO "<option  class='font' value='$catId'>$catName</option>";         
        }
  }else{
            ECHO "<option  class='font' id='$ctid_vl' value='$ctid_vl'>$catName_vl</option> ";        
        }


}elseif($inptid == "sort_govrn"){ ////////////////echo sub ctys content///////////////
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


}elseif(isset($_POST['order_titl'])){///////////addorder submit///////////////////////
  if(check_login() && $usertyp =='byer')
  {}else{header("location:../index.php");}
    $date = date_create();
    $dat_now = date_timestamp_get($date);
    $image = '';
    if(isset($_FILES['ordr_img']['name'])) {$imageName=$_FILES['ordr_img']['name'];}else{$imageName='';}//'desc';
    if($imageName != ''){
      $imageName =  $_FILES['ordr_img']['name'];
      $imageTmpName =  $_FILES['ordr_img']['tmp_name'];
      $imageName =explode('.',$imageName) ;
      $imageName ='.' . $imageName[1];
      $path= rand(1, date_timestamp_get($date));      
      $pth= rand(9999, date_timestamp_get($date)); 
      $path = $path + $path;  
      $mypath = "../img/ordr_img/$path$imageName";
      move_uploaded_file($imageTmpName,$mypath);
      $image = "img/ordr_img/$path$imageName";
    }
    $gvrnts        = $_POST['governts'];
    $ctys          = $_POST['cities'];
    $order_titl    = $_POST['order_titl'];
    $order_dat     = $_POST['order_dat'];
    $order_dscrbtn = $_POST['order_dscrbtn'];
    $pric          = $_POST['pric'];
    $byer_id = user_id();
     //echo $ctys;// != '' && != ''
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
}elseif($inptid == "show_order"){//////////view user product///////////////////////
 ////////////start third validation if 
  $db=connect_to_database();
  //get user id
  //$user_id=user_id();
  //select prdct by order and limit and catnm

  if($order=='all' && $sub_order =='all')
  {  $query="SELECT * FROM orders  ORDER BY id desc LIMIT $pgntn_nu,$nu_view ";
     $qury="SELECT * FROM orders ";
  }elseif($order !='all' && $sub_order =='all'){
     $query="SELECT * FROM orders WHERE gvrn_id = $order ORDER BY id desc LIMIT $pgntn_nu,$nu_view "; 
     $qury ="SELECT * FROM orders WHERE gvrn_id = $order";
  }elseif($order !='all' && $sub_order !='all'){
    $query="SELECT * FROM orders WHERE cty_id = $sub_order ORDER BY id desc LIMIT $pgntn_nu,$nu_view "; 
    $qury ="SELECT * FROM orders WHERE cty_id = $sub_order";
  }
        $result=@mysqli_query($db,$query); 
        $nu_rw=@mysqli_num_rows($result);
        $rslt=@mysqli_query($db,$qury); 
        $nu_row=@mysqli_num_rows($rslt);
        $_SESSION['show_area_order']=  $nu_row;                                                      
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
                    <div class='card-header mb-0 slid count p-0' id='hdng_$div'>
                      <h5 class='m-0 p-2' style='height:65px;'>
                          <button class='col-12 btn btn-link text-right pr-2' data-toggle='collapse' data-target='#collapse$div' aria-expanded='true' aria-controls='collapse$div'>
                            <span style='color:#2E2E2E; float:left;' class='p-1'><span style=''>£E</span> :  $order_pric</span>   <span style='color:#2E2E2E; float:right;' class='p-1'>$ordre_titl <span style='' class='p-4'>+</span> </span>
                          </button>
                      </h5>
                    </div>
                    <div id='cllps_$div' class='collapse"; if($div == 1){echo " show";} echo"' aria-labelledby='heading$div' data-parent='#accordion'>
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
                                      <a href='responding.php?bid=$byer_id&oid=$order_id'><button class='btn btn-info text-center pr-2'>اضف عرض +</button></a>
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
                 <li class='page-item active'><button class='page-link pagenation' value='$nu_row'>01.</button></li>
                </ul>
            </nav>
        </div>
        </div>
       ";        
      }                                  
  
 ////////////end third validation if 
}elseif($inptid == "show_result"){/////////echo show results///////////////////////
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
  echo"Show " .  $pgntn_nu . " - " .  $count . " OF "  . $_SESSION['show_area_order'] . " Order";
 ////////////end 5th validation if 
}
?>