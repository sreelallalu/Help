<?php

    require_once 'includes/DB_Functions.php';
    require_once  'response/Resformat.php';
     $db = new DB_Functions();
     $resp=new Resformat();

     if(isset($_POST['user_id']) && $_POST['user_id'] != '')
     {
     
      $userid=$_POST['user_id'];
      $availableid=$_POST['available_id'];
    


      $uid=$db->RequestSend($userid,$availableid);
      if ($uid!=false) { 
   
           $msg="Success";
           $resp->response(1,$msg,$uid);  
       }
      else {
           $msg="Something went wrong";
           $resp->response(0,$msg,"");
         }  


     }
   

?>