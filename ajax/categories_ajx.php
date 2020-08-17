<?php include("../includes/function.php"); ?>
<?php  ////catName and ctid is used if there is no sub category to fill sub select
if(isset($_GET['catName']) && $_GET['catName'] != ""){$catName_vl = $_GET['catName'];}else{$catName_vl=' ';}
if(isset($_GET['ctid']) && $_GET['ctid'] != ""){$ctid_vl = $_GET['ctid'];}else{$ctid_vl='0';}
if(isset($_GET['inptid']) && $_GET['inptid'] != ""){$inptid = $_GET['inptid'];}else{$inptid='mjhgd';}


if(isset($_GET['sub_cat_id'])) {$sub_cat_id=$_GET['sub_cat_id'];}else{$sub_cat_id='all';}//'desc';
if(isset($_GET['selectct'])) {$order=$_GET['selectct'];}else{$order='all';}//'desc';
if(isset($_GET['selectvw'])) {$nu_view=$_GET['selectvw'];}else{$nu_view=9;};//'desc';
if(isset($_GET['pgntn_nu']) && $_GET['pgntn_nu'] !=''){$pgntn_nu=$_GET['pgntn_nu'];}else{$pgntn_nu= 0;}//'desc';
if(isset($_GET['mx_pric']) && $_GET['mx_pric'] !=''){$mx_pric=$_GET['mx_pric'];}else{$mx_pric= 9999;}//'desc';
if(isset($_GET['mn_pric']) && $_GET['mn_pric'] !=''){$mn_pric=$_GET['mn_pric'];}else{$mn_pric= 0;}//'desc';


if($inptid == "main_cat"){ ////////////////echo sub category content///////////////
  ////////////start first validation if 
  $db = connect_to_database();    
  $result = @mysqli_query($db, "SELECT id,catnm from category3 WHERE parnt_id = $order order by id asc    ");
  $nmrw = 0;
  if($order != 'all'){ $nmrw=@mysqli_num_rows($result);}
  if($nmrw > 0 && $order != 'all'){
            echo"<div class='sc-item col-12'style=''>
            <input value='all'class='sub_ct_vl' type='button' style='' id='all'>
            <label class='ml-0 labl_sub_cat "; if($sub_cat_id == 'all'){echo "active";} echo"'style='width:122px;' for='all'>الكل</label>
            </div>";
        for($x = 0 ; $x < $nmrw ; $x ++ )
        {   $row = mysqli_fetch_assoc($result);
            $catId = $row['id'];
            $catName = $row['catnm'];
            echo"<div class='sc-item col-12'style=''>
                <input value='$catId'class='sub_ct_vl' type='button' style='' id='$catId'>
                <label class='ml-0 labl_sub_cat "; if($sub_cat_id == $catId){echo "active";} echo"'style='width:122px;' for='$catId'>$catName</label>
                </div>";
        }
  }else{
          echo"<div class='sc-item col-12'style=''>
          <input value='all'class='sub_ct_vl' type='button' style='' id='all'>
          <label class='ml-0 labl_sub_cat active'style='width:122px;' for='all'>All</label>
          </div>";
  }

  ////////////end first validation if
}elseif($inptid == "show_cat"){//////////view category product///////////////////////
 ////////////start third validation if 
 $db=connect_to_database();
  //get user id
  //select prdct by order and limit and catnm
  if($order=='all'){
    $query="SELECT * FROM prdct WHERE pric BETWEEN $mn_pric AND $mx_pric LIMIT $pgntn_nu,$nu_view ";
     $qury="SELECT * FROM prdct  WHERE pric BETWEEN $mn_pric AND $mx_pric ";
  }elseif($order !='all' && $sub_cat_id == 'all'){
     $query="SELECT * FROM prdct WHERE cat_id = $order AND pric BETWEEN $mn_pric AND $mx_pric LIMIT $pgntn_nu,$nu_view " ; 
     $qury ="SELECT * FROM prdct WHERE cat_id = $order AND pric BETWEEN $mn_pric AND $mx_pric ";
  }elseif($order !='all' && $sub_cat_id != 'all'){
     $query="SELECT * FROM prdct WHERE sub_cat = $sub_cat_id AND pric BETWEEN $mn_pric AND $mx_pric LIMIT $pgntn_nu,$nu_view " ; 
     $qury ="SELECT * FROM prdct WHERE sub_cat = $sub_cat_id AND pric BETWEEN $mn_pric AND $mx_pric";
  }
        $result=@mysqli_query($db,$query); 
        $nu_rw=@mysqli_num_rows($result);
        $rslt=@mysqli_query($db,$qury); 
        $nu_row=@mysqli_num_rows($rslt);
        $_SESSION['show_area_cat']=  $nu_row;                                                      
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
                          <img src='$prdct_img' alt=''style='height:315px;'><span id='echo$prdct_id'>";
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
                      <ul class='pagination justify-content-end p-0 m-0'id='pagntn_area'style=''>";
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
      if(@mysqli_num_rows($result) < 1){outputMessage("Threr Is No products In Category",'danger');
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
  echo"Show " .  $pgntn_nu . " - " .  $count . " OF "  . $_SESSION['show_area_cat'] . " Product";
 ////////////end 5th validation if 
}elseif($inptid == "----"){}
?>