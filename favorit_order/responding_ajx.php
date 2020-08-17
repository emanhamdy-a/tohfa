<?php
include("../includes/function.php"); 
$usertyp=user_type();

?>
<?php  ////catName and ctid is used if there is no sub category to fill sub select
if(isset($_GET['catName']) && $_GET['catName'] != ""){$catName_vl = $_GET['catName'];}else{$catName_vl=' ';}
if(isset($_GET['ctid']) && $_GET['ctid'] != ""){$ctid_vl = $_GET['ctid'];}else{$ctid_vl='0';}
if(isset($_GET['inptid']) && $_GET['inptid'] != ""){$inptid = $_GET['inptid'];}else{$inptid='mjhgd';}
if(isset($_GET['inptvl']) && $_GET['inptvl'] != ""){$inptvl = $_GET['inptvl'];}else{$inptvl=' ';}
if(isset($_GET['oid']) && $_GET['oid'] != ""){$order_id = $_GET['oid'];}

if(isset($_GET['selectvw'])) {$nu_view=$_GET['selectvw'];}else{$nu_view=9;};//'desc';
if(isset($_GET['pgntn_nu']) && $_GET['pgntn_nu'] !=''){$pgntn_nu=$_GET['pgntn_nu'];}else{$pgntn_nu= 0;}//'desc';

if($inptid == "sort_gvrn"){ ////////////////echo sub ctys content///////////////
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
    $gvrnts        = $_POST['gvrnts'];
    $ctys          = $_POST['ctys'];
    $order_titl    = $_POST['order_titl'];
    $order_dat     = $_POST['order_dat'];
    $order_dscrbtn = $_POST['order_dscrbtn'];
    $pric          = $_POST['pric'];
    $byer_id = user_id();
     //echo $ctys;// != '' && != ''
      if($order_titl != '' && $order_dat && $order_dscrbtn != '' && $pric != '' && $gvrnts != '' && $image != '' && $ctys != '' && $byer_id != '')
      {
        $db = connect_to_database(); 
        $query="INSERT INTO `orders`(`user_id`, `titl`, `gvrn_id`, `cty_id`, `img`, `pric`, `end`, `detls`,`ad_dat`)VALUES ($byer_id,'$order_titl',$gvrnts,$ctys,'$image',$pric,$order_dat,'$order_dscrbtn',$dat_now)";
        $result=@mysqli_query($db,$query);echo"done";
      }elseif($order_titl != '' && $order_dat && $order_dscrbtn != '' && $pric != '' && $gvrnts != '' && $ctys != '' && $byer_id != '')
      {
        $db = connect_to_database(); 
        $query="INSERT INTO `orders`(`user_id`, `titl`, `gvrn_id`, `cty_id`, `pric`,`end`, `detls`,`ad_dat`)VALUES ($byer_id,'$order_titl',$gvrnts,$ctys,$pric,$order_dat,'$order_dscrbtn',$dat_now)";
        $result=@mysqli_query($db,$query);echo"done";
      }
}elseif($inptid == "show_rspnds"){//////////view user responding///////////////////////
 ////////////start third validation if 
  $db=connect_to_database();
  //get user id
  //$user_id=user_id();
  //select prdct by order and limit and catnm
    $query="SELECT * FROM aply WHERE order_id = $order_id ORDER BY id desc LIMIT $pgntn_nu,$nu_view "; 
    $qury ="SELECT * FROM aply WHERE order_id = $order_id ";
        $result=@mysqli_query($db,$query); 
        $nu_rw=@mysqli_num_rows($result);
        $rslt=@mysqli_query($db,$qury); 
        $nu_row=@mysqli_num_rows($rslt);
        $_SESSION['show_area_rspond']=  $nu_row;                                                      
      if(@mysqli_num_rows($result) > 0) 
      {  
        echo"<div id='accordion'style='border:solid 0px red;'";
        
        for($div=1 ; $div <= $nu_rw ;$div ++) 
          {///
              $row_data  = mysqli_fetch_assoc($result);
              $drsmkr_id = $row_data['drsmkr_id']; 
              $rspnd_id  = $row_data['id']; 
              $detls     = $row_data['dtls'];         
              $order_pric= $row_data['pric']; 
              $ordre_titl= $row_data['atlnm']; 
              $chanel= $row_data['cal']; 
                echo"
                <div class='card'>
                    <div class='card-header mb-0 slid count p-0' id='heading_$div'>
                      <h5 class='m-0 p-2' style='height:65px;'>
                          <button class='col-12 btn btn-link text-right pr-2' data-toggle='collapse' data-target='#collapse$div' aria-expanded='true' aria-controls='collapse$div'>
                            <span style='color:#2E2E2E; float:left;' class='p-1'><span style=''>£E</span> :  $order_pric</span>   <span style='color:#2E2E2E; float:right;' class='p-1'>$ordre_titl <span style='' class='p-4'>+</span> </span>
                          </button>
                      </h5>
                    </div>
                    <div id='collapse_$div' class='collapse' aria-labelledby='heading$div' data-parent='#accordion'>
                      <div class='card-body'  style='border:0px red solid;'>
                          <div class='product-content p-0 m-0'>
                              <div class='row m-0 p-0' style='text-align:center;'>
                                <div class='col-lg-4'>
                                </div>
                                <div class='col-lg-8 p-0 m-0 mt-3 pr-4 text-right' style='margin:auto;positoin:relative;right:0px;'>
                                    <h5> : التفاصيل</h5>
                                    <p style=''>$detls</p>
                                    <h5>: الثمن</h5>
                                    <p style=''>£E<span class='p-3 text-info'>:</span>$order_pric</p>
                                    <h5>: وسيله التواصل</h5>
                                    <p style=''><span class='p-3 text-info'>$chanel</span></p>
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
}elseif(isset($_POST['rspnd_nam'])){///////////addrsppond submit///////////////////////
  // rspnd_adrs rspnd_nam rspnd_dscrbtn  rspnd_adrs  order_submit*/    
  if(check_login())
  {}else{header("location:../index.php");}
  $byrid      = $_POST['byrid'];
  $ordrid     = $_POST['ordrid'];
  $rspnd_nam = $_POST['rspnd_nam'];
  $rspnd_num = $_POST['rspnd_num'];
  $rspnd_pric = $_POST['rspnd_pric'];
  $drsmkr_id  = user_id();
  $rspnd_dscrbtn = $_POST['rspnd_dscrbtn'];
  if($rspnd_num != '' && $rspnd_nam != '' && $ordrid != '' && $rspnd_dscrbtn != '' && $rspnd_pric != '' && $drsmkr_id && $byrid != ''){
      $db = connect_to_database(); 
      $query="INSERT INTO `aply`(`drsmkr_id`, `order_id`, `byer_id`, `atlnm`, `dtls`, `pric`,`cal`) VALUES ($drsmkr_id,$ordrid,$byrid,'$rspnd_nam','$rspnd_dscrbtn',$rspnd_pric,'$rspnd_num')";
      $result=@mysqli_query($db,$query);echo"done";
  }
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
  echo"Show " .  $pgntn_nu . " - " .  $count . " OF "  . $_SESSION['show_area_rspond'] . " Responds";
 ////////////end 5th validation if 
}
?>