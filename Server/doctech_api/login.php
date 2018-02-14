<?php
    require_once 'includes/DB_Functions.php';
    require_once  'response/Resformat.php';
     $db = new DB_Functions();
     $resp=new Resformat();

   if(isset($_POST['user_email']) && $_POST['user_email'] != '')
   {
   
    $email=$_POST['user_email'];
    $password=$_POST['user_password'];
    $firebasetoken=$_POST['user_token'];

    $uid=$db->Login($email,$password,$firebasetoken);
    if ($uid!=false) { 
        
         $msg="Login Success";
         $resp->response(1,$msg,$uid);  
     }
    else {
         $msg="Login Faild! Enter Proper login Details";
         $resp->response(0,$msg,"");
       }   
   }
   else {
    $msg="Something went wrong";
    $resp->response(0,$msg,"");
  }   


?>