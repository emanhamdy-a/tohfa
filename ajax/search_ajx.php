<?php
include("../includes/function.php"); 
?>

<?php  ////catName and ctid is used if there is no sub category to fill sub select

if(isset($_GET['inptid']) && $_GET['inptid'] != ""){$inptid = $_GET['inptid'];}else{$inptid='mjhgd';}
if(isset($_GET['inptvl']) && $_GET['inptvl'] != ""){$inptvl = $_GET['inptvl'];}else{$inptvl='mjhgd';}
if(isset($_GET['selectct']))  {$order=$_GET['selectct'];}else{$order='all';}
if(isset($_GET['selectvw'])) {$nu_view=$_GET['selectvw'];}else{$nu_view=6;};
if(isset($_GET['pgntn_nu']) && $_GET['pgntn_nu'] !=''){$pgntn_nu=$_GET['pgntn_nu'];}else{$pgntn_nu= 0;}
if(isset($_GET['selectdt'])){$selectdt=$_GET['selectdt'];}else{$selectdt='desc';}
if(isset($_GET['sub_cat']))  {$sub_cat=$_GET['sub_cat'];}else{$sub_cat='all';}
if(isset($_GET['mn_pric']) && $_GET['mn_pric'] !='')  {$mn_pric=$_GET['mn_pric'];}else{$mn_pric=0;}
if(isset($_GET['mx_pric']) && $_GET['mx_pric'] !='')  {$mx_pric=$_GET['mx_pric'];}else{$mx_pric=9999;}
if(isset($_GET['search_wrd'])){$search_wrd=$_GET['search_wrd'];}else{$search_wrd='';}
//if(isset($_GET['frst']) && $_GET['frst'] != ""){$frst = $_GET['frst'];}else{$frst='';}

if($inptid == "main_cat"){ ///////////////////////echo sub category content///////////////
  ////////////start first validation if 
  $db = connect_to_database();
  if($inptvl != 'all'){
      $result = @mysqli_query($db, "SELECT id,catnm from category3 WHERE parnt_id = $inptvl order by id asc    ");
      $nmrw=@mysqli_num_rows($result);
      if($nmrw > 0){
            /* ECHO "<label for='exampleFormControlSelect1'>Category</label>
            <select name='subcatid'id='sub_cat'   class='form-control'>";*/
        ECHO "<option  class='font' id='all' value='all'>All</option>";        
        while($row = mysqli_fetch_array($result))
            {
                $catId = $row['id'];
                $catName = $row['catnm'];
                
                ECHO "<option  class='font' id='$catId' value='$catId'>$catName</option>";        
            }
      }     

  }else{
    ECHO "<option  class='font' id='all' value='all'>All</option>";        
  }        /*  ECHO"</select>";*/
  ////////////end first validation if
}elseif($inptid == "echo_search_result"){///////////////view user search result///////////////
 ////////////start third validation if 
 $db=connect_to_database();//echo $search_wrd . $mn_pric . $mx_pric . $sub_cat . $selectdt . $pgntn_nu .$nu_view; 
    if($sub_cat != 'all' && $search_wrd != ''){
        echo $frst;$query="SELECT * FROM prdct WHERE (prdctnm LIKE '%$search_wrd%' OR dscrptn LIKE '%$search_wrd%') AND 
        pric BETWEEN $mn_pric AND $mx_pric AND sub_cat = $sub_cat
        order by  id  $selectdt LIMIT $pgntn_nu,$nu_view ";

        $qury="SELECT * FROM prdct WHERE (prdctnm LIKE '%$search_wrd%' OR dscrptn LIKE '%$search_wrd%') AND 
        pric BETWEEN $mn_pric AND $mx_pric AND sub_cat = $sub_cat";
    }elseif($sub_cat == 'all' && $search_wrd != '' && $order == 'all'){

        $query="SELECT * FROM prdct WHERE (prdctnm LIKE '%$search_wrd%' OR dscrptn LIKE '%$search_wrd%') AND 
        pric BETWEEN $mn_pric AND $mx_pric 
        order by  id  $selectdt LIMIT $pgntn_nu,$nu_view ";

        $qury="SELECT * FROM prdct WHERE (prdctnm LIKE '%$search_wrd%' OR dscrptn LIKE '%$search_wrd%') AND 
        pric BETWEEN $mn_pric AND $mx_pric";
    }elseif($sub_cat == 'all' && $search_wrd != '' && $order != 'all'){

      $query="SELECT * FROM prdct WHERE (prdctnm LIKE '%$search_wrd%' OR dscrptn LIKE '%$search_wrd%') AND 
      pric BETWEEN $mn_pric AND $mx_pric AND cat_id = $order 
      order by  id  $selectdt LIMIT $pgntn_nu,$nu_view ";

      $qury="SELECT * FROM prdct WHERE (prdctnm LIKE '%$search_wrd%' OR dscrptn LIKE '%$search_wrd%') AND 
      pric BETWEEN $mn_pric AND $mx_pric AND cat_id = $order";
    }elseif($sub_cat != 'all' && $search_wrd == ''){

        $query="SELECT * FROM prdct WHERE pric BETWEEN $mn_pric AND $mx_pric AND sub_cat = $sub_cat
        order by  id  $selectdt LIMIT $pgntn_nu,$nu_view ";

        $qury="SELECT * FROM prdct WHERE pric BETWEEN $mn_pric AND $mx_pric AND sub_cat = $sub_cat";
    }elseif($sub_cat == 'all' && $search_wrd == '' && $order == 'all'){
  
        $query="SELECT * FROM prdct WHERE pric BETWEEN $mn_pric AND $mx_pric 
        order by  id  $selectdt LIMIT $pgntn_nu,$nu_view ";
  
        $qury="SELECT * FROM prdct WHERE  pric BETWEEN $mn_pric AND $mx_pric";
    }elseif($sub_cat == 'all' && $search_wrd == '' && $order != 'all'){
  
        $query="SELECT * FROM prdct WHERE pric BETWEEN $mn_pric AND $mx_pric AND cat_id = $order 
        order by  id  $selectdt LIMIT $pgntn_nu,$nu_view ";
  
        $qury="SELECT * FROM prdct WHERE pric BETWEEN $mn_pric AND $mx_pric AND cat_id = $order";
    }else{
        $query="SELECT * FROM prdct WHERE pric BETWEEN 0 AND 1 AND cat_id = 999 
        order by  id  $selectdt LIMIT $pgntn_nu,$nu_view ";
  
        $qury="SELECT * FROM prdct WHERE pric BETWEEN 0 AND 1 AND cat_id = 999";      
    }

        $result=@mysqli_query($db,$query); 
        $nu_rw=@mysqli_num_rows($result);
        $rslt=@mysqli_query($db,$qury); 
        $nu_row=@mysqli_num_rows($rslt);
        $_SESSION['show_area_search']=  $nu_row;                                                      
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
      if(@mysqli_num_rows($result) < 1){outputMessage("There Is No Product Like That Try Again With Another Filters .....",'danger');
      }else{}                            
  
   ////////////end third validation if 
}elseif($inptid == "search_show_result"){/////////echo show results/////////////////
 $count=$_GET['show_result'];
 $count= intval($count) + intval($pgntn_nu);
 if($count > 0){
   $pgntn_nu = intval($pgntn_nu) + 1;
  }
 else{
    $pgntn_nu = intval($pgntn_nu);
  }
  echo"Show " .  $pgntn_nu . " - " .  $count . " OF "  . $_SESSION['show_area_search'] . " Product";
 ////////////end 5th validation if 
}
?>