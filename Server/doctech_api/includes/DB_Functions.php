<?php



require_once __DIR__.'./../model/Model.php';

require_once 'DB_Connect.php';
       
class DB_Functions {

    private $db;
    private $model;
   
    function __construct() {
		 
		// connecting to database
        
		$this->db = new DB_Connect();
        $this->db->connect();       
	date_default_timezone_set("Asia/Kolkata");
    $this->now = date("Y-m-d H:i:s");
    

    $this->model = new Model();
    }

    // destructor
    function __destruct() {
        
    }
	
	
	/**
      new user
     */


     public function Login($email,$password,$firebase_token){
        
           
           $result=mysql_query("SELECT * FROM `user` WHERE `user_email`='$email' && `user_password`= '$password'");
           
           if(@mysql_affected_rows()>0)
           {
           
           $row=mysql_fetch_array($result);
            
           $update=mysql_query("UPDATE `user` SET `user_tocken` = '$firebase_token' WHERE `user_id` = '".$row['user_id']."'");
        
        
           $user=$this->model->UserModel($row);  

            return $user;
           }
    
           else {      
                return false;
       
             }
           
           
       }

     
      public function PassChenge($userid,$newpassword){

          
        $result=mysql_query("UPDATE `user` SET `user_password` = '$newpassword' WHERE `user_id` = '$userid'");
        


        if($result){
            

            $select=mysql_query("SELECT * FROM `user` WHERE `user_id`='$userid'");
            $row=mysql_fetch_array($select);
            $user=$this->model->UserModel($row);
      
           return $user;
                }
 
    
        else     {       return false;
    
          }
       




     } 




     public function UserExist($user)
     {
        $result=mysql_query("SELECT * FROM `user` WHERE `user_email`='".$user['user_email']."' && `user_phone`= '".$user['user_phone']."'");
           
        if(@mysql_affected_rows()>0){
        
        return false;
      }else{
         return true;
      }
     }

     public function Register($user)

