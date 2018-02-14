<?php

require_once 'includes/DB_Functions.php';
require_once  'response/Resformat.php';

$db = new DB_Functions();
$resp=new Resformat();

if(isset($_POST['place_one']) && $_POST['place_one'] != '')
   {
      $search['place_one']=$_POST['place_one'];
      $search['place_two']=$_POST['place_two'];
      $search['place_three']=$_POST['place_three'];
      $search['catgery_id']=$_POST['catgery_id'];


      $uid=$db->SearchwithPlace($search);
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