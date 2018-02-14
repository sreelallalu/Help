      <?php

		require_once __DIR__.'./../includes/DB_Functions.php';
		require_once __DIR__.'./../response/Resformat.php';

		$db = new DB_Functions();
		$resp=new Resformat();


		$userId=$_GET['user_id'];
		$availableId=$_GET['available_id'];

      

	define( 'API_ACCESS_KEY','AAAA9ulpuwk:APA91bHBnwY3aMIqfT9-TnR5u07-0rO27jg0VVqWVVHm5JI-sq3NDgOzR-BdD536SdkVIhvi1cEUvl-eyFhyWeRwtfof6--SV5V5trgd9UTbKnvS3zdUhGFyTJexqVLT3UL7bvgbnPjq' );
	   
	

	$firebase_id=$db->getFireBaseToken($userId);
	
   if($firebase_id!=false)
   {
			$msg = array

			(

				'message' 	=> 'Your appointment is confirmed',
				'id' 	=> $availableId,
				'title'		=> 'DocTech',
			);
			$msg1 = array

			(
				'id' 	=> $availableId,
				'message' 	=> 'Your appointment is confirmed',
				'title' 	=> 'DocTech',
				'body'		=> 'Your appointment is confirmed',
			);
		
		
			
				$fields = array
					(                       
						'to' => $firebase_id,
						'data'	=> $msg,
						 'notification'=>$msg1,
						'priority'=>'High',
					);
			

			$headers = array

			(

				'Authorization: key=' . API_ACCESS_KEY,

				'Content-Type: application/json'

			);

			

			$ch = curl_init();

			curl_setopt( $ch,CURLOPT_URL, 'https://android.googleapis.com/gcm/send' );

			curl_setopt( $ch,CURLOPT_POST, true );

			curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );

			curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );

			curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );

			curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );

			$result = curl_exec($ch );

			curl_close( $ch );

			

			echo $result;

	}else{

		echo "error";
	}			
?>
