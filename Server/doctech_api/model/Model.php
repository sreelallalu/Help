<?php
class Model{


    function __construct() {
		
    
    }

    // destructor
    function __destruct() {
        
    }


   public function UserModel($user)
   {
       $respo['user_id']=(int)$user['user_id'];
       $respo['user_name']=$user['user_name'];
       $respo['user_dob']=$user['user_dob'];
       $respo['user_gender']=$user['user_gender'];
       $respo['user_phone']=$user['user_phone'];
       $respo['user_email']=$user['user_email'];
       $respo['user_address']=$user['user_address'];
       $respo['user_password']=$user['user_password'];
       $respo['user_photo']=$user['user_photo'];

    
   return array($respo);

   }
   public function CategoryModel($tableIndex)
   {
    $response_s=array();


    while($row = mysql_fetch_assoc($tableIndex)){
    
        $temps['catgery_id']= (int) $row['catgery_id'];
        $temps['catgery_name']=$row['catgery_name'];
        array_push($response_s,$temps);
    }

   return $response_s;

   }

   public function PlaceModel($tableIndex)
   {
    $response_s=array();


    while($row = mysql_fetch_assoc($tableIndex)){
    
        $temps['place_id']= (int) $row['place_id'];
        $temps['place_name']=$row['place_name'];
        array_push($response_s,$temps);
    }

   return $response_s;

   }
   public function SearchModel($tableIndex)
   {
    $response_s=array();


    while($row = mysql_fetch_assoc($tableIndex)){
 
        $temps['available_id']= (int) $row['available_id'];
        $temps['doctor_id']=(int)$row['doctor_id'];
        $temps['hospital_id']=(int)$row['hospital_id'];
        $temps['available_isavailable']=(int)$row['available_isavailable'];
        $temps['place_id']=(int)$row['place_id'];
        $temps['catgery_id']=(int)$row['catgery_id'];


        $temps['available_time']=$row['available_time'];
        $temps['available_date']=$row['available_date'];
        $temps['doctor_name']=$row['doc_name'];
        $temps['catgery_name']=$row['catgery_name'];
        $temps['doctor_address']=$row['doc_address'];
        $temps['doctor_qualification']=$row['doc_qualification'];
        $temps['doctor_gender']=$row['doc_gender'];
        $temps['doctor_photo']=$row['doc_photo'];
        $temps['hospital_name']=$row['hospital_name'];
        $temps['hospital_lat']=$row['hospital_lat'];
        $temps['hospital_long']=$row['hospital_long'];
        $temps['place_name']=$row['place_name'];


        array_push($response_s,$temps);
    }

   return $response_s;

   }

   public function ResultAppointment($row)
   {

  
    $respo['hospital_name']=$row['hospital_name'];
    $respo['hospital_place']=$row['place_name'];
    $respo['available_time']=$row['available_time'];
    $respo['available_date']=$row['available_date'];
    $respo['doctor_name']=$row['doc_name'];
    $respo['doctor_catgery']=$row['catgery_name'];
    $respo['request_time']=$row['request_time'];
    $respo['hospital_lat']=$row['hospital_lat'];
    $respo['hospital_long']=$row['hospital_long'];
   
 
   return array($respo);

        
   }

}



?>