     {
    //   $response=mysql_query("INSERT INTO `user` (`user_id`, `user_name`, `user_dob`, 
    //       `user_gender`, `user_phone`, `user_email`, `user_address`, `user_password`,
    //        `user_photo`, `user_token`)  VALUES ('','".$user['user_name']."','".$user['user_dob']."',
    //         '".$user['user_gender']."','".$user['user_phone']."','".$user['user_email']."',
    //         '".$user['user_address']."','".$user['user_password']."','".$user['user_url']."',
    //         '".$user['user_token']."')");


    mysql_query("INSERT INTO `user`(`user_id`, `user_name`, `user_dob`, `user_gender`, `user_phone`,
                `user_email`, `user_address`, `user_password`, `user_photo`, `user_tocken`) 
                 VALUES ('','".$user['user_name']."','".$user['user_dob']."',
                '".$user['user_gender']."','".$user['user_phone']."','".$user['user_email']."',
                '".$user['user_address']."' , '".$user['user_password']."' , '".$user['user_url']."',
                '".$user['user_token']." ')");
  



      if($user['user_phone']!='')
      { 
          $phoneno=$user['user_phone'];
          $selectfrom=mysql_query("SELECT  * from `user`  where `user_phone`='$phoneno' ORDER BY `user_id` DESC LIMIT 1");
          $row=mysql_fetch_array($selectfrom);

          if ($row)
          {
            $userresult=$this->model->UserModel($row);
         return $userresult;
          }else{
          return false;
              
          }
      }else{
          return false;
      }
     }

//    SELECT *
// FROM availablelist
//  INNER JOIN doctorlist ON doctorlist.id = availablelist.doctor_id
// INNER JOIN hospitallist ON hospitallist.hospital_id = availablelist.hospital_id

//SELECT * FROM available INNER JOIN doctor ON doctor.doc_id = available.doctor_id INNER JOIN hospital ON hospital.hospital_id = available.hospital_id
    

public function UpdateProfile($user)
     {
          $userid=$user['user_id'];
          
          if($user['user_url']!=""){
          $response=mysql_query(" UPDATE `user` SET `user_name`='".$user['user_name']."',
            `user_dob`='".$user['user_dob']."', `user_gender`='".$user['user_gender']."',
            `user_phone`='".$user['user_phone']."',`user_email`='".$user['user_email']."',
            `user_address`='".$user['user_address']."',
            `user_photo`='".$user['user_url']."'  WHERE `user_id`='$userid'");
      
          }else{
            $response=mysql_query(" UPDATE `user` SET `user_name`='".$user['user_name']."',
            `user_dob`='".$user['user_dob']."',`user_gender`='".$user['user_gender']."',
            `user_phone`='".$user['user_phone']."',`user_email`='".$user['user_email']."',
            `user_address`='".$user['user_address']."',`user_password`='".$user['user_password']."' 
              WHERE `user_id`='$userid'");
        
          }

           if($userid!='')
        { 
    
        $selectfrom=mysql_query("SELECT  * from `user`  where `user_id`='$userid' ORDER BY `user_id` DESC LIMIT 1");
        $row=mysql_fetch_array($selectfrom);

        if ($row)
        {
        $userresult=$this->model->UserModel($row);
        return $userresult;
        }else{
        return false;
        
        }
        }else{
        return false;
        }

      

        
     }
      public function Categorylist()
     {
        $selectfrom=mysql_query("SELECT  * from `catgery`");
       // $row=mysql_fetch_array($selectfrom);
            if($selectfrom)
            {
        
                $userresult=$this->model->CategoryModel($selectfrom);
                return $userresult;
            }else{
                return false;
            }
      }
  
     // 
      public function Placelist()
      {
       $selectfrom=mysql_query("SELECT  * from `place`");
      // $row=mysql_fetch_array($selectfrom);
       if($selectfrom)
       {
   
           $userresult=$this->model->PlaceModel($selectfrom);
           return $userresult;
       }else{
           return false;
       }
     }

     public function SearchwithPlace($search)
     {
      $selectfrom=mysql_query("SELECT * FROM available 
       INNER JOIN doctor ON doctor.doc_id = available.doctor_id 
       INNER JOIN hospital ON hospital.hospital_id = available.hospital_id 
       INNER JOIN catgery ON catgery.catgery_id = doctor.catgid
       INNER JOIN place ON place.place_id = hospital.h_place_id 
       WHERE place_id in('".$search['place_one']."','".$search['place_two']."',
       '".$search['place_three']."') && catgid='".$search['catgery_id']."'");
     // $row=mysql_fetch_array($selectfrom);
      if($selectfrom)
      {
  
          $userresult=$this->model->SearchModel($selectfrom);
          return $userresult;
      }else{
          return false;
      }
    }



    public function RequestSend($userid,$availableid)
    {

        $date = date('Y-m-d H:i:s');
  
        $selectfrom=  mysql_query("INSERT INTO `request`(`request_id`, `request_availableid`, `request_userid`, `request_time`) 
          VALUES ('','$availableid','$userid','$date')");



        if($selectfrom)
        {
            return true;

        }else{
            return false;
        }
       
    }

    public function getFireBaseToken($userid)
    {

      
  
      	$collection=mysql_query("SELECT * FROM `user` WHERE user_id ='$userid'");
        $row=mysql_fetch_array($collection);
       
        $firebase_id=$row['user_tocken'];
        
        if($row)  {
         
            return $firebase_id;

        
        }else{
           return false;
        }
	   
       
    }


    public function ForgotPass($email)
    {

        $collection=mysql_query("SELECT * FROM `user` WHERE user_email ='$email' ");
        $row=mysql_fetch_array($collection);
       
        if($row)  {

            $row['user_email'];
            $row['user_password'];
         
         // email service   
        
        }else{
           return false;
        }
    }
    
    public function AppointmentResult($resultid)
    {
   

      	$collection=mysql_query("SELECT * FROM `request` 
          INNER JOIN available ON available.available_id = request.request_availableid 
          INNER JOIN doctor ON doctor.doc_id = available.available_id
          INNER JOIN hospital ON hospital.hospital_id = available.hospital_id
          INNER JOIN catgery ON catgery.catgery_id = doctor.catgid
          INNER JOIN place ON place.place_id = hospital.h_place_id WHERE request_id= '$resultid' ");
        $row=mysql_fetch_array($collection);

     
        
        if($row)
        {
    
            $userresult=$this->model->ResultAppointment($row);
            return $userresult;
        }else{
            return false;
        }
       
    }


}


?>