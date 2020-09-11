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

    	// $state_name = $input_params['state_name'];
    	
    	$id = $input_params['id'];

    	if (empty($id)) 
    	{
    		header('Content-type: application/json');
			echo json_encode(array("status"=>0,"message"=>"Please fill all required Fields"));	
    	}
    	else
    	{
			$query_class_duplicate=$con->select_query("tbl_uom","*","Where id='".$id."'");
			$rowfetchduplicate = mysqli_fetch_assoc($query_class_duplicate);
			if(mysqli_num_rows($query_class_duplicate) < 0)
			{
				header('Content-type: application/json');
				echo json_encode(array('status'=>0,'message'=>'UOM is not availble.'));
			}
			else
			{    		
    		$insertUser = $con->delete("tbl_uom","where id='".$id."'");
					// $user_id = mysqli_insert_id();
					//print_r($userid);die();
					header('Content-type: application/json');
					echo json_encode(array("status"=>1,"message"=>"UOM delete Successfully."));
    	}
    }
?>