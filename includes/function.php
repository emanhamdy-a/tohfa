<?php 
    ob_start();
    session_start();

###################################################################### connect to DB 

////////// Connect connect to  database ////////////
       
        function connect_to_database()
         {
           $db =  @mysqli_connect('localhost','root','' ,'tohfa_db1');
           return $db;
         }
//////////////////////////////////////////////check if no user have this regester data before now////////////////   
        function completelogin()
            {  
             if(isset($_GET['logn']) && isset($_GET['paswrdbx']) && isset($_GET['nambx']))
               {

                $db = connect_to_database();
                $usrnm = $_GET['nambx'];
                $pasw  = $_GET['paswrdbx'];
                $query="SELECT * FROM users WHERE
                usernm='$usrnm' AND pasword ='$pasw'";
                $reesult = @mysqli_query($db,$query);
                $row_data = mysqli_fetch_assoc($reesult);
                $user_id = $row_data['id'];                 
                $user_nm = $row_data['usernm'];                 
                $user_tybe = $row_data['usr_typ'];  
                $user_phon = $row_data['phonnu'];  
                $user_adrs = $row_data['adrs'];  
                $user_cmpny = $row_data['companam'];  
                $_SESSION['logn']['user_id']=$user_id;               
                $_SESSION['logn']['user_nm']=$user_nm;               
                $_SESSION['logn']['user_tybe']=$user_tybe;               
                $_SESSION['logn']['user_phone']=$user_phon;               
                $_SESSION['logn']['user_adrs']=$user_adrs;               
                $_SESSION['logn']['companynm']=$user_cmpny;               
                return @mysqli_num_rows($reesult); 
               }  
             }        

//////////////////////////////////////////////check if no user have this regester data before now////////////////
        function newfeild($faild,$getinput)
        {
            $db= connect_to_database();
            $query="SELECT * FROM users WHERE
            $faild  ='$getinput'";
            $result = @mysqli_query($db,$query);
            return @mysqli_num_rows($result);
            //(newfeild($_GET[$getinput]));                
        }
    
 ///////////////////////////////////////////////////////////////////////
 ############################################################ Is logged 
    /**
     * Checj if user is logged in or not 
     */
    function check_login()
        {
            if(isset($_SESSION['logn']['login-result']) AND $_SESSION['logn']['login-result']='yeas')
                {
                    return true;
                }
                 else
                {
                    return false;
                }    
        } 

////////////////////////////////userid////////////////////
 function user_id()
  {
    if(check_login() == true)
    {
      return  $_SESSION['logn']['user_id'];  
    }   
    else {return false;} 
  } 
//////////////////////////////check--favorit///////////////////
 function check_favorit($prdctid)
   {
    if(check_login() && user_type() == 'byer'){
      $usr_fvrt_id=user_id(); 
      $db=connect_to_database();
      $sqll="SELECT * FROM favorit WHERE prdct_id =$prdctid AND userid = $usr_fvrt_id";
      $favrt=@mysqli_query($db,$sqll); 
      $n_fvrt=@mysqli_num_rows($favrt);
      if($n_fvrt > 0){
          echo"
          <div id='$prdctid'class='ad_fvrt icon'style='cursor:pointer;color:darkorange;font-weight:1000;font-size:28px;'>
          <i class='icon_heart_alt'></i>
          </div>";
      }else{
          echo"
          <div id='$prdctid'class='ad_fvrt icon'style='cursor:pointer;font-weight:1000;font-size:28px;'>
          <i class='icon_heart_alt'></i>
          </div>";
      }     
    }elseif(check_login() && user_type() != 'byer'){
          echo"";
    }else{
          echo"
          <div id='$prdctid' data-toggle='modal' data-target='#login_modal' class='icon fvrt_icon'style='cursor:pointer;font-weight:1000;font-size:28px;'>
          <i class='icon_heart_alt'></i>
          </div>";
      }
   }
////////////////////////////check--favorit/end//////////////////

