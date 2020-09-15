<?php

$file = fopen("php://input","r");

$jsonInput ="";

while(!feof($file))
{
	$jsonInput .= fgets($file);	
}

fclose($file);

	$input_params = json_decode($jsonInput,true);
    
	include("includes/common_class.php");
	
	include("includes/config.php");
	

    	$state_name = $input_params['state_name'];

    	if (empty($state_name)) {
    		
    		header('Content-type: application/json');

			echo json_encode(array("status"=>0,"message"=>"Please fill all required Fields"));	
    	}else{

			$query_class_duplicate=$con->select_query("state","*","Where state_name='".$state_name."'");
			$rowfetchduplicate = mysqli_fetch_assoc($query_class_duplicate);
			if(mysqli_num_rows($query_class_duplicate) > 0){
				header('Content-type: application/json');
				echo json_encode(array('status'=>0,'message'=>'State name are already exists.'));
				
			}else{    		
    		
    		$state=array(

    			"state_name"=>$state_name

    		);

    		$insertUser = $con->insert_record("state",$state);

    		/*	if ($insertUser === TRUE) {
  					$last_id = $conn->insert_id;
  					echo "New record created successfully. Last inserted ID is: " . $last_id;
				} else{
					echo "string";
				}*/

					// $user_id = ;
/*					$id = $con->last_inserted_id();	
					echo($id);*/
					// die();
					
					header('Content-type: application/json');

					echo json_encode(array("status"=>1,"message"=>"state added Successfully."));
    	}
    }
?>