<?php
  require 'includes/DB_Functions.php';
  require  'response/Resformat.php';
  $db = new DB_Functions();
  $resp=new Resformat();

  if(isset($_POST['user_email']) && $_POST['user_email'] != '')
  {
  
   $email=$_POST['user_email'];
   $uid=$db->ForgotPass($email);
   if ($uid!=false) { 
       
        $msg="Success";
        $resp->response(1,$msg,$uid);  
    }
   else {
        $msg="Login Faild! Enter Proper login Details";
        $resp->response(0,$msg,"");
      }   
  }
  

 ?>