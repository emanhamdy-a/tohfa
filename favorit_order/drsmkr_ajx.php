<?php
include("../includes/function.php"); 
 if(check_login() && user_type() =='dress_maker' || user_type() =='admin' )
 {}else{header("location:index.php");}
?>
<?php  ////catName and ctid is used if there is no sub category to fill sub select
if(isset($_GET['catName']) && $_GET['catName'] != ""){$catName_vl = $_GET['catName'];}else{$catName_vl=' ';}
if(isset($_GET['ctid']) && $_GET['ctid'] != ""){$ctid_vl = $_GET['ctid'];}else{$ctid_vl='0';}
if(isset($_GET['inptid']) && $_GET['inptid'] != ""){$inptid = $_GET['inptid'];}else{$inptid='mjhgd';}
if(isset($_GET['inptvl']) && $_GET['inptvl'] != ""){$inptvl = $_GET['inptvl'];}else{$inptvl=' ';}
if(isset($_GET['uid']) && $_GET['uid'] != ""){$id_user = $_GET['uid'];}

 
if(isset($_GET['edit'])) {$edit=$_GET['edit'];}else{$edit='no';}//'desc';
if(isset($_GET['edit_id'])) {$edit_id=$_GET['edit_id'];}else{$edit_id='0';}//'desc';
if(isset($_GET['selectvw'])) {$nu_view=$_GET['selectvw'];}else{$nu_view=9;};//'desc';
if(isset($_GET['pgntn_nu']) && $_GET['pgntn_nu'] !=''){$pgntn_nu=$_GET['pgntn_nu'];}else{$pgntn_nu= 0;}//'desc';

if(check_login() && user_type() =='dress_maker'){
 $iduser = user_id();
}elseif(check_login() && user_type() =='admin' ){
 if(isset($id_user)){$iduser = $id_user;}else{$iduser = 'no';}
}

