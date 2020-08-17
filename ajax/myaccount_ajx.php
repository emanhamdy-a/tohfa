<?php
include("../includes/function.php"); 
$usertyp=user_type();
if((check_login() && $usertyp =='seler') OR (check_login() && $usertyp =='admin'))
{}else{header("location:../index.php");} 
?>
<?php  ////catName and ctid is used if there is no sub category to fill sub select
if(isset($_GET['catName']) && $_GET['catName'] != ""){$catName_vl = $_GET['catName'];}else{$catName_vl=' ';}
if(isset($_GET['ctid']) && $_GET['ctid'] != ""){$ctid_vl = $_GET['ctid'];}else{$ctid_vl='0';}
if(isset($_GET['inptid']) && $_GET['inptid'] != ""){$inptid = $_GET['inptid'];}else{$inptid='mjhgd';}
if(isset($_GET['inptvl']) && $_GET['inptvl'] != ""){$inptvl = $_GET['inptvl'];}else{$inptvl=' ';}
if(isset($_GET['uid']) && $_GET['uid'] != ""){$id_user = $_GET['uid'];}


if(isset($_GET['selectct'])) {$order=$_GET['selectct'];}else{$order='all';}//'desc';
if(isset($_GET['selectvw'])) {$nu_view=$_GET['selectvw'];}else{$nu_view=9;};//'desc';
if(isset($_GET['pgntn_nu']) && $_GET['pgntn_nu'] !=''){$pgntn_nu=$_GET['pgntn_nu'];}else{$pgntn_nu= 0;}//'desc';

