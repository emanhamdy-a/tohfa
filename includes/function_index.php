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
     * 
     * @return : bool 
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
     if(check_login())
     {
      $usr_fvrt_id=user_id(); 
      $db=connect_to_database();
      $sqll="SELECT * FROM favorit WHERE prdct_id =$prdctid AND userid = $usr_fvrt_id";
      $favrt=@mysqli_query($db,$sqll); 
      $n_fvrt=@mysqli_num_rows($favrt);
      if($n_fvrt > 0)
       {echo"
        <a href='#' id='$prdctid' class='fav-nav fa ad_fvrt'>
        <img src='img\core-img\delete.png'>
        <span style='color:darkorange;'>Favourite</span></a>
        ";}
      else
       {echo"
        <a style='' href='#' id='$prdctid' class='fav-nav fa ad_fvrt'>
        <img src='img/core-img/favorites.png' alt=''>
        <span style='color:black;'>Add To Favourite</span></a>
         ";}     
     }
     else
     {
       echo"
       <a href='log_regst/log_in.php' class='fav-nav fa fa-star'>
       <img src='img/core-img/favorites.png' alt=''>
       <span style=''>Add To Favourite</span></a>
        ";
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
       echo "<a href='signs/login.php'>log in</a>";
     }
  }

   /////////////////////////////////////////////////////////////
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
      echo "<a style='cursor:pointer;'data-toggle='modal' data-target='#rgstr_modal'>Register</a>";
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
      echo "<a href='signs/crtacnt.php'>create account</a>";
    }
    elseif(check_login() == true && user_type() =='admin')
    {
      echo "";
    }
    elseif(check_login() == false)
     {echo "<a href='signs/crtacnt.php'>create account</a>";}
    else
     {
      echo "";
     }
   }
///////////////////////////////echo--create account/end///////////////   

///////////////////////////////echo--myaccount///////////////

   function echo_myaccount()
   {
      if(check_login() == true && user_type() =='seler')
      {
        echo "<a href='pages/myaccount.php'>" . user_nm() . " store</a>";
      }
      elseif(check_login() == true && user_type() =='admin')
      { echo "<a href='admin/admin.php'>Admin</a>"; }
      elseif(check_login() == true && user_type() =='byer')
      {
        echo "";
      }
      else
      {
        echo "";
      }
   }
/////////////////////////////////////////////////////////////
   function echo_favorit()
   {
      if(check_login() == true && user_type() != 'admin' )
      {
        echo " <a href='pages/favorites.php' class='fav-nav'>Favourites</a>";
      }
      elseif(check_login() == true && user_type() == 'admin')
      {
        echo "";
      }
      else
      {
        echo "";
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