<?php
 include("../includes/function.php");

 if(isset($_GET['inptid']) && $_GET['inptid'] != ""){$inptid = $_GET['inptid'];}else{$inptid=' ';}
 if(isset($_GET['inptvl']) && $_GET['inptvl'] != ""){$inptvl = $_GET['inptvl'];}else{$inptvl=' ';}
   if($inptid == 'usernm'){
     if(newfeild('usernm',$inptvl) > 0)
      {
        $_SESSION['login']['a']="a";
        echo"<span id='usrnm_msg' class='alert-success col-12 p-1 pl-5 pr-5 m-0'style='border-radius:4px;'>success</span>";
      }
     elseif($inptvl == ' ')
      { unset($_SESSION['login']['a']); echo"<span class='p-4'></span>Please fill this field ... <span class='p-4 pt-5 pb-5'></span>";}
     elseif($inptvl !=' ')
      {
        unset($_SESSION['login']['a']);
        echo"<span class='p-4'></span>this user name not exist .<span class='p-4 pt-5 pb-5'></span";
      }       
   }elseif($inptid == 'pswrdd'){
     if(newfeild('pasword',$inptvl) > 0)
      { 
        $_SESSION['login']['b']="b";
        echo"<span id='usrnm_msg' class='alert-success col-12 p-1 pl-5 pr-5 m-0'style='border-radius:4px;'>success</span>";
      }
     elseif($inptvl == ' ')
      {unset($_SESSION['login']['b']);echo"<span class='p-4'></span>Please fill this field ... <span class='p-4 pt-5 pb-5'></span>";}
     elseif($inptvl !=' ')
      {
        unset($_SESSION['login']['b']);
        echo"<span class='p-4'></span>this user password not exist .<span class='p-4 pt-5 pb-5'></span";
      }    
   }elseif($inptid == 'end_login'){
     if(isset($_SESSION['login']) && $_SESSION['login'] !="")
     {
       $count =count($_SESSION['login']);
       if ($count != "")
         {echo $count;}
       else
         {echo"0";}
      }else{echo"0";}
   }elseif($inptid == 'login_btn'){
     if(completelogin() > 0)
      {
        echo $_SESSION['logn']['user_tybe'];
        $_SESSION['logn']['login-result']='yeas';
      }
     else
      {
        echo"faild";
      }
   }
?>