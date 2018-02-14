<?php

require_once 'includes/DB_Functions.php';
require_once  'response/Resformat.php';
 $db = new DB_Functions();
 $resp=new Resformat();

if(isset($_POST['result_id']) && $_POST['result_id'] != '')
{



    $result=$_POST['result_id'];
    $uid=$db->AppointmentResult($result);

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