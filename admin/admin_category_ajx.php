<?php
include("../includes/function.php"); 
$usertyp=user_type();
if(check_login() && $usertyp =='admin')
{}else{header("location:../index.php");} 
?>
<?php  
if(isset($_GET['inptid']) && $_GET['inptid'] != ""){$inptid = $_GET['inptid'];}else{$inptid='';}
if(isset($_GET['selectct'])) {$order=$_GET['selectct'];}else{$order='all';}//'desc';
if(isset($_GET['selectvw'])) {$nu_view=$_GET['selectvw'];}else{$nu_view=10;};//'desc';
if(isset($_GET['pgntn_nu']) && $_GET['pgntn_nu'] !=''){$pgntn_nu=$_GET['pgntn_nu'];}else{$pgntn_nu= 0;}//'desc';
   
   if($inptid == "show_cats"){/////////////////view category3 data////////////////////
    ////////////start third validation if 
     $db=connect_to_database();
     //select type of category3
     //get num category3 to view them
     if($order=='all')
     { $query="SELECT * FROM category3  order by parnt_id asc LIMIT $pgntn_nu,$nu_view ";
       $qury="SELECT * FROM category3";
       //select user by order and limit and user type
     }elseif($order !='all')
          { $query="SELECT * FROM category3 WHERE parnt_id= '$order' order by parnt_id asc  LIMIT $pgntn_nu,$nu_view " ; 
           $qury="SELECT * FROM category3 WHERE parnt_id= '$order'";
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
                 $cat_id = $row_data['id']; 
                 $cat_nm = $row_data['catnm']; 
                 $parnt_id = $row_data['parnt_id']; 
                 $img_ct = $row_data['imgct']; 
         
               echo "
                   <tr class='count' style=''>
                       <td>$cat_id</td>
                       <td>$cat_nm</td>
                       <td>$parnt_id</td>                        
                       <td>$img_ct</td>                        
                       <td style='text-align:center;width:155px;padding:0px;'>
                           <a style='font-size:0px;height:0px;'>$img_ct</a>
                           <a style='cursor:pointer;' class='viewlink'data-toggle='modal' data-target='#viewcategoryModal' data-toggle='tooltip'><i class='material-icons' data-toggle='tooltip' title='View'><img  src='img/icon/view.png' alt=''></i></a>
                           <a style='font-size:0px;height:0px;'>$cat_id/-/=/+/$parnt_id/-/=/+/$cat_nm</a>
                           <a style='cursor:pointer;' class='edit_cat' data-toggle='modal' data-target='#editcategoryModal'><i class='material-icons' data-toggle='tooltip' title='Edit'><img  src='img/icon/edit.png' alt=''></i></a>
                           <a style='font-size:0px;height:0px;'>$cat_id</a>
                           <a style='cursor:pointer;' class='deletlink'  data-toggle='modal' data-target='#deletcategoryModal' ><i class='material-icons' data-toggle='tooltip' title='Delete'><img  src='img/icon/delet.png' alt=''></i></a>
                       </td>
                       <td style='width:0px;padding:0px;'></td>
                   </tr>
                   ";
              }
       ////
   
               echo"</div>"; 
             
             echo"
                   <div class='row m-0 mt-5 p-0 col-11'style='border:solid red 0px;position:absolute;'id=''>
                   <div class='col-12 p-0 '>
                       <nav aria-label='navigation' style='position:relative;'>
                           <ul class=' pagination justify-content-end p-0 m-0'id='pagntnarea'style=''>";
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
           }elseif(@mysqli_num_rows($result) < 1){
              $query="SELECT * FROM category3 WHERE id= '$order'" ;
              $result=@mysqli_query($db,$query); /////////////
              echo"<div class='row'style='border:solid px red;'>";
             
                    $row_data = mysqli_fetch_assoc($result);
                    $cat_id = $row_data['id']; 
                    $cat_nm = $row_data['catnm']; 
                    $parnt_id = $row_data['parnt_id']; 
                    $img_ct = $row_data['imgct']; 
            
                    echo "
                    <tr class='count' style=''>
                        <td>$cat_id</td>
                        <td>$cat_nm</td>
                        <td>$parnt_id</td>                        
                        <td>$img_ct</td>                        
                        <td style='text-align:center;width:155px;padding:0px;'>
                            <a style='font-size:0px;height:0px;'>$img_ct</a>
                            <a style='cursor:pointer;' class='viewlink'data-toggle='modal' data-target='#viewcategoryModal' data-toggle='tooltip'><i class='material-icons' data-toggle='tooltip' title='View'><img  src='img/icon/view.png' alt=''></i></a>
                            <a style='font-size:0px;height:0px;'>$cat_id/-/=/+/$parnt_id/-/=/+/$cat_nm</a>
                            <a style='cursor:pointer;' class='edit_cat' data-toggle='modal' data-target='#editcategoryModal'><i class='material-icons' data-toggle='tooltip' title='Edit'><img  src='img/icon/edit.png' alt=''></i></a>
                            <a style='font-size:0px;height:0px;'>$cat_id</a>
                            <a style='cursor:pointer;' class='deletlink'  data-toggle='modal' data-target='#deletcategoryModal' ><i class='material-icons' data-toggle='tooltip' title='Delete'><img  src='img/icon/delet.png' alt=''></i></a>
                        </td>
                        <td style='width:0px;padding:0px;'></td>
                    </tr>
                    ";

      
                  echo"</div>";

             /////////////////////////////////// echo"<div id='eror_msg'style='position:absolute;margin:auto;' class='col-11 row mt-2 mr-0 ml-0  alert alert-danger'>You have no categories here ...</div>";
           }                                  
       
    ////////////end third validation if 
   
    ////////////end 4th validation if     
   }elseif($inptid == "deletcat"){/////////////delete prdct///////////////////////////
    ////////////start 5th validation if 
       $user=$_GET['uid'];
       $db = connect_to_database();
       $result = @mysqli_query($db, "SELECT `imgct` from category3 WHERE id=$user") ;  
       $row = mysqli_fetch_assoc($result);
       $img = $row['imgct'];
       $img ="../$img";
       unlink($img);
       $query="DELETE FROM `category3` WHERE id=$user";
       $result=@mysqli_query($db,$query);
    ////////////end 5th validation if 
   }elseif($inptid == "show_result"){//////////echo show results//////////////////////
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
   }elseif(isset($_POST['add_ctmain']) ){//////add category///////////////////////////
     /////////////////////////////////
     if(isset($_POST['add_ctnm']) && $_POST['add_ctnm'] != ""){$add_ctnm = $_POST['add_ctnm'];}else{$add_ctnm='';}
     if(isset($_POST['add_ctmain']) && $_POST['add_ctmain'] != ""){$add_ctmain = $_POST['add_ctmain'];}else{$add_ctmain='';}
     $imageName =  $_FILES['add_ctimg']['name'];
     $imageTmpName =  $_FILES['add_ctimg']['tmp_name'];
     $imageName =explode('.',$imageName) ;
     $imageName ='.' . $imageName[1];
     $date = date_create();
     $path= rand(1, date_timestamp_get($date));      
     $mypath = "../img/catimg/$path$imageName";
     move_uploaded_file($imageTmpName,$mypath);
     //////////////////////////////////////
     $image = "img/catimg/$path$imageName";
     if($add_ctnm != '' && $add_ctmain != '' && $imageName != ''){
       $db = connect_to_database();
       $sql="INSERT INTO category3 (catnm , parnt_id ,imgct) VALUES ('$add_ctnm' , $add_ctmain ,'$image')";
       $result=@mysqli_query($db,$sql);
       echo"done";
      } 
     /////////////////////////////////
   }elseif(isset($_POST['edit_ctmain']) ){////////edit category//////////////////////////
     //////////////////////////////
      $cat_id=$_POST['cat_id'];
      $db = connect_to_database();
      $query="SELECT `imgct` FROM `category3` WHERE id =$cat_id";
      $result=@mysqli_query($db,$query);
      $row = mysqli_fetch_assoc($result);
      $img = $row['imgct'];
      $img = "../$img";
      $image = '';
      if($usertyp =='admin')
      {
        if(isset($_POST['edit_ctnm']) && $_POST['edit_ctnm'] != ""){$edit_ctnm = $_POST['edit_ctnm'];}else{$edit_ctnm='';}
        if(isset($_POST['edit_ctmain']) && $_POST['edit_ctmain'] != ""){$edit_ctmain = $_POST['edit_ctmain'];}else{$edit_ctmain='';}
        ////if there new image move it and delete the old one
        if(isset($_FILES['edit_ctimg']['name']) && $_FILES['edit_ctimg']['name'] != '')
        {
          $imageName =  $_FILES['edit_ctimg']['name'] ;
          $imageTmpName =  $_FILES['edit_ctimg']['tmp_name'] ;
          $imageName =explode('.',$imageName) ;
          $imageName ='.' . $imageName[1];
          $date = date_create();
          $path= rand(1, date_timestamp_get($date));      
          $mypath = "../img/catimg/$path$imageName";
          move_uploaded_file($imageTmpName,$mypath);
          $image = "img/catimg/$path$imageName";
          unlink($img);

        }
      
          if($edit_ctnm != ''&& $edit_ctmain != '' && $image != '' )
          { 
            $query="UPDATE `category3` set `catnm`='$edit_ctnm',`parnt_id`= $edit_ctmain ,`imgct`='$image' WHERE id =$cat_id";
            $result=@mysqli_query($db,$query);echo"done";
          }
          elseif($edit_ctnm != '' && $edit_ctmain != '')
          {
            $query="UPDATE `category3` set `catnm`='$edit_ctnm',`parnt_id`= $edit_ctmain WHERE id =$cat_id";
            $result=@mysqli_query($db,$query);echo"done";
          }
          
      }
      else{header("location:../index/index.php");}
     //////////////////////////////
   }elseif($inptid == "delet_category"){
    /////////////////////////////////
    $cat=$_GET['cat_id'];
    $db = connect_to_database();

    $query="SELECT `imgct` FROM `category3` WHERE id =$cat";
    $result=@mysqli_query($db,$query);
    $row = mysqli_fetch_assoc($result);
    $img = $row['imgct'];
    $img = "../$img";
    unlink($img);

    $query="DELETE FROM `category3` WHERE id=$cat";
    $result=@mysqli_query($db,$query);
    ///////////////////////////////// 
   }elseif($inptid == "view_catimg"){
     /////////////////////////////

     /////////////////////////////
   }
   ?>