//////////////////////////////echo--logout///////////////////
  function echo_logout_or_logn()
    {
      if(check_login() == true)
      {
        echo "<a href='actions/log_out.php'>log out</a>";
      }
      else
      {
        echo "<a style='cursor:pointer;'data-toggle='modal' data-target='#login_modal'>Log In</a>";
      }
    }

   ///////////////////////////////echo_add_rspnd_btn//////////////////////////////
   function echo_add_rspnd_btn(){
    if(check_login() == true && user_type() =='dress_maker'){
      echo"data-toggle='modal' data-target='#ad_rspnds_cntnr'";
    }elseif(check_login() == true && user_type() !='dress_maker'){
      echo"data-toggle='modal' data-target='#warning_modal'";      
    }else{
      echo"data-toggle='modal' data-target='#login_modal'";
    }
   }
  ///////////////////////////////echo_add_rspnd_btn//////////////////////////////
   function echo_add_ordr_btn(){
    if(check_login() == true && user_type() =='byer'){
      echo"data-toggle='modal' data-target='#ad_order_contner'";
    }elseif(check_login() == true && user_type() !='byer'){
      echo"data-toggle='modal' data-target='#warningmodal'";      
    }else{
      echo"data-toggle='modal' data-target='#login_modal'";
    }
   }
   ////////////////////////////////usertype/////////////////////
   function user_type()
    {
      if(check_login() == true)
      {
      return  $_SESSION['logn']['user_tybe'];               
      }   
      else {return false;} 
    }
///////////////////////////////echo--regester////////////////
   function echo_regester()
   {
    if(check_login())
    {
      echo "";
    }
    else
    {
      echo "<a style='cursor:pointer;'data-toggle='modal' data-target='#rgstr_modal'>Register</a> ";
    }
   }
///////////////////////////////echo--regester/end///////////////

///////////////////////////////echo--create acount////////////////
   function echo_creatacount()
   {
    if(check_login() == true && user_type() =='seler')
    {
      echo "";
    }
    elseif(check_login() == true && user_type() =='byer')
    {
      echo "<a style='cursor:pointer;'data-toggle='modal' data-target='#crt_acnt_modal'>Create Account</a>";
    }
    elseif(check_login() == true && user_type() =='admin')
    {
      echo "";
    }
    elseif(check_login() == false)
      echo "<a style='cursor:pointer;'data-toggle='modal' data-target='#crt_acnt_modal'>Create Account</a>";
    else
     {
      echo "";
     }
   }
///////////////////////////////echo--create account/end///////////////   

///////////////////////////////echo--myaccount///////////////
  function echo_myaccount()
   {
      if(check_login() == true && user_type() =='seler'){
        echo "<a href='myaccount.php'>" . user_nm() . " store</a>";
      }elseif(check_login() == true && user_type() =='admin'){
        echo "<a href='admin.php'>Admin</a>"; 
      }elseif(check_login() == true && user_type() =='byer'){
        echo "";
      }elseif(check_login() == true && user_type() =='dress_maker'){
        echo "<a href='dress_maker.php'>" . user_nm() . " Atelier</a>"; 
      }
      else
      {
        echo "";
      }
   }
/////////////////////////////////////////////////////////////
   function echo_favorit()
   {
      if(check_login() == true && user_type() == 'byer' ){
        echo " <a href='favorites.php' class='fav-nav'>Favourites_Orders</a>";
      }
      else{
        echo "";
      }
   }
///////////////////////////////////////////////////////////
   function echo_favorit_icon()
   {
     if(check_login() == true && user_type() == 'byer' ) {
        echo "
            <a href='favorites.php' >
            <i style=''class='icon_heart_alt'></i>
            <span id='fvrt_nm'>0</span>
            </a>
            ";
      }elseif(check_login() == true && user_type() != 'byer' ){
        echo "";
      }else{
        echo "<a href='favorites.php' data-toggle='modal' data-target='#login_modal'>
              <i style=''class='icon_heart_alt'></i>
              <span id='fvrt_nm'>0</span>
              </a>";
      }
   }   
////////////////////////////////usertype////////////////////
   function user_nm()
   {
    if(check_login() == true)
    {
      return $_SESSION['logn']['user_nm'];               

    }   
    else {return false;} 
   } 
///////////////////////////////user//phone///////////////////
   function user_phon()
   {
    if(check_login() == true)
    {
      return  $_SESSION['logn']['user_phone'];  
    }   
    else {return false;} 
   }
//////////////////////////////////user//company////////////////////////////
   function user_cmpny()
   {
    if(check_login() == true)
    {
      return  $_SESSION['logn']['companynm'];  
    }   
    else {return false;} 
   }  
////////////////////////////////user//adress////////////////////////////
   function user_adrs()
   {
      if(check_login() == true)
      {
        return  $_SESSION['logn']['user_adrs'];  
      }   
      else {return false;} 
    }  
//////
   function outputMessage($msg='',$type='success')
    {
        ECHO "
                <div id='eror_msg' class='col-12 row mt-2 mr-0 ml-0  alert alert-{$type}'>{$msg}</div>
            ";
    }
?>