if(isset($_POST['edit_nam'])){/////////////edit sppond submit///////////////////////
  
  $respond_id = $_POST['edit_id'];
  $rspnd_nam  = $_POST['edit_nam'];
  $rspnd_num  = $_POST['edit_num'];
  $rspnd_pric = $_POST['edit_pric'];
  $rspnd_dscrbtn = $_POST['edit_dscrbtn'];
  $owner_id = $iduser;
  $db = connect_to_database(); 
  $sql ="SELECT * FROM aply WHERE `id` = $respond_id ";
  $rslt=@mysqli_query($db,$sql); 
  if(@mysqli_num_rows($rslt) > 0) {
    
    $row_data  = mysqli_fetch_assoc($rslt);
    $drsmkr_id = $row_data['drsmkr_id']; 
    
      if($owner_id == $drsmkr_id || user_type() == 'admin'){
        if($rspnd_num != '' && $rspnd_nam != '' && $respond_id != '' && $rspnd_dscrbtn != '' && $rspnd_pric != ''){
            $query="UPDATE `aply` SET `atlnm`='$rspnd_nam',`dtls`='$rspnd_dscrbtn',`pric`=$rspnd_pric,`cal`='$rspnd_num' WHERE id = $respond_id";
            $result=@mysqli_query($db,$query);echo"done_" . $respond_id;
        }
      }
  }
}elseif($inptid == "show_rspnds"){/////////view user responding///////////////////////
      ////////////start third validation if 
       $db=connect_to_database();
       //get user id
       //$user_id=user_id();
       //select prdct by order and limit and catnm
         $query="SELECT * FROM aply WHERE `drsmkr_id` = $iduser ORDER BY id desc LIMIT $pgntn_nu,$nu_view "; 
         $qury ="SELECT * FROM aply WHERE `drsmkr_id` = $iduser ";
             $result=@mysqli_query($db,$query); 
             $nu_rw=@mysqli_num_rows($result);
             $rslt=@mysqli_query($db,$qury); 
             $nu_row=@mysqli_num_rows($rslt);
             $_SESSION['show_num_rspond']=  $nu_row;                                                      
           if(@mysqli_num_rows($result) > 0) 
           {  
             echo"<div id='accordion'style='border:solid 0px red;'";
             
             for($div=1 ; $div <= $nu_rw ;$div ++) 
               {///
                   $row_data  = mysqli_fetch_assoc($result);
                   $drsmkr_id = $row_data['drsmkr_id']; 
                   $order_id = $row_data['order_id']; 
                   $rspnd_id  = $row_data['id']; 
                   $byer_id   = $row_data['byer_id']; 
                   $detls     = $row_data['dtls'];         
                   $rspnd_pric= $row_data['pric']; 
                   $rspnd_titl= $row_data['atlnm']; 
                   $chanel= $row_data['cal']; 
                     echo"
                     <div class='card'>
                         <div class='card-header mb-0 slid count p-0' id='heading22_$div'>
                           <h5 class='m-0 p-2' style='height:65px;'>
                               <button class='col-12 btn btn-link text-right pr-2' data-toggle='collapse2' data-target='#collapse2$div' aria-expanded='true' aria-controls='collapse2$div'>
                                 <span style='color:#2E2E2E; float:left;' class='p-1'><span style=''>£E</span> :  $rspnd_pric</span>   <span style='color:#2E2E2E; float:right;' class='p-1'>$rspnd_titl <span style='' class='p-4'>+</span> </span>
                               </button>
                           </h5>
                         </div>
                           <div id='collapse2_$div' class='collapse";  if($div == 1 && $edit == 'no'){echo " show";}elseif($edit == 'edit' && $edit_id == $rspnd_id){echo" show";}  echo"' aria-labelledby='heading2$div' data-parent='#accordion'>
                            <div class='card-body' id='ordr_$div'  style='display:none;border:0px red solid;'>

                              ";
                                    $my_sql="SELECT * FROM orders WHERE id = $order_id"; 
                                    $resoolt=@mysqli_query($db,$my_sql); 
                                    $num_row=@mysqli_num_rows($resoolt);
                                if(@mysqli_num_rows($resoolt) > 0) {  
                                        $row_dt = mysqli_fetch_assoc($resoolt);
                                        //$byer_id  = $row_dt['user_id']; 
                                        //$order_id  = $row_dt['id']; 
                                        $detals     = $row_dt['detls'];         
                                        $order_img = $row_dt['img']; 
                                        $end_dat   = $row_dt['end']; 
                                        $order_pric= $row_dt['pric']; 
                                        $ordre_titl= $row_dt['titl']; 
                                            echo"
                                                <div class='product-content p-0 m-0'>
                                                    <div class='row m-0 p-0'>
                                                        <div class='col-lg-5'>
                                                            <img src='$order_img' alt='' style='max-height:550px;'>
                                                        </div>
                                                        <div class='col-lg-7 p-0 m-0 mt-5 text-right'>
                                                            <h5> : اسم الطلب</h5>
                                                            <p style=''><span class='p-3 text-danger'>$ordre_titl</span></p>
                                                            <h5> : التفاصيل</h5>
                                                            <p style='min-height:66px;'>$detals</p>
                                                            <h5> : تاريخ التسليم</h5>
                                                            <p style=''>بعد<span class='p-3 text-danger'>$end_dat</span>يوم</p>
                                                            <h5> : الثمن </h5>
                                                            <p style=''>£E :<span class='p-1 text-danger'> $order_pric </span></p>
                                                            <button id='showrspnd_$div' class='btn btn-secondary text-center show_rspnd p-2 mr-2'>مشاهده العرض </button>
                                                            <a href='responding.php?oid=$order_id&bid=$byer_id' class='border btn btn-info text-center mr-2 p-2'style='' >اضف عرض + </a>                                                </div>
                                                    </div>
                                                </div>
                                                ";
                                }
                               echo"
                                  
                            </div>

                           <div class='card-body' id='rspnd_$div'  style='border:0px red solid;'>
                               <div class='product-content p-0 m-0'>
                                   <div class='row m-0 p-0' style='text-align:center;'>
                                     <div class='col-lg-4'>
                                     </div>
                                     <div class='col-lg-8 p-0 m-0 mt-3 pr-4 text-right' style='margin:auto;positoin:relative;right:0px;'>
                                         <h5> : التفاصيل</h5>
                                         <p style=''>$detls</p>
                                         <h5>: الثمن</h5>
                                         <p style=''>£E<span class='p-3 text-info'>:</span>$rspnd_pric</p>
                                         <h5>: وسيله التواصل</h5>
                                         <p style=''><span class='p-3 text-info'>$chanel</span></p>
                                         <button id='showordr_$div' class='btn btn-info mr-2 text-center show_ordr p-2'>مشاهد الطلب</button>
                                         <button id='' class='btn btn-secondary text-center edit_rspnd p-2 mr-2'  data-toggle='modal' data-target='#edit_rspnds_cntnr'>تعديل </button>
                                         <input type='hidden' value='$rspnd_id'>
                                         <button id='' class='btn btn-danger text-center delt_rspnd p-2'  data-toggle='modal' data-target='#delete_rspnd'>حذف - </button>
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
            outputMessage("You Didnt Add Any Response Yet, Start Adding Some ...",'danger');
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
}elseif($inptid == "deletrspnd"){//////////delete prdct////////////////////////////
 ////////////start 5th validation if 
    $rspnd_id=$_GET['rid'];
    $db = connect_to_database();
    $result = @mysqli_query($db, "SELECT `drsmkr_id` from aply WHERE id=$rspnd_id") ;  
    $row = mysqli_fetch_assoc($result);
    $owner_id = $row['drsmkr_id'];
     $usrid = $iduser;
    if($owner_id == $usrid OR $usertyp == 'admin')
    {
    $db = connect_to_database();
    $query="DELETE FROM `aply` WHERE id=$rspnd_id";echo"done";
    $result=@mysqli_query($db,$query);//echo $owner_id ."____" . $usrid . "___" . $rspnd_id;
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
  echo"Show " .  $pgntn_nu . " - " .  $count . " OF "  . $_SESSION['show_num_rspond'] . " Respondse";
 ////////////end 5th validation if 
}elseif($inptid == "edit_rspnd"){//////////echo edit rspond form////////////////////////////

  $db=connect_to_database();
  $query="SELECT * FROM aply WHERE `id` = $inptvl"; 
      $result=@mysqli_query($db,$query); 
      $nu_rw=@mysqli_num_rows($result);
    if(@mysqli_num_rows($result) > 0) {               
     $row_data  = mysqli_fetch_assoc($result);
     $rspnd_id = $row_data['id']; 
     $drsmkr_id = $row_data['drsmkr_id']; 
     $byer_id   = $row_data['byer_id']; 
     $detls     = $row_data['dtls'];         
     $rspnd_pric= $row_data['pric']; 
     $rspnd_titl= $row_data['atlnm']; 
     $chanel= $row_data['cal']; 
     echo"
         <form id='edit_respond' action='favorit_order/drsmkr_ajx.php'method='post' class='checkout-form col-12 m-0' style='margin:auto;border:1px lightgray solid;border-radius:6px;'>
             <div  class='modal-header mb-3'>
                 <h5  class='modal-title' id='edit_titl'>Edit Your Responding ... </h5>
                 <h5  class='modal-title alert alert-success col-12' id='edit_scss' style='display:none;' >Done ... </h5>
                 <span  data-dismiss='modal' aria-hidden='true' style='cursor: pointer;font-weight:1000;' id='clos'>&times;</span>
             </div>
             <div  class='form-group pt-2'>
                 <label for=''>Atelier Or DressMaker Name</label>
                 <input value='$rspnd_titl' name='edit_nam' id='edit_nam' type='text'maxlength='50'minlength='4'  class='form-control empty' required>
             </div>
             <div  class='form-group pt-2'>
                 <label for=''>Phone Or Email Or Any Chanel</label>
                 <input value='$chanel' name='edit_num' id='edit_num' type='text'maxlength='50'minlength='4'  class='form-control empty' required>
             </div>
             <div  class='form-group'>
                 <label for='exampleFormControlTextarea1'>Details</label>
                 <textarea value='' name='edit_dscrbtn'maxlength='500'minlength='5'  class='form-control empty' id='edit_dscrbtn' rows='3' required>$detls</textarea>
             </div>
             <div  class='form-group'>
                 <label for=''>Price</label>
                 <input value='$rspnd_pric' name='edit_pric' id='edit_pric' type='number'maxlength='8'  class='form-control empty' required>
                 <input value='$rspnd_id' name='edit_id'   id='edit_id' type='hidden' class='empty'>
             </div>

             <div  class='modal-footer'>
                 <button type='button' id='clos_edit' class=' btn btn-secondary' data-dismiss='modal'>Cancel</button>
                 <button type='submit' id='edit_submit'  class='btn btn-primary'>Eidt</button>
             </div>
         </form>";
    }
}
?>