<?php
 require_once 'includes/DB_Functions.php';
 require_once  'response/Resformat.php';
  $db = new DB_Functions();
  $resp=new Resformat();
error_reporting(0);


if (isset($_POST['user_name']) && $_POST['user_name'] != '')

{
        $folder_path="photos/userimages";
        $urlpath="http://doctech.nyesteventuretech.com/service_1/photos/userimages";

        $user['user_id']=$_POST['user_id']; 
        $user['user_name']=$_POST['user_name'];
        $user['user_dob']=$_POST['user_dob'];
        $user['user_gender']=$_POST['user_gender'];
        $user['user_email']=$_POST['user_email'];
        $user['user_photo']=$_POST['user_photo'];
        $user['user_address']=$_POST['user_address'];
        $user['user_phone']=$_POST['user_phone'];


        
        //check email phone already exist

      
     
        $randomno=$user['user_phone'].rand();
        $image_name="$randomno.jpeg";
        if( $user['user_photo']!=null ||  $user['user_photo']!='')
        {
            $path="$folder_path/$image_name";
            try{
                file_put_contents($path,base64_decode($user['user_photo']));
                $user['user_url']="$urlpath/$image_name";
            }catch(Exception $e)
            {
                $user['user_url']="";
            }

        }
        else
        {
            $user['user_url']="";

        }

         $uid=$db->UpdateProfile($user);
         if($uid!=false)
         {
            $resp->response(1,"Updation Successfull ",$uid);
         }else{
            $resp->response(0,"Something went wrong",$uid);
         }

         
           

       }else{
        $resp->response(0,"Something went wrong",$uid);
       }








      //image store
        







?>