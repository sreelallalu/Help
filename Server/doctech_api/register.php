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

        $user['user_name']=$_POST['user_name'];
        $user['user_dob']=$_POST['user_dob'];
        $user['user_gender']=$_POST['user_gender'];
        $user['user_email']=$_POST['user_email'];
        $user['user_password']=$_POST['user_password'];
        $user['user_photo']=$_POST['user_photo'];
        $user['user_address']=$_POST['user_address'];
        $user['user_phone']=$_POST['user_phone'];
        $user['user_token']=$_POST['user_token'];

        
        //check email phone already exist

       $check=$db->UserExist($user);
       if($check!=false)
       {
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

         $uid=$db->Register($user);
         if($uid!=false)
         {
         $resp->response(1,"Registration Successfull ",$uid);
             

         }else{
            $resp->response(0,"Something went wrong",$uid);

         }

           

       }else{

        $resp->response(0,"email or phone already exist! ","");
       }








      //image store
        





}

?>