<?php
include("../includes/function.php"); 
$usertyp=user_type();
if(check_login() && $usertyp =='admin')
{}else{header("location:../index.php");} 
?>
<?php
if(isset($_GET['uid']) && $_GET['uid'] != ""){$user_id = $_GET['uid'];}
if(isset($_GET['view']) && $_GET['view'] != ""){$viewdata = $_GET['view'];}else{$viewdata = '';}
if($user_id == "aduser")
    {

    }elseif($viewdata == "viewdata"){
        $user_id=$_GET['uid'];
        $db = connect_to_database();
        $query="SELECT * FROM `users` WHERE id=$user_id";
        $result=@mysqli_query($db,$query);
        $row_data = mysqli_fetch_assoc($result);
        $user_pswrd = $row_data['pasword']; 
        $user_usrnm = $row_data['usernm']; 
        $user_fulnm = $row_data['fulnm']; 
        $user_phonnu = $row_data['phonnu']; 
        $user_email = $row_data['email'];         
        $user_cmpny = $row_data['companam'];         
        $user_adrs = $row_data['adrs'];         
        $user_typ = $row_data['usr_typ']; 
        echo"
        <form action='\' class='form  checkout-form col-12'style='margin:auto;border:1px lightgray solid;border-radius:6px;'>
          <div  class='modal-header mb-3 pb-0'>
              <h4  class='modal-title' >View User Data... </h4>
          </div>
          <div  class='form-group m-0 p-0'style=''>
              <label class='col-4 pl-1'style='' for='first_name'>First Name<span>*</span></label>
              <div class='alert alert-success'  >$user_usrnm</div>
          </div>
          <div  class='form-group m-0 p-0'style=''>
              <label class='col-4 pl-1'style='' for='last_name'>Full Name<span>*</span></label>
              <div class='alert alert-success'  >$user_fulnm</div>
          </div>
          <div  class='form-group m-0 p-0'style=''>
              <label class='col-4 pl-1'style='' for='email'>Email Address<span>*</span></label>
              <div class='alert alert-success'  >$user_email</div>
          </div>
          <div  class='form-group m-0 p-0'style=''>
              <label class='col-4 pl-1'style='' for='phone_number'>Phone<span>*</span></label>
              <div class='alert alert-success'  >$user_phonnu</div>
          </div>
          <div  class='form-group m-0 p-0'style=''>
              <label class='col-4 pl-1'style='' for='pasword'>password<span>*</span></label>
              <div class='alert alert-success'  >$user_pswrd</div>
          </div>
          <div  class='form-group m-0 p-0'style=''>
              <label class='col-4 pl-1'style='' for='companynm'>Company Name</label>
              <div class='alert alert-success'  >$user_cmpny</div>
          </div>
          <div  class='form-group m-0 p-0'style=''>
              <label class='col-4 pl-1'style='' for='street_address'>Street Address<span>*</span></label>
              <div class='alert alert-success'  >$user_adrs</div>
          </div>
          <div  class='form-group m-0 p-0'style=''>
              <label class='col-4 pl-1'style='' for='street_address'>User type<span>*</span></label>
              <div class='alert alert-success'  >$user_typ</div>
          </div>
          <div  class='modal-footer'>
              <button type='button' class=' btn btn-secondary cloose' data-dismiss='modal'>Close</button>
          </div>
      </form>
      ";
    }else{
        
        $user_id=$_GET['uid'];
        $db = connect_to_database();
        $query="SELECT * FROM `users` WHERE id=$user_id";
        $result=@mysqli_query($db,$query);
        $row_data = mysqli_fetch_assoc($result);
        $user_pswrd = $row_data['pasword']; 
        $user_usrnm = $row_data['usernm']; 
        $user_fulnm = $row_data['fulnm']; 
        $user_phonnu = $row_data['phonnu']; 
        $user_email = $row_data['email'];         
        $user_cmpny = $row_data['companam'];         
        $user_adrs = $row_data['adrs'];         
        $user_typ = $row_data['usr_typ']; 

    echo"
      <form action='\' class='form  checkout-form col-12' style='margin:auto;border:1px lightgray solid;border-radius:6px;'>
        <div  class='modal-header mb-3 pb-0'>
            <div id='msg_scses1' class='col-12 row mt-2 mr-0 ml-0  alert alert-success'style='display:none;'>your User Data have Updated ...</div>
            <h4  class='modal-title' id='hd_titl1'style='font-weight:700px;'>Edit User Data... </h4>
            <span aria-hidden='true' style='cursor: pointer;font-weight:1000;' id='clos'data-dismiss='modal'>&times;</span>
        </div>
        <div  class='form-group m-0 p-0'style=''>
            <label class='col-4 pl-1'style='' for='first_name'>First Name<span>*</span></label>
            <span class='err_msg alert-danger' id='usrnm_msg1'> </span>
            <input class='form-control mb-1 end_vldtn' type='text' value='$user_usrnm'  name='firstnmbx1'id='first_name1'>
            <input type='number' style='width:0px;font-size:0px;border-style:none;height:0px;' class='p-0 m-0' value='$user_id' id='usrid'>
        </div>
        <div  class='form-group m-0 p-0'style=''>
            <label class='col-4 pl-1'style='' for='last_name'>Full Name<span>*</span></label>
            <span class='err_msg alert-danger' id='fulnm_msg1'> </span>
            <input class='form-control mb-1 end_vldtn' type='text' value='$user_fulnm'  name='fullnmbx1'   id='last_name1' >
        </div>
        <div  class='form-group m-0 p-0'style=''>
            <label class='col-4 pl-1'style='' for='email'>Email Address<span>*</span></label>
            <span class='err_msg alert-danger' id='emil_msg1'> </span>
            <input class='form-control mb-1 end_vldtn' type='text' value='$user_email'  name='emailbx1'   id='email1'>
        </div>
        <div  class='form-group m-0 p-0'style=''>
            <label class='col-4 pl-1'style='' for='phone_number'>Phone<span>*</span></label>
            <span class='err_msg alert-danger' id='phon_msg1'> </span>
            <input class='form-control mb-1 end_vldtn' type='text' value='$user_phonnu'  name='phonebx1'   id='phone_number1'>
        </div>
        <div  class='form-group m-0 p-0'style=''>
            <label class='col-4 pl-1'style='' for='pasword'>password<span>*</span></label>
            <span class='err_msg alert-danger' id='pswrd_msg1'> </span>
            <input class='form-control mb-1 end_vldtn' type='text' value='$user_pswrd'  name='pswrdbx1'   id='pasword1'>
        </div>
        <div  class='form-group m-0 p-0'style=''>
            <label class='col-4 pl-1'style='' for='cnfrmpwrd'>Repassword<span>*</span></label>
            <span class='err_msg alert-danger' id='rpswrd_msg1'> </span>
            <input class='form-control mb-1 end_vldtn' type='text' value='$user_pswrd'  name='repswdbx1'  id='cnfrmpwrd1'>
        </div>
        <div  class='form-group m-0 p-0'style=''>
            <label class='col-4 pl-1'style='' for='companynm'>Company Name</label>
            <span class='err_msg alert-danger' id='cmpny_msg1'> </span>
            <input class='form-control mb-1 end_vldtn' type='text' value='$user_cmpny'  name='cmpnynmbx1'  id='companynm1'>
        </div>
        <div  class='form-group m-0 p-0'style=''>
            <label class='col-4 pl-1'style='' for='street_address'>Street Address<span>*</span></label>
            <span class='err_msg alert-danger' id='adres_msg1'> </span>
            <input class='form-control mb-1 end_vldtn street-first' value='$user_adrs'type='text' name='strtadrsbx1' id='street_address1'>
        </div>
        <div  class='form-group m-0 p-0 mb-4'style=''>
        <label for='exampleFormControlSelect1'>User Type</label>
        <select value='' name='user_typ1'   id='user_typ1'  class='form-control'>
            <option class='font' value='data entry'";if($user_typ == 'data entry'){echo"selected";} echo">Data entry</option>
            <option class='font' value='admin'     ";if($user_typ == 'admin'     ){echo"selected";} echo">Admin</option>
            <option class='font' value='manager'   ";if($user_typ == 'manager'   ){echo"selected";} echo">Manager</option>
            <option class='font' value='seler'     ";if($user_typ == 'seler'     ){echo"selected";} echo">Seler</option>
            <option class='font' value='dress_maker' ";if($user_typ == 'dress_maker'){echo"selected";} echo">Dress Maker</option>
            <option class='font' value='byer'      ";if($user_typ == 'byer'      ){echo"selected";} echo">Byer</option>
        </select>
        </div>
        <div  class='modal-footer'>
            <button type='button' id='close1' class=' btn btn-secondary cloose' data-dismiss='modal'>Close</button>
            <button type='button' name='crtacntbtn1' id='submit1' style=''  class='btn btn-primary'>Edit User</button>
        </div>
    </form>
    ";
}
?>