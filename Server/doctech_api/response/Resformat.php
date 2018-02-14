<?php
 
 class ResFormat{

  
    function __construct() {    
    }
    // destructor
    function __destruct() {
        // $this->close();
    }
  public function response ($success,$message,$data)
    {
      $response['success']=$success;
      $response['data']=$data;
      $response['message']=$message;
      echo json_encode($response);
      exit;
    }  
 }



?>