if($inptid == "main_cat"){ ////////////////echo sub category content///////////////
  ////////////start first validation if 
  $db = connect_to_database();    
  $result = @mysqli_query($db, "SELECT id,catnm from category3 WHERE parnt_id = $inptvl order by id asc    ");
  $nmrw=@mysqli_num_rows($result);
  if($nmrw > 0){
    while($row = mysqli_fetch_array($result))
        {
            $catId = $row['id'];
            $catName = $row['catnm'];
            
            ECHO "<option  class='font' id='$catId' value='$catId'>$catName</option>";        
        }
  }else{
            ECHO "<option  class='font' id='$ctid_vl' value='$ctid_vl'>$catName_vl</option> ";        
        }
          /*  ECHO"</select>";*/
  ////////////end first validation if
}elseif(isset($_POST['catid'])){///////////addproduct submit///////////////////////
    $imageName =  $_FILES['image']['name'];
    $imageTmpName =  $_FILES['image']['tmp_name'];
    $imageName =explode('.',$imageName) ;
    $imageName ='.' . $imageName[1];
    $date = date_create();
    $path= rand(1, date_timestamp_get($date));      
    $mypath = "../img/userimg/$path$imageName";
    move_uploaded_file($imageTmpName,$mypath);
    $image = "img/userimg/$path$imageName";

    $name        = $_POST['prdct_nm'];
    $description = $_POST['description'];
    $price       = $_POST['price'];
    $stock       = $_POST['stock'];
    $catid       = $_POST['catid'];
    $sub_catid   = $_POST['subcatid'];
    if($usertyp =='seler')
    {$merchantid = user_id();}
    else
    {$merchantid = $_POST['usr_id'];}

    $merchant_phon = user_phon();
    $merchant_adrs = user_adrs();
    $merchant_cmpny = user_cmpny();
      
      if($name != '' && $description != '' && $price != '' && $stock != '' && $image != '' && $catid != '' && $merchantid != '')
      {
        $db = connect_to_database();
        $query="INSERT INTO `prdct`(`prdctnm`,`dscrptn`,`pric`,`stock`, `image`,`cat_id`,`sub_cat`,`userid`, `adrss`, `phonn`, `cmpny`) VALUES ('$name','$description',$price,$stock,'$image',$catid,$sub_catid,$merchantid,'$merchant_adrs','$merchant_phon','$merchant_cmpny')";
        $result=@mysqli_query($db,$query);echo"done";
      } 
}elseif($inptid == "show_prdct"){//////////view user product///////////////////////
 ////////////start third validation if 
  $db=connect_to_database();
  //get user id
  if($usertyp =='seler')
  {$user_id=user_id();}
  else{$user_id=$id_user;}
  //select prdct by order and limit and catnm
  if($order=='all')
  {  $query="SELECT * FROM prdct WHERE userid= $user_id LIMIT $pgntn_nu,$nu_view ";
     $qury="SELECT * FROM prdct WHERE userid= $user_id";
  }else{ $query="SELECT * FROM prdct WHERE userid= $user_id AND cat_id=$order LIMIT $pgntn_nu,$nu_view " ; 
         $qury ="SELECT * FROM prdct WHERE userid= $user_id  AND cat_id=$order ";
      }
        $result=@mysqli_query($db,$query); 
        $nu_rw=@mysqli_num_rows($result);
        $rslt=@mysqli_query($db,$qury); 
        $nu_row=@mysqli_num_rows($rslt);
        $_SESSION['show_area_store']=  $nu_row;                                                      
      if(@mysqli_num_rows($result) > 0) 
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
                          <img src='$prdct_img' alt=''style='height:315px;'>
                          <ul style=''>
                              
                              <li style='float:left;'class='w-icon ml-2 p-0'>
                               <a style='height:0px;width:0px;font-size:0px;'class='p-0 m-0'>$user_id/-/=/+/$prdct_id</a>
                               <a  class='editlink'style='cursor: pointer;' data-toggle='modal' data-target='#ad_prdct_cntnr' ><i class='fa fa-pencil'></i></a>
                              </li>
                              <li class='quick-view'>
                              <a style='height:0px;width:0px;font-size:0px;'class='p-0 m-0'>$user_id/-/=/+/$prdct_id</a>
                              <a class='view_imgs' style='cursor:pointer;' data-toggle='modal' data-target='#add_photo'>+ الصور -</a>
                              </li>
                              <li style='float:right;'class='w-icon mr-2 p-0'>
                              <a style='height:0px;width:0px;font-size:0px;'class='p-0 m-0'>$user_id/-/=/+/$prdct_id</a>
                              <a data-toggle='modal' data-target='#exampleModal' class='deletlink' style='cursor: pointer;'><i class='fa fa-trash'></i></a>
                              </li>
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
}elseif(isset($_POST['edit_catid'])){//////edit product////////////////////////////
 ////////////start 4th validation if 
    $prdct_id=$_POST['prdct_id'];
    $db = connect_to_database();
    $query="SELECT  `userid`,`image` FROM `prdct` WHERE id=$prdct_id";
    $result=@mysqli_query($db,$query);
    $row = mysqli_fetch_assoc($result);
    $owner_id = $row['userid'];
    $_SESSION['owner_id'] = $owner_id;
    $img = $row['image'];
    $img="../$img";
    $image='';
  if($owner_id == user_id() OR $usertyp =='admin')
  {
     ////if there new image move it and delete the old one
      if(isset($_FILES['image']['name']) && $_FILES['image']['name'] != '')
      {
        $imageName =  $_FILES['image']['name'] ;
        $imageTmpName =  $_FILES['image']['tmp_name'] ;
        $image = "img/userimg/$path$imageName"; 
        $imageName =explode('.',$imageName) ;
        $imageName ='.' . $imageName[1];
        $date = date_create();
        $path= rand(1, date_timestamp_get($date));      
        $mypath = "../img/userimg/$path$imageName";
        $image = "img/userimg/$path$imageName";
        move_uploaded_file($imageTmpName,$mypath);
        unlink($img);
      }
      $name = $_POST['prdct_nm'];
      $description = $_POST['description'];
      $price = $_POST['price'];
      $stock = $_POST['stock'];
      $catid = $_POST['edit_catid'];
      $sub_catid   = $_POST['subcatid'];
      if($name != ''&& $catid && $sub_catid != '' && $description != '' && $price != '' && $stock != '' && $image != '' )
      { 
          $query="UPDATE `prdct` set `prdctnm`='$name',`dscrptn`='$description',`pric`=$price,`stock`=$stock,`cat_id`=$catid ,`sub_cat`=$sub_catid ,`image`='$image' WHERE id =$prdct_id";
          $result=@mysqli_query($db,$query);echo"done";
      }
      elseif($name != '' && $catid && $sub_catid != ''  && $description != '' && $price != '' && $stock != '')
      {
        $query="UPDATE `prdct` set `prdctnm`='$name',`dscrptn`='$description',`pric`=$price,`stock`=$stock,`cat_id`=$catid ,`sub_cat`=$sub_catid WHERE id =$prdct_id";
        $result=@mysqli_query($db,$query);echo"done";
      }
  }
 else{header("location:../index/index.php");}
 ////////////end 4th validation if     
}elseif($inptid == "deletprdct"){//////////delete prdct////////////////////////////
 ////////////start 5th validation if 
    $prdct_id=$_GET['pid'];
    $db = connect_to_database();
    $result = @mysqli_query($db, "SELECT `id`,`userid` ,`image` from prdct WHERE id=$prdct_id") ;  
    $row = mysqli_fetch_assoc($result);
    $owner_id = $row['userid'];
    $img = $row['image'];
    $img ="../$img";
    $usrid = user_id();
    if($owner_id == $usrid OR $usertyp == 'admin')
    {
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
    $db = connect_to_database();
    $query="DELETE FROM `prdct` WHERE id=$prdct_id";
    $result=@mysqli_query($db,$query);
    }else{header("location:../index.php");}
 ////////////end 5th validation if 
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
  echo"Show " .  $pgntn_nu . " - " .  $count . " OF "  . $_SESSION['show_area_store'] . " Product";
 ////////////end 5th validation if 
}elseif($inptid == "view_prdct_img"){//////view product images////////////////
  $db=connect_to_database();
  //get user id and prdct id
  if(isset($_GET['pid']) && $_GET['pid'] != ""){$prdct_id = $_GET['pid'];}
  if(isset($_GET['user_id']) && $_GET['user_id'] != ""){$user_id = $_GET['user_id'];}
      echo"
        <div class='modal-header'>
          <h5 class='modal-title' id='modal_title'>Product Images</h5>
          <h5 class='alert alert-success col-10' style='display:none;' id='alrt_scss'>Done</h5>
          <button type='button' class='close cls' data-dismiss='modal' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
          </button>
        </div>
        <div class='modal-body'>
          <div id='carouselExampleIndicators' class='carousel slide' data-ride=''>
              <ol class='carousel-indicators'>";
                $query="SELECT id FROM prdct_imgs WHERE prdct_id = $prdct_id";
                $result=@mysqli_query($db,$query); 
                $nu_rw=@mysqli_num_rows($result);
                  if(@mysqli_num_rows($result) > 0) 
                  {  
                    for($div=0 ; $div < $nu_rw ;$div ++) 
                      {
                        echo"
                          <li data-target='#carouselExampleIndicators' data-slide-to='$div' class='";if($div == 0){echo"active";} echo"'></li>
                        ";
                      }
                  }

                echo"
              </ol>
              <div class='carousel-inner'>";
                $query="SELECT img ,id FROM prdct_imgs WHERE prdct_id = $prdct_id";
                $result=@mysqli_query($db,$query); 
                $nu_rw=@mysqli_num_rows($result);
                  if(@mysqli_num_rows($result) > 0) 
                  {  
                    for($div=1 ; $div <= $nu_rw ;$div ++) 
                      {
                        $row_data = mysqli_fetch_assoc($result);
                        $img_path = $row_data['img'];
                        $img_id   = $row_data['id'];
                        echo"
                        <div class='carousel-item ";if($div == 1){echo"active";} echo"'>
                          <img class='d-block w-100'style='max-height:450px;' src='$img_path' alt='oioioioiooi'>                      
                          <a class='deletimg' style='cursor:pointer;font-size:34px;position:absolute;bottom:25px;z-index:656;right:15px;'>
                          <input id='img_id' class='p-0 m-0'type='hidden'value='$user_id/-/=/+/$prdct_id/-/=/+/$img_id'>
                          <i class='fa fa-trash deletimg' style='background-color:white;'></i></a>  
                        </div>
                        ";
                      }
                  }

                echo"
              </div>
              <a class='carousel-control-prev' href='#carouselExampleIndicators' role='button' data-slide='prev'>
                  <span style='background-color:black;'class='carousel-control-prev-icon' aria-hidden='true'></span>
                  <span style='background-color:black;' class='sr-only'>Previous</span>
              </a>
              <a class='carousel-control-next' href='#carouselExampleIndicators' role='button' data-slide='next'>
                  <span  style='background-color:black;'class='carousel-control-next-icon' aria-hidden='true'></span>
                  <span  style='background-color:black;' class='sr-only'>Next</span>
              </a>
          </div>
          <div  class='form-group m-0 mt-2' style='position:relative;'>
              <input name='img_path' id='img_path' type='file'maxlength='255'minlength='4'  class='form-control'required>
              <input name='prodct_id'  id='prodct_id'type='hidden'class='m-0 p-0'>
              <input name='usr_id'     id='usr_id'type='hidden'class='m-0 p-0'>
          </div>
        </div>
        <div class='modal-footer mt-0'>
          <button type='button' class='btn btn-danger cls'  data-dismiss='modal'>Close</button>
          <button type='submit' class='btn btn-primary' id='modal_img' >Add Image</button>
        </div>
      ";
}elseif(isset($_POST['prodct_id'])){///////add image to the product////////////////
  $imageName =  $_FILES['img_path']['name'];
  $imageTmpName =  $_FILES['img_path']['tmp_name'];
  $imageName =explode('.',$imageName) ;
  $imageName ='.' . $imageName[1];
  $date = date_create();
  $path= rand(1, date_timestamp_get($date));      
  $mypath = "../img/other_img_prdct/$path$imageName";
  move_uploaded_file($imageTmpName,$mypath);
  $image = "img/other_img_prdct/$path$imageName";

  $prdctid  = $_POST['prodct_id'];
  $merchantid = $_POST['usr_id'];

    if($image != '' && $prdctid != '' && $merchantid != '')
    {
      $db = connect_to_database();
      $query="INSERT INTO `prdct_imgs`(`userid`,`prdct_id`,`img`) VALUES ($merchantid,$prdctid,'$image')";
      $result=@mysqli_query($db,$query);echo"done";
    } 
}elseif($inptid == "delet_img"){///////////add image to the product////////////////
  if(isset($_GET['pid']) && $_GET['pid'] != ""){$prdct_id = $_GET['pid'];}
  if(isset($_GET['user_id']) && $_GET['user_id'] != ""){$user_id = $_GET['user_id'];}
  if(isset($_GET['img_id']) && $_GET['img_id'] != ""){$img_id = $_GET['img_id'];}
  $db = connect_to_database();
  $result = @mysqli_query($db, "SELECT `userid` ,`img` from prdct_imgs WHERE id=$img_id") ;  
  $row = mysqli_fetch_assoc($result);
  $owner_id = $row['userid'];
  $img = $row['img'];
  $img ="../$img";
   $usrid = user_id();
  if($owner_id == $usrid OR $usertyp == 'admin')
  {
  unlink($img);
  $db = connect_to_database();
  $query="DELETE FROM `prdct_imgs` WHERE id=$img_id";
  $result=@mysqli_query($db,$query);echo"done";//echo $owner_id ."____" . $usrid . "___" . $prdct_id;
  }else{header("location:../index.php");}
}
?>