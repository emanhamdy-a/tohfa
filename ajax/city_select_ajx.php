<?php
include("../includes/function.php"); 
?>
<?php  ////catName and ctid is used if there is no sub category to fill sub select
if(isset($_GET['catName']) && $_GET['catName'] != ""){$catName_vl = $_GET['catName'];}else{$catName_vl=' ';}
if(isset($_GET['ctid']) && $_GET['ctid'] != ""){$ctid_vl = $_GET['ctid'];}else{$ctid_vl='0';}
if(isset($_GET['inptid']) && $_GET['inptid'] != ""){$inptid = $_GET['inptid'];}else{$inptid='mjhgd';}
if(isset($_GET['inptvl']) && $_GET['inptvl'] != ""){$inptvl = $_GET['inptvl'];}else{$inptvl=' ';}

if($inptid == "main_cat"){ ////////////////echo sub category content///////////////
  ////////////start first validation if 
  $db = connect_to_database();    
  $result = mysqli_query($db, "SELECT id,cty_nm from ctys WHERE parnt_id = $inptvl order by id asc ");
  $nmrw=mysqli_num_rows($result);
  if($nmrw > 0){
   /* ECHO "<label for='exampleFormControlSelect1'>Category</label>
        <select name='subcatid'id='sub_cat'   class='form-control'>";*/
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