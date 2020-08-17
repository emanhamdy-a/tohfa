<?php include('../includes/function.php');  $usertyp=user_type(); ?>
<?php

if(isset($_GET['pid']) && $_GET['pid'] != ""){$prdct_id = $_GET['pid'];}
if($prdct_id == "adprdct")
    {
        echo"<form id='form' action='ajax/myaccount_ajx.php'method='post' class='checkout-form col-12 m-0' enctype='multipart/form-data' style='margin:auto;border:1px lightgray solid;border-radius:6px;'>
        <div  class='modal-header mb-3'>
            <h5  class='modal-title' id='modal_titl'>Add new product ... </h5>
            <span data-toggle='modal' data-target='#ad_prdct_cntnr'  aria-hidden='true' style='cursor: pointer;font-weight:1000;' id='clos'>&times;</span>
        </div>
        <div clas='col-12 m-0 p-0 'style='border:0px solid green;'>
            <div  class='form-group m-0 p-0'style='width:48%;display:inline-block;'>
                <label for='exampleFormControlSelect1'>Category</label>
                <select value='' name='catid'   id='main_cat'  class='form-control'>";
                    
                        $db = connect_to_database();    
                        $result = @mysqli_query($db, 'SELECT id,catnm from category3 WHERE parnt_id = 0 order by id asc ');
                        while($row = mysqli_fetch_array($result))
                            {
                                $catId = $row['id'];
                                $catName = $row['catnm'];
                                ECHO "<option  class='font' value='$catId'>$catName</option>";        
                            }
            echo"        
                </select>
            </div> 
            <div id='echo_sub_cat' class='form-group m-0  p-0'style='width:48%;display:inline-block;float:right;'>
                <label for='exampleFormControlSelect1'>Category</label>
                <select value='' name='subcatid'id='sub_cat'   class='form-control'>";
                    
                        $db = connect_to_database();    
                        $result = @mysqli_query($db, 'SELECT id,catnm from category3 WHERE parnt_id = 1 order by id asc    ');
                        while($row = mysqli_fetch_array($result))
                            {
                                $catId = $row['id'];
                                $catName = $row['catnm'];
                                ECHO "<option  class='font' value='$catId'>$catName</option>";        
                            }
                    echo" 
                </select>
            </div>
        </div>
        <div  class='form-group pt-4'>
        <label for=''>Product Name</label>
        <input value='' name='prdct_nm' id='prdct_nm' type='text'maxlength='40'minlength='3'  class='form-control' placeholder='product name' required>
        </div>
        <div  class='form-group'>
            <label for='exampleFormControlTextarea1'>Description</label>
            <textarea value='' name='description'maxlength='400'minlength='5'  class='form-control' id='description' rows='3' required></textarea>
        </div>
        <div  class='form-group'>
            <label for=''>Price</label>
            <input value='' name='price' id='price' type='number'maxlength='8'  class='form-control' placeholder='product price'required>
        </div>
        <div  class='form-group'>
            <label for=''>Stock</label>
            <input value='' name='stock' id='stock' type='number'maxlength='6'  class='form-control' placeholder='Amount'required>
        </div>
        <div  class='form-group' style='position:relative;'>
            <label for=''>Image</label>
            <!--<span class='col-9 m-0' style='background-color:red;position:absolute;top:40px;left:122px;z-index:54354;'>ttttttttttt</span>-->
            <input value='' name='image' id='image' type='file'maxlength='255'minlength='4'  class='form-control' style='' placeholder='Amount'required>
        </div>
        <div  class='modal-footer'>
            <button type='button' id='close' class=' btn btn-secondary' data-dismiss='modal'>Close</button>
            <button type='submit' id='save'  class='btn btn-primary'>Save</button>
        </div>
        </form>
    ";
    }else{

        $prdct_id=$_GET['pid'];
        $db = connect_to_database();
        $query="SELECT  `prdctnm`, `dscrptn`, `pric`, `stock`, `image`, `cat_id`,`sub_cat`, `userid` FROM `prdct` WHERE id=$prdct_id";
        $result=@mysqli_query($db,$query);
        $row = mysqli_fetch_assoc($result);
        $owner_id = $row['userid'];
       if($owner_id == user_id() OR $usertyp =='admin')
        {
            $prdct_nm  = $row['prdctnm'];
            $prdct_dsc = $row['dscrptn'];
            $prdct_prc = $row['pric'];
            $prdct_stk = $row['stock'];
            $prdct_img = $row['image'];
            $prdct_cat = $row['cat_id'];
            $sub_cat   = $row['sub_cat'];
         }

    echo"<form id='form' action='ajax/myaccount_ajx.php'method='post' class='checkout-form col-12 m-0' enctype='multipart/form-data' style='margin:auto;border:1px lightgray solid;border-radius:6px;'>
        <div  class='modal-header mb-3'>
            <h5  class='modal-title' id='modal_titl'>Edit Product ... </h5>
            <span aria-hidden='true'data-toggle='modal' data-target='#ad_prdct_cntnr' style='cursor: pointer;font-weight:1000;' id='clos'>&times;</span>
        </div>
        <div clas='col-12 m-0 p-0 'style='border:0px solid green;'>
            <div  class='form-group m-0 p-0'style='width:48%;display:inline-block;'>
                <label for='exampleFormControlSelect1'>Category</label>
                <select value='' name='edit_catid'   id='main_cat'  class='form-control'>";
                    
                        $db = connect_to_database();    
                        $result = @mysqli_query($db, 'SELECT id,catnm from category3 WHERE parnt_id = 0 order by id asc ');
                        while($row = mysqli_fetch_array($result))
                            {
                                $catId = $row['id'];
                                $catName = $row['catnm'];
                                ECHO "<option  class='font' value='$catId'";if($catId == $prdct_cat){echo"selected";}echo">$catName</option>";        
                            }
            echo"        
                </select>
            </div> 
            <div id='echo_sub_cat' class='form-group m-0  p-0'style='width:48%;display:inline-block;float:right;'>
                <label for='exampleFormControlSelect1'>Category</label>
                <select value='' name='subcatid'id='sub_cat'   class='form-control'>";
                   
                        $result = @mysqli_query($db, "SELECT id,catnm from category3 WHERE parnt_id = $prdct_cat order by id asc");
                        $nm_rw=@mysqli_num_rows($result);
                        if($nm_rw > 0){
                           while($row = mysqli_fetch_array($result))
                             {
                                $catId = $row['id'];
                                $catName = $row['catnm'];
                                ECHO "<option  class='font' value='$catId'";if($catId == $sub_cat){echo"selected";}echo">$catName</option>";        
                             }
                        }else{
                                $result = @mysqli_query($db, "SELECT id,catnm from category3 WHERE id = $prdct_cat order by id asc");
                                while($row = mysqli_fetch_array($result))
                                {
                                    $catId = $row['id'];
                                    $catName = $row['catnm'];
                                    ECHO "<option  class='font' value='$catId'";if($catId == $sub_cat){echo"selected";}echo">$catName</option>";        
                                }
                        }  
                    echo" 
                </select>
            </div>
        </div>
        <div  class='form-group pt-4'>
            <label for=''>Product Name</label>
            <input value='$prdct_nm' name='prdct_nm' id='prdct_nm' type='text'maxlength='40' minlength='3'  class='form-control' placeholder='product name' required>
        </div>
        <input value='$prdct_id' name='prdct_id' id='prdct_id' typ='number'style='position:absolute;top:35%;z-index:-6;width:5px;height:5px;'>
        <div  class='form-group'>
            <label for='exampleFormControlTextarea1'>Description</label>
            <textarea value='' name='description'maxlength='400'minlength='5'  class='form-control' id='description' rows='3' required>$prdct_dsc</textarea>
        </div>
        <div  class='form-group'>
            <label for=''>Price</label>
            <input value='$prdct_prc' name='price' id='price' type='number'maxlength='7'  class='form-control' placeholder='product price'required>
        </div>
        <div  class='form-group'>
            <label for=''>Stock</label>
            <input value='$prdct_stk' name='stock' id='stock' type='number'maxlength='6'  class='form-control' placeholder='Amount'required>
        </div>
        <div  class='form-group' style='position:relative;'>
            <label for=''>Image</label>
            <!--<span class='col-9 m-0' style='background-color:red;position:absolute;top:40px;left:122px;z-index:54354;'>ttttttttttt</span>-->
            <input value='$prdct_img' name='image' id='image' type='file'maxlength='255'minlength='4'  class='form-control' style='' placeholder='Amount'>
        </div>
        <div  class='modal-footer'>
            <button type='button' id='close' class=' btn btn-secondary' data-dismiss='modal'>Close</button>
            <button type='submit' id='save'  class='btn btn-primary'>Save</button>
        </div>
        </form>
    ";
}
?> 
