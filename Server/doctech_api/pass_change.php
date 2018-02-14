<?php
  require 'includes/DB_Functions.php';
  require  'response/Resformat.php';
  $db = new DB_Functions();
  $resp=new Resformat();
 
  if(isset($_POST['user_id']) && $_POST['user_id'] != '')

  {

    $userid=$_POST['user_id'];
    $newpassword=$_POST['user_password'];
      
    
    $uid=$db->PassChange($userid,$newpassword);
    
 
      if ($uid!=false) {
        
        $msg="Password chenged Successfully";    
        $resp->response(1,$msg,$uid);
        
          }
        else {
                $msg="Faild! Please Try Again";
                $resp->response(0,$msg,$uid);
            }    
        
  }
  else {
    $msg="Faild! Please Try Again";
    $resp->response(0,$msg,$uid);
}  

?>