<?php

   require_once 'includes/DB_Functions.php';
    require_once  'response/Resformat.php';
     $db = new DB_Functions();
     $resp=new Resformat();

     $uid=$db->Categorylist();
     if ($uid!=false) { 
 
          $msg="Success";
          $resp->response(1,$msg,$uid);  
      }
     else {
          $msg="Something went wrong";
          $resp->response(0,$msg,"");
        }